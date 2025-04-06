@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Pricing - Front Pages')

@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/front-page-pricing.css')}}" />
@endsection

@section('page-script')
<script src="{{asset('assets/js/front-page-pricing.js')}}"></script>
@endsection


@section('content')
<!-- Pricing Plans -->
<section class="section-py first-section-pt">
  <div class="container">
    <h2 class="text-center mb-2">Pricing Plans</h2>
    <p class="text-center"> Get started with us - it's perfect for individuals and teams. Choose a subscription plan that meets your needs. </p>
    <div class="d-flex align-items-center justify-content-center flex-wrap gap-2 pb-5 pt-3 mb-0 mb-md-4">
      <label class="switch switch-primary ms-3 ms-sm-0 mt-2">
        <span class="switch-label">Monthly</span>
        <input type="checkbox" class="switch-input price-duration-toggler" checked />
        <span class="switch-toggle-slider">
          <span class="switch-on"></span>
          <span class="switch-off"></span>
        </span>
        <span class="switch-label">Annual</span>
      </label>
      <div class="mt-n5 ms-n5 d-none d-sm-block">
        <i class="ti ti-corner-left-down ti-sm text-muted me-1 scaleX-n1-rtl"></i>
        <span class="badge badge-sm bg-label-primary">Save up to 10%</span>
      </div>
    </div>

    <div class="row mx-0 gy-3 px-lg-5">
      <!-- Basic -->
      <div class="col-lg mb-md-0 mb-4">
        <div class="card border rounded shadow-none">
          <div class="card-body">
            <div class="my-3 pt-2 text-center">
              <img src="{{asset('assets/img/illustrations/page-pricing-basic.png')}}" alt="Basic Image" height="140">
            </div>
            <h3 class="card-title text-center text-capitalize mb-1">Basic</h3>
            <p class="text-center">A simple start for everyone</p>
            <div class="text-center">
              <div class="d-flex justify-content-center">
                <sup class="h6 pricing-currency mt-3 mb-0 me-1 text-primary">$</sup>
                <h1 class="display-4 mb-0 text-primary">0</h1>
                <sub class="h6 pricing-duration mt-auto mb-2 text-muted fw-normal">/month</sub>
              </div>
              <small class="price-yearly price-yearly-toggle text-muted">$ 0 / year</small>
            </div>

            <ul class="ps-0 my-4 pt-2 circle-bullets">
              <li class="mb-2 d-flex align-items-center"><i class="ti ti-point ti-lg"></i>100 responses a month</li>
              <li class="mb-2 d-flex align-items-center"><i class="ti ti-point ti-lg"></i>Unlimited forms and surveys</li>
              <li class="mb-2 d-flex align-items-center"><i class="ti ti-point ti-lg"></i>Unlimited fields</li>
              <li class="mb-2 d-flex align-items-center"><i class="ti ti-point ti-lg"></i>Basic form creation tools</li>
              <li class="mb-0 d-flex align-items-center"><i class="ti ti-point ti-lg"></i>Up to 2 subdomains</li>
            </ul>
            <a href="{{ url('front-pages/payment') }}" class="btn btn-label-success d-grid w-100">Your Current Plan</a>
          </div>
        </div>
      </div>

      <!-- Pro -->
      <div class="col-lg mb-md-0 mb-4">
        <div class="card border-primary border shadow-none">
          <div class="card-body position-relative">
            <div class="position-absolute end-0 me-4 top-0 mt-4">
              <span class="badge bg-label-primary">Popular</span>
            </div>
            <div class="my-3 pt-2 text-center">
              <img src="{{asset('assets/img/illustrations/page-pricing-standard.png')}}" alt="Standard Image" height="140">
            </div>
            <h3 class="card-title text-center text-capitalize mb-1">Pro</h3>
            <p class="text-center">For small to medium businesses</p>
            <div class="text-center">
              <div class="d-flex justify-content-center">
                <sup class="h6 pricing-currency mt-3 mb-0 me-1 text-primary">$</sup>
                <h1 class="price-toggle price-yearly display-4 text-primary mb-0">7</h1>
                <h1 class="price-toggle price-monthly display-4 text-primary mb-0 d-none">9</h1>
                <sub class="h6 text-muted pricing-duration mt-auto mb-2 fw-normal">/month</sub>
              </div>
              <small class="price-yearly price-yearly-toggle text-muted">$ 90 / year</small>
            </div>

            <ul class="ps-0 my-4 pt-2 circle-bullets">
              <li class="mb-2 d-flex align-items-center"><i class="ti ti-point ti-lg"></i>Up to 5 users</li>
              <li class="mb-2 d-flex align-items-center"><i class="ti ti-point ti-lg"></i>120+ components</li>
              <li class="mb-2 d-flex align-items-center"><i class="ti ti-point ti-lg"></i>Basic support on Github</li>
              <li class="mb-2 d-flex align-items-center"><i class="ti ti-point ti-lg"></i>Monthly updates</li>
              <li class="mb-0 d-flex align-items-center"><i class="ti ti-point ti-lg"></i>Integrations</li>
            </ul>

            <a href="{{ url('front-pages/payment') }}" class="btn btn-primary d-grid w-100">Upgrade</a>
          </div>
        </div>
      </div>

      <!-- Enterprise -->
      <div class="col-lg">
        <div class="card border rounded shadow-none">
          <div class="card-body">

            <div class="my-3 pt-2 text-center">
              <img src="{{asset('assets/img/illustrations/page-pricing-enterprise.png')}}" alt="Enterprise Image" height="140">
            </div>
            <h3 class="card-title text-center text-capitalize mb-1">Enterprise</h3>
            <p class="text-center">Solution for big organizations</p>

            <div class="text-center">
              <div class="d-flex justify-content-center">
                <sup class="h6 text-primary pricing-currency mt-3 mb-0 me-1">$</sup>
                <h1 class="price-toggle price-yearly display-4 text-primary mb-0">16</h1>
                <h1 class="price-toggle price-monthly display-4 text-primary mb-0 d-none">19</h1>
                <sub class="h6 pricing-duration mt-auto mb-2 fw-normal text-muted">/month</sub>
              </div>
              <small class="price-yearly price-yearly-toggle text-muted">$ 190 / year</small>
            </div>

            <ul class="ps-0 my-4 pt-2 circle-bullets">
              <li class="mb-2 d-flex align-items-center"><i class="ti ti-point ti-lg"></i>Up to 10 users</li>
              <li class="mb-2 d-flex align-items-center"><i class="ti ti-point ti-lg"></i>150+ components</li>
              <li class="mb-2 d-flex align-items-center"><i class="ti ti-point ti-lg"></i>Basic support on Github</li>
              <li class="mb-2 d-flex align-items-center"><i class="ti ti-point ti-lg"></i>Monthly updates</li>
              <li class="mb-0 d-flex align-items-center"><i class="ti ti-point ti-lg"></i>Speedy build tooling</li>
            </ul>

            <a href="{{ url('front-pages/payment') }}" class="btn btn-label-primary d-grid w-100">Upgrade</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/ Pricing Plans -->
<!-- Pricing Free Trial -->
<section class="pricing-free-trial bg-label-primary">
  <div class="container">
    <div class="position-relative">
      <div class="d-flex justify-content-between flex-column-reverse flex-lg-row align-items-center py-4 px-5">
        <div class="text-center text-lg-start mt-2 ms-3">
          <h3 class="text-primary mb-1">Still not convinced? Start with a 14-day FREE trial!</h3>
          <p class="text-body mb-1">You will get full access to with all the features for 14 days.</p>
          <a href="{{ url('front-pages/payment') }}" class="btn btn-primary mt-4 mb-2">Start 14-day FREE trial</a>
        </div>
        <!-- image -->
        <div class="text-center">
          <img src="{{asset('assets/img/illustrations/girl-with-laptop.png')}}" class="img-fluid me-lg-5 pe-lg-1 mb-3 mb-lg-0" alt="Api Key Image" width="202">
        </div>
      </div>
    </div>
  </div>
</section>
<!--/ Pricing Free Trial -->
<!-- Plans Comparison -->
<section class="section-py pricing-plans-comparison">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center mb-4">
        <h2 class="mb-2">Pick a plan that works best for you</h2>
        <p class="mb-1">Stay cool, we have a 48-hour money back guarantee!</p>
      </div>
    </div>
    <div class="row mx-4">
      <div class="col-12">
        <div class="table-responsive border rounded">
          <table class="table table-striped text-center mb-0">
            <thead>
              <tr>
                <th scope="col">
                  <p class="mb-1">Features</p>
                  <small class="text-muted fw-normal text-capitalize">Native front features</small>
                </th>
                <th scope="col">
                  <p class="mb-1">Starter</p>
                  <small class="text-muted fw-normal text-capitalize">Free</small>
                </th>
                <th scope="col">
                  <p class="mb-1 position-relative">Pro
                    <span class="badge badge-center rounded-pill bg-primary position-absolute mt-n2 ms-1"><i class="ti ti-star"></i></span>
                  </p>
                  <small class="text-muted fw-normal text-capitalize">$7.5/month</small>
                </th>
                <th scope="col">
                  <p class="mb-1">Enterprise</p>
                  <small class="text-muted fw-normal text-capitalize">$16/month</small>
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>14-days free trial</td>
                <td><span class="badge badge-center rounded-pill w-px-20 h-px-20 bg-label-primary">
                    <i class="ti ti-check"></i>
                  </span>
                </td>
                <td><span class="badge badge-center rounded-pill w-px-20 h-px-20 bg-label-primary">
                    <i class="ti ti-check"></i>
                  </span>
                </td>
                <td><span class="badge badge-center rounded-pill w-px-20 h-px-20 bg-label-primary">
                    <i class="ti ti-check"></i>
                  </span>
                </td>
              </tr>
              <tr>
                <td>No user limit</td>
                <td><span class="badge badge-center rounded-pill w-px-20 h-px-20 bg-label-secondary">
                    <i class="ti ti-x"></i>
                  </span>
                </td>
                <td><span class="badge badge-center rounded-pill w-px-20 h-px-20 bg-label-secondary">
                    <i class="ti ti-x"></i>
                  </span>
                </td>
                <td><span class="badge badge-center rounded-pill w-px-20 h-px-20 bg-label-primary">
                    <i class="ti ti-check"></i>
                  </span>
                </td>
              </tr>
              <tr>
                <td>Product Support</td>
                <td><span class="badge badge-center rounded-pill w-px-20 h-px-20 bg-label-secondary">
                    <i class="ti ti-x"></i>
                  </span>
                </td>
                <td><span class="badge badge-center rounded-pill w-px-20 h-px-20 bg-label-primary">
                    <i class="ti ti-check"></i>
                  </span>
                </td>
                <td><span class="badge badge-center rounded-pill w-px-20 h-px-20 bg-label-primary">
                    <i class="ti ti-check"></i>
                  </span>
                </td>
              </tr>
              <tr>
                <td>Email Support</td>
                <td><span class="badge badge-center rounded-pill w-px-20 h-px-20 bg-label-secondary">
                    <i class="ti ti-x"></i>
                  </span>
                </td>
                <td>
                  <span class="badge bg-label-primary badge-sm text-uppercase">Add-on Available</span>
                </td>
                <td><span class="badge badge-center rounded-pill w-px-20 h-px-20 bg-label-primary">
                    <i class="ti ti-check"></i>
                  </span>
                </td>
              </tr>
              <tr>
                <td>Integrations</td>
                <td><span class="badge badge-center rounded-pill w-px-20 h-px-20 bg-label-secondary">
                    <i class="ti ti-x"></i>
                  </span>
                </td>
                <td><span class="badge badge-center rounded-pill w-px-20 h-px-20 bg-label-primary">
                    <i class="ti ti-check"></i>
                  </span>
                </td>
                <td><span class="badge badge-center rounded-pill w-px-20 h-px-20 bg-label-primary">
                    <i class="ti ti-check"></i>
                  </span>
                </td>
              </tr>
              <tr>
                <td>Removal of Front branding</td>
                <td><span class="badge badge-center rounded-pill w-px-20 h-px-20 bg-label-secondary">
                    <i class="ti ti-x"></i>
                  </span>
                </td>
                <td>
                  <span class="badge bg-label-primary badge-sm text-uppercase">Add-on Available</span>
                </td>
                <td><span class="badge badge-center rounded-pill w-px-20 h-px-20 bg-label-primary">
                    <i class="ti ti-check"></i>
                  </span>
                </td>
              </tr>
              <tr>
                <td>Active maintenance & support</td>
                <td><span class="badge badge-center rounded-pill w-px-20 h-px-20 bg-label-secondary">
                    <i class="ti ti-x"></i>
                  </span>
                </td>
                <td><span class="badge badge-center rounded-pill w-px-20 h-px-20 bg-label-secondary">
                    <i class="ti ti-x"></i>
                  </span>
                </td>
                <td><span class="badge badge-center rounded-pill w-px-20 h-px-20 bg-label-primary">
                    <i class="ti ti-check"></i>
                  </span>
                </td>
              </tr>
              <tr>
                <td>Data storage for 365 days</td>
                <td><span class="badge badge-center rounded-pill w-px-20 h-px-20 bg-label-secondary">
                    <i class="ti ti-x"></i>
                  </span>
                </td>
                <td><span class="badge badge-center rounded-pill w-px-20 h-px-20 bg-label-secondary">
                    <i class="ti ti-x"></i>
                  </span>
                </td>
                <td><span class="badge badge-center rounded-pill w-px-20 h-px-20 bg-label-primary">
                    <i class="ti ti-check"></i>
                  </span>
                </td>
              </tr>
              <tr>
                <td></td>
                <td>
                  <a href="{{ url('front-pages/payment') }}" class="btn text-nowrap btn-label-primary">Choose Plan</a>
                </td>
                <td>
                  <a href="{{ url('front-pages/payment') }}" class="btn text-nowrap btn-primary">Choose Plan</a>
                </td>
                <td>
                  <a href="{{ url('front-pages/payment') }}" class="btn text-nowrap btn-label-primary">Choose Plan</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/ Plans Comparison -->
<!-- FAQS -->
<section class="section-py pricing-faqs rounded-bottom bg-body">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="mb-2">FAQs</h2>
      <p>Let us help answer the most common questions you might have.</p>
    </div>
    <div id="faq" class="accordion accordion-without-arrow">
      <div class="card accordion-item">
        <h6 class="accordion-header">
          <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq-2" aria-expanded="false" aria-controls="faq-2">
            How do you process payments?
          </button>
        </h6>
        <div id="faq-2" class="accordion-collapse collapse" data-bs-parent="#faq">
          <div class="accordion-body">
            We accept Visa®, MasterCard®, American Express®, and PayPal®.
            So you can be confident that your credit card information will be kept
            safe and secure.
          </div>
        </div>
      </div>

      <div class="card accordion-item">
        <h6 class="accordion-header">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" aria-expanded="true" data-bs-target="#faq-1" aria-controls="faq-1">
            What counts towards the 100 responses limit?
          </button>
        </h6>

        <div id="faq-1" class="accordion-collapse collapse show" data-bs-parent="#faq">
          <div class="accordion-body">
            We count all responses submitted through all your forms in a month.
            If you already received 100 responses this month, you won’t be able to receive any more of them until next
            month when the counter resets.
          </div>
        </div>
      </div>

      <div class="card accordion-item">
        <h6 class="accordion-header">
          <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq-3" aria-expanded="false" aria-controls="faq-3">
            What payment methods do you accept?
          </button>
        </h6>
        <div id="faq-3" class="accordion-collapse collapse" data-bs-parent="#faq">
          <div class="accordion-body">
            2Checkout accepts all types of credit and debit cards.
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/ FAQS -->

@endsection
