@extends('layouts/layoutMaster')

@section('title', 'Help Center article - Front Pages')

@section('content')
<section class="section-py first-section-pt">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mb-2">
            <li class="breadcrumb-item">
              <a href="javascript:void(0);">Help centre</a>
            </li>
            <li class="breadcrumb-item">
              <a href="javascript:void(0);">Buying and support</a>
            </li>
            <li class="breadcrumb-item active">Buying</li>
          </ol>
        </nav>
        <h4 class="mb-2 pb-1">How to add product in cart?</h4>
        <p class="pb-lg-2">1 month ago - Updated</p>
        <hr class="my-lg-4">
        <p class="pt-lg-2">If you’re after only one item, simply choose the ‘Buy Now’ option on the item page. This will take you directly to Checkout.</p>
        <p class="mb-0">If you want several items, use the ‘Add to Cart’ button and then choose ‘Keep Browsing’ to continue shopping or ‘Checkout’ to finalise your purchase.</p>
        <div class="my-4 py-2">
          <img src="{{asset('assets/img/front-pages/misc/product-image.png')}}" alt="product" class="img-fluid w-100">
        </div>
        <p class="mb-0">You can go back to your cart at any time by clicking on the shopping cart icon at the top right side of the page.</p>
        <div class="mt-4 pt-2">
          <img src="{{asset('assets/img/front-pages/misc/checkout-image.png')}}" alt="product" class="img-fluid w-100">
        </div>
      </div>
      <div class="col-lg-4">
        <div class="input-group input-group-merge mb-4 mt-4 mt-lg-0">
          <span class="input-group-text" id="article-search"><i class="ti ti-search"></i></span>
          <input type="text" class="form-control" placeholder="Search..." aria-label="Search..." aria-describedby="article-search" />
        </div>
        <div class="bg-lighter py-2 px-3 rounded">
          <h5 class="mb-0">Articles in this section</h5>
        </div>
        <ul class="list-unstyled my-4">
          <li class="mb-3">
            <a href="javascript:void(0)" class="text-heading d-flex justify-content-between">
              <span class="text-truncate me-1">
                Template Kits
              </span>
              <i class="ti ti-chevron-right scaleX-n1-rtl text-muted me-1"></i>
            </a>
          </li>
          <li class="mb-3">
            <a href="javascript:void(0)" class="text-heading d-flex justify-content-between">
              <span class="text-truncate me-1">
                Envato Elements Template Kits - Importing Issues
              </span>
              <i class="ti ti-chevron-right scaleX-n1-rtl text-muted me-1"></i>
            </a>
          </li>
          <li class="mb-3">
            <a href="javascript:void(0)" class="text-heading d-flex justify-content-between">
              <span class="text-truncate me-1">
                Envato Elements Template Kits - Troubleshooting
              </span>
              <i class="ti ti-chevron-right scaleX-n1-rtl text-muted me-1"></i>
            </a>
          </li>
          <li class="mb-3">
            <a href="javascript:void(0)" class="text-heading d-flex justify-content-between">
              <span class="text-truncate me-1">
                How to use the template in WordPress
              </span>
              <i class="ti ti-chevron-right scaleX-n1-rtl text-muted me-1"></i>
            </a>
          </li>
          <li class="mb-3">
            <a href="javascript:void(0)" class="text-heading d-flex justify-content-between">
              <span class="text-truncate me-1">
                How to use the Template Kit Import plugin
              </span>
              <i class="ti ti-chevron-right scaleX-n1-rtl text-muted me-1"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>
@endsection
