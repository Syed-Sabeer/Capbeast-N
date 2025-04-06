@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Payment - Front Pages')

@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/front-page-payment.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/pages-pricing.js')}}"></script>
<script src="{{asset('assets/js/front-page-payment.js')}}"></script>
@endsection


@section('content')
<section class="section-py bg-body first-section-pt">
  <div class="container mt-2">
    <div class="card px-3">
      <div class="row">
        <div class="col-lg-7 card-body border-end">
          <h4 class="mb-2">Checkout</h4>
          <p class="mb-0">All plans include 40+ advanced tools and features to boost your product. <br>
            Choose the best plan to fit your needs.</p>
          <div class="row py-4 my-2">
            <div class="col-md mb-md-0 mb-2">
              <div class="form-check custom-option custom-option-basic checked">
                <label class="form-check-label custom-option-content form-check-input-payment d-flex gap-3 align-items-center" for="customRadioVisa">
                  <input name="customRadioTemp" class="form-check-input" type="radio" value="credit-card" id="customRadioVisa" checked />
                  <span class="custom-option-body">
                    <img src="{{ asset('assets/img/icons/payments/visa-'.$configData['style'].'.png') }}" alt="visa-card" width="58" data-app-light-img="icons/payments/visa-light.png" data-app-dark-img="icons/payments/visa-dark.png">
                    <span class="ms-3">Credit Card</span>
                  </span>
                </label>
              </div>
            </div>
            <div class="col-md mb-md-0 mb-2">
              <div class="form-check custom-option custom-option-basic">
                <label class="form-check-label custom-option-content form-check-input-payment d-flex gap-3 align-items-center" for="customRadioPaypal">
                  <input name="customRadioTemp" class="form-check-input" type="radio" value="paypal" id="customRadioPaypal" />
                  <span class="custom-option-body">
                    <img src="{{ asset('assets/img/icons/payments/paypal-'.$configData['style'].'.png') }}" alt="paypal" width="58" data-app-light-img="icons/payments/paypal-light.png" data-app-dark-img="icons/payments/paypal-dark.png">
                    <span class="ms-3">Paypal</span>
                  </span>
                </label>
              </div>
            </div>
          </div>
          <h4 class="mt-2 mb-4">Billing Details</h4>
          <form>
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label" for="billings-email">Email Address</label>
                <input type="text" id="billings-email" class="form-control" placeholder="john.doe@gmail.com" />
              </div>
              <div class="col-md-6">
                <label class="form-label" for="billings-password">Password</label>
                <input type="password" id="billings-password" class="form-control" placeholder="Password" />
              </div>
              <div class="col-md-6">
                <label class="form-label" for="billings-country">Country</label>
                <select id="billings-country" class="form-select" data-allow-clear="true">
                  <option value="">Select</option>
                  <option value="Australia">Australia</option>
                  <option value="Brazil">Brazil</option>
                  <option value="Canada">Canada</option>
                  <option value="China">China</option>
                  <option value="France">France</option>
                  <option value="Germany">Germany</option>
                  <option value="India">India</option>
                  <option value="Turkey">Turkey</option>
                  <option value="Ukraine">Ukraine</option>
                  <option value="United Arab Emirates">United Arab Emirates</option>
                  <option value="United Kingdom">United Kingdom</option>
                  <option value="United States">United States</option>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label" for="billings-zip">Billing Zip / Postal Code</label>
                <input type="text" id="billings-zip" class="form-control billings-zip-code" placeholder="Zip / Postal Code">
              </div>
            </div>
          </form>
          <div id="form-credit-card">
            <h4 class="mt-4 pt-2">Credit Card Info</h4>
            <form>
              <div class="row g-3">
                <div class="col-12">
                  <label class="form-label" for="billings-card-num">Card number</label>
                  <div class="input-group input-group-merge">
                    <input type="text" id="billings-card-num" class="form-control billing-card-mask" placeholder="7465 8374 5837 5067" aria-describedby="paymentCard" />
                    <span class="input-group-text cursor-pointer p-1" id="paymentCard"><span class="card-type"></span></span>

                  </div>
                </div>
                <div class="col-md-6">
                  <label class="form-label" for="billings-card-name">Name</label>
                  <input type="text" id="billings-card-name" class="form-control" placeholder="John Doe" />
                </div>
                <div class="col-md-3">
                  <label class="form-label" for="billings-card-date">EXP. Date</label>
                  <input type="text" id="billings-card-date" class="form-control billing-expiry-date-mask" placeholder="MM/YY" />
                </div>
                <div class="col-md-3">
                  <label class="form-label" for="billings-card-cvv">CVV</label>
                  <input type="text" id="billings-card-cvv" class="form-control billing-cvv-mask" maxlength="3" placeholder="965" />
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-lg-5 card-body">
          <h4 class="mb-2">Order Summary</h4>
          <p class="pb-2 mb-0">It can help you manage and service orders before,<br> during and after fulfilment.</p>
          <div class="bg-lighter p-4 rounded mt-4">
            <p class="mb-1">A simple start for everyone</p>
            <div class="d-flex align-items-center">
              <h1 class="text-heading display-5 mb-1">$59.99</h1>
              <sub>/month</sub>
            </div>
            <div class="d-grid">
              <button type="button" data-bs-target="#pricingModal" data-bs-toggle="modal" class="btn btn-label-primary">Change Plan</button>
            </div>
          </div>
          <div>
            <div class="d-flex justify-content-between align-items-center mt-3">
              <p class="mb-0">Subtotal</p>
              <h6 class="mb-0">$85.99</h6>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-3">
              <p class="mb-0">Tax</p>
              <h6 class="mb-0">$4.99</h6>
            </div>
            <hr>
            <div class="d-flex justify-content-between align-items-center mt-3 pb-1">
              <p class="mb-0">Total</p>
              <h6 class="mb-0">$90.98</h6>
            </div>
            <div class="d-grid mt-3">
              <button class="btn btn-success">
                <span class="me-2">Proceed with Payment</span>
                <i class="ti ti-arrow-right scaleX-n1-rtl"></i>
              </button>
            </div>

            <p class="mt-4 pt-2">By continuing, you accept to our Terms of Services and Privacy Policy. Please note that payments are non-refundable.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Modal -->
@include('_partials/_modals/modal-pricing')
<!-- /Modal -->
@endsection
