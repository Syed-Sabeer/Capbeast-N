@extends('layouts/layoutMaster')

@section('title', 'eCommerce Referrals - Apps')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/app-ecommerce-referral.js')}}"></script>
@endsection

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">eCommerce / </span> Referrals
</h4>

<div class="row mb-4 g-4">
  <div class="col-sm-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-center justify-content-between">
          <div class="content-left">
            <h4 class="mb-0">$24,983</h4>
            <small>Total Earning</small>
          </div>
          <span class="badge bg-label-primary rounded-circle p-2">
            <i class="ti ti-currency-dollar ti-md"></i>
          </span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-center justify-content-between">
          <div class="content-left">
            <h4 class="mb-0">$8,647</h4>
            <small>Unpaid Earning</small>
          </div>
          <span class="badge bg-label-success rounded-circle p-2">
            <i class="ti ti-gift ti-md"></i>
          </span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-center justify-content-between">
          <div class="content-left">
            <h4 class="mb-0">2,367</h4>
            <small>Signups</small>
          </div>
          <span class="badge bg-label-danger rounded-circle p-2">
            <i class="ti ti-user ti-md"></i>
          </span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-center justify-content-between">
          <div class="content-left">
            <h4 class="mb-0">4.5%</h4>
            <small>Conversion Rate</small>
          </div>
          <span class="badge bg-label-info rounded-circle p-2">
            <i class="ti ti-infinity ti-md"></i>
          </span>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row mb-4 g-4">
  <div class="col-lg-7">
    <div class="card h-100">
      <div class="card-body">
        <h5 class="mb-2">How to use</h5>
        <p class="mb-4">Integrate your referral code in 3 easy steps.</p>
        <div class="d-flex flex-column flex-sm-row justify-content-between text-center gap-3">
          <div class="d-flex flex-column align-items-center">
            <span><i class='ti ti-rocket text-primary ti-xl p-3 border border-1 border-primary rounded-circle border-dashed mb-0'></i></span>
            <small class="my-2 w-75">Create & validate your referral link and get</small>
            <h5 class="text-primary mb-0">$50</h5>
          </div>
          <div class="d-flex flex-column align-items-center">
            <span><i class='ti ti-id text-primary ti-xl p-3 border border-1 border-primary rounded-circle border-dashed mb-0'></i></span>
            <small class="my-2 w-75">For every new signup you get</small>
            <h5 class="text-primary mb-0">10%</h5>
          </div>
          <div class="d-flex flex-column align-items-center">
            <span><i class='ti ti-send text-primary ti-xl p-3 border border-1 border-primary rounded-circle border-dashed mb-0'></i></span>
            <small class="my-2 w-75">Get other friends to generate link and get</small>
            <h5 class="text-primary mb-0">$100</h5>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-5">
    <div class="card h-100">
      <div class="card-body">
        <form class="referral-form" onsubmit="return false">
          <div class="mb-4 mt-1">
            <h5>Invite your friends</h5>
            <div class="d-flex flex-wrap gap-3 align-items-end">
              <div class="w-75">
                <label class="form-label mb-0" for="referralEmail">Enter friend’s email address and invite them</label>
                <input type="text" id="referralEmail" name="referralEmail" class="form-control w-100" placeholder="Email address" />
              </div>
              <div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </div>
          <div>
            <h5>Share the referral link</h5>
            <div class="d-flex flex-wrap gap-3 align-items-end">
              <div class="w-75">
                <label class="form-label mb-0" for="referralLink">Share referral link in social media</label>
                <input type="text" id="referralLink" name="referralLink" class="form-control w-100 h-px-40" placeholder="pixinvent.com/?ref=6479" />
              </div>
              <div>
                <button type="button" class="btn btn-facebook btn-icon me-2"><i class='ti ti-brand-facebook text-white ti-sm'></i></button>
                <button type="button" class="btn btn-twitter btn-icon"><i class='ti ti-brand-twitter text-white ti-sm'></i></button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Referral List Table -->
<div class="card">
  <div class="card-datatable table-responsive">
    <table class="datatables-referral table border-top">
      <thead>
        <tr>
          <th></th>
          <th></th>
          <th>Users</th>
          <th class="text-nowrap">Referred ID</th>
          <th>Status</th>
          <th>Value</th>
          <th class="text-nowrap">Earnings</th>
        </tr>
      </thead>
    </table>
  </div>

</div>

@endsection
