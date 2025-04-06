@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'eCommerce Settings Payments - Apps')

@section('page-script')
<script src="{{asset('assets/js/app-ecommerce-settings.js')}}"></script>
@endsection

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">eCommerce /</span> Settings
</h4>

<div class="row g-4">

  <!-- Navigation -->
  <div class="col-12 col-lg-4">
    <div class="d-flex justify-content-between flex-column mb-3 mb-md-0">
      <ul class="nav nav-align-left nav-pills flex-column">
        <li class="nav-item mb-1">
          <a class="nav-link py-2" href="{{url('/app/ecommerce/settings/details')}}">
            <i class="ti ti-building-store me-2"></i>
            <span class="align-middle">Store details</span>
          </a>
        </li>
        <li class="nav-item mb-1">
          <a class="nav-link py-2 active" href="javascript:void(0);">
            <i class="ti ti-credit-card me-2"></i>
            <span class="align-middle">Payments</span>
          </a>
        </li>
        <li class="nav-item mb-1">
          <a class="nav-link py-2" href="{{url('/app/ecommerce/settings/checkout')}}">
            <i class="ti ti-shopping-cart me-2"></i>
            <span class="align-middle">Checkout</span>
          </a>
        </li>
        <li class="nav-item mb-1">
          <a class="nav-link py-2" href="{{url('/app/ecommerce/settings/shipping')}}">
            <i class="ti ti-discount-2 me-2"></i>
            <span class="align-middle">Shipping & delivery</span>
          </a>
        </li>
        <li class="nav-item mb-1">
          <a class="nav-link py-2" href="{{url('/app/ecommerce/settings/locations')}}">
            <i class="ti ti-map-pin me-2"></i>
            <span class="align-middle">Locations</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link py-2" href="{{url('/app/ecommerce/settings/notifications')}}">
            <i class="ti ti-bell-ringing me-2"></i>
            <span class="align-middle">Notifications</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <!-- /Navigation -->
  <!-- Options -->
  <div class="col-12 col-lg-8 pt-4 pt-lg-0">
    <div class="tab-content p-0">
      <!-- Payments Tab -->
      <div class="tab-pane fade show active" id="payments" role="tabpanel">

        <div class="card mb-4">
          <div class="card-header">
            <h5 class="card-title m-0">Payment providers</h5>
          </div>

          <div class="card-body">
            <p>Providers that enable you to accept payment methods at a rate set by the third-party.<br>
              An additional fee will apply to new orders once you select a plan</p>
            <button class="btn btn-label-primary" data-bs-toggle="modal" data-bs-target="#paymentProvider">Choose a provider</button>
          </div>


        </div>

        <div class="card mb-4">
          <div class="card-header">
            <div class="card-title m-0">
              <h5 class="m-0 mb-1">Supported payment methods</h5>
              <p class="text-muted mb-0">Payment methods that are available with one of Beanies's approved payment providers.</p>
            </div>
          </div>
          <div class="card-body">
            <h6 class="mb-3">Default</h6>
            <div class="row mb-3 g-3 bg-label-secondary px-4 pt-2 rounded-2 mx-0 mt-0">
              <div class="col-12 d-flex justify-content-between align-items-start border-bottom p-0 pb-2">

                <img src="{{asset('assets/img/icons/payments/paypal.png')}}" alt="Paypal" width="60">

                <span><a href="javascript:void(0);">Activate Paypal</a></span>
              </div>
              <div class="col-12 p-0">
                <div class="row">
                  <div class="col-4">
                    <p class="mb-1">Provider</p>
                    <p class="text-body fw-medium">Paypal</p>
                  </div>
                  <div class="col-4">
                    <p class="mb-1">Status</p>
                    <p class="badge bg-label-warning fw-medium">Inactive</p>
                  </div>
                  <div class="col-4">
                    <p class="mb-1">Transaction Fee</p>
                    <p class="text-body fw-medium">2.99%</p>
                  </div>
                </div>
              </div>
            </div>
            <button class="btn btn-label-primary" data-bs-toggle="modal" data-bs-target="#paymentMethods">Add payment methods</button>
          </div>
        </div>

        <div class="card mb-4">
          <div class="card-header">
            <h5 class="card-title m-0">Manual payment methods</h5>
          </div>

          <div class="card-body">
            <p>Payments that are made outside your online store. When a customer selects a manual payment method such as cash on delivery. You'll need to approve their order before it can be fulfilled.</p>
            <div class="btn-group">
              <button type="button" class="btn btn-label-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Add manual payment method</button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="javascript:void(0);">Create custom payment method</a></li>
                <li><a class="dropdown-item" href="javascript:void(0);">Bank deposit</a></li>
                <li><a class="dropdown-item" href="javascript:void(0);">Money order</a></li>
                <li><a class="dropdown-item" href="javascript:void(0);">Cash on delivery (COD)</a></li>
              </ul>
            </div>
          </div>


        </div>

        <div class="d-flex justify-content-end gap-3">
          <button type="reset" class="btn btn-label-secondary">Discard</button>
          <a class="btn btn-primary" href="checkout">Save</a>
        </div>
      </div>
    </div>
  </div>
  <!-- /Options-->
</div>

@include('_partials/_modals/modal-select-payment-providers')
@include('_partials/_modals/modal-select-payment-methods')

@endsection
