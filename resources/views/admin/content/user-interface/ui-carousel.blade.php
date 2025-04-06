@extends('layouts/layoutMaster')

@section('title', 'Carousel - UI elements')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/swiper/swiper.css')}}" />
@endsection

@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/ui-carousel.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/swiper/swiper.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/ui-carousel.js')}}"></script>
@endsection

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">UI elements /</span> Carousel</h4>

<div class="row">
  <!-- Bootstrap carousel -->
  <div class="col-md">
    <h5 class="my-4">Bootstrap carousel</h5>

    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="{{asset('assets/img/elements/10.jpg')}}" alt="First slide" />
          <div class="carousel-caption d-none d-md-block">
            <h4>First slide</h4>
            <p>Eos mutat malis maluisset et, agam ancillae quo te, in vim congue pertinacia.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{asset('assets/img/elements/2.jpg')}}" alt="Second slide" />
          <div class="carousel-caption d-none d-md-block">
            <h4>Second slide</h4>
            <p>In numquam omittam sea.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{asset('assets/img/elements/13.jpg')}}" alt="Third slide" />
          <div class="carousel-caption d-none d-md-block">
            <h4>Third slide</h4>
            <p>Lorem ipsum dolor sit amet, virtute consequat ea qui, minim graeco mel no.</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </a>
    </div>
  </div>
  <!-- Bootstrap crossfade carousel -->
  <div class="col-md">
    <h5 class="my-4">Bootstrap crossfade carousel (dark)</h5>

    <div id="carouselExampleDark" class="carousel carousel-dark slide carousel-fade" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="{{asset('assets/img/elements/13.jpg')}}" alt="First slide" />
          <div class="carousel-caption d-none d-md-block">
            <h4>First slide</h4>
            <p>Eos mutat malis maluisset et, agam ancillae quo te, in vim congue pertinacia.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{asset('assets/img/elements/10.jpg')}}" alt="Second slide" />
          <div class="carousel-caption d-none d-md-block">
            <h4>Second slide</h4>
            <p>In numquam omittam sea.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{asset('assets/img/elements/2.jpg')}}" alt="Third slide" />
          <div class="carousel-caption d-none d-md-block">
            <h4>Third slide</h4>
            <p>Lorem ipsum dolor sit amet, virtute consequat ea qui, minim graeco mel no.</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleDark" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleDark" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </a>
    </div>
  </div>
</div>

<hr class="container-m-nx mt-5" />

<h5 class="my-4">Swiper</h5>
<div class="row">
  <!-- Default -->
  <div class="col-md-6 mb-4">
    <h6 class="text-muted mt-3">Default</h6>
    <div class="swiper" id="swiper-default">
      <div class="swiper-wrapper">
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/1.jpg')}})">Slide 1</div>
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/5.jpg')}})">Slide 2</div>
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/9.jpg')}})">Slide 3</div>
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/7.jpg')}})">Slide 4</div>
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/8.jpg')}})">Slide 5</div>
      </div>
    </div>
  </div>
  <!-- With arrows -->
  <div class="col-md-6 mb-4">
    <h6 class="text-muted mt-3">With arrows</h6>
    <div class="swiper" id="swiper-with-arrows">
      <div class="swiper-wrapper">
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/8.jpg')}})">Slide 1</div>
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/1.jpg')}})">Slide 2</div>
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/5.jpg')}})">Slide 3</div>
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/9.jpg')}})">Slide 4</div>
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/7.jpg')}})">Slide 5</div>
      </div>
      <div class="swiper-button-next swiper-button-white custom-icon">
      </div>
      <div class="swiper-button-prev swiper-button-white custom-icon">
      </div>
    </div>
  </div>
  <!-- With pagination -->
  <div class="col-md-6 mb-4">
    <h6 class="text-muted mt-3">With pagination</h6>
    <div class="swiper" id="swiper-with-pagination">
      <div class="swiper-wrapper">
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/7.jpg')}})">Slide 1</div>
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/8.jpg')}})">Slide 2</div>
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/1.jpg')}})">Slide 3</div>
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/5.jpg')}})">Slide 4</div>
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/9.jpg')}})">Slide 5</div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>

  <!-- With progress -->
  <div class="col-md-6 mb-4">
    <h6 class="text-muted mt-3">With progress</h6>
    <div class="swiper" id="swiper-with-progress">
      <div class="swiper-wrapper">
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/5.jpg')}})">Slide 1</div>
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/9.jpg')}})">Slide 2</div>
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/7.jpg')}})">Slide 3</div>
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/8.jpg')}})">Slide 4</div>
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/1.jpg')}})">Slide 5</div>
      </div>
      <div class="swiper-pagination"></div>
      <div class="swiper-button-next swiper-button-white custom-icon"></div>
      <div class="swiper-button-prev swiper-button-white custom-icon"></div>
    </div>
  </div>

  <!-- With scrollbar -->
  <div class="col-md-6 mb-4">
    <h6 class="text-muted mt-3">With scrollbar</h6>
    <div class="swiper" id="swiper-with-scrollbar">
      <div class="swiper-wrapper">
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/1.jpg')}})">Slide 1</div>
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/5.jpg')}})">Slide 2</div>
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/9.jpg')}})">Slide 3</div>
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/7.jpg')}})">Slide 4</div>
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/8.jpg')}})">Slide 5</div>
      </div>
      <div class="swiper-scrollbar"></div>
    </div>
  </div>

  <!-- Vertical -->
  <div class="col-md-6 mb-4">
    <h6 class="text-muted mt-3">Vertical</h6>
    <div class="swiper" id="swiper-vertical">
      <div class="swiper-wrapper">
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/8.jpg')}})">Slide 1</div>
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/1.jpg')}})">Slide 2</div>
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/5.jpg')}})">Slide 3</div>
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/9.jpg')}})">Slide 4</div>
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/7.jpg')}})">Slide 5</div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>

  <!-- Multiple slides -->
  <div class="col-12 mb-4">
    <h6 class="text-muted mt-3">Multiple slides</h6>
    <div class="swiper" id="swiper-multiple-slides">
      <div class="swiper-wrapper">
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/10.jpg')}})">Slide 1</div>
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/14.jpg')}})">Slide 2</div>
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/13.jpg')}})">Slide 3</div>
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/7.jpg')}})">Slide 4</div>
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/15.jpg')}})">Slide 5</div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>

  <!-- 3D coverflow effect -->
  <div class="col-12 mb-4">
    <h6 class="text-muted mt-3">3D coverflow effect</h6>
    <div class="swiper" id="swiper-3d-coverflow-effect">
      <div class="swiper-wrapper">
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/15.jpg')}})">Slide 1</div>
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/7.jpg')}})">Slide 2</div>
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/10.jpg')}})">Slide 3</div>
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/14.jpg')}})">Slide 4</div>
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/13.jpg')}})">Slide 5</div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>

  <!-- 3D cube effect -->
  <div class="col-md-6 mb-4">
    <h6 class="text-muted mt-3">3D cube effect</h6>
    <div class="swiper" id="swiper-3d-cube-effect">
      <div class="swiper-wrapper">
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/13.jpg')}})">Slide 1</div>
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/15.jpg')}})">Slide 2</div>
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/7.jpg')}})">Slide 3</div>
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/10.jpg')}})">Slide 4</div>
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/14.jpg')}})">Slide 5</div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>

  <!-- 3D flip effect -->
  <div class="col-md-6 mb-4">
    <h6 class="text-muted mt-3">3D flip effect</h6>
    <div class="swiper" id="swiper-3d-flip-effect">
      <div class="swiper-wrapper">
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/14.jpg')}})">Slide 1</div>
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/13.jpg')}})">Slide 2</div>
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/15.jpg')}})">Slide 3</div>
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/7.jpg')}})">Slide 4</div>
        <div class="swiper-slide" style="background-image:url({{asset('assets/img/elements/10.jpg')}})">Slide 5</div>
      </div>
      <div class="swiper-pagination"></div>
      <div class="swiper-button-next swiper-button-black custom-icon">
      </div>
      <div class="swiper-button-prev swiper-button-black custom-icon">
      </div>
    </div>
  </div>

  <!-- Gallery effect-->
  <div class="col-12">
    <h6 class="text-muted mt-3">Thumbs Gallery</h6>
    <div id="swiper-gallery">
      <div class="swiper gallery-top">
        <div class="swiper-wrapper">
          <div class="swiper-slide" style="background-image:url({{asset('assets/img/backgrounds/2.jpg')}})">Slide 1</div>
          <div class="swiper-slide" style="background-image:url({{asset('assets/img/backgrounds/1.jpg')}})">Slide 2</div>
          <div class="swiper-slide" style="background-image:url({{asset('assets/img/backgrounds/3.jpg')}})">Slide 3</div>
          <div class="swiper-slide" style="background-image:url({{asset('assets/img/backgrounds/4.jpg')}})">Slide 4</div>
          <div class="swiper-slide" style="background-image:url({{asset('assets/img/backgrounds/6.jpg')}})">Slide 5</div>
        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-white"></div>
      </div>
      <div class="swiper gallery-thumbs">
        <div class="swiper-wrapper">
          <div class="swiper-slide" style="background-image:url({{asset('assets/img/backgrounds/2.jpg')}})">Slide 1</div>
          <div class="swiper-slide" style="background-image:url({{asset('assets/img/backgrounds/1.jpg')}})">Slide 2</div>
          <div class="swiper-slide" style="background-image:url({{asset('assets/img/backgrounds/3.jpg')}})">Slide 3</div>
          <div class="swiper-slide" style="background-image:url({{asset('assets/img/backgrounds/4.jpg')}})">Slide 4</div>
          <div class="swiper-slide" style="background-image:url({{asset('assets/img/backgrounds/6.jpg')}})">Slide 5</div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
