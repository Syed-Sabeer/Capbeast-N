@extends('layouts/layoutMaster')

@section('title', 'User View - Pages')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/modal-edit-user.js')}}"></script>
<script src="{{asset('assets/js/app-user-view.js')}}"></script>
@endsection

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">User / View /</span> Connections
</h4>
<div class="row">
  <!-- User Sidebar -->
  <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
    <!-- User Card -->
    <div class="card mb-4">
      <div class="card-body">
        <div class="user-avatar-section">
          <div class=" d-flex align-items-center flex-column">
            <img class="img-fluid rounded mb-3 pt-1 mt-4" src="{{ asset('assets/img/avatars/15.png') }}" height="100" width="100" alt="User avatar" />
            <div class="user-info text-center">
              <h4 class="mb-2">Violet Mendoza</h4>
              <span class="badge bg-label-secondary mt-1">Author</span>
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-around flex-wrap mt-3 pt-3 pb-4 border-bottom">
          <div class="d-flex align-items-start me-4 mt-3 gap-2">
            <span class="badge bg-label-primary p-2 rounded"><i class='ti ti-checkbox ti-sm'></i></span>
            <div>
              <p class="mb-0 fw-medium">1.23k</p>
              <small>Tasks Done</small>
            </div>
          </div>
          <div class="d-flex align-items-start mt-3 gap-2">
            <span class="badge bg-label-primary p-2 rounded"><i class='ti ti-briefcase ti-sm'></i></span>
            <div>
              <p class="mb-0 fw-medium">568</p>
              <small>Projects Done</small>
            </div>
          </div>
        </div>
        <h5 class="mt-4 small text-uppercase text-muted">Details</h5>
        <div class="info-container">
          <ul class="list-unstyled">
            <li class="mb-2">
              <span class="fw-medium me-1">Username:</span>
              <span>violet.dev</span>
            </li>
            <li class="mb-2 pt-1">
              <span class="fw-medium me-1">Email:</span>
              <span>vafgot@vultukir.org</span>
            </li>
            <li class="mb-2 pt-1">
              <span class="fw-medium me-1">Status:</span>
              <span class="badge bg-label-success">Active</span>
            </li>
            <li class="mb-2 pt-1">
              <span class="fw-medium me-1">Role:</span>
              <span>Author</span>
            </li>
            <li class="mb-2 pt-1">
              <span class="fw-medium me-1">Tax id:</span>
              <span>Tax-8965</span>
            </li>
            <li class="mb-2 pt-1">
              <span class="fw-medium me-1">Contact:</span>
              <span>(123) 456-7890</span>
            </li>
            <li class="mb-2 pt-1">
              <span class="fw-medium me-1">Languages:</span>
              <span>French</span>
            </li>
            <li class="pt-1">
              <span class="fw-medium me-1">Country:</span>
              <span>England</span>
            </li>
          </ul>
          <div class="d-flex justify-content-center">
            <a href="javascript:;" class="btn btn-primary me-3" data-bs-target="#editUser" data-bs-toggle="modal">Edit</a>
            <a href="javascript:;" class="btn btn-label-danger suspend-user">Suspended</a>
          </div>
        </div>
      </div>
    </div>
    <!-- /User Card -->
    <!-- Plan Card -->
    <div class="card mb-4">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-start">
          <span class="badge bg-label-primary">Standard</span>
          <div class="d-flex justify-content-center">
            <sup class="h6 pricing-currency mt-3 mb-0 me-1 text-primary fw-normal">$</sup>
            <h1 class="mb-0 text-primary">99</h1>
            <sub class="h6 pricing-duration mt-auto mb-2 fw-normal text-muted">/month</sub>
          </div>
        </div>
        <ul class="ps-3 g-2 my-3">
          <li class="mb-2">10 Users</li>
          <li class="mb-2">Up to 10 GB storage</li>
          <li>Basic Support</li>
        </ul>
        <div class="d-flex justify-content-between align-items-center mb-1 fw-medium text-heading">
          <span>Days</span>
          <span>65% Completed</span>
        </div>
        <div class="progress mb-1" style="height: 8px;">
          <div class="progress-bar" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <span>4 days remaining</span>
        <div class="d-grid w-100 mt-4">
          <button class="btn btn-primary" data-bs-target="#upgradePlanModal" data-bs-toggle="modal">Upgrade Plan</button>
        </div>
      </div>
    </div>
    <!-- /Plan Card -->
  </div>
  <!--/ User Sidebar -->


  <!-- User Content -->
  <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
    <!-- User Pills -->
    <ul class="nav nav-pills flex-column flex-md-row mb-4">
      <li class="nav-item"><a class="nav-link" href="{{url('app/user/view/account')}}"><i class="ti ti-user-check me-1 ti-xs"></i>Account</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('app/user/view/security')}}"><i class="ti ti-lock me-1 ti-xs"></i>Security</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('app/user/view/billing')}}"><i class="ti ti-currency-dollar me-1 ti-xs"></i>Billing & Plans</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('app/user/view/notifications')}}"><i class="ti ti-bell me-1 ti-xs"></i>Notifications</a></li>
      <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="ti ti-link me-1 ti-xs"></i>Connections</a></li>
    </ul>
    <!--/ User Pills -->
    <!-- Connected Accounts -->
    <div class="card mb-4">
      <h5 class="card-header pb-1">Connected Accounts</h5>
      <div class="card-body">
        <p class="mb-4">Display content from your connected accounts on your site</p>
        <div class="d-flex mb-3">
          <div class="flex-shrink-0">
            <img src="{{ asset('assets/img/icons/brands/google.png')}}" alt="google" class="me-3" height="38">
          </div>
          <div class="flex-grow-1 row">
            <div class="col-9 mb-sm-0 mb-2">
              <h6 class="mb-0">Google</h6>
              <small class="text-muted">Calendar and contacts</small>
            </div>
            <div class="col-3 d-flex align-items-center justify-content-end">
              <div class="form-check form-switch">
                <input class="form-check-input float-end" type="checkbox" checked>
              </div>
            </div>
          </div>
        </div>
        <div class="d-flex mb-3">
          <div class="flex-shrink-0">
            <img src="{{ asset('assets/img/icons/brands/slack.png')}}" alt="slack" class="me-3" height="38">
          </div>
          <div class="flex-grow-1 row">
            <div class="col-9 mb-sm-0 mb-2">
              <h6 class="mb-0">Slack</h6>
              <small class="text-muted">Communication</small>
            </div>
            <div class="col-3 d-flex align-items-center justify-content-end">
              <div class="form-check form-switch">
                <input class="form-check-input float-end" type="checkbox">
              </div>
            </div>
          </div>
        </div>
        <div class="d-flex mb-3">
          <div class="flex-shrink-0">
            <img src="{{ asset('assets/img/icons/brands/github.png')}}" alt="github" class="me-3" height="38">
          </div>
          <div class="flex-grow-1 row">
            <div class="col-9 mb-sm-0 mb-2">
              <h6 class="mb-0">Github</h6>
              <small class="text-muted">Manage your Git repositories</small>
            </div>
            <div class="col-3 d-flex align-items-center justify-content-end">
              <div class="form-check form-switch">
                <input class="form-check-input float-end" type="checkbox" checked>
              </div>
            </div>
          </div>
        </div>
        <div class="d-flex mb-3">
          <div class="flex-shrink-0">
            <img src="{{ asset('assets/img/icons/brands/mailchimp.png')}}" alt="mailchimp" class="me-3" height="38">
          </div>
          <div class="flex-grow-1 row">
            <div class="col-9 mb-sm-0 mb-2">
              <h6 class="mb-0">Mailchimp</h6>
              <small class="text-muted">Email marketing service</small>
            </div>
            <div class="col-3 d-flex align-items-center justify-content-end">
              <div class="form-check form-switch">
                <input class="form-check-input float-end" type="checkbox" checked>
              </div>
            </div>
          </div>
        </div>
        <div class="d-flex">
          <div class="flex-shrink-0">
            <img src="{{ asset('assets/img/icons/brands/asana.png')}}" alt="asana" class="me-3" height="38">
          </div>
          <div class="flex-grow-1 row">
            <div class="col-9 mb-sm-0 mb-2">
              <h6 class="mb-0">Asana</h6>
              <small class="text-muted">Communication</small>
            </div>
            <div class="col-3 d-flex align-items-center justify-content-end">
              <div class="form-check form-switch">
                <input class="form-check-input float-end" type="checkbox">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /Connected Accounts -->

    <!-- Social Accounts -->
    <div class="card mb-4">
      <h5 class="card-header pb-1">Social Accounts</h5>
      <div class="card-body">
        <p class="mb-4">Display content from social accounts on your site</p>
        <div class="d-flex mb-3">
          <div class="flex-shrink-0">
            <img src="{{ asset('assets/img/icons/brands/facebook.png')}}" alt="facebook" class="me-3" height="38">
          </div>
          <div class="flex-grow-1 row">
            <div class="col-7 mb-sm-0 mb-2">
              <h6 class="mb-0">Facebook</h6>
              <small class="text-muted">Not Connected</small>
            </div>
            <div class="col-5 text-end">
              <button class="btn btn-label-secondary btn-icon"><i class="ti ti-link ti-sm"></i></button>
            </div>
          </div>
        </div>
        <div class="d-flex mb-3">
          <div class="flex-shrink-0">
            <img src="{{ asset('assets/img/icons/brands/twitter.png')}}" alt="twitter" class="me-3" height="38">
          </div>
          <div class="flex-grow-1 row">
            <div class="col-7 mb-sm-0 mb-2">
              <h6 class="mb-0">Twitter</h6>
              <a href="{{config('variables.twitterUrl')}}" target="_blank">{{ (!empty(config('variables.creatorName')) ? config('variables.creatorName') : '') }}</a>
            </div>
            <div class="col-5 text-end">
              <button class="btn btn-label-danger btn-icon"><i class="ti ti-trash ti-sm"></i></button>
            </div>
          </div>
        </div>
        <div class="d-flex mb-3">
          <div class="flex-shrink-0">
            <img src="{{ asset('assets/img/icons/brands/instagram.png')}}" alt="instagram" class="me-3" height="38">
          </div>
          <div class="flex-grow-1 row">
            <div class="col-7 mb-sm-0 mb-2">
              <h6 class="mb-0">instagram</h6>
              <a href="{{config('variables.instagramUrl')}}" target="_blank">{{ (!empty(config('variables.creatorName')) ? config('variables.creatorName') : '') }}</a>
            </div>
            <div class="col-5 text-end">
              <button class="btn btn-label-danger btn-icon"><i class="ti ti-trash ti-sm"></i></button>
            </div>
          </div>
        </div>
        <div class="d-flex mb-3">
          <div class="flex-shrink-0">
            <img src="{{ asset('assets/img/icons/brands/dribbble.png')}}" alt="dribbble" class="me-3" height="38">
          </div>
          <div class="flex-grow-1 row">
            <div class="col-7 mb-sm-0 mb-2">
              <h6 class="mb-0">Dribbble</h6>
              <small class="text-muted">Not Connected</small>
            </div>
            <div class="col-5 text-end">
              <button class="btn btn-label-secondary btn-icon"><i class="ti ti-link ti-sm"></i></button>
            </div>
          </div>
        </div>
        <div class="d-flex">
          <div class="flex-shrink-0">
            <img src="{{ asset('assets/img/icons/brands/behance.png')}}" alt="behance" class="me-3" height="38">
          </div>
          <div class="flex-grow-1 row">
            <div class="col-7 mb-sm-0 mb-2">
              <h6 class="mb-0">Behance</h6>
              <small class="text-muted">Not Connected</small>
            </div>
            <div class="col-5 text-end">
              <button class="btn btn-label-secondary btn-icon"><i class="ti ti-link ti-sm"></i></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /Social Accounts -->
</div>

<!-- Modals -->
@include('_partials/_modals/modal-edit-user')
@include('_partials/_modals/modal-upgrade-plan')
<!-- /Modals -->
@endsection