@php
$customizerHidden = 'customizer-hide';
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Coming Soon - Pages')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-misc.css')}}">
@endsection

@section('content')
<!-- Coming soon -->
<div class="container-xxl container-p-y">
  <div class="misc-wrapper">
    <h2 class="mb-1 mx-2">We are launching soon</h2>
    <p class="mb-4 mx-2">We're creating something awesome. Please subscribe to get notified when it's ready!</p>
    <form onsubmit="return false" class="mb-4">
      <div class="mb-0">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="email" autofocus>
          <button type="submit" class="btn btn-primary">Notify</button>
        </div>
      </div>
    </form>
    <div class="mt-4">
      <img src="{{ asset('assets/img/illustrations/page-misc-launching-soon.png') }}" alt="page-misc-launching-soon" width="263" class="img-fluid">
    </div>
  </div>
</div>
<div class="container-fluid misc-bg-wrapper">
  <img src="{{ asset('assets/img/illustrations/bg-shape-image-'.$configData['style'].'.png') }}" alt="page-misc-coming-soon" data-app-light-img="illustrations/bg-shape-image-light.png" data-app-dark-img="illustrations/bg-shape-image-dark.png">
</div>
<!-- /Coming soon -->
@endsection
