@extends('layouts/layoutMaster')

@section('title', 'Tabler - Icons')

@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-icons.css')}}" />
@endsection

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Icons /</span> Tabler Icons
</h4>

<p>You can check complete list of Tabler icons from <a href="https://tabler-icons.io/" target="_blank">https://tabler-icons.io/</a></p>

<!-- Icon container -->
<div class="d-flex flex-wrap" id="icons-container">
  <div class="card icon-card cursor-pointer text-center  mb-4 mx-2">
    <div class="card-body"> <i class="ti ti-brand-adobe mb-2"></i>
      <p class="icon-name text-capitalize text-truncate mb-0">adobe</p>
    </div>
  </div>
  <div class="card icon-card cursor-pointer text-center  mb-4 mx-2">
    <div class="card-body"> <i class="ti ti-brand-javascript mb-2"></i>
      <p class="icon-name text-capitalize text-truncate mb-0">javascript</p>
    </div>
  </div>
  <div class="card icon-card cursor-pointer text-center  mb-4 mx-2">
    <div class="card-body"> <i class="ti ti-brand-slack mb-2"></i>
      <p class="icon-name text-capitalize text-truncate mb-0">slack</p>
    </div>
  </div>
  <div class="card icon-card cursor-pointer text-center  mb-4 mx-2">
    <div class="card-body"> <i class="ti ti-brand-figma mb-2"></i>
      <p class="icon-name text-capitalize text-truncate mb-0">figma</p>
    </div>
  </div>
  <div class="card icon-card cursor-pointer text-center  mb-4 mx-2">
    <div class="card-body"> <i class="ti ti-brand-dribbble mb-2"></i>
      <p class="icon-name text-capitalize text-truncate mb-0">dribbble</p>
    </div>
  </div>
  <div class="card icon-card cursor-pointer text-center  mb-4 mx-2">
    <div class="card-body"> <i class="ti ti-brand-docker mb-2"></i>
      <p class="icon-name text-capitalize text-truncate mb-0">docker</p>
    </div>
  </div>
  <div class="card icon-card cursor-pointer text-center  mb-4 mx-2">
    <div class="card-body"> <i class="ti ti-brand-gitlab mb-2"></i>
      <p class="icon-name text-capitalize text-truncate mb-0">gitlab</p>
    </div>
  </div>
  <div class="card icon-card cursor-pointer text-center  mb-4 mx-2">
    <div class="card-body"> <i class="ti ti-brand-patreon mb-2"></i>
      <p class="icon-name text-capitalize text-truncate mb-0">patreon</p>
    </div>
  </div>
  <div class="card icon-card cursor-pointer text-center  mb-4 mx-2">
    <div class="card-body"> <i class="ti ti-brand-facebook mb-2"></i>
      <p class="icon-name text-capitalize text-truncate mb-0">facebook</p>
    </div>
  </div>
  <div class="card icon-card cursor-pointer text-center  mb-4 mx-2">
    <div class="card-body"> <i class="ti ti-brand-discord mb-2"></i>
      <p class="icon-name text-capitalize text-truncate mb-0">discord</p>
    </div>
  </div>
  <div class="card icon-card cursor-pointer text-center  mb-4 mx-2">
    <div class="card-body"> <i class="ti ti-brand-vue mb-2"></i>
      <p class="icon-name text-capitalize text-truncate mb-0">vue</p>
    </div>
  </div>
  <div class="card icon-card cursor-pointer text-center  mb-4 mx-2">
    <div class="card-body"> <i class="ti ti-brand-pinterest mb-2"></i>
      <p class="icon-name text-capitalize text-truncate mb-0">pinterest-alt</p>
    </div>
  </div>
  <div class="card icon-card cursor-pointer text-center  mb-4 mx-2">
    <div class="card-body"> <i class="ti ti-brand-codepen mb-2"></i>
      <p class="icon-name text-capitalize text-truncate mb-0">codepen</p>
    </div>
  </div>
  <div class="card icon-card cursor-pointer text-center  mb-4 mx-2">
    <div class="card-body"> <i class="ti ti-brand-airbnb mb-2"></i>
      <p class="icon-name text-capitalize text-truncate mb-0">airbnb</p>
    </div>
  </div>
  <div class="card icon-card cursor-pointer text-center  mb-4 mx-2">
    <div class="card-body"> <i class="ti ti-brand-amazon mb-2"></i>
      <p class="icon-name text-capitalize text-truncate mb-0">amazon</p>
    </div>
  </div>
  <div class="card icon-card cursor-pointer text-center  mb-4 mx-2">
    <div class="card-body"> <i class="ti ti-brand-android mb-2"></i>
      <p class="icon-name text-capitalize text-truncate mb-0">android</p>
    </div>
  </div>
  <div class="card icon-card cursor-pointer text-center  mb-4 mx-2">
    <div class="card-body"> <i class="ti ti-brand-angular mb-2"></i>
      <p class="icon-name text-capitalize text-truncate mb-0">angular</p>
    </div>
  </div>
  <div class="card icon-card cursor-pointer text-center  mb-4 mx-2">
    <div class="card-body"> <i class="ti ti-brand-apple mb-2"></i>
      <p class="icon-name text-capitalize text-truncate mb-0">apple</p>
    </div>
  </div>
  <div class="card icon-card cursor-pointer text-center  mb-4 mx-2">
    <div class="card-body"> <i class="ti ti-brand-linkedin mb-2"></i>
      <p class="icon-name text-capitalize text-truncate mb-0">linkedIn</p>
    </div>
  </div>
  <div class="card icon-card cursor-pointer text-center  mb-4 mx-2">
    <div class="card-body"> <i class="ti ti-brand-behance mb-2"></i>
      <p class="icon-name text-capitalize text-truncate mb-0">behance</p>
    </div>
  </div>
  <div class="card icon-card cursor-pointer text-center  mb-4 mx-2">
    <div class="card-body"> <i class="ti ti-brand-bing mb-2"></i>
      <p class="icon-name text-capitalize text-truncate mb-0">bing</p>
    </div>
  </div>
  <div class="card icon-card cursor-pointer text-center  mb-4 mx-2">
    <div class="card-body"> <i class="ti ti-currency-bitcoin mb-2"></i>
      <p class="icon-name text-capitalize text-truncate mb-0">bitcoin</p>
    </div>
  </div>
  <div class="card icon-card cursor-pointer text-center  mb-4 mx-2">
    <div class="card-body"> <i class="ti ti-brand-tumblr mb-2"></i>
      <p class="icon-name text-capitalize text-truncate mb-0">tumblr</p>
    </div>
  </div>
  <div class="card icon-card cursor-pointer text-center  mb-4 mx-2">
    <div class="card-body"> <i class="ti ti-brand-bootstrap mb-2"></i>
      <p class="icon-name text-capitalize text-truncate mb-0">bootstrap</p>
    </div>
  </div>
</div>

<!-- Buttons -->
<div class="d-flex justify-content-center mx-auto gap-3">
  <a href="https://tabler-icons.io/" target="_blank" class="btn btn-primary">View All Icons</a>
  <a href="{{config('variables.documentation')}}/Icons.html" class="btn btn-primary" target="_blank">How to use icons?</a>
</div>
@endsection
