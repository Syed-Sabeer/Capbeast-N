<?php

namespace App\Http\Controllers\Main;

use App\Helpers\CartHelper;
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
  private $authorizeNetLoginId;
  private $authorizeNetTransactionKey;
  private $authorizeNetEndpoint;

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

    // Initialize Authorize.net credentials from config
    $this->authorizeNetLoginId = config('authorize.login_id');
    $this->authorizeNetTransactionKey = config('authorize.transaction_key');
    $this->authorizeNetEndpoint = config('authorize.environment') === 'production'
      ? config('authorize.endpoints.production')
      : config('authorize.endpoints.sandbox');
  }

  public function getStates($code)
  {
    try {
      $states = State::where('country_code', $code)->get(['code', 'name']);
      return response()->json($states);
    } catch (\Exception $e) {
      // Update cart error status (if user is logged in)
      if (auth()->check()) {
          CartHelper::updateCartErrorStatus(auth()->id(), 'shipping error: ' . $e->getMessage());
      }
  
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
    }catch (\Exception $ex) {
      // Update cart error status
      if (auth()->check()) {
          CartHelper::updateCartErrorStatus(auth()->id(), 'payment error: ' . $ex->getMessage());
      }
  
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
        // Update cart error status
        if (auth()->check()) {
            CartHelper::updateCartErrorStatus(auth()->id(), 'payment error');
        }
    
        Log::error('PayPal payment failed: Missing payerId or paymentId', [
            'payer_id' => $payerId,
            'payment_id' => $paymentId
        ]);
        Session::put('error', 'Payment failed: Missing required payment information.');
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

      // Get PayPal payment details
      $payment = Payment::get($paymentId, $this->_api_context);

      // Log payment information for debugging
      Log::info('PayPal payment details retrieved', [
        'payment_id' => $paymentId,
        'payment_state' => $payment->getState(),
        'payment_method' => 'paypal'
      ]);

      // Execute payment
      $execution = new PaymentExecution();
      $execution->setPayerId($payerId);
      $result = $payment->execute($execution, $this->_api_context);

      // Get transaction details
      $transactions = $payment->getTransactions();
      $relatedResources = isset($transactions[0]) ? $transactions[0]->getRelatedResources() : [];
      $sale = !empty($relatedResources) ? $relatedResources[0]->getSale() : null;
      $saleId = $sale ? $sale->getId() : $paymentId; // Use payment ID as fallback if sale ID not available

      // Log transaction details
      Log::info('PayPal payment execution result', [
        'state' => $result->getState(),
        'sale_id' => $saleId,
        'amount' => $totalPrice
      ]);

      if ($result->state == 'approved') {
        // Retrieve session data
        $checkoutDetails = session('checkout_details');
        if (!$checkoutDetails) {
          // Update cart error status
          CartHelper::updateCartErrorStatus(auth()->id(), 'payment error');
      
          Log::error('Session expired during PayPal payment process');
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
            'payment_method' => 'paypal',
            'transaction_id' => $saleId,
          ]);

          // Log order creation
          Log::info('Order created from PayPal payment', [
            'order_id' => $order->id,
            'order_string_id' => $order->order_id,
            'transaction_id' => $saleId
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
            'state' => $checkoutDetails['state'],
            'city' => $checkoutDetails['city'],
            'postal_code' => $checkoutDetails['postal_code'],
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
            // Calculate volume discount for this item
            $volumeDiscount = $this->calculateVolumeDiscount($item);
            $discountedPrice = $volumeDiscount['price'];

            OrderItem::create([
              'order_id' => $order->id,
              'product_id' => $item->product_id,
              'color_id' => $item->color_id,
              'user_customization_id' => $item->userCustomization ? $item->userCustomization->id : null,
              'size' => $item->size,
              'quantity' => $item->quantity,
              'product_price' => $discountedPrice, // Use the discounted price instead of original price
              'original_price' => $item->product->selling_price, // Store original price for reference
              'discount_percentage' => $volumeDiscount['percentage'], // Store the discount percentage
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

          // Create shipment with Stallion Express
          try {
            // Refresh the order to make sure relationships are loaded
            $order = $order->fresh('items.product');

            // Prepare shipment payload
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
              'weight' => 0.6, // Default weight, consider retrieving from products
              'length' => 9,
              'width' => 12,
              'height' => 1,
              'size_unit' => 'cm',
              'items' => [],
              'package_type' => 'Parcel',
              'signature_confirmation' => false,
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

            // Add items from order to shipment
            $orderItems = $order->items; // Get items using the correct relationship name
            if (!empty($orderItems)) {
              foreach ($orderItems as $item) {
                $shipmentPayload['items'][] = [
                  'description' => $item->product->name ?? 'Product',
                  'sku' => $item->product->sku ?? 'SKU' . $item->product_id,
                  'quantity' => $item->quantity,
                  'value' => $item->product_price,
                  'currency' => 'CAD',
                  'country_of_origin' => 'CN',
                  'hs_code' => '123456',
                  'manufacturer_name' => 'Beast Group Inc.',
                  'manufacturer_address1' => 'Unit 5 - 2045 Niagara Falls Blvd',
                  'manufacturer_city' => 'Niagara Falls',
                  'manufacturer_province_code' => 'NY',
                  'manufacturer_postal_code' => '14304',
                  'manufacturer_country_code' => 'US'
                ];
              }
            } else {
              // Add a default item if no items are found
              $shipmentPayload['items'][] = [
                'description' => 'Two pair of socks',
                'sku' => 'SKU123',
                'quantity' => 2,
                'value' => 10,
                'currency' => 'CAD',
                'country_of_origin' => 'CN',
                'hs_code' => '123456',
                'manufacturer_name' => 'Beast Group Inc.',
                'manufacturer_address1' => 'Unit 5 - 2045 Niagara Falls Blvd',
                'manufacturer_city' => 'Niagara Falls',
                'manufacturer_province_code' => 'NY',
                'manufacturer_postal_code' => '14304',
                'manufacturer_country_code' => 'US'
              ];
            }

            // If shipping to Canada with a fallback shipping method, create a fake shipment response
            if ($shippingDetail->country === 'CA' && in_array($shippingMethod, ['ca_standard', 'ca_express', 'ca_priority'])) {
              Log::info('Creating fallback shipment for Canadian address', [
                'order_id' => $order->id,
                'shipping_method' => $shippingMethod
              ]);

              // Generate a tracking number
              $trackingNumber = 'CA' . strtoupper(substr(md5(uniqid()), 0, 10));

              // Create fallback shipment response
              $fakeResponse = [
                'success' => true,
                'label' => 'base64_label',
                'tracking_code' => $trackingNumber,
                'message' => 'Shipment successfully completed',
                'shipment' => null,
                'rate' => [
                  'postage_type' => $shippingService,
                  'package_type' => 'Parcel',
                  'trackable' => true,
                  'base_rate' => $shippingPrice,
                  'add_ons' => [null],
                  'rate' => $shippingPrice,
                  'tax' => 0,
                  'total' => $shippingPrice,
                  'currency' => 'CAD',
                  'delivery_days' => $shippingEstimatedDays
                ]
              ];

              // Update shipping rate record with tracking number
              $order->shippingRate()->updateOrCreate(
                ['order_id' => $order->id],
                [
                  'tracking_number' => $trackingNumber,
                  'tracking_url' => 'https://www.canadapost-postescanada.ca/track-reperage/en#/search?searchFor=' . $trackingNumber,
                  'shipping_price' => $shippingPrice,
                  'postage_type' => $shippingService,
                  'package_type' => 'Parcel',
                  'delivery_days' => $shippingEstimatedDays,
                  'service_name' => $shippingService
                ]
              );

              $shipmentResponse = $fakeResponse;
            } else {
              // Create real shipment through Stallion Express
              $shipmentResponse = $this->stallionService->createShipment($shipmentPayload, $order->id);
            }

            // Format and log the response in the required format
            $formattedResponse = $this->stallionService->formatShipmentResponse($shipmentResponse, $order->id);

            // Log the successful shipment creation
            Log::info('Shipment created successfully for order #' . $order->order_id, [
              'response' => $formattedResponse,
              'tracking_code' => $formattedResponse['tracking_code'] ?? null
            ]);
          } catch (\Exception $e) {
            // Update cart error status (if user is logged in)
            if (auth()->check()) {
                // Update the cart error status with a meaningful message
                CartHelper::updateCartErrorStatus(auth()->id(), 'shipping error: Failed to create shipment');
            }
        
            Log::error('Failed to create shipment for order #' . $order->order_id, [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
        
            // Store shipping error in order
            $order->update([
                'shipping_error' => $e->getMessage(),
                'shipping_status' => 'failed'
            ]);
        
            // Note: We don't rollback the transaction here since the order is successfully created
            // Critical shipping errors will be handled manually by admin team
            // This ensures customer still gets order confirmation even if shipping creation fails
        }
        

          // Commit transaction after order is created and shipping is processed (whether successful or not)
          DB::commit();
          session()->forget('checkout_details');

          // Send Emails
          try {
            Mail::to(auth()->user()->email)->send(new OrderPlacedMail($order, false));
            Mail::to('info@capbeast.com')->send(new OrderPlacedMail($order, true));

            Log::info('Order confirmation emails sent', [
              'order_id' => $order->id,
              'customer_email' => auth()->user()->email
            ]);
          } catch (\Exception $e) {
            // Log email sending error but continue to success page
            // Email errors should not prevent order completion
            Log::error('Email sending failed: ' . $e->getMessage(), [
              'order_id' => $order->id,
              'user_email' => auth()->user()->email,
              'trace' => $e->getTraceAsString()
            ]);
          }

          return redirect()->route('main.pages.success', ['orderId' => $order->id]);
        } catch (\Exception $e) {
          // Update cart error status (if user is logged in)
          if (auth()->check()) {
              // Update the cart error status with a meaningful message
              CartHelper::updateCartErrorStatus(auth()->id(), 'payment error: Order creation failed during PayPal payment process');
          }
      
          // If there's any critical error during order creation, roll back completely
          DB::rollBack();
          
          Log::error('Order creation failed during PayPal payment process: ' . $e->getMessage(), [
              'trace' => $e->getTraceAsString(),
              'user_id' => auth()->id(),
              'payment_id' => $paymentId
          ]);
          
          return redirect()->route('checkout')->with('error', 'Order creation failed. Your payment was received but we encountered an error. Please contact support with payment ID: ' . $paymentId);
      }
      } else {
        // Payment was not approved
        if (auth()->check()) {
            // Update cart error status (if user is logged in)
            CartHelper::updateCartErrorStatus(auth()->id(), 'payment error: PayPal payment not approved');
        }
    
        Log::error('PayPal payment not approved', [
            'state' => $result->state,
            'payment_id' => $paymentId
        ]);
        
        return redirect()->route('checkout')->with('error', 'Payment was not approved by PayPal. Please try again or use a different payment method.');
    }
    } catch (\Exception $e) {
      // Update cart error status (if user is logged in)
      if (auth()->check()) {
          // Update the cart error status with a meaningful message
          CartHelper::updateCartErrorStatus(auth()->id(), 'payment error: PayPal Payment Execution Failed');
      }
  
      // Handle any exception that occurred during payment execution
      DB::rollBack();
      Log::error('PayPal Payment Execution Failed: ' . $e->getMessage(), [
          'trace' => $e->getTraceAsString(),
          'payment_id' => $paymentId,
          'payer_id' => $payerId
      ]);
      
      return redirect()->route('checkout')->with('error', 'Payment processing failed. Please try again or contact support.');
  }
  }


  public function orderSuccess(Request $request)
  {
    // Get the order id parameter (could be database id or order_id string)
    $orderId = $request->query('orderId');

    // Check if we can find order by id (primary key)
    $order = Order::where('id', $orderId)->first();

    // If not found, try by order_id (string identifier)
    if (!$order) {
      $order = Order::where('order_id', $orderId)->first();
    }

    // If still not found, redirect with error
    if (!$order) {
      Log::error('Order not found on success page', ['order_id' => $orderId]);
      return redirect()->route('home')->with('error', 'Order not found.');
    }

    // Log successful order access
    Log::info('Order success page accessed', [
      'order_id' => $order->order_id,
      'payment_method' => $order->payment_method,
      'transaction_id' => $order->transaction_id
    ]);

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
    if (auth()->check()) {
      // Update the cart error status with a meaningful message
      CartHelper::updateCartErrorStatus(auth()->id(), 'Checkout Page');
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
      // Update cart error status (if user is logged in)
      if (auth()->check()) {
          CartHelper::updateCartErrorStatus(auth()->id(), 'shipping error: Error fetching countries');
      }
  
      Log::error('Error fetching countries: ' . $e->getMessage());
      return response()->json(['error' => 'Server error: ' . $e->getMessage()], 500);
  }
  }
  public function add(Request $request)
  {
    $userId = auth()->id();

    try {
      // Get request data
      $data = $request->json()->all();

      // Log request data for debugging
      Log::info('Checkout request received', [
        'user_id' => $userId,
        'payment_method' => $request->input('paymentMethod'),
        'total_price' => $request->input('finalTotal'),
        'json_data' => $data ? 'present' : 'missing',
        'content_type' => $request->header('Content-Type')
      ]);

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
          'state' => $request->input('state'),
          'city' => $request->input('city'),
          'postal_code' => $request->input('postal_code'),
          'email' => $request->input('email'),
          'phone' => $request->input('phone'),
          'additional_info' => $request->input('additional_info'),
          'cart_items' => $cartItems,
          'cart_item_ids' => $cartItems->pluck('id')->toArray(),
          'total_price' => $totalPrice,
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

      // Process Authorize.Net Payment
      if ($request->paymentMethod === 'authorize_net') {
        // Get full request data as JSON
        $requestData = $request->json()->all();

        // Debug log card details structure
        Log::info('Authorize.Net payment request data', [
          'request_data_keys' => array_keys($requestData),
          'card_details_set' => isset($requestData['cardDetails']),
        ]);

        // Validate card details from request
        if (
          !isset($requestData['cardDetails']) ||
          !isset($requestData['cardDetails']['cardNumber']) ||
          !isset($requestData['cardDetails']['cardName']) ||
          !isset($requestData['cardDetails']['expiryDate']) ||
          !isset($requestData['cardDetails']['cvv'])
        ) {

          // Log validation error
          Log::error('Authorize.Net card details validation failed', [
            'has_card_details' => isset($requestData['cardDetails']),
            'card_details_keys' => isset($requestData['cardDetails']) ? array_keys($requestData['cardDetails']) : []
          ]);

          return response()->json(['success' => false, 'message' => 'Card details are required.'], 400);
        }

        // Log card details being processed (without sensitive info)
        Log::info('Processing Authorize.Net payment', [
          'card_name' => $requestData['cardDetails']['cardName'],
          'expiry_format' => $requestData['cardDetails']['expiryDate'],
          'card_number_length' => strlen($requestData['cardDetails']['cardNumber']),
        ]);

        // Create customer details array
        $customerDetails = [
          'firstname' => $request->input('firstname'),
          'lastname' => $request->input('lastname'),
          'companyname' => $request->input('companyname'),
          'address' => $request->input('address'),
          'city' => $request->input('city'),
          'state' => $request->input('state'),
          'postal_code' => $request->input('postal_code'),
          'country' => $request->input('country')
        ];

        // Process payment with Authorize.Net
        $paymentResult = $this->processAuthorizeNetPayment(
          $totalPrice,
          $requestData['cardDetails'],
          $customerDetails
        );

        if (!$paymentResult['success']) {
          // Update cart error status (if user is logged in)
          if (auth()->check()) {
              CartHelper::updateCartErrorStatus(auth()->id(), 'payment error: Authorize.Net payment failed');
          }
      
          Log::error('Authorize.Net payment failed: ' . $paymentResult['message']);
          return response()->json(['success' => false, 'message' => $paymentResult['message']], 400);
      }
        // Log successful payment
        Log::info('Authorize.Net payment successful for user: ' . auth()->id(), [
          'transaction_id' => $paymentResult['transaction_id'] ?? null,
          'auth_code' => $paymentResult['auth_code'] ?? null,
          'amount' => $totalPrice,
          'customer' => [
            'name' => $request->firstname . ' ' . $request->lastname,
            'email' => $request->email
          ]
        ]);

        // If payment successful, create order
        $orderId = $this->generateOrderId();

        // Create the order
        try {
          DB::beginTransaction();

          // Create Order with basic shipping price
          $order = Order::create([
            'order_id' => $orderId,
            'user_id' => auth()->id(),
            'discount_id' => $discountId,
            'total_price' => $totalPrice,
            'subtotal_price' => $subtotalPrice,
            'discount_price' => $discountAmount,
            'shipping_price' => $requestData['shipping_price'],
            'shipping_method' => $requestData['shipping_method'],
            'shipping_service' => $requestData['shipping_service'],
            'shipping_estimated_days' => $requestData['shipping_estimated_days'],
            'status' => 0,
            'payment_method' => 'authorize_net',
            'transaction_id' => $paymentResult['transaction_id']
          ]);

          // Create shipping rate record
          if ($requestData['shipping_method']) {
            OrderShippingRate::create([
              'order_id' => $order->id,
              'postage_type_id' => $requestData['shipping_method'],
              'postage_type' => $requestData['shipping_service'],
              'shipping_price' => $requestData['shipping_price'],
              'delivery_days' => $requestData['shipping_estimated_days'],
              'service_name' => $requestData['shipping_service'],
              'rate_details' => session('checkout_details.shipping_rate_details', [])
            ]);
          }

          $country = $requestData['country'] ?? null;
          if (($requestData['TPStaxAmount'] > 0 || $requestData['TVQtaxAmount'] > 0) && $country === 'CA') {
            OrderTaxDetails::create([
              'order_id' => $order->id,
              'tps_tax_no' => $requestData['TPStaxNumber'],
              'tps_tax_percentage' => $requestData['TPStaxPercentage'],
              'tps_tax_price' => $requestData['TPStaxAmount'],
              'tvq_tax_no' => $requestData['TVQtaxNumber'],
              'tvq_tax_percentage' => $requestData['TVQtaxPercentage'],
              'tvq_tax_price' => $requestData['TVQtaxAmount'],
            ]);
          }

          // Create Shipping Details
          $shippingDetail = OrderShippingDetail::create([
            'order_id' => $order->id,
            'firstname' => $requestData['firstname'],
            'lastname' => $requestData['lastname'],
            'companyname' => $requestData['companyname'],
            'country' => $requestData['country'],
            'state' => $requestData['state'],
            'city' => $requestData['city'],
            'postal_code' => $requestData['postal_code'],
            'address' => $requestData['address'],
            'email' => $requestData['email'],
            'phone' => $requestData['phone'],
            'additional_info' => $requestData['additional_info'],
          ]);

          // Insert Order Items
          $cartItems = Cart::with(['product', 'color', 'userCustomization', 'printing'])
            ->where('user_id', auth()->id())
            ->get();

          foreach ($cartItems as $item) {
            // Calculate volume discount for this item
            $volumeDiscount = $this->calculateVolumeDiscount($item);
            $discountedPrice = $volumeDiscount['price'];

            OrderItem::create([
              'order_id' => $order->id,
              'product_id' => $item->product_id,
              'color_id' => $item->color_id,
              'user_customization_id' => $item->userCustomization ? $item->userCustomization->id : null,
              'size' => $item->size,
              'quantity' => $item->quantity,
              'product_price' => $discountedPrice,
              'original_price' => $item->product->selling_price,
              'discount_percentage' => $volumeDiscount['percentage'],
            ]);
          }

          // Clear cart
          Cart::where('user_id', auth()->id())->delete();

          DB::commit();

          // Return success with order ID
          return response()->json([
            'success' => true,
            'message' => 'Payment processed successfully.',
            'orderId' => $order->order_id
          ]);
        } catch (\Exception $e) {
          // Update cart error status (if user is logged in)
          if (auth()->check()) {
              CartHelper::updateCartErrorStatus(auth()->id(), 'payment error: Order creation failed after Authorize.Net payment');
          }
      
          DB::rollBack();
          Log::error('Order creation failed after Authorize.Net payment: ' . $e->getMessage());
      
          return response()->json(['success' => false, 'message' => 'Order creation failed: ' . $e->getMessage()], 500);
      }
      }

      return response()->json(['success' => false, 'message' => 'Payment method not supported.']);
    } catch (\Exception $e) {
      // Update cart error status (if user is logged in)
      if (auth()->check()) {
          CartHelper::updateCartErrorStatus(auth()->id(), 'payment error: Checkout failed');
      }
  
      Log::error('Checkout failed: ' . $e->getMessage());
      return response()->json(['success' => false, 'message' => 'Checkout failed. Please try again later.'], 500);
  }
  }

  private function generateOrderId()
  {
    do {
      $orderId = 'CB' . strtoupper(Str::random(6));
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
    }catch (\Exception $e) {
      // Update cart error status (if user is logged in)
      if (auth()->check()) {
          CartHelper::updateCartErrorStatus(auth()->id(), 'Order Placing Error: ' . $e->getMessage());
      }
  
      DB::rollBack();
      Log::error('Database transaction failed: ' . $e->getMessage());
  
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

  /**
   * Process payment with Authorize.net
   * 
   * @param float $totalPrice Total amount to charge
   * @param array $cardDetails Customer card details
   * @param array $customerDetails Customer billing details
   * @return array Response with success status and messages
   */
  public function processAuthorizeNetPayment($totalPrice, $cardDetails, $customerDetails)
  {
    try {
      // Validate required fields
      if (empty($this->authorizeNetLoginId) || empty($this->authorizeNetTransactionKey)) {
        // Update cart error status
        if (auth()->check()) {
            CartHelper::updateCartErrorStatus(auth()->id(), 'payment configuration error: missing credentials');
        }
    
        Log::error('Authorize.Net credentials are missing');
        return [
            'success' => false,
            'message' => 'Payment configuration error. Please contact the administrator.'
        ];
    }

      // Extract card details
      $cardNumber = $cardDetails['cardNumber'] ?? '';
      $expiryDate = $cardDetails['expiryDate'] ?? '';
      $cvv = $cardDetails['cvv'] ?? '';
      $cardName = $cardDetails['cardName'] ?? '';

      // Format expiry date (MM/YYYY to MMYY)
      $expiryDate = str_replace(['/', ' '], '', $expiryDate);
      if (strlen($expiryDate) === 6) {
        // Format MMYYYY to MMYY
        $expiryDate = substr($expiryDate, 0, 2) . substr($expiryDate, 4, 2);
      }

      // Build the request
      $payload = [
        'createTransactionRequest' => [
          'merchantAuthentication' => [
            'name' => $this->authorizeNetLoginId,
            'transactionKey' => $this->authorizeNetTransactionKey
          ],
          'refId' => 'REF' . time(),
          'transactionRequest' => [
            'transactionType' => 'authCaptureTransaction',
            'amount' => number_format($totalPrice, 2, '.', ''),
            'payment' => [
              'creditCard' => [
                'cardNumber' => $cardNumber,
                'expirationDate' => $expiryDate,
                'cardCode' => $cvv
              ]
            ],
            'billTo' => [
              'firstName' => $customerDetails['firstname'] ?? '',
              'lastName' => $customerDetails['lastname'] ?? '',
              'company' => $customerDetails['companyname'] ?? '',
              'address' => $customerDetails['address'] ?? '',
              'city' => $customerDetails['city'] ?? '',
              'state' => $customerDetails['state'] ?? '',
              'zip' => $customerDetails['postal_code'] ?? '',
              'country' => $customerDetails['country'] ?? ''
            ],
            'customerIP' => request()->ip()
          ]
        ]
      ];

      // Send request to Authorize.Net
      $response = Http::withHeaders([
        'Content-Type' => 'application/json'
      ])->post($this->authorizeNetEndpoint, $payload);

      // Log the raw response for debugging
      Log::info('Authorize.Net API Raw Response: ' . $response->body());

      // Parse the response - handle possible BOM in JSON response
      $responseBody = $response->body();

      // Remove BOM characters if present
      $responseBody = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $responseBody);

      // Try to decode the JSON, with error handling
      try {
        $result = json_decode($responseBody, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
          throw new \Exception('Invalid JSON response: ' . json_last_error_msg());
        }
      } catch (\Exception $e) {
        // Update cart error status with specific payment error
        if (auth()->check()) {
            CartHelper::updateCartErrorStatus(auth()->id(), 'payment error: ' . $e->getMessage());
        }
    
        Log::error('Failed to parse Authorize.Net JSON response: ' . $e->getMessage(), [
            'raw_response' => $responseBody
        ]);
        return [
            'success' => false,
            'message' => 'Unable to process payment response: ' . $e->getMessage()
        ];
    }

      // Log the parsed response
      Log::info('Authorize.Net API Parsed Response:', $result);

      // Check if transaction was successful by looking at responseCode in transactionResponse
      if (
        isset($result['transactionResponse']['responseCode']) &&
        $result['transactionResponse']['responseCode'] == '1'
      ) {
        $transactionId = $result['transactionResponse']['transId'] ?? null;
        $authCode = $result['transactionResponse']['authCode'] ?? null;

        // Get success message if available
        $successMessage = 'Payment processed successfully.';
        if (isset($result['transactionResponse']['messages'][0]['description'])) {
          $successMessage = $result['transactionResponse']['messages'][0]['description'];
        }

        // Log successful transaction
        Log::info('Authorize.Net payment successful', [
          'transaction_id' => $transactionId,
          'auth_code' => $authCode,
          'message' => $successMessage
        ]);

        return [
          'success' => true,
          'message' => $successMessage,
          'transaction_id' => $transactionId,
          'auth_code' => $authCode
        ];
      } else {
        // Check for error messages in different possible locations
        $errorMessage = 'Payment processing failed.';

        // Check main result messages
        if (isset($result['messages']['message'][0]['text'])) {
          $errorMessage .= ' ' . $result['messages']['message'][0]['text'];
        }
        // Check transaction response errors
        else if (isset($result['transactionResponse']['errors'][0]['errorText'])) {
          $errorMessage .= ' ' . $result['transactionResponse']['errors'][0]['errorText'];
        }
        // Check transaction response messages (might contain error details)
        else if (isset($result['transactionResponse']['messages'][0]['description'])) {
          $errorMessage .= ' ' . $result['transactionResponse']['messages'][0]['description'];
        }

        Log::error('Authorize.Net payment failed: ' . $errorMessage, [
          'response' => $result
        ]);

        return [
          'success' => false,
          'message' => $errorMessage
        ];
      }
    } catch (\Exception $e) {
      Log::error('Authorize.Net Error: ' . $e->getMessage(), [
        'trace' => $e->getTraceAsString()
      ]);
      return [
        'success' => false,
        'message' => 'An error occurred during payment processing: ' . $e->getMessage()
      ];
    }
  }
}
