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
use App\Models\OrderTaxDetails;
use App\Models\TVQTaxPrice;
use App\Models\TPSTaxPrice;
use App\Models\DiscountCoupon;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderShippingDetail;
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

class OrderController extends Controller
{
  private $_api_context;

  public function __construct()
  {
    $paypal = config('paypal');
    $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal['client_id'], $paypal['secret']));
    $this->_api_context->setConfig($paypal['settings']);
  }

  public function PostPaymentWithPaypal($totalPrice)
  {
    $payer = new Payer();
    $payer->setPaymentMethod('paypal');

    $amount = new Amount();
    $amount->setTotal((float)$totalPrice);


    $currency = 'USD';

    $amount->setCurrency($currency);

    // $amount->setCurrency('CAD');

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

    try {
      $payment->create($this->_api_context);
      Log::info("PayPal Payment Created: " . json_encode($payment));
    } catch (\PayPal\Exception\PPConnectionException $ex) {
      Log::error("PayPal Error: " . $ex->getMessage());
      Session::put('error', 'Connection timeout');
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
      $discount = session('checkout_details')['discount'] ?? null;

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

        // Create Order
        $order = Order::create([
          'order_id' => $this->generateOrderId(),
          'user_id' => auth()->id(),
          'discount_id' => $discountId,
          'total_price' => $totalPrice,
          'subtotal_price' => $subtotalPrice,
          'discount_price' => $discountAmount,
          'status' => 0,
        ]);

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
        OrderShippingDetail::create([
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
        Log::info('Order Items: ' . json_encode($checkoutDetails['cart_items']));
        // foreach ($checkoutDetails['cart_items'] as $item) {
        //   $orderItem = OrderItem::create([
        //     'order_id' => $order->id,
        //     'product_id' => $item->product_id,
        //     'user_customization_id ' => $item->user_customization->id,
        //     'color_id' => $item->color_id,
        //     'size' => $item->size,
        //     'quantity' => $item->quantity,
        //     'product_price' => $item->product->selling_price,
        //   ]);
        // }

        // Retrieve cart items from database with necessary relationships
        $cartItemIds = $checkoutDetails['cart_item_ids'] ?? [];
        $cartItems = Cart::with(['product', 'color', 'userCustomization', 'printing'])
          ->whereIn('id', $cartItemIds)
          ->get();
        Log::info('Order Items 2: ' . $cartItems);
        foreach ($cartItems as $item) {
          OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $item->product_id,
            'color_id' => $item->color_id,
            'user_customization_id' => $item->userCustomization ? $item->userCustomization->id : null, // Fixed typo and added null check
            'size' => $item->size,
            'quantity' => $item->quantity,
            'product_price' => $item->product->selling_price,
          ]);
        }

        // Clear Cart
        // Cart::where('user_id', auth()->id())->delete();
        // Remove cart_id from UserCustomization records
        $userId = auth()->id();
        $cartItems = Cart::where('user_id', $userId)->get();

        foreach ($cartItems as $cart) {
          if ($cart->userCustomization) {
            $cart->userCustomization->update(['cart_id' => null]);
          }
        }

        // Now delete the cart entries
        Cart::where('user_id', $userId)->delete();

        DB::commit();
        session()->forget('checkout_details');

        // Send Emails
        Mail::to(auth()->user()->email)->send(new OrderPlacedMail($order, false));
        Mail::to('info@capbeast.com')->send(new OrderPlacedMail($order, true));


        return redirect()->route('main.pages.success', ['orderId' => $order->id]);
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

    $cart = Cart::with(['product', 'color', 'userCustomization'])
      ->where('user_id', $userId)
      ->get();

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
}
