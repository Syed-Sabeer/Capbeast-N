@extends('main.layouts.master')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{ asset('assetsMainMain/js/frontend/owl.carousel.min.js') }}"></script>
<link href="{{ asset('assetsMainMain/css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css" />





@section('main-container')

<section class="position-relative">
  <div id="ecommerceHero" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
          <div class="carousel-item active">
              <div class="ecommerce-home bg-danger-subtle" style="
              background-image: url('{{ asset('assetsMain/images/banner/banner1.jpeg') }}');
          "
          >
                  {{-- <div class="container">
                      <div class="row justify-content-end">
                          <div class="col-lg-7">
                              <div class="text-sm-end">
                                  <p class="fs-15 fw-semibold text-uppercase"><i class="ri-flashlight-fill text-primary align-bottom me-1"></i> In this season, find the best</p>
                                  <h1 class="display-4 fw-bold lh-base text-capitalize mb-3">Exclusive collection for everyone</h1>
                                  <p class="fs-20 mb-4">Biggest offers on this season</p>
                                  <button class="btn btn-danger btn-hover"><i class="ph-shopping-cart align-middle me-1"></i> Shop Now</button>
                              </div>
                          </div>
                      </div>
                  </div> --}}
              </div>
          </div>
          <div class="carousel-item">
              <div class="ecommerce-home bg-primary-subtle" style="background-image: url('../assets/images/ecommerce/home/img-2.png');">
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-6">
                              <div>
                                  <p class="fs-15 fw-semibold text-uppercase"><i class="ri-flashlight-fill text-info align-bottom me-1"></i> Save up to <span class="text-danger">50%</span> off</p>
                                  <h1 class="display-4 fw-semibold text-capitalize lh-base">Pro Smart watches for smart People</h1>
                                  <p class="fs-18 mb-4"><b>40% off</b> up to on all selected products</p>
                                  <button class="btn btn-primary btn-hover"><i class="ph-shopping-cart align-middle me-1"></i> Shop Now</button>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="carousel-item">
              <div class="ecommerce-home" style="background-image: url('../assets/images/ecommerce/home/img-6.jpg');background-size: cover;">
                  <div class="container">
                      <div class="row justify-content-end">
                          <div class="col-lg-6">
                              <div class="text-end">
                                  <p class="fs-15 fw-semibold text-uppercase text-dark">Jewelry Design with Love</p>
                                  <h1 class="display-4 fw-semibold text-capitalize lh-base text-dark">Discover world best Jewelry</h1>
                                  <p class="text-dark lead fs-19 mb-4">Jewelry are like a tribute to being a woman</p>
                                  <div class="hstack gap-2 justify-content-end">
                                      <button class="btn btn-success btn-hover">Shop Now <i class="ph-arrow-up-right align-middle ms-1"></i></button>
                                      <button class="btn btn-ghost-secondary btn-hover">Watch Now <i class="ph-play-circle align-middle ms-1 fs-16"></i></button>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#ecommerceHero" data-bs-slide="prev">
          <i class="ph-caret-left"></i>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#ecommerceHero" data-bs-slide="next">
          <i class="ph-caret-right"></i>
      </button>
  </div>
</section>



<section class="section">
  <div class="container">
    <div class="row gy-4 gy-lg-0">
      <div class="col-lg-3 col-sm-6">
        <div class="d-flex align-items-center gap-3">
          <div class="flex-shrink-0">
            <img
              src="{{asset('assetsMain/images/ecommerce/fast-delivery.png')}}"
              alt=""
              class="avatar-sm"
            />
          </div>
          <div class="flex-grow-1">
            <h5 class="fs-15">Fast &amp; Secure Delivery</h5>
            <p class="text-muted mb-0">Tell about your service.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="d-flex align-items-center gap-3">
          <div class="flex-shrink-0">
            <img
              src="{{asset('assetsMain/images/ecommerce/returns.png')}}"
              alt=""
              class="avatar-sm"
            />
          </div>
          <div class="flex-grow-1">
            <h5 class="fs-15">2 Days Return Policy</h5>
            <p class="text-muted mb-0">No question ask.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="d-flex align-items-center gap-3">
          <div class="flex-shrink-0">
            <img
              src="{{asset('assetsMain/images/ecommerce/guarantee-certificate.png')}}"
              alt=""
              class="avatar-sm"
            />
          </div>
          <div class="flex-grow-1">
            <h5 class="fs-15">Money Back Guarantee</h5>
            <p class="text-muted mb-0">Within 5 business days</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="d-flex align-items-center gap-3">
          <div class="flex-shrink-0">
            <img
              src="{{asset('assetsMain/images/ecommerce/24-hours-support.png')}}"
              alt=""
              class="avatar-sm"
            />
          </div>
          <div class="flex-grow-1">
            <h5 class="fs-15">24 X 7 Service</h5>
            <p class="text-muted mb-0">Online service for customer</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section pt-0">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <a
          href="#!"
          class="product-banner-1 mt-4 mt-lg-0 rounded overflow-hidden position-relative d-block"
        >
          <img
            src="{{asset('assetsMain/images/ecommerce/features/img-3.jpg')}}"
            class="img-fluid rounded"
            alt=""
          />
          <div class="bg-overlay blue"></div>
          <div class="product-content p-4">
            <p class="text-uppercase text-white mb-2">Up to 50-70%</p>
            <h1 class="text-white lh-base fw-medium ff-secondary">
              Women's Sportwere Sales
            </h1>
            <div class="product-btn mt-4 text-white">
              Shop Now <i class="bi bi-arrow-right ms-2"></i>
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-6">
        <a
          href="#!"
          class="product-banner-1 mt-4 mt-lg-0 rounded overflow-hidden position-relative d-block"
        >
          <img
            src="{{asset('assetsMain/images/ecommerce/features/img-1.jpg')}}"
            class="img-fluid rounded"
            alt=""
          />
          <div class="product-content p-4">
            <p class="text-uppercase fw-medium text-secondary mb-2">
              Summer Sales
            </p>
            <h1 class="lh-base ff-secondary text-dark">
              Trendy Fashion Clothes
            </h1>
            <div class="product-btn mt-4">
              Shop Now <i class="bi bi-arrow-right ms-2"></i>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- START PRODUCT -->
<section class="section pt-0">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-7">
        <div class="text-center">
          <h3 class="mb-3">Top Picks Products Of The Week</h3>
          <p class="text-muted fs-15 mb-0">
            This ranges from women and men's outfits to children's clothing,
            shoes, accessories, and more. People love their clothes, and
            fashion isn't going anywhere!
          </p>
        </div>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col-lg-12">
        <div class="text-center">
          <ul
            class="list-inline categories-filter animation-nav"
            id="filter"
          >
            <li class="list-inline-item">
              <a class="categories active" data-filter="*">All Arrival</a>
            </li>
            <li class="list-inline-item">
              <a class="categories" data-filter=".seller">Best Seller</a>
            </li>
            <li class="list-inline-item">
              <a class="categories" data-filter=".hot">Hot Collection</a>
            </li>
            <li class="list-inline-item">
              <a class="categories" data-filter=".trendy">Trendy</a>
            </li>
            <li class="list-inline-item">
              <a class="categories" data-filter=".arrival">New Arrival</a>
            </li>
          </ul>
        </div>

        <div class="row gallery-wrapper mt-4 pt-2">
          <div
            class="element-item col-xxl-3 col-xl-4 col-sm-6 seller hot arrival"
            data-category="hot arrival"
          >
            <div class="card overflow-hidden">
              <div class="bg-warning-subtle rounded-top py-4">
                <div class="gallery-product">
                  <img
                    src="{{asset('assetsMain/images/products/img-6.png')}}"
                    alt=""
                    style="max-height: 215px; max-width: 100%"
                    class="mx-auto d-block"
                  />
                </div>
                <p
                  class="fs-11 fw-medium badge bg-primary py-2 px-3 product-lable mb-0"
                >
                  Best Arrival
                </p>
                <div class="gallery-product-actions">
                  <div class="mb-2">
                    <button
                      type="button"
                      class="btn btn-danger btn-sm custom-toggle"
                      data-bs-toggle="button"
                    >
                      <span class="icon-on"
                        ><i
                          class="mdi mdi-heart-outline align-bottom fs-15"
                        ></i
                      ></span>
                      <span class="icon-off"
                        ><i class="mdi mdi-heart align-bottom fs-15"></i
                      ></span>
                    </button>
                  </div>

                  <div>
                    <button
                      type="button"
                      class="btn btn-success btn-sm custom-toggle"
                      data-bs-toggle="button"
                    >
                      <span class="icon-on"
                        ><i
                          class="mdi mdi-eye-outline align-bottom fs-15"
                        ></i
                      ></span>
                      <span class="icon-off"
                        ><i class="mdi mdi-eye align-bottom fs-15"></i
                      ></span>
                    </button>
                  </div>
                </div>
                <div class="product-btn px-3">
                  <a
                    href="shop-cart.html"
                    class="btn btn-primary btn-sm w-75 add-btn"
                    ><i class="mdi mdi-cart me-1"></i> Add to cart</a
                  >
                </div>
              </div>
              <div class="card-body">
                <div>
                  <a href="product-details.html">
                    <h6 class="fs-15 lh-base text-truncate mb-0">
                      Man Relaxed Fit T-shirt
                    </h6>
                  </a>
                  <div class="mt-3">
                    <span class="float-end"
                      >4.9
                      <i
                        class="ri-star-half-fill text-warning align-bottom"
                      ></i
                    ></span>
                    <h5 class="mb-0">
                      $199.00
                      <span class="text-muted fs-12"
                        ><del>$425.00</del></span
                      >
                    </h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end col -->

          <div
            class="element-item col-xxl-3 col-xl-4 col-sm-6 seller hot"
            data-category="seller hot"
          >
            <div class="card overflow-hidden">
              <div class="bg-info-subtle rounded-top py-4">
                <div class="gallery-product">
                  <img
                    src="{{asset('assetsMain/images/products/img-7.png')}}"
                    alt=""
                    style="max-height: 215px; max-width: 100%"
                    class="mx-auto d-block"
                  />
                </div>
                <div class="gallery-product-actions">
                  <div class="mb-2">
                    <button
                      type="button"
                      class="btn btn-danger btn-sm custom-toggle"
                      data-bs-toggle="button"
                    >
                      <span class="icon-on"
                        ><i
                          class="mdi mdi-heart-outline align-bottom fs-15"
                        ></i
                      ></span>
                      <span class="icon-off"
                        ><i class="mdi mdi-heart align-bottom fs-15"></i
                      ></span>
                    </button>
                  </div>
                  <div>
                    <button
                      type="button"
                      class="btn btn-success btn-sm custom-toggle"
                      data-bs-toggle="button"
                    >
                      <span class="icon-on"
                        ><i
                          class="mdi mdi-eye-outline align-bottom fs-15"
                        ></i
                      ></span>
                      <span class="icon-off"
                        ><i class="mdi mdi-eye align-bottom fs-15"></i
                      ></span>
                    </button>
                  </div>
                </div>
                <div class="product-btn px-3">
                  <a
                    href="shop-cart.html"
                    class="btn btn-primary btn-sm w-75 add-btn"
                    ><i class="mdi mdi-cart me-1"></i> Add to cart</a
                  >
                </div>
              </div>
              <div class="card-body">
                <div>
                  <a href="product-details.html">
                    <h6 class="fs-15 lh-base text-truncate mb-0">
                      Innovative education book
                    </h6>
                  </a>
                  <div class="mt-3">
                    <span class="float-end"
                      >3.2
                      <i
                        class="ri-star-half-fill text-warning align-bottom"
                      ></i
                    ></span>
                    <h5 class="mb-0">$129.00</h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end col -->

          <div
            class="element-item col-xxl-3 col-xl-4 col-sm-6 trendy"
            data-category="trendy"
          >
            <div class="card overflow-hidden">
              <div class="bg-danger-subtle rounded-top py-4">
                <div class="gallery-product">
                  <img
                    src="{{asset('assetsMain/images/products/img-1.png')}}"
                    alt=""
                    style="max-height: 215px; max-width: 100%"
                    class="mx-auto d-block"
                  />
                </div>
                <div class="gallery-product-actions">
                  <div class="mb-2">
                    <button
                      type="button"
                      class="btn btn-danger btn-sm custom-toggle"
                      data-bs-toggle="button"
                    >
                      <span class="icon-on"
                        ><i
                          class="mdi mdi-heart-outline align-bottom fs-15"
                        ></i
                      ></span>
                      <span class="icon-off"
                        ><i class="mdi mdi-heart align-bottom fs-15"></i
                      ></span>
                    </button>
                  </div>

                  <div>
                    <button
                      type="button"
                      class="btn btn-success btn-sm custom-toggle"
                      data-bs-toggle="button"
                    >
                      <span class="icon-on"
                        ><i
                          class="mdi mdi-eye-outline align-bottom fs-15"
                        ></i
                      ></span>
                      <span class="icon-off"
                        ><i class="mdi mdi-eye align-bottom fs-15"></i
                      ></span>
                    </button>
                  </div>
                </div>
                <div class="product-btn px-3">
                  <a
                    href="shop-cart.html"
                    class="btn btn-primary btn-sm w-75 add-btn"
                    ><i class="mdi mdi-cart me-1"></i> Add to cart</a
                  >
                </div>
              </div>
              <div class="card-body">
                <div>
                  <a href="product-details.html">
                    <h6 class="fs-15 lh-base text-truncate mb-0">
                      Hp Trendsetter Backpack
                    </h6>
                  </a>
                  <div class="mt-3">
                    <span class="float-end"
                      >4.3
                      <i
                        class="ri-star-half-fill text-warning align-bottom"
                      ></i
                    ></span>
                    <h5 class="mb-0">
                      $299.00
                      <span class="text-muted fs-12"
                        ><del>$399.00</del></span
                      >
                    </h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end col -->

          <div
            class="element-item col-xxl-3 col-xl-4 col-sm-6 trendy"
            data-category="trendy"
          >
            <div class="card overflow-hidden">
              <div class="bg-warning-subtle rounded-top py-4">
                <div class="gallery-product">
                  <img
                    src="{{asset('assetsMain/images/products/img-2.png')}}"
                    alt=""
                    style="max-height: 215px; max-width: 100%"
                    class="mx-auto d-block"
                  />
                </div>
                <div class="gallery-product-actions">
                  <div class="mb-2">
                    <button
                      type="button"
                      class="btn btn-danger btn-sm custom-toggle"
                      data-bs-toggle="button"
                    >
                      <span class="icon-on"
                        ><i
                          class="mdi mdi-heart-outline align-bottom fs-15"
                        ></i
                      ></span>
                      <span class="icon-off"
                        ><i class="mdi mdi-heart align-bottom fs-15"></i
                      ></span>
                    </button>
                  </div>

                  <div>
                    <button
                      type="button"
                      class="btn btn-success btn-sm custom-toggle"
                      data-bs-toggle="button"
                    >
                      <span class="icon-on"
                        ><i
                          class="mdi mdi-eye-outline align-bottom fs-15"
                        ></i
                      ></span>
                      <span class="icon-off"
                        ><i class="mdi mdi-eye align-bottom fs-15"></i
                      ></span>
                    </button>
                  </div>
                </div>
                <div class="product-btn px-3">
                  <a
                    href="shop-cart.html"
                    class="btn btn-primary btn-sm w-75 add-btn"
                    ><i class="mdi mdi-cart me-1"></i> Add to cart</a
                  >
                </div>
              </div>
              <div class="card-body">
                <div>
                  <a href="product-details.html">
                    <h6 class="fs-15 lh-base text-truncate mb-0">
                      Hoodie Newyorker Winter Clothes
                    </h6>
                  </a>
                  <div class="mt-3">
                    <span class="float-end"
                      >3.1
                      <i
                        class="ri-star-half-fill text-warning align-bottom"
                      ></i
                    ></span>
                    <h5 class="mb-0">$159.00</h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end col -->

          <div
            class="element-item col-xxl-3 col-xl-4 col-sm-6 seller arrival"
            data-category="arrival"
          >
            <div class="card overflow-hidden">
              <div class="bg-danger-subtle rounded-top py-4">
                <div class="gallery-product">
                  <img
                    src="{{asset('assetsMain/images/products/img-3.png')}}"
                    alt=""
                    style="max-height: 215px; max-width: 100%"
                    class="mx-auto d-block"
                  />
                </div>
                <p
                  class="fs-11 fw-medium badge bg-primary py-2 px-3 product-lable mb-0"
                >
                  Best Arrival
                </p>
                <div class="gallery-product-actions">
                  <div class="mb-2">
                    <button
                      type="button"
                      class="btn btn-danger btn-sm custom-toggle"
                      data-bs-toggle="button"
                    >
                      <span class="icon-on"
                        ><i
                          class="mdi mdi-heart-outline align-bottom fs-15"
                        ></i
                      ></span>
                      <span class="icon-off"
                        ><i class="mdi mdi-heart align-bottom fs-15"></i
                      ></span>
                    </button>
                  </div>

                  <div>
                    <button
                      type="button"
                      class="btn btn-success btn-sm custom-toggle"
                      data-bs-toggle="button"
                    >
                      <span class="icon-on"
                        ><i
                          class="mdi mdi-eye-outline align-bottom fs-15"
                        ></i
                      ></span>
                      <span class="icon-off"
                        ><i class="mdi mdi-eye align-bottom fs-15"></i
                      ></span>
                    </button>
                  </div>
                </div>
                <div class="product-btn px-3">
                  <a
                    href="shop-cart.html"
                    class="btn btn-primary btn-sm w-75 add-btn"
                    ><i class="mdi mdi-cart me-1"></i> Add to cart</a
                  >
                </div>
              </div>
              <div class="card-body">
                <div>
                  <a href="product-details.html">
                    <h6 class="fs-15 lh-base text-truncate mb-0">
                      Leather band Smartwatches
                    </h6>
                  </a>
                  <div class="mt-3">
                    <span class="float-end"
                      >3.7
                      <i
                        class="ri-star-half-fill text-warning align-bottom"
                      ></i
                    ></span>
                    <h5 class="mb-0">$159.00</h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end col -->

          <div
            class="element-item col-xxl-3 col-xl-4 col-sm-6 seller hot"
            data-category="seller hot"
          >
            <div class="card overflow-hidden">
              <div class="bg-success-subtle rounded-top py-4">
                <div class="gallery-product">
                  <img
                    src="{{asset('assetsMain/images/products/img-4.png')}}"
                    alt=""
                    style="max-height: 215px; max-width: 100%"
                    class="mx-auto d-block"
                  />
                </div>
                <div class="gallery-product-actions">
                  <div class="mb-2">
                    <button
                      type="button"
                      class="btn btn-danger btn-sm custom-toggle"
                      data-bs-toggle="button"
                    >
                      <span class="icon-on"
                        ><i
                          class="mdi mdi-heart-outline align-bottom fs-15"
                        ></i
                      ></span>
                      <span class="icon-off"
                        ><i class="mdi mdi-heart align-bottom fs-15"></i
                      ></span>
                    </button>
                  </div>

                  <div>
                    <button
                      type="button"
                      class="btn btn-success btn-sm custom-toggle"
                      data-bs-toggle="button"
                    >
                      <span class="icon-on"
                        ><i
                          class="mdi mdi-eye-outline align-bottom fs-15"
                        ></i
                      ></span>
                      <span class="icon-off"
                        ><i class="mdi mdi-eye align-bottom fs-15"></i
                      ></span>
                    </button>
                  </div>
                </div>
                <div class="product-btn px-3">
                  <a
                    href="shop-cart.html"
                    class="btn btn-primary btn-sm w-75 add-btn"
                    ><i class="mdi mdi-cart me-1"></i> Add to cart</a
                  >
                </div>
              </div>
              <div class="card-body">
                <div>
                  <a href="product-details.html">
                    <h6 class="fs-15 lh-base text-truncate mb-0">
                      Slippers Open Toe
                    </h6>
                  </a>
                  <div class="mt-3">
                    <span class="float-end"
                      >2.6
                      <i
                        class="ri-star-half-fill text-warning align-bottom"
                      ></i
                    ></span>
                    <h5 class="mb-0">
                      $169.00
                      <span class="text-muted fs-12"
                        ><del>$225.00</del></span
                      >
                    </h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end col -->

          <div
            class="element-item col-xxl-3 col-xl-4 col-sm-6 project hot arrival"
            data-category="hot arrival"
          >
            <div class="card overflow-hidden">
              <div class="bg-info-subtle rounded-top py-4">
                <div class="gallery-product">
                  <img
                    src="{{asset('assetsMain/images/products/img-8.png')}}"
                    alt=""
                    style="max-height: 215px; max-width: 100%"
                    class="mx-auto d-block"
                  />
                </div>
                <div class="gallery-product-actions">
                  <div class="mb-2">
                    <button
                      type="button"
                      class="btn btn-danger btn-sm custom-toggle"
                      data-bs-toggle="button"
                    >
                      <span class="icon-on"
                        ><i
                          class="mdi mdi-heart-outline align-bottom fs-15"
                        ></i
                      ></span>
                      <span class="icon-off"
                        ><i class="mdi mdi-heart align-bottom fs-15"></i
                      ></span>
                    </button>
                  </div>

                  <div>
                    <button
                      type="button"
                      class="btn btn-success btn-sm custom-toggle"
                      data-bs-toggle="button"
                    >
                      <span class="icon-on"
                        ><i
                          class="mdi mdi-eye-outline align-bottom fs-15"
                        ></i
                      ></span>
                      <span class="icon-off"
                        ><i class="mdi mdi-eye align-bottom fs-15"></i
                      ></span>
                    </button>
                  </div>
                </div>
                <div class="product-btn px-3">
                  <a
                    href="shop-cart.html"
                    class="btn btn-primary btn-sm w-75 add-btn"
                    ><i class="mdi mdi-cart me-1"></i> Add to cart</a
                  >
                </div>
              </div>
              <div class="card-body">
                <div>
                  <a href="product-details.html">
                    <h6 class="fs-15 lh-base text-truncate mb-0">
                      T-shirt Geometric Print pattern
                    </h6>
                  </a>
                  <div class="mt-3">
                    <span class="float-end"
                      >4.9
                      <i
                        class="ri-star-half-fill text-warning align-bottom"
                      ></i
                    ></span>
                    <h5 class="mb-0">$339.00</h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end col -->

          <div
            class="element-item col-xxl-3 col-xl-4 col-sm-6 trendy"
            data-category="trendy"
          >
            <div class="card overflow-hidden">
              <div class="bg-danger-subtle rounded-top py-4">
                <div class="gallery-product">
                  <img
                    src="{{asset('assetsMain/images/products/img-5.png')}}"
                    alt=""
                    style="max-height: 215px; max-width: 100%"
                    class="mx-auto d-block"
                  />
                </div>
                <p
                  class="fs-11 fw-medium badge bg-primary py-2 px-3 product-lable mb-0"
                >
                  Best Arrival
                </p>
                <div class="gallery-product-actions">
                  <div class="mb-2">
                    <button
                      type="button"
                      class="btn btn-danger btn-sm custom-toggle"
                      data-bs-toggle="button"
                    >
                      <span class="icon-on"
                        ><i
                          class="mdi mdi-heart-outline align-bottom fs-15"
                        ></i
                      ></span>
                      <span class="icon-off"
                        ><i class="mdi mdi-heart align-bottom fs-15"></i
                      ></span>
                    </button>
                  </div>

                  <div>
                    <button
                      type="button"
                      class="btn btn-success btn-sm custom-toggle"
                      data-bs-toggle="button"
                    >
                      <span class="icon-on"
                        ><i
                          class="mdi mdi-eye-outline align-bottom fs-15"
                        ></i
                      ></span>
                      <span class="icon-off"
                        ><i class="mdi mdi-eye align-bottom fs-15"></i
                      ></span>
                    </button>
                  </div>
                </div>
                <div class="product-btn px-3">
                  <a
                    href="shop-cart.html"
                    class="btn btn-primary btn-sm w-75 add-btn"
                    ><i class="mdi mdi-cart me-1"></i> Add to cart</a
                  >
                </div>
              </div>
              <div class="card-body">
                <div>
                  <a href="product-details.html">
                    <h6 class="fs-15 lh-base text-truncate mb-0">
                      Leather sports shoes on wood
                    </h6>
                  </a>
                  <div class="mt-3">
                    <span class="float-end"
                      >4.9
                      <i
                        class="ri-star-half-fill text-warning align-bottom"
                      ></i
                    ></span>
                    <h5 class="mb-0">
                      $435.00
                      <span class="text-muted fs-12"
                        ><del>$636.00</del></span
                      >
                    </h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end col -->
        </div>

        <div class="mt-4 text-center">
          <a
            href="product-list-defualt.html"
            class="btn btn-soft-primary btn-hover"
            >View All Products
            <i class="mdi mdi-arrow-right align-middle ms-1"></i
          ></a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- END PRODUCT -->

<section class="position-relative bg-danger-subtle bg-cta">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <div class="py-5">
          <p
            class="text-uppercase badge bg-danger-subtle text-danger fs-13"
          >
            Get <b>50%</b> off to your order
          </p>

          <h1 class="lh-base fw-semibold mb-3 text-capitalize">
            Deal off the week
          </h1>
          <p class="fs-16 mt-2">
            The hands-down winner of denim-friendly sandal styles has to be
            flat and simple thong sandals. They can be paired with virtually
            every style of women's jeans imaginable, and, as long as you can
            stand the toe strap, they tend to be really comfortable as well.
          </p>
          <div class="row">
            <div class="col-lg-10">
              <div class="ecommerce-land-countdown mt-3 mb-0">
                <div
                  data-countdown="Jan 30, 2025"
                  class="countdownlist"
                ></div>
              </div>
            </div>
          </div>

          <div class="mt-4 pt-2 d-flex gap-2">
            <a href="#!" class="btn btn-primary w-md btn-hover"
              >Shopping Now</a
            >
            <a href="#!" class="btn btn-danger w-md btn-hover">Subscribe</a>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="mt-lg-n5">
          <img
            src="{{asset('assetsMain/images/ecommerce/home/cta.png')}}"
            alt=""
            class="mt-lg-n4"
          />
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section pb-0">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-7">
        <div class="text-center">
          <h3 class="mb-3">Latest Arrival</h3>
          <p class="text-muted fs-15">
            What you wear is how you present yourself to the world,
            especially today, when human contacts are so quick. Fashion is
            instant language.
          </p>
        </div>
      </div>
      <!--end col-->
    </div>
    <!--end row-->

    <div class="row">
      <div class="col-lg-12">
        <div class="swiper latest-slider mt-4" dir="ltr">
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-wrapper pt-5">
            <div class="swiper-slide">
              <div class="card overflow-hidden">
                <div class="bg-dark-subtle rounded-top py-4">
                  <div class="gallery-product">
                    <img
                      src="{{asset('assetsMain/images/products/img-9.png')}}"
                      alt=""
                      style="max-height: 215px; max-width: 100%"
                      class="mx-auto d-block"
                    />
                  </div>
                </div>
                <div class="card-body">
                  <div>
                    <a href="product-details.html">
                      <h6 class="fs-15 lh-base text-truncate mb-0">
                        Petronas Baseball Cap
                      </h6>
                    </a>
                    <div class="mt-3">
                      <span class="float-end"
                        >3.2
                        <i
                          class="ri-star-half-fill text-warning align-bottom"
                        ></i
                      ></span>
                      <h5 class="mb-0">
                        $125.00
                        <span class="text-muted fs-12"
                          ><del>$200.00</del></span
                        >
                      </h5>
                    </div>
                    <div class="mt-3">
                      <a
                        href="shop-cart.html"
                        class="btn btn-primary btn-sm"
                        ><i class="mdi mdi-cart me-1"></i> Add to cart</a
                      >
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="card overflow-hidden">
                <div class="bg-warning-subtle rounded-top py-4">
                  <div class="gallery-product">
                    <img
                      src="{{asset('assetsMain/images/products/img-10.png')}}"
                      alt=""
                      style="max-height: 215px; max-width: 100%"
                      class="mx-auto d-block"
                    />
                  </div>
                </div>
                <div class="card-body">
                  <div>
                    <a href="product-details.html">
                      <h6 class="fs-15 lh-base text-truncate mb-0">
                        Mens Black T Shirt
                      </h6>
                    </a>
                    <div class="mt-3">
                      <span class="float-end"
                        >4.3
                        <i
                          class="ri-star-half-fill text-warning align-bottom"
                        ></i
                      ></span>
                      <h5 class="mb-0">
                        $150.00
                        <span class="text-muted fs-12"
                          ><del>$300.00</del></span
                        >
                      </h5>
                    </div>
                    <div class="mt-3">
                      <a
                        href="shop-cart.html"
                        class="btn btn-primary btn-sm"
                        ><i class="mdi mdi-cart me-1"></i> Add to cart</a
                      >
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="card overflow-hidden">
                <div class="bg-primary-subtle rounded-top py-4">
                  <div class="gallery-product">
                    <img
                      src="{{asset('assetsMain/images/products/img-11.png')}}"
                      alt=""
                      style="max-height: 215px; max-width: 100%"
                      class="mx-auto d-block"
                    />
                  </div>
                </div>
                <div class="card-body">
                  <div>
                    <a href="product-details.html">
                      <h6 class="fs-15 lh-base text-truncate mb-0">
                        Blue Checked Slim Fit Shirt
                      </h6>
                    </a>
                    <div class="mt-3">
                      <span class="float-end"
                        >2.3
                        <i
                          class="ri-star-half-fill text-warning align-bottom"
                        ></i
                      ></span>
                      <h5 class="mb-0">
                        $135.00
                        <span class="text-muted fs-12"
                          ><del>$523.00</del></span
                        >
                      </h5>
                    </div>
                    <div class="mt-3">
                      <a
                        href="shop-cart.html"
                        class="btn btn-primary btn-sm"
                        ><i class="mdi mdi-cart me-1"></i> Add to cart</a
                      >
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="card overflow-hidden">
                <div class="bg-danger-subtle rounded-top py-4">
                  <div class="gallery-product">
                    <img
                      src="{{asset('assetsMain/images/products/img-12.png')}}"
                      alt=""
                      style="max-height: 215px; max-width: 100%"
                      class="mx-auto d-block"
                    />
                  </div>
                </div>
                <div class="card-body">
                  <div>
                    <a href="product-details.html">
                      <h6 class="fs-15 lh-base text-truncate mb-0">
                        Onyx SmartGRID Chair Red
                      </h6>
                    </a>
                    <div class="mt-3">
                      <span class="float-end"
                        >3.5
                        <i
                          class="ri-star-half-fill text-warning align-bottom"
                        ></i
                      ></span>
                      <h5 class="mb-0">
                        $99.00
                        <span class="text-muted fs-12"
                          ><del>$129.00</del></span
                        >
                      </h5>
                    </div>
                    <div class="mt-3">
                      <a
                        href="shop-cart.html"
                        class="btn btn-primary btn-sm"
                        ><i class="mdi mdi-cart me-1"></i> Add to cart</a
                      >
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="card overflow-hidden">
                <div class="bg-secondary-subtle rounded-top py-4">
                  <div class="gallery-product">
                    <img
                      src="{{asset('assetsMain/images/products/img-14.png')}}"
                      alt=""
                      style="max-height: 215px; max-width: 100%"
                      class="mx-auto d-block"
                    />
                  </div>
                </div>
                <div class="card-body">
                  <div>
                    <a href="product-details.html">
                      <h6 class="fs-15 lh-base text-truncate mb-0">
                        Nursing Chair Steam Grey
                      </h6>
                    </a>
                    <div class="mt-3">
                      <span class="float-end"
                        >2.3
                        <i
                          class="ri-star-half-fill text-warning align-bottom"
                        ></i
                      ></span>
                      <h5 class="mb-0">
                        $632.00
                        <span class="text-muted fs-12"
                          ><del>$721.00</del></span
                        >
                      </h5>
                    </div>
                    <div class="mt-3">
                      <a
                        href="shop-cart.html"
                        class="btn btn-primary btn-sm"
                        ><i class="mdi mdi-cart me-1"></i> Add to cart</a
                      >
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--end col-->
    </div>
    <!--end row-->
  </div>
  <!--end container-->
</section>

<section class="section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-7">
        <div class="text-center">
          <h3 class="mb-3">What Customers Say About Us</h3>
          <p class="text-muted fs-15">
            A customer is a person or business that buys goods or services
            from another business. Customers are crucial because they
            generate revenue.
          </p>
        </div>
      </div>
      <!--end col-->
    </div>
    <!--end row-->

    <div class="row">
      <div class="col-lg-12">
        <div class="swiper testi-slider">
          <div class="swiper-wrapper my-5">
            <div class="swiper-slide">
              <div class="client-box m-1">
                <div class="client-desc p-4 border rounded">
                  <p class="mb-0 fs-16">
                    " Clean design. document is just a few's page but i
                    should be like this cuz when looking on laravel project
                    it well prepare. everytime i need a component or
                    something else. easy to find. "
                  </p>
                </div>
                <div class="pt-4">
                  <div class="d-flex align-items-center mt-4 pt-1">
                    <img
                      src="{{asset('assetsMain/images/users/avatar-2.jpg')}}"
                      alt=""
                      class="avatar-sm rounded"
                    />
                    <div class="flex-grow-1 ms-3">
                      <h5 class="mb-2 fs-16">George Obrien</h5>
                      <p class="text-muted mb-0">Velzon User</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="swiper-slide mt-5">
              <div class="client-box m-1">
                <div class="client-desc p-4 border rounded">
                  <p class="mb-0 fs-16">
                    " Thank you for supporting CakePHP 4, we have purchased
                    the template because of this support, please push
                    forward more integration "
                  </p>
                </div>
                <div class="pt-4">
                  <div class="d-flex align-items-center mt-4 pt-1">
                    <img
                      src="{{asset('assetsMain/images/users/avatar-7.jpg')}}"
                      alt=""
                      class="avatar-sm rounded"
                    />
                    <div class="flex-grow-1 ms-3">
                      <h5 class="mb-2 fs-16">Chadwick A. Scott</h5>
                      <p class="text-muted mb-0">Velzon User</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="client-box m-1">
                <div class="client-desc p-4 border rounded">
                  <p class="mb-0 fs-16">
                    " We have used your other templates as well and seems
                    it's amazing with the design and code quality. Wish you
                    best for the future updates. Keep updated you will be #1
                    in near future. "
                  </p>
                </div>
                <div class="pt-4">
                  <div class="d-flex align-items-center mt-4 pt-1">
                    <img
                      src="{{asset('assetsMain/images/users/avatar-8.jpg')}}"
                      alt=""
                      class="avatar-sm rounded"
                    />
                    <div class="flex-grow-1 ms-3">
                      <h5 class="mb-2 fs-16">Tommy Moreno</h5>
                      <p class="text-muted mb-0">Skote User</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="swiper-slide mt-5">
              <div class="client-box m-1">
                <div class="client-desc p-4 border rounded">
                  <p class="mb-0 fs-16">
                    " The template is very complete as an admin panel and
                    was well written in a way that makes it easy to use. "
                  </p>
                </div>
                <div class="pt-4">
                  <div class="d-flex align-items-center mt-4 pt-1">
                    <img
                      src="{{asset('assetsMain/images/users/avatar-10.jpg')}}"
                      alt=""
                      class="avatar-sm rounded"
                    />
                    <div class="flex-grow-1 ms-3">
                      <h5 class="mb-2 fs-16">Mary Atkinson</h5>
                      <p class="text-muted mb-0">Velzon User</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-pagination swiper-pagination-dark"></div>
        </div>
      </div>
    </div>

    <div
      class="row row-cols-lg-5 row-cols-md-3 row-cols-1 text-center justify-content-center align-items-center g-3 mt-5 pt-lg-5"
    >
      <div class="col">
        <div class="client-images">
          <a href="#!">
            <img
              src="{{asset('assetsMain/images/clients/paypal.svg')}}"
              alt="client-img"
              class="mx-auto img-fluid d-block"
            />
          </a>
        </div>
      </div>
      <div class="col">
        <div class="client-images">
          <a href="#!">
            <img
              src="{{asset('assetsMain/images/clients/walmart.svg')}}"
              alt="client-img"
              class="mx-auto img-fluid d-block"
            />
          </a>
        </div>
      </div>
      <div class="col">
        <div class="client-images">
          <a href="#!">
            <img
              src="{{asset('assetsMain/images/clients/spotify.svg')}}"
              alt="client-img"
              class="mx-auto img-fluid d-block"
            />
          </a>
        </div>
      </div>
      <div class="col">
        <div class="client-images">
          <a href="#!">
            <img
              src="{{asset('assetsMain/images/clients/shopify.svg')}}"
              alt="client-img"
              class="mx-auto img-fluid d-block"
            />
          </a>
        </div>
      </div>
      <div class="col">
        <div class="client-images">
          <a href="#!">
            <img
              src="{{asset('assetsMain/images/clients/lenovo.svg')}}"
              alt="client-img"
              class="mx-auto img-fluid d-block"
            />
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- START BLOG -->
<section class="section bg-light bg-opacity-50">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-7">
        <div class="text-center">
          <h3 class="mb-3">Shop insights & feeds</h3>
          <p class="text-muted fs-15">
            Shopping Insights gives marketers a 360-degree view of a
            product's popularity. Harnessing search volume data for more
            than 7,000 popular products (and counting)
          </p>
        </div>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col-lg-4">
        <div class="card overflow-hidden">
          <img
            src="{{asset('assetsMain/images/small/img-3.jpg')}}"
            class="img-fluid"
            alt=""
          />
          <div class="card-body">
            <div class="entry-meta">
              <a href="#!" class="text-muted"
                >12 <i class="mdi mdi-like"></i> Like</a
              >
              <span class="text-muted mx-1">|</span>
              <a href="#!" class="text-muted">10 Comments</a>
            </div>
            <div class="blog-date bg-body-secondary rounded">
              <h4 class="mb-0">15</h4>
              <p class="text-muted mt-1">April</p>
            </div>
            <div class="mt-3">
              <a href="#!"
                ><h5 class="fs-17 lh-base">
                  Society Pass Turns to Stripe to Simplify Checkout
                </h5></a
              >
              <p class="text-muted fs-15 mt-2">
                Southeast Asian eCommerce ecosystem Society Pass (SoPa) says
                it has integrated Stripe’s financial infrastructure
                solutions onto its platform.
              </p>
              <a href="#!" class="link-effect link-info"
                >Continue Reading <i class="bi bi-arrow-right ms-2"></i
              ></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="card overflow-hidden">
          <img
            src="{{asset('assetsMain/images/small/img-8.jpg')}}"
            class="img-fluid"
            alt=""
          />
          <div class="card-body">
            <div class="entry-meta">
              <a href="#!" class="text-muted"
                >24 <i class="mdi mdi-like"></i> Like</a
              >
              <span class="text-muted mx-1">|</span>
              <a href="#!" class="text-muted">32 Comments</a>
            </div>
            <div class="blog-date bg-body-secondary rounded">
              <h4 class="mb-0">23</h4>
              <p class="text-muted mt-1">April</p>
            </div>
            <div class="mt-3">
              <a href="#!"
                ><h5 class="fs-17 lh-base">
                  Integrating Crypto Payment to Ecommerce
                </h5></a
              >
              <p class="text-muted fs-15 mt-2">
                To start accepting Bitcoin on your eCommerce site, simply
                integrate a BTC payment processor into your store. Many
                major eCommerce providers.
              </p>
              <a href="#!" class="link-effect link-info"
                >Continue Reading <i class="bi bi-arrow-right ms-2"></i
              ></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="card overflow-hidden">
          <img
            src="{{asset('assetsMain/images/small/img-6.jpg')}}"
            class="img-fluid"
            alt=""
          />
          <div class="card-body">
            <div class="entry-meta">
              <a href="#!" class="text-muted"
                >48 <i class="mdi mdi-like"></i> Like</a
              >
              <span class="text-muted mx-1">|</span>
              <a href="#!" class="text-muted">15 Comments</a>
            </div>
            <div class="blog-date bg-body-secondary rounded">
              <h4 class="mb-0">31</h4>
              <p class="text-muted mt-1">April</p>
            </div>
            <div class="mt-3">
              <a href="#!"
                ><h5 class="fs-17 lh-base">
                  Etsy Is a High-Flier Among E-Commerce Stocks
                </h5></a
              >
              <p class="text-muted fs-15 mt-2">
                E-commerce stocks soared to record-high valuations during
                the pandemic. However, now that economies have reopened
                during the pandemic.
              </p>
              <a href="#!" class="link-effect link-info"
                >Continue Reading <i class="bi bi-arrow-right ms-2"></i
              ></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="mt-4 text-center">
      <a href="#!" class="btn btn-soft-primary btn-hover"
        >View More Articles <i class="bi bi-arrow-right ms-2"></i
      ></a>
    </div>
  </div>
</section>
<!-- END BLOG -->

<!-- START INSTAGRAM -->
<section class="section pb-0">
  <div class="container">
    <div class="row justify-content-center g-0">
      <div class="col-lg-7">
        <div class="text-center">
          <h3 class="mb-3">Follow Us In Instagram</h3>
          <p class="text-muted fs-15">
            The most common approach that peoples use to say follow me on
            Instagram is by sending a direct message.
          </p>
        </div>
      </div>
    </div>
  </div>

  <div class="position-relative">
    <div class="row g-0 mt-5">
      <div class="col">
        <div class="insta-img">
          <a href="#!" class="stretched-link">
            <img
              src="{{asset('assetsMain/images/ecommerce/instagram/img-1.jpg')}}"
              class="img-fluid"
              alt=""
            />
            <i class="ri-instagram-line"></i>
          </a>
        </div>
      </div>

      <div class="col">
        <div class="insta-img">
          <a href="#!" class="stretched-link">
            <img
              src="{{asset('assetsMain/images/ecommerce/instagram/img-2.jpg')}}"
              class="img-fluid"
              alt=""
            />
            <i class="ri-instagram-line"></i>
          </a>
        </div>
      </div>

      <div class="col d-none d-md-block">
        <div class="insta-img">
          <a href="#!" class="stretched-link">
            <img
              src="{{asset('assetsMain/images/ecommerce/instagram/img-3.jpg')}}"
              class="img-fluid"
              alt=""
            />
            <i class="ri-instagram-line"></i>
          </a>
        </div>
      </div>

      <div class="col d-none d-md-block">
        <div class="insta-img">
          <a href="#!" class="stretched-link">
            <img
              src="{{asset('assetsMain/images/ecommerce/instagram/img-4.jpg')}}"
              class="img-fluid"
              alt=""
            />
            <i class="ri-instagram-line"></i>
          </a>
        </div>
      </div>
      <div class="col d-none d-lg-block">
        <div class="insta-img">
          <a href="#!" class="stretched-link">
            <img
              src="{{asset('assetsMain/images/ecommerce/instagram/img-5.jpg')}}"
              class="img-fluid"
              alt=""
            />
            <i class="ri-instagram-line"></i>
          </a>
        </div>
      </div>
      <div class="col d-none d-lg-block">
        <div class="insta-img">
          <a href="#!" class="stretched-link">
            <img
              src="{{asset('assetsMain/images/ecommerce/instagram/img-6.jpg')}}"
              class="img-fluid"
              alt=""
            />
            <i class="ri-instagram-line"></i>
          </a>
        </div>
      </div>
    </div>

    <div class="insta-lable text-center">
      <a href="#!" class="btn btn-primary btn-hover">
        <i class="ph-instagram-logo align-middle me-1"></i> Follow In
        Instagram
      </a>
    </div>
  </div>
</section>
<!-- END INSTAGRAM -->



    <script src="{{ asset('assetsMainMain/js/frontend/productcardcolorchange.js') }}"></script>
    <script type="text/javascript">
        function logo_carouselInit() {
            $('.owl-carousel.logo_active').owlCarousel({
                dots: false,
                loop: true,
                margin: 30,
                stagePadding: 2,
                smartSpeed: 1000,
                autoplay: true,
                autoplayTimeout: 1500,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 2
                    },
                    576: {
                        items: 3,
                    },
                    768: {
                        items: 4,
                    },
                    992: {
                        items: 5
                    }
                }
            });
        }
        logo_carouselInit();
    </script>
@endsection
