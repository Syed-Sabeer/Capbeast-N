<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Models\Cart;
use Monarobase\CountryList\CountryList;
use App\Mail\OrderPlacedMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Order;
use App\Models\State;
use App\Models\OrderTaxDetails;
use App\Models\TVQTaxPrice;
use App\Models\TPSTaxPrice;
use App\Models\DiscountCoupon;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderShippingDetail;
use App\Models\OrderShippingRate;
use App\Models\OrderArtwork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\PaymentExecution;
use PayPal\Exception\PPConnectionException;
use App\Services\StallionExpressService;

class OrderController extends Controller
{
  private $_api_context;
  private $stallionService;

  public function __construct()
  {
    $paypal = config('paypal');
    Log::info('PayPal Configuration:', [
      'client_id' => $paypal['client_id'],
      'mode' => $paypal['settings']['mode'],
      'env_client_id' => env('PAYPAL_CLIENT_ID'),
      'env_secret' => env('PAYPAL_SECRET'),
      'env_mode' => env('PAYPAL_MODE')
    ]);

    $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal['client_id'], $paypal['secret']));
    $this->_api_context->setConfig($paypal['settings']);
    $this->stallionService = new StallionExpressService();
  }

  public function getStates($code)
  {
    try {
      $states = State::where('country_code', $code)->get(['code', 'name']);
      return response()->json($states);
    } catch (\Exception $e) {
      \Log::error('Error in getStates: ' . $e->getMessage());
      return response()->json(['error' => 'Failed to load states'], 500);
    }
  }


  public function PostPaymentWithPaypal($totalPrice)
  {
    try {
      $payer = new Payer();
      $payer->setPaymentMethod('paypal');

      $amount = new Amount();
      $amount->setTotal((float)$totalPrice);
      $amount->setCurrency('USD');

      $transaction = new Transaction();
      $transaction->setAmount($amount);

      $redirectUrls = new RedirectUrls();
      $redirectUrls->setReturnUrl(URL::route('status'))
        ->setCancelUrl(URL::route('status'));

      $payment = new Payment();
      $payment->setIntent('sale')
        ->setPayer($payer)
        ->setTransactions([$transaction])
        ->setRedirectUrls($redirectUrls);

      Log::info('Creating PayPal payment with context:', [
        'total_price' => $totalPrice,
        'currency' => 'USD',
        'mode' => config('paypal.settings.mode')
      ]);

      $payment->create($this->_api_context);
      Log::info("PayPal Payment Created: " . json_encode($payment));
    } catch (\Exception $ex) {
      Log::error("PayPal Error: " . $ex->getMessage());
      Session::put('error', 'Payment failed: ' . $ex->getMessage());
      return Redirect::route('checkout');
    }

    foreach ($payment->getLinks() as $link) {
      if ($link->getRel() == 'approval_url') {
        $redirect_url = $link->getHref();
        break;
      }
    }

    // Store payment ID for later use
    Session::put('paypal_payment_id', $payment->getId());

    return $redirect_url;
  }



  public function GetPaymentStatus(Request $request)
  {
    $paymentId = $request->query('paymentId');
    $payerId = $request->query('PayerID');

    if (empty($payerId) || empty($paymentId)) {
      Session::put('error', 'Payment failed');
      return redirect()->route('checkout');
    }

    try {
      // Retrieve total price and discount details from session
      $totalPrice = session('checkout_details')['total_price'] ?? 0;
      $discountAmount = session('checkout_details')['discount_amount'] ?? 0;
      $discountId = session('checkout_details')['discount_id'] ?? null;
      $subtotalPrice = session('checkout_details')['subtotal_price'] ?? 0;
      $TPStaxAmount = session('checkout_details')['tps_tax_price'] ?? 0;
      $TVQtaxAmount = session('checkout_details')['tvq_tax_price'] ?? 0;
      $TPStaxNumber = session('checkout_details')['tps_tax_no'] ?? 0;
      $TVQtaxNumber = session('checkout_details')['tvq_tax_no'] ?? 0;
      $TPStaxPercentage = session('checkout_details')['tps_tax_percentage'] ?? 0;
      $TVQtaxPercentage = session('checkout_details')['tvq_tax_percentage'] ?? 0;
      $shippingPrice = session('checkout_details')['shipping_price'] ?? 0;
      $shippingMethod = session('checkout_details')['shipping_method'] ?? '';
      $shippingService = session('checkout_details')['shipping_service'] ?? '';
      $shippingEstimatedDays = session('checkout_details')['shipping_estimated_days'] ?? '';

      $payment = Payment::get($paymentId, $this->_api_context);
      $execution = new PaymentExecution();
      $execution->setPayerId($payerId);
      $result = $payment->execute($execution, $this->_api_context);

      if ($result->state == 'approved') {
        // Retrieve session data
        $checkoutDetails = session('checkout_details');
        if (!$checkoutDetails) {
          return redirect()->route('checkout')->with('error', 'Session expired.');
        }

        DB::beginTransaction();

        try {
          // Create Order with basic shipping price
          $order = Order::create([
            'order_id' => $this->generateOrderId(),
            'user_id' => auth()->id(),
            'discount_id' => $discountId,
            'total_price' => $totalPrice,
            'subtotal_price' => $subtotalPrice,
            'discount_price' => $discountAmount,
            'shipping_price' => $shippingPrice,
            'shipping_method' => $shippingMethod,
            'shipping_service' => $shippingService,
            'shipping_estimated_days' => $shippingEstimatedDays,
            'status' => 0,
          ]);

          // Create shipping rate record
          if ($shippingMethod) {
            OrderShippingRate::create([
              'order_id' => $order->id,
              'postage_type_id' => $shippingMethod,
              'postage_type' => $shippingService,
              'shipping_price' => $shippingPrice,
              'delivery_days' => $shippingEstimatedDays,
              'service_name' => $shippingService,
              'rate_details' => session('checkout_details.shipping_rate_details', [])
            ]);
          }

          $country = session('checkout_details')['country'] ?? null;
          if (($TPStaxAmount > 0 || $TVQtaxAmount > 0) && $country === 'CA') {
            OrderTaxDetails::create([
              'order_id' => $order->id,
              'tps_tax_no' => $TPStaxNumber,
              'tps_tax_percentage' => $TPStaxPercentage,
              'tps_tax_price' => $TPStaxAmount,
              'tvq_tax_no' => $TVQtaxNumber,
              'tvq_tax_percentage' => $TVQtaxPercentage,
              'tvq_tax_price' => $TVQtaxAmount,
            ]);
          }

          // Create Shipping Details
          $shippingDetail = OrderShippingDetail::create([
            'order_id' => $order->id,
            'firstname' => $checkoutDetails['firstname'],
            'lastname' => $checkoutDetails['lastname'],
            'companyname' => $checkoutDetails['companyname'],
            'country' => $checkoutDetails['country'],
            'address' => $checkoutDetails['address'],
            'email' => $checkoutDetails['email'],
            'phone' => $checkoutDetails['phone'],
            'additional_info' => $checkoutDetails['additional_info'],
          ]);

          // Insert Order Items
          $cartItemIds = $checkoutDetails['cart_item_ids'] ?? [];
          $cartItems = Cart::with(['product', 'color', 'userCustomization', 'printing'])
            ->whereIn('id', $cartItemIds)
            ->get();

          foreach ($cartItems as $item) {
            OrderItem::create([
              'order_id' => $order->id,
              'product_id' => $item->product_id,
              'color_id' => $item->color_id,
              'user_customization_id' => $item->userCustomization ? $item->userCustomization->id : null,
              'size' => $item->size,
              'quantity' => $item->quantity,
              'product_price' => $item->product->selling_price,
            ]);
          }

          // Clear cart and user customizations
          $userId = auth()->id();
          $cartItems = Cart::where('user_id', $userId)->get();
          foreach ($cartItems as $cart) {
            if ($cart->userCustomization) {
              $cart->userCustomization->update(['cart_id' => null]);
            }
          }
          Cart::where('user_id', $userId)->delete();

          // Create shipment after successful order creation
          try {
            $shipmentPayload = [
              'to_address' => [
                'name' => $shippingDetail->firstname . ' ' . $shippingDetail->lastname,
                'company' => $shippingDetail->companyname,
                'address1' => $shippingDetail->address,
                'address2' => '',
                'city' => $shippingDetail->city,
                'province_code' => $shippingDetail->state,
                'postal_code' => $shippingDetail->postal_code,
                'country_code' => $shippingDetail->country,
                'phone' => $shippingDetail->phone,
                'email' => $shippingDetail->email,
                'is_residential' => true
              ],
              'return_address' => [
                'name' => 'Beast Group Inc.',
                'company' => 'Beast Group Inc.',
                'address1' => 'Unit 5 - 2045 Niagara Falls Blvd',
                'address2' => 'SE #100085',
                'city' => 'Niagara Falls',
                'province_code' => 'NY',
                'postal_code' => '14304',
                'country_code' => 'US',
                'phone' => '5145618019',
                'email' => 'info@capbeast.com',
                'is_residential' => false
              ],
              'is_return' => false,
              'weight_unit' => 'lbs',
              'weight' => 0.6,
              'length' => 9,
              'width' => 12,
              'height' => 1,
              'size_unit' => 'cm',
              'items' => array_map(function ($item) {
                return [
                  'description' => $item->product->name,
                  'sku' => $item->product->sku ?? 'SKU123',
                  'quantity' => $item->quantity,
                  'value' => $item->product_price,
                  'currency' => 'USD',
                  'country_of_origin' => 'CN',
                  'hs_code' => '123456',
                  'manufacturer_name' => 'Beast Group Inc.',
                  'manufacturer_address1' => 'Unit 5 - 2045 Niagara Falls Blvd',
                  'manufacturer_city' => 'Niagara Falls',
                  'manufacturer_province_code' => 'NY',
                  'manufacturer_postal_code' => '14304',
                  'manufacturer_country_code' => 'US'
                ];
              }, $cartItems->all()),
              'package_type' => 'Parcel',
              'signature_confirmation' => true,
              'postage_type' => $shippingService,
              'label_format' => 'pdf',
              'is_fba' => false,
              'is_draft' => false,
              'insured' => true,
              'region' => null,
              'tax_identifier' => [
                'tax_type' => 'IOSS',
                'number' => 'IM1234567890',
                'issuing_authority' => 'GB'
              ]
            ];

            $shipmentResponse = $this->stallionService->createShipment($shipmentPayload, $order->id);

            // Update order with tracking information
            if (isset($shipmentResponse['tracking_code'])) {
              $order->update([
                'shipping_tracking_id' => $shipmentResponse['tracking_code'],
                'shipping_carrier' => $shipmentResponse['rate']['postage_type'] ?? null,
                'shipping_service' => $shipmentResponse['rate']['package_type'] ?? null,
                'shipping_estimated_days' => $shipmentResponse['rate']['delivery_days'] ?? null,
              ]);
            }
          } catch (\Exception $e) {
            Log::error('Shipment creation failed: ' . $e->getMessage());
            // Don't throw the error, just log it and continue
          }

          DB::commit();
          session()->forget('checkout_details');

          // Send Emails
          Mail::to(auth()->user()->email)->send(new OrderPlacedMail($order, false));
          Mail::to('info@capbeast.com')->send(new OrderPlacedMail($order, true));

          return redirect()->route('main.pages.success', ['orderId' => $order->id]);
        } catch (\Exception $e) {
          DB::rollBack();
          Log::error('Order creation failed: ' . $e->getMessage());
          return redirect()->route('checkout')->with('error', 'Order creation failed. Please try again.');
        }
      }

      return redirect()->route('checkout')->with('error', 'Payment failed.');
    } catch (\Exception $e) {
      DB::rollBack();
      Log::error('PayPal Payment Execution Failed: ' . $e->getMessage());
      return redirect()->route('checkout')->with('error', 'Payment failed.');
    }
  }


  public function orderSuccess(Request $request)
  {
    $orderId = $request->query('orderId');
    $order = Order::where('id', $orderId)->first();

    if (!$order) {
      return redirect()->route('home')->with('error', 'Order not found.');
    }

    return view('main.pages.ordersuccess', compact('order'));
  }

  public function orderHistory()
  {
    $userId = auth()->id();



    $orderhistory = Order::where('user_id', $userId)->get();

    return view('main.pages.orderhistory', ['orderhistory' => $orderhistory]);
  }

  public function index()
  {
    $userId = auth()->id();
    $countries = (new CountryList())->getList('en');

    $cart = Cart::with(['product' => function ($query) {
      $query->select([
        'id',
        'title',
        'selling_price',
        'visibility',
        'height',
        'width',
        'length',
        'weight',
        'size_unit',
        'weight_unit'
      ]);
    }, 'color', 'userCustomization'])
      ->where('user_id', $userId)
      ->get();

    // Log product dimensions for debugging
    foreach ($cart as $item) {
      Log::info("Product dimensions for ID {$item->product->id}", [
        'height' => $item->product->height,
        'width' => $item->product->width,
        'length' => $item->product->length,
        'weight' => $item->product->weight,
        'size_unit' => $item->product->size_unit,
        'weight_unit' => $item->product->weight_unit
      ]);
    }

    $TPStaxPercentage = TPSTaxPrice::first();
    $TVQtaxPercentage = TVQTaxPrice::first();

    if ($cart->isEmpty()) {
      return redirect()->route('cart')->with('error', 'Your cart is empty. Please add items before proceeding to checkout.');
    }

    return view('main.pages.checkout', compact('cart', 'TPStaxPercentage', 'TVQtaxPercentage', 'countries'));
  }

  public function getCountries()
  {
    try {
      $countries = Cache::remember('country_list', now()->addDays(1), function () {
        $response = Http::timeout(120) // Increase the timeout value
          ->get('https://restcountries.com/v3.1/all?fields=name,cca2');

        if (!$response->successful()) {
          throw new \Exception('API request failed');
        }

        return collect($response->json())->pluck('name.common', 'cca2')->sort();
      });

      // Check if the countries data was returned correctly
      if (is_array($countries) && isset($countries['error'])) {
        return response()->json(['error' => $countries['error']], 500);
      }

      return response()->json($countries);
    } catch (\Exception $e) {
      Log::error('Error fetching countries: ' . $e->getMessage());
      return response()->json(['error' => 'Server error: ' . $e->getMessage()], 500);
    }
  }
  public function add(Request $request)
  {
    $userId = auth()->id();

    try {
      $request->validate([
        'firstname' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'companyname' => 'nullable|string|max:255',
        'address' => 'required|string|max:255',
        'country' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'additional_info' => 'nullable|string|max:500',
        'paymentMethod' => 'required|string'
      ]);

      $cartItems = Cart::where('user_id', $userId)->with(['product', 'color', 'printing', 'userCustomization'])->get();
      // dd($cartItems);
      if ($cartItems->isEmpty()) {
        return response()->json(['success' => false, 'message' => 'Cart is empty.'], 400);
      }

      // Get final total from request
      $totalPrice = (float) $request->input('finalTotal');
      $discountAmount = (float) $request->input('DiscountAmount') ?? 0;
      $subtotalPrice = (float) $request->input('subtotal');
      $discountId = $request->input('discountId') ? (int) $request->input('discountId') : null;
      $TPStaxAmount = (float) $request->input('TPStaxAmount') ?? 0;
      $TVQtaxAmount = (float) $request->input('TVQtaxAmount') ?? 0;
      $TPStaxPercentage = (float) $request->input('TPStaxPercentage') ?? 0;
      $TVQtaxPercentage = (float) $request->input('TVQtaxPercentage') ?? 0;
      $TPStaxNumber = (float) $request->input('TPStaxNumber') ?? 0;
      $TVQtaxNumber = (float) $request->input('TVQtaxNumber') ?? 0;


      // Save session data
      session([
        'checkout_details' => [
          'firstname' => $request->input('firstname'),
          'lastname' => $request->input('lastname'),
          'companyname' => $request->input('companyname'),
          'address' => $request->input('address'),
          'country' => $request->input('country'),
          'email' => $request->input('email'),
          'phone' => $request->input('phone'),
          'additional_info' => $request->input('additional_info'),
          'cart_items' => $cartItems,
          'cart_item_ids' => $cartItems->pluck('id')->toArray(),
          'total_price' => $totalPrice, // Store correct total price
          'subtotal_price' => $subtotalPrice,
          'discount_amount' => $discountAmount,
          'discount_id' => $discountId,
          'tps_tax_price' => $TPStaxAmount,
          'tps_tax_percentage' => $TPStaxPercentage,
          'tvq_tax_price' => $TVQtaxAmount,
          'tvq_tax_percentage' => $TVQtaxPercentage,
          'tps_tax_no' => $TPStaxNumber,
          'tvq_tax_no' => $TVQtaxNumber,
          'shipping_price' => $request->input('shipping_price'),
          'shipping_method' => $request->input('shipping_method'),
          'shipping_service' => $request->input('shipping_service'),
          'shipping_estimated_days' => $request->input('shipping_estimated_days'),
          'shipping_rate_details' => [
            'postage_type_id' => $request->input('shipping_method'),
            'postage_type' => $request->input('shipping_service'),
            'shipping_price' => $request->input('shipping_price'),
            'delivery_days' => $request->input('shipping_estimated_days'),
            'service_name' => $request->input('shipping_service')
          ]
        ]
      ]);

      // Initiate PayPal Payment
      if ($request->paymentMethod === 'paypal') {
        $paymentResponse = $this->PostPaymentWithPaypal($totalPrice);

        if (!$paymentResponse) {
          return response()->json(['success' => false, 'message' => 'PayPal payment initiation failed.'], 500);
        }

        return response()->json([
          'success' => true,
          'message' => 'Redirecting to PayPal...',
          'paypalUrl' => $paymentResponse
        ]);
      }

      return response()->json(['success' => false, 'message' => 'Payment method not supported.']);
    } catch (\Exception $e) {
      Log::error('Checkout failed: ' . $e->getMessage());
      return response()->json(['success' => false, 'message' => 'Checkout failed. Please try again later.'], 500);
    }
  }


  private function generateOrderId()
  {
    do {
      $orderId = strtoupper(Str::random(6)); // Generate a random string of 6 characters
    } while (Order::where('order_id', $orderId)->exists());

    return $orderId;
  }

  public function applyDiscount(Request $request)
  {
    $request->validate([
      'coupon_code' => 'required|string',
    ]);

    $user = Auth::user();
    $coupon = DiscountCoupon::where('code', $request->coupon_code)->first();

    if (!$coupon) {
      return response()->json(['success' => false, 'message' => 'Invalid coupon code.'], 400);
    }

    // Check coupon visibility
    if ($coupon->visibility != 1) {
      return response()->json(['success' => false, 'message' => 'Coupon is not available.'], 400);
    }

    // Validate expiration date
    $currentDate = now();
    if ($coupon->is_expiry && ($currentDate < $coupon->duration_from || $currentDate > $coupon->duration_to)) {
      return response()->json(['success' => false, 'message' => 'Coupon has expired.'], 400);
    }

    // Validate usage count
    $usageCount = Order::where('discount_id', $coupon->id)->count();
    if ($coupon->is_expiry && $coupon->count !== null && $usageCount >= $coupon->count) {
      return response()->json(['success' => false, 'message' => 'Coupon usage limit reached.'], 400);
    }

    // Log coupon and cart info for debugging
    Log::debug("Coupon ID: {$coupon->id}, is_all: {$coupon->is_all}, discountable_id: {$coupon->discountable_id}");
    $cartItems = Cart::where('user_id', auth()->id())->get();
    Log::debug("Cart items count: " . $cartItems->count());

    $maxDiscountAmount = 0;

    foreach ($cartItems as $item) {
      $currentDiscount = 0;
      Log::debug("Cart item product_id: {$item->product_id}, product_price: {$item->product->selling_price}, quantity: {$item->quantity}, coupon discountable_id: {$coupon->discountable_id}");

      if ($coupon->is_all == 1) {
        // Apply the discount for all products, even if product_id is null
        $currentDiscount = ($item->product->selling_price * $coupon->percentage / 100) * $item->quantity;
      } else {
        // Apply discount only for specific product
        if ($item->product_id == $coupon->discountable_id) {
          $currentDiscount = ($item->product->selling_price * $coupon->percentage / 100) * $item->quantity;
        }
      }

      Log::debug("Current discount for item (product_id {$item->product_id}): {$currentDiscount}");

      if ($currentDiscount > $maxDiscountAmount) {
        $maxDiscountAmount = $currentDiscount;
      }
    }

    if ($maxDiscountAmount > 0) {
      return response()->json([
        'success' => true,
        'discount' => $maxDiscountAmount,
        'discountId' => $coupon->id,
        'message' => 'Discount applied successfully.',
      ]);
    }

    return response()->json(['success' => false, 'message' => 'Coupon not applicable for selected products.'], 400);
  }

  public function store(Request $request)
  {
    try {
      DB::beginTransaction();

      $cartItems = Cart::with(['product', 'product.productVolumeDiscount'])
        ->where('user_id', auth()->id())
        ->get();

      $totalAmount = 0;
      $discountType = 'none';
      $discountPercentage = 0;

      foreach ($cartItems as $item) {
        // Calculate volume discount
        $volumeDiscount = $this->calculateVolumeDiscount($item);

        // Get coupon discount if applicable
        $couponDiscount = $this->getCouponDiscount($item);

        // Determine which discount to apply
        if ($volumeDiscount['percentage'] > 0 || $couponDiscount['percentage'] > 0) {
          if ($volumeDiscount['percentage'] >= $couponDiscount['percentage']) {
            $discountType = 'volume';
            $discountPercentage = $volumeDiscount['percentage'];
            $itemPrice = $volumeDiscount['price'];
          } else {
            $discountType = 'coupon';
            $discountPercentage = $couponDiscount['percentage'];
            $itemPrice = $couponDiscount['price'];
          }
        } else {
          $itemPrice = $item->product->selling_price;
        }

        // Calculate total for this item
        $itemTotal = ($itemPrice * $item->quantity) +
          ($item->userCustomization->price ?? 0) +
          ($item->pompom_price ?? 0) +
          ($item->printing_price ?? 0) +
          ($item->delivery_price ?? 0);

        $totalAmount += $itemTotal;
      }

      $order = Order::create([
        'user_id' => auth()->id(),
        'order_number' => 'ORD-' . strtoupper(uniqid()),
        'total_amount' => $totalAmount,
        'status' => 'pending',
        'payment_status' => 'pending',
        'payment_method' => $request->payment_method,
        'shipping_address' => $request->shipping_address,
        'billing_address' => $request->billing_address,
        'discount_type' => $discountType,
        'discount_percentage' => $discountPercentage,
      ]);

      // Create order items
      foreach ($cartItems as $item) {
        $order->items()->create([
          'product_id' => $item->product_id,
          'quantity' => $item->quantity,
          'price' => $item->product->selling_price,
          'customization_price' => $item->userCustomization->price ?? 0,
          'pompom_price' => $item->pompom_price ?? 0,
          'printing_price' => $item->printing_price ?? 0,
          'delivery_price' => $item->delivery_price ?? 0,
        ]);
      }

      // Clear the cart
      Cart::where('user_id', auth()->id())->delete();

      DB::commit();

      return redirect()->route('order.success', $order->order_number);
    } catch (\Exception $e) {
      DB::rollBack();
      return back()->with('error', 'Something went wrong. Please try again.');
    }
  }

  private function calculateVolumeDiscount($cartItem)
  {
    $volumeDiscounts = $cartItem->product->productVolumeDiscount->sortBy('quantity');
    $quantity = $cartItem->quantity;
    $originalPrice = $cartItem->product->selling_price;
    $discountPercentage = 0;

    foreach ($volumeDiscounts as $discount) {
      if ($quantity >= $discount->quantity) {
        $discountPercentage = $discount->discount;
      }
    }

    $discountedPrice = $originalPrice - ($originalPrice * ($discountPercentage / 100));

    return [
      'percentage' => $discountPercentage,
      'price' => $discountedPrice
    ];
  }

  private function getCouponDiscount($cartItem)
  {
    // Implement your coupon discount logic here
    // This is a placeholder - replace with your actual coupon logic
    return [
      'percentage' => 0,
      'price' => $cartItem->product->selling_price
    ];
  }
}
