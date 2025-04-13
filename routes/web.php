<?php

use App\Http\Controllers\Admin\apps\CustomizerDesignController;
use App\Http\Controllers\Admin\apps\CustomizerColorController;
use App\Http\Controllers\Main\TOSDController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use App\Http\Controllers\Main\SitemapController;
use App\Http\Controllers\Main\ProductDetailController;
use App\Http\Controllers\Main\ProductController;
use App\Http\Controllers\Main\AboutController;
use App\Http\Controllers\Main\HomeController;


use App\Http\Controllers\Main\ContactController;
use App\Http\Controllers\Main\AuthController;
use App\Http\Controllers\Main\FAQsController;
use App\Http\Controllers\Main\CartController;
use App\Http\Controllers\Main\CustomizerController;
use App\Http\Controllers\Main\OrderController;





use App\Http\Controllers\Admin\apps\EcommercePrintingList;
use App\Http\Controllers\Admin\apps\EcommerceDashboard;
use App\Http\Controllers\Admin\apps\EcommerceProductAdd;
use App\Http\Controllers\Admin\apps\EcommerceProductCategory;
use App\Http\Controllers\Admin\apps\EcommerceProductBrand;
use App\Http\Controllers\Admin\apps\EcommerceProductMlb;
use App\Http\Controllers\Admin\apps\EcommerceProductList;
use App\Http\Controllers\Admin\apps\EcommerceAuthController;
use App\Http\Controllers\Admin\apps\EcommercePrintingAdd;
use App\Http\Controllers\Admin\apps\EcommerceDeliveryAdd;
use App\Http\Controllers\Admin\apps\EcommerceDeliveryList;
use App\Http\Controllers\Admin\apps\EcommerceOrderList;
use App\Http\Controllers\Admin\apps\EcommerceCustomerDetailsOverview;
use App\Http\Controllers\Admin\apps\EcommerceOrderDetails;
use App\Http\Controllers\Admin\apps\EcommerceCustomerAll;

use App\Http\Controllers\Admin\components\TVQTaxPricingController;
use App\Http\Controllers\Admin\components\TPSTaxPricingController;
use App\Http\Controllers\Admin\components\InternalStatusController;
use App\Http\Controllers\Admin\components\DiscountCouponsController;
use App\Http\Controllers\Main\DeliveryInfoController;
use App\Http\Controllers\Main\PrivacyPolicyController;
use App\Http\Controllers\Main\ReturnController;
use App\Http\Controllers\Main\ShippingController;
use App\Http\Controllers\Main\ShipmentController;

Route::get('/', function () {
  return redirect()->route('home');
});

// Route::prefix('main')->middleware(['web', 'CheckCountry'])->group(function () {
Route::middleware(['web'])->group(function () {

  // Routes that require authentication
  Route::middleware('auth')->group(function () {



    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update', [CartController::class, 'updateQuantity'])->name('cart.update');

    Route::get('/customizer/{id}', [CustomizerController::class, 'index'])->name('customizer.index');
    Route::post('/customizer/add', [CustomizerController::class, 'add'])->name('customizer.add');
    Route::post('/customizer/update/{id}', [CustomizerController::class, 'update'])->name('customizer.update');
    Route::post('/customizer/upload-image', [CustomizerController::class, 'uploadImage'])->name('customizer.upload-image');
    Route::get('/delete/customizer-image/{id}', [CustomizerController::class, 'deleteImage'])->name('customizer.delete-image');
    // routes/web.php
    Route::post('/shipping/calculate', [ShippingController::class, 'calculate'])->name('shipping.calculate');
<<<<<<< HEAD

    // Shipment routes
    Route::get('/shipments', [ShipmentController::class, 'getShipments'])->name('shipments.index');
    Route::post('/shipments/create', [ShipmentController::class, 'createShipment'])->name('shipments.create');
=======
>>>>>>> c5cd6c1 (added states for canada)

    Route::get('/countries', [OrderController::class, 'getCountries'])->name('countries.index');
    Route::get('/countries/{code}/states', [OrderController::class, 'getStates'])->name('countries.states');

    Route::post('/shipping/rate', [ShippingController::class, 'getShippingRate'])->name('shipping.rate');
    Route::get('/shipping/countries', [ShippingController::class, 'getCountries'])->name('shipping.countries');
    Route::post('/shipping/address/validate', [ShippingController::class, 'validateAddress'])->name('shipping.validate.address');
    Route::post('/shipping/discount', [ShippingController::class, 'applyShippingDiscount'])->name('shipping.discount');



    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::delete('/cart/remove/{itemId}', [CartController::class, 'remove'])->name('cart.remove');

    Route::delete('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
    Route::get('/checkout', [OrderController::class, 'index'])->name('checkout');
    Route::post('/checkout/add', [OrderController::class, 'add'])->name('checkout.add');
    Route::get('/order-success', [OrderController::class, 'orderSuccess'])->name('main.pages.success');
    Route::get('/order-history', [OrderController::class, 'orderHistory'])->name('main.pages.orderhistory');
    Route::get('/payment-status', [OrderController::class, 'GetPaymentStatus'])->name('status');
    Route::post('/apply-discount', [OrderController::class, 'applyDiscount'])->name('apply.discount');

    Route::get('/view-color-book', [ProductDetailController::class, 'showColorBook']);
  });


  // for country selection through pop up


  Route::get('/select-country', function () {
    return view('main.global.country-selection');
  })->name('select.country');

  // POST route to store country selection
  Route::post('/set-country', function (Request $request) {
    Session::put('country', $request->country);

    // Debug: Check if session is actually set
    if (!Session::has('country')) {
      return back()->with('error', 'Session not set!');
    }

    return redirect()->route('home'); // Redirect to home after setting country
  })->name('set.country');



  Route::get('/sitemap.xml', [SitemapController::class, 'index']);


  // Route::get('/products', [ProductController::class, 'index'])->name('products');
  Route::get('/products/{filterType?}/{slug?}', [ProductController::class, 'index'])->name('products');

  Route::get('/product/{slug}', [ProductDetailController::class, 'index'])->name('product.detail');

  Route::post('/temp-cart-images/upload', [AuthController::class, 'uploadTempCartImage'])->name('temp_cart_images.upload');




  Route::get('/about', [AboutController::class, 'index'])->name('about');
  Route::get('/privacy-policy', [PrivacyPolicyController::class, 'index'])->name('privacypolicy');
  Route::get('/return', [ReturnController::class, 'index'])->name('return');
  Route::get('/terms-of-Sale-and-Delivery', [TOSDController::class, 'index'])->name(name: 'tosd');
  Route::get('/delivery-info', [DeliveryInfoController::class, 'index'])->name('deliveryinfo');
  Route::get('/privacy-policy', [PrivacyPolicyController::class, 'index'])->name('privacypolicy');
  Route::get('/return', [ReturnController::class, 'index'])->name('return');
  Route::get('/terms-of-Sale-and-Delivery', [TOSDController::class, 'index'])->name(name: 'tosd');
  Route::get('/delivery-info', [DeliveryInfoController::class, 'index'])->name('deliveryinfo');
  Route::get('/home', [HomeController::class, 'index'])->name('home');
  Route::get('/contact', [ContactController::class, 'index'])->name('contact');
  Route::get('/faqs', [FAQsController::class, 'index'])->name('faqs');

  // Routes for registration that do not require authentication
  // Registration Routes
  Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('user.register');
  Route::post('/register', [AuthController::class, 'register'])->name('user.register.post');
  Route::get('/login', [AuthController::class, 'showLoginForm'])->name('user.login');
  Route::post('/login', [AuthController::class, 'login'])->name('user.login.post');
  Route::post('/logout', [AuthController::class, 'logout'])->name('user.logout');
});



// function Route::prefixed($prefix, $name) {
//   return "{$prefix}.{$name}";
// }

// Define roles
$roles = [

  'superadmin' => 'superadmin',
  'sale' => 'sale',
  'marketing' => 'marketing',

];


Route::prefix('backend')->group(function () {
  Route::get('login', [EcommerceAuthController::class, 'showLoginForm'])->name('admin.login');
  Route::post('login', [EcommerceAuthController::class, 'login'])->name('admin.login.post');
});

foreach ($roles as $role => $prefix) {
  Route::middleware(["auth:{$role}", "role:{$role}"])->group(function () use ($prefix) {

    Route::prefix("backend/{$prefix}")->group(function () use ($prefix) {  // Apply backend prefix

      if ($prefix == 'superadmin') {


        Route::get('/category', [EcommerceProductCategory::class, 'index'])->name(Route::prefixed($prefix, 'app-ecommerce-product-category'));
        Route::get('/category/add', [EcommerceProductCategory::class, 'create'])->name(Route::prefixed($prefix, 'category.add'));
        Route::post('/category/store', [EcommerceProductCategory::class, 'store'])->name(Route::prefixed($prefix, 'category.store'));
        Route::get('/category/edit/{category}', [EcommerceProductCategory::class, 'edit'])->name(Route::prefixed($prefix, 'category.edit'));
        Route::post('/category/update/{category}', [EcommerceProductCategory::class, 'update'])->name(Route::prefixed($prefix, 'category.update'));
        Route::get('/category/delete/{category}', [EcommerceProductCategory::class, 'destroy'])->name(Route::prefixed($prefix, 'category.delete'));
        Route::post('/category/update-visibility/{id}', [EcommerceProductCategory::class, 'updateCategoryVisibility'])
          ->name(Route::prefixed($prefix, 'category.update.visibility'));


        Route::get('/brand', [EcommerceProductBrand::class, 'index'])->name(Route::prefixed($prefix, 'app-ecommerce-product-brand'));
        Route::get('/brand/add', [EcommerceProductBrand::class, 'create'])->name(Route::prefixed($prefix, 'brand.add'));
        Route::post('/brand/store', [EcommerceProductBrand::class, 'store'])->name(Route::prefixed($prefix, 'brand.store'));
        Route::get('/brand/edit/{brand}', [EcommerceProductBrand::class, 'edit'])->name(Route::prefixed($prefix, 'brand.edit'));
        Route::post('/brand/update/{brand}', [EcommerceProductBrand::class, 'update'])->name(Route::prefixed($prefix, 'brand.update'));
        Route::get('/brand/delete/{brand}', [EcommerceProductBrand::class, 'destroy'])->name(Route::prefixed($prefix, 'brand.delete'));
        Route::post('/brand/update-visibility/{id}', [EcommerceProductBrand::class, 'updateBrandVisibility'])
          ->name(Route::prefixed($prefix, 'brand.update.visibility'));


        Route::get('/mlb', [EcommerceProductMlb::class, 'index'])->name(Route::prefixed($prefix, 'app-ecommerce-product-mlb'));
        Route::get('/mlb/add', [EcommerceProductMlb::class, 'create'])->name(Route::prefixed($prefix, 'mlb.add'));
        Route::post('/mlb/store', [EcommerceProductMlb::class, 'store'])->name(Route::prefixed($prefix, 'mlb.store'));
        Route::get('/mlb/edit/{mlb}', [EcommerceProductMlb::class, 'edit'])->name(Route::prefixed($prefix, 'mlb.edit'));
        Route::post('/mlb/update/{mlb}', [EcommerceProductMlb::class, 'update'])->name(Route::prefixed($prefix, 'mlb.update'));
        Route::get('/mlb/delete/{mlb}', [EcommerceProductMlb::class, 'destroy'])->name(Route::prefixed($prefix, 'mlb.delete'));
        Route::post('/mlb/update-visibility/{id}', [EcommerceProductMlb::class, 'updateMlbVisibility'])
          ->name(Route::prefixed($prefix, 'mlb.update.visibility'));



        Route::get('/dashboard', [EcommerceDashboard::class, 'index'])->name(Route::prefixed($prefix, 'app-ecommerce-dashboard'));


        Route::prefix('/component')->group(function () use ($prefix) {



          Route::get('/InternalStatus/list', [InternalStatusController::class, 'index'])->name(Route::prefixed($prefix, 'content-internal-status-list'));
          Route::get('/InternalStatus/add', [InternalStatusController::class, 'create'])->name(Route::prefixed($prefix, 'InternalStatus.index'));
          Route::post('/InternalStatus/store', [InternalStatusController::class, 'store'])->name(Route::prefixed($prefix, 'order-internal-status.store'));
          Route::get('/InternalStatus/edit/{id}', [InternalStatusController::class, 'edit'])->name(Route::prefixed($prefix, 'order-internal-status.edit'));
          Route::put('/InternalStatus/update/{id}', [InternalStatusController::class, 'update'])->name(Route::prefixed($prefix, 'order-internal-status.update'));
          Route::delete('/InternalStatus/delete/{id}', [InternalStatusController::class, 'destroy'])->name(Route::prefixed($prefix, 'order-internal-status.destroy'));
          Route::patch('/InternalStatus/restore/{id}', [InternalStatusController::class, 'restore'])->name(Route::prefixed($prefix, 'order-internal-status.index'));

          Route::get('/discountcoupon/add', [DiscountCouponsController::class, 'index'])->name(Route::prefixed($prefix, 'content-discount-coupon-add'));
          Route::post('/discountcoupon/add', [DiscountCouponsController::class, 'store'])->name(Route::prefixed($prefix, 'content-discount-coupon-store'));
          Route::get('/discountcoupon/list', [DiscountCouponsController::class, 'list'])->name(Route::prefixed($prefix, 'content-discount-coupon-list'));
          Route::get('/discountcoupon/edit/{id}', [DiscountCouponsController::class, 'edit'])->name(Route::prefixed($prefix, 'content-discount-coupon-edit'));
          Route::post('/discountcoupon/update/{id}', [DiscountCouponsController::class, 'update'])->name(Route::prefixed($prefix, 'content-discount-coupon-update'));
          Route::delete('/discountcoupon/delete/{id}', [DiscountCouponsController::class, 'destroy'])->name(Route::prefixed($prefix, 'content-discount-coupon-delete'));
          Route::patch('/update-visibility/{id}', [DiscountCouponsController::class, 'updateVisibility'])->name(Route::prefixed($prefix, 'update.visibilitycoupon'));
          Route::get('/get-items', [DiscountCouponsController::class, 'getItems'])->name(Route::prefixed($prefix, 'get-items'));

          Route::get('/TVQ_TaxPrice/list', [TVQTaxPricingController::class, 'index'])->name(Route::prefixed($prefix, 'TVQtax_price.index'));
          Route::get('/TVQ_TaxPrice/create', [TVQTaxPricingController::class, 'create'])->name(Route::prefixed($prefix, 'TVQtax_price.create'));
          Route::post('/TVQ_TaxPrice/store', [TVQTaxPricingController::class, 'store'])->name(Route::prefixed($prefix, 'TVQtax_price.store'));
          Route::get('/TVQ_TaxPrice/{id}/edit', [TVQTaxPricingController::class, 'edit'])->name(Route::prefixed($prefix, 'TVQtax_price.edit'));
          Route::put('/TVQ_TaxPrice/{id}/update', [TVQTaxPricingController::class, 'update'])->name(Route::prefixed($prefix, 'TVQtax_price.update'));
          Route::delete('/TVQ_TaxPrice/{id}/delete', [TVQTaxPricingController::class, 'destroy'])->name(Route::prefixed($prefix, 'TVQtax_price.destroy'));

          Route::get('/TPS_TaxPrice/list', [TPSTaxPricingController::class, 'index'])->name(Route::prefixed($prefix, 'TPStax_price.index'));
          Route::get('/TPS_TaxPrice/create', [TPSTaxPricingController::class, 'create'])->name(Route::prefixed($prefix, 'TPStax_price.create'));
          Route::post('/TPS_TaxPrice/store', [TPSTaxPricingController::class, 'store'])->name(Route::prefixed($prefix, 'TPStax_price.store'));
          Route::get('/TPS_TaxPrice/{id}/edit', [TPSTaxPricingController::class, 'edit'])->name(Route::prefixed($prefix, 'TPStax_price.edit'));
          Route::put('/TPS_TaxPrice/{id}/update', [TPSTaxPricingController::class, 'update'])->name(Route::prefixed($prefix, 'TPStax_price.update'));
          Route::delete('/TPS_TaxPrice/{id}/delete', [TPSTaxPricingController::class, 'destroy'])->name(Route::prefixed($prefix, 'TPStax_price.destroy'));
        });

        Route::prefix('/customizer')->group(function () use ($prefix) {
          //designs
          Route::get('/designs/list', [CustomizerDesignController::class, 'index'])->name(Route::prefixed($prefix, 'customizer-designs.list'));
          Route::get('/designs/add', [CustomizerDesignController::class, 'create'])->name(Route::prefixed($prefix, 'customizer-designs.create'));
          Route::post('/designs/store', [CustomizerDesignController::class, 'store'])->name(Route::prefixed($prefix, 'customizer-designs.store'));
          Route::get('/designs/edit/{id}', [CustomizerDesignController::class, 'edit'])->name(Route::prefixed($prefix, 'customizer-designs.edit'));
          Route::put('/designs/update/{id}', [CustomizerDesignController::class, 'update'])->name(Route::prefixed($prefix, 'customizer-designs.update'));
          Route::get('/designs/delete/{id}', [CustomizerDesignController::class, 'destroy'])->name(Route::prefixed($prefix, 'customizer-designs.destroy'));
          //colors
          Route::get('/colors/list', [CustomizerColorController::class, 'index'])->name(Route::prefixed($prefix, 'customizer-colors.list'));
          Route::get('/colors/add', [CustomizerColorController::class, 'create'])->name(Route::prefixed($prefix, 'customizer-colors.create'));
          Route::post('/colors/store', [CustomizerColorController::class, 'store'])->name(Route::prefixed($prefix, 'customizer-colors.store'));
          Route::get('/colors/edit/{id}', [CustomizerColorController::class, 'edit'])->name(Route::prefixed($prefix, 'customizer-colors.edit'));
          Route::put('/colors/update/{id}', [CustomizerColorController::class, 'update'])->name(Route::prefixed($prefix, 'customizer-colors.update'));
          Route::get('/colors/delete/{id}', [CustomizerColorController::class, 'destroy'])->name(Route::prefixed($prefix, 'customizer-colors.destroy'));
        });


        Route::get('/product/add', [EcommerceProductAdd::class, 'index'])->name(Route::prefixed($prefix, 'app-ecommerce-product-add'));
        Route::post('/product/add', [EcommerceProductAdd::class, 'store'])->name(Route::prefixed($prefix, 'app-ecommerce-product-store'));
        Route::get('/product/list', [EcommerceProductList::class, 'index'])->name(Route::prefixed($prefix, 'app-ecommerce-product-list'));
        Route::get('/product/edit/{id}', [EcommerceProductList::class, 'edit'])->name(Route::prefixed($prefix, 'app-ecommerce-product-edit'));
        Route::get('/product/delete/{id}', [EcommerceProductList::class, 'destroy'])->name(Route::prefixed($prefix, 'app-ecommerce-product-delete'));
        Route::post('/product/edit/{id}', [EcommerceProductList::class, 'update'])->name(Route::prefixed($prefix, 'app-ecommerce-product-update'));
        Route::post('/product/edit/{id}', [EcommerceProductList::class, 'update'])->name(Route::prefixed($prefix, 'app-ecommerce-product-update'));
        Route::post('/update-visibility/{id}', [EcommerceProductList::class, 'updateVisibility'])->name(Route::prefixed($prefix, 'update.visibility'));

        Route::get('/delete/product-color/{id}', [EcommerceProductList::class, 'deleteProductColor'])->name(Route::prefixed($prefix, 'delete.product-color'));



        Route::get('/order/list', [EcommerceOrderList::class, 'index'])->name(Route::prefixed($prefix, 'app-ecommerce-order-list'));
        Route::get('/order/detail/{orderId}', [EcommerceOrderDetails::class, 'index'])->name(Route::prefixed($prefix, 'app-ecommerce-order-detail'));
        Route::post('/order/upload-file/{id}', [EcommerceOrderDetails::class, 'orderfileupload'])->name(Route::prefixed($prefix, 'order.file.upload'));
        Route::post('/order/{orderId}/update-status', [EcommerceOrderDetails::class, 'updateOrderStatus'])->name(Route::prefixed($prefix, 'order-status.update'));

        Route::post('/admin/orders/{id}/status', [EcommerceOrderList::class, 'updateStatus'])->name(Route::prefixed($prefix, 'admin.orders.updateStatus'));

        Route::get('/customer/all', [EcommerceCustomerAll::class, 'index'])->name(Route::prefixed($prefix, 'app-ecommerce-customer-all'));
        Route::get('/customer/{id}', [EcommerceCustomerDetailsOverview::class, 'index'])->name(Route::prefixed($prefix, 'app-ecommerce-customer-detail'));
        Route::post('/update-status/{id}', [EcommerceCustomerAll::class, 'updateStatus'])->name(Route::prefixed($prefix, 'update.status'));
        Route::get('/customers/edit/{id}', [EcommerceCustomerAll::class, 'edit'])->name(Route::prefixed($prefix, 'admin.customers.edit'));
        Route::post('/customers/update/{id}', [EcommerceCustomerAll::class, 'update'])->name(Route::prefixed($prefix, 'admin.customers.update'));
        Route::delete('/customers/delete/{id}', [EcommerceCustomerAll::class, 'destroy'])->name(Route::prefixed($prefix, 'admin.customers.destroy'));

        Route::post('/logout', [EcommerceAuthController::class, 'logout'])->name(Route::prefixed($prefix, 'admin.logout'));
      }
    });
  });
}
