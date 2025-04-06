@extends('layouts/layoutMaster')

@section('title', 'eCommerce Settings Checkout - Apps')

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
          <a class="nav-link py-2" href="{{url('/app/ecommerce/settings/payments')}}">
            <i class="ti ti-credit-card me-2"></i>
            <span class="align-middle">Payments</span>
          </a>
        </li>
        <li class="nav-item mb-1">
          <a class="nav-link py-2 active" href="javascript:void(0);">
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
      <!-- Checkout Tab -->
      <div class="tab-pane fade show active" id="checkout" role="tabpanel">
        <div class="card mb-4">
          <div class="card-header">
            <div class="card-title m-0">
              <h5 class="m-0">Customer contact method</h5>
              <p class="text-muted mb-0">Select what contact method customers use to check out.</p>
            </div>
          </div>

          <div class="card-body">
            <div class="form-check mb-2">
              <input class="form-check-input" type="radio" name="contactMethod" id="contactPhone" checked>
              <label class="form-check-label" for="contactPhone">
                Phone number
              </label>
            </div>
            <div class="form-check mb-4">
              <input class="form-check-input" type="radio" name="contactMethod" id="contactMail">
              <label class="form-check-label" for="contactMail">
                Email
              </label>
            </div>
            <div class="alert d-flex align-items-center bg-label-info mb-0" role="alert">
              <span class="alert-icon text-info me-2 bg-label-light px-1 pb-1 rounded-2">
                <i class="ti ti-info-circle ti-xs"></i>
              </span>
              To send SMS updates, you need to install an SMS App.
            </div>
          </div>
        </div>

        <div class="card mb-4">
          <div class="card-header">
            <h5 class="card-title m-0">Customer information</h5>
          </div>
          <div class="card-body">
            <div class="mb-4">
              <p class="mb-2">Full name</p>
              <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="fullName" id="last_name" checked>
                <label class="form-check-label" for="last_name">
                  Only require last name
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="fullName" id="last_and_first_name">
                <label class="form-check-label" for="last_and_first_name">
                  Require first and last name
                </label>
              </div>
            </div>
            <div class="mb-4">
              <p class="mb-2">Company name</p>
              <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="companyName" id="dont_include_name" checked>
                <label class="form-check-label" for="dont_include_name">
                  Don't include name
                </label>
              </div>
              <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="companyName" id="optional_name">
                <label class="form-check-label" for="optional_name">
                  Optional
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="companyName" id="required_name">
                <label class="form-check-label" for="required_name">
                  Required
                </label>
              </div>
            </div>
            <div class="mb-4">
              <p class="mb-2">Address line 2 (apartment, unit, etc.)</p>
              <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="addressLine" id="dont_include_address" checked>
                <label class="form-check-label" for="dont_include_address">
                  Don't include name
                </label>
              </div>
              <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="addressLine" id="optional_address">
                <label class="form-check-label" for="optional_address">
                  Optional
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="addressLine" id="required_address">
                <label class="form-check-label" for="required_address">
                  Required
                </label>
              </div>
            </div>
            <div class="mb-4">
              <p class="mb-2">Shipping address phone number</p>
              <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="shippingAddress" id="dont_include_ship_address" checked>
                <label class="form-check-label" for="dont_include_ship_address">
                  Don't include name
                </label>
              </div>
              <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="shippingAddress" id="optional_ship_address">
                <label class="form-check-label" for="optional_ship_address">
                  Optional
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="shippingAddress" id="required_ship_address">
                <label class="form-check-label" for="required_ship_address">
                  Required
                </label>
              </div>
            </div>

          </div>
        </div>

        <div class="d-flex justify-content-end gap-3">
          <button type="reset" class="btn btn-label-secondary">Discard</button>
          <a class="btn btn-primary" href="{{url('/app/ecommerce/settings/shipping')}}">Save</a>
        </div>

      </div>

    </div>
  </div>
  <!-- /Options-->
</div>

@endsection
