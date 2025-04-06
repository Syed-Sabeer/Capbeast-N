@extends('layouts/layoutMaster')

@section('title', 'Account settings - Pages')

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Account Settings / </span> Connections
</h4>

<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-pills flex-column flex-md-row mb-4">
      <li class="nav-item"><a class="nav-link" href="{{url('pages/account-settings-account')}}"><i class="ti-xs ti ti-users me-1"></i> Account</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('pages/account-settings-security')}}"><i class="ti-xs ti ti-lock me-1"></i> Security</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('pages/account-settings-billing')}}"><i class="ti-xs ti ti-file-description me-1"></i> Billing & Plans</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('pages/account-settings-notifications')}}"><i class="ti-xs ti ti-bell me-1"></i> Notifications</a></li>
      <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="ti-xs ti ti-link me-1"></i> Connections</a></li>
    </ul>
    <div class="row">
      <div class="col-md-6 col-12 mb-md-0 mb-4">
        <div class="card">
          <h5 class="card-header pb-1">Connected Accounts</h5>
          <div class="card-body">
            <p class="mb-4">Display content from your connected accounts on your site</p>
            <!-- Connections -->
            <div class="d-flex mb-3">
              <div class="flex-shrink-0">
                <img src="{{asset('assets/img/icons/brands/google.png')}}" alt="google" class="me-3" height="30">
              </div>
              <div class="flex-grow-1 row">
                <div class="col-9">
                  <h6 class="mb-0">Google</h6>
                  <small class="text-muted">Calendar and contacts</small>
                </div>
                <div class="col-3 d-flex align-items-center justify-content-end mt-sm-0 mt-2">
                  <div class="form-check form-switch">
                    <input class="form-check-input float-end" type="checkbox" checked>
                  </div>
                </div>
              </div>
            </div>
            <div class="d-flex mb-3">
              <div class="flex-shrink-0">
                <img src="{{asset('assets/img/icons/brands/slack.png')}}" alt="slack" class="me-3" height="30">
              </div>
              <div class="flex-grow-1 row">
                <div class="col-9">
                  <h6 class="mb-0">Slack</h6>
                  <small class="text-muted">Communication</small>
                </div>
                <div class="col-3 d-flex align-items-center justify-content-end mt-sm-0 mt-2">
                  <div class="form-check form-switch">
                    <input class="form-check-input float-end" type="checkbox">
                  </div>
                </div>
              </div>
            </div>
            <div class="d-flex mb-3">
              <div class="flex-shrink-0">
                <img src="{{asset('assets/img/icons/brands/github.png')}}" alt="github" class="me-3" height="30">
              </div>
              <div class="flex-grow-1 row">
                <div class="col-9">
                  <h6 class="mb-0">Github</h6>
                  <small class="text-muted">Manage your Git repositories</small>
                </div>
                <div class="col-3 d-flex align-items-center justify-content-end mt-sm-0 mt-2">
                  <div class="form-check form-switch">
                    <input class="form-check-input float-end" type="checkbox" checked>
                  </div>
                </div>
              </div>
            </div>
            <div class="d-flex mb-3">
              <div class="flex-shrink-0">
                <img src="{{asset('assets/img/icons/brands/mailchimp.png')}}" alt="mailchimp" class="me-3" height="30">
              </div>
              <div class="flex-grow-1 row">
                <div class="col-9">
                  <h6 class="mb-0">Mailchimp</h6>
                  <small class="text-muted">Email marketing service</small>
                </div>
                <div class="col-3 d-flex align-items-center justify-content-end mt-sm-0 mt-2">
                  <div class="form-check form-switch">
                    <input class="form-check-input float-end" type="checkbox" checked>
                  </div>
                </div>
              </div>
            </div>
            <div class="d-flex">
              <div class="flex-shrink-0">
                <img src="{{asset('assets/img/icons/brands/asana.png')}}" alt="asana" class="me-3" height="30">
              </div>
              <div class="flex-grow-1 row">
                <div class="col-9">
                  <h6 class="mb-0">Asana</h6>
                  <small class="text-muted">Communication</small>
                </div>
                <div class="col-3 d-flex align-items-center justify-content-end mt-sm-0 mt-2">
                  <div class="form-check form-switch">
                    <input class="form-check-input float-end" type="checkbox">
                  </div>
                </div>
              </div>
            </div>
            <!-- /Connections -->
          </div>
        </div>
      </div>
      <div class="col-md-6 col-12">
        <div class="card">
          <h5 class="card-header pb-1">Social Accounts</h5>
          <div class="card-body">
            <p>Display content from social accounts on your site</p>
            <!-- Social Accounts -->
            <div class="d-flex mb-3">
              <div class="flex-shrink-0">
                <img src="{{asset('assets/img/icons/brands/facebook.png')}}" alt="facebook" class="me-3" height="38">
              </div>
              <div class="flex-grow-1 row">
                <div class="col-7">
                  <h6 class="mb-0">Facebook</h6>
                  <small class="text-muted">Not Connected</small>
                </div>
                <div class="col-5 text-end mt-sm-0 mt-2">
                  <button class="btn btn-label-secondary btn-icon"><i class="ti ti-link ti-sm"></i></button>
                </div>
              </div>
            </div>
            <div class="d-flex mb-3">
              <div class="flex-shrink-0">
                <img src="{{asset('assets/img/icons/brands/twitter.png')}}" alt="twitter" class="me-3" height="38">
              </div>
              <div class="flex-grow-1 row">
                <div class="col-7">
                  <h6 class="mb-0">Twitter</h6>
                  <a href="{{config('variables.twitterUrl')}}" target="_blank">{{ (!empty(config('variables.creatorName')) ? config('variables.creatorName') : '') }}</a>
                </div>
                <div class="col-5 text-end mt-sm-0 mt-2">
                  <button class="btn btn-label-danger btn-icon"><i class="ti ti-trash ti-sm"></i></button>
                </div>
              </div>
            </div>
            <div class="d-flex mb-3">
              <div class="flex-shrink-0">
                <img src="{{asset('assets/img/icons/brands/instagram.png')}}" alt="instagram" class="me-3" height="38">
              </div>
              <div class="flex-grow-1 row">
                <div class="col-7">
                  <h6 class="mb-0">instagram</h6>
                  <a href="{{config('variables.instagramUrl')}}" target="_blank">{{ (!empty(config('variables.creatorName')) ? config('variables.creatorName') : '') }}</a>
                </div>
                <div class="col-5 text-end mt-sm-0 mt-2">
                  <button class="btn btn-label-danger btn-icon"><i class="ti ti-trash ti-sm"></i></button>
                </div>
              </div>
            </div>
            <div class="d-flex mb-3">
              <div class="flex-shrink-0">
                <img src="{{asset('assets/img/icons/brands/dribbble.png')}}" alt="dribbble" class="me-3" height="38">
              </div>
              <div class="flex-grow-1 row">
                <div class="col-7">
                  <h6 class="mb-0">Dribbble</h6>
                  <small class="text-muted">Not Connected</small>
                </div>
                <div class="col-5 text-end mt-sm-0 mt-2">
                  <button class="btn btn-label-secondary btn-icon"><i class="ti ti-link ti-sm"></i></button>
                </div>
              </div>
            </div>
            <div class="d-flex">
              <div class="flex-shrink-0">
                <img src="{{asset('assets/img/icons/brands/behance.png')}}" alt="behance" class="me-3" height="38">
              </div>
              <div class="flex-grow-1 row">
                <div class="col-7">
                  <h6 class="mb-0">Behance</h6>
                  <small class="text-muted">Not Connected</small>
                </div>
                <div class="col-5 text-end mt-sm-0 mt-2">
                  <button class="btn btn-label-secondary btn-icon"><i class="ti ti-link ti-sm"></i></button>
                </div>
              </div>
            </div>
            <!-- /Social Accounts -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection