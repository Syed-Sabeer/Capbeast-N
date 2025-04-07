@extends('main.layouts.master')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{ asset('assetsMain/js/frontend/owl.carousel.min.js')}}"></script>
<link href="{{ asset('assetsMain/css/owl.carousel.min.css')}}" rel="stylesheet" type="text/css" />
<!-- MixItUp CDN -->
<link href="https://cdn.jsdelivr.net/npm/mixitup@3.3.1/dist/mixitup.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/mixitup@3.3.1/dist/mixitup.min.js"></script>
<script>
var mixer = mixitup('.row', {
  selectors: {
    target: '.mix'
  },
  animation: {
    effects: 'fade scale'
  }
});

</script>





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
            {{-- <p class="text-uppercase text-white mb-2">Up to 50-70%</p> --}}
            <h1 class="text-white lh-base fw-medium ff-secondary">
              Cozy Winter Beanies Collection
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
            {{-- <p class="text-uppercase fw-medium text-secondary mb-2">
              Summer Sales
            </p> --}}
            <h1 class="lh-base ff-secondary text-dark">
              Trendy Fashion Caps Collection
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
          <ul class="list-inline categories-filter animation-nav" id="filter">
            <li class="list-inline-item">
              <a class="categories active" data-filter=".recent">Recently Added</a>
            </li>
            <li class="list-inline-item">
              <a class="categories" data-filter=".seller">Most Sold</a>
            </li>
          </ul>
        </div>
    
        <div class="row mix-container">
          {{-- Recently Added Products --}}
          @foreach ($recentProducts as $product)
            <div class="col-xxl-3 col-lg-4 col-md-6 mix recent">
              @include('main.partials.product-card', ['product' => $product])
            </div>
          @endforeach
    
          {{-- Most Sold Products --}}
          @foreach ($mostOrderedProducts as $product)
            <div class="col-xxl-3 col-lg-4 col-md-6 mix seller">
              @include('main.partials.product-card', ['product' => $product])
            </div>
          @endforeach
        </div>
    
        <div class="mt-4 text-center">
          <a href="product-list-defualt.html" class="btn btn-soft-primary btn-hover">View All Products
            <i class="mdi mdi-arrow-right align-middle ms-1"></i>
          </a>
        </div>
      </div>
    </div>
    
    <!-- Include MixItUp JS -->
    <link href="https://cdn.jsdelivr.net/npm/mixitup@3.3.1/dist/mixitup.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/mixitup@3.3.1/dist/mixitup.min.js"></script>
    <script>
      var mixer = mixitup('.mix-container', {
        selectors: {
          target: '.mix'
        },
        animation: {
          effects: 'fade scale'
        },
        load: {
          filter: '.recent' // Show only recently added products initially
        }
      });
    
      // Handle tab clicks and update active class dynamically
      document.querySelectorAll('.categories').forEach(function(tab) {
        tab.addEventListener('click', function(e) {
          // Remove 'active' class from all tabs
          document.querySelectorAll('.categories').forEach(function(tab) {
            tab.classList.remove('active');
          });
    
          // Add 'active' class to clicked tab
          e.target.classList.add('active');
        });
      });
    </script>
    
    
    



  </div>
</section>
<!-- END PRODUCT -->






<div class="container">
  <div class="row justify-content-center g-0">
      <div class="col-lg-7">
          <div class="text-center">
              <h3 class="mb-3">OUR VALUABLE PARTNERS</h3>
              {{-- <p class="text-muted fs-15">
                  The most common approach that peoples use to say follow me on Instagram is by sending a direct message.
              </p> --}}
          </div>
      </div>
  </div>
</div>

<div class="logo_wrapper mt-5">
  
  <div class="container">
      <div class="owl-carousel logo_active">
          <img class="img-fluid brand-logo" src="{{ asset('assetsMain/images/fixed/capbeast.png')}}" alt="logo">
          {{-- <img class="img-fluid brand-logo" src="{{ asset('img/47.png')}}" alt="logo"> --}}
          
          {{-- <img class="img-fluid brand-logo" src="{{ asset('img/adidas.png')}}" alt="logo"> --}}
          <img class="img-fluid brand-logo" src="{{ asset('assetsMain/images/fixed/flexfit.png')}}" alt="logo">
          <img class="img-fluid brand-logo" src="{{ asset('assetsMain/images/fixed/oaklay.png')}}" alt="logo">
          {{-- <img class="img-fluid brand-logo" src="{{ asset('img/carhartt.png')}}" alt="logo"> --}}
          <img class="img-fluid brand-logo" src="{{ asset('assetsMain/images/fixed/the-north-face.png')}}" alt="logo">
          <img class="img-fluid brand-logo" src="{{ asset('assetsMain/images/fixed/yapoong.png')}}" alt="logo">
      </div>
  </div>
</div>

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
