@extends('main.layouts.master')

@section('main-container')


<section class="term-condition bg-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">  
                <div class="text-center">
                    <h1 class="text-white mb-2">DELIVERY INFORMATION</h1>
                    <p class="text-white-75 mb-0">This Delivery Information was published on April 10<sup>th</sup>, 2025.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="position-relative">
    <div class="svg-shape">
        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="1440" height="120" preserveAspectRatio="none" viewBox="0 0 1440 120">
            <g mask="url(&quot;#SvgjsMask1039&quot;)" fill="none">
                <rect width="1440" height="120" x="0" y="0" fill="var(--tb-primary)"></rect>
                <path d="M 0,85 C 288,68.8 1152,20.2 1440,4L1440 120L0 120z" fill="var(--tb-body-bg)"></path>
            </g>
            <defs>
                <mask id="SvgjsMask1039">
                    <rect width="1440" height="120" fill="#ffffff"></rect>
                </mask>
            </defs>
        </svg>
    </div>
</div>

<section class="section pt-0">
    <div class="container">
        <div class="card term-card mb-0">
            <div class="card-body p-5">
                <div class="row">
                    <div class="col-lg-12">
                        <h5 class="fs-18 mb-3">All CapBeast orders are shipped via Fedex and USPS. </h5>
                        <div class="d-flex gap-2 mb-2">
                            <div class="flex-shrink-0">
                                <i class="ri-flashlight-fill text-primary fs-15"></i>
                            </div>
                            <p class="text-muted fs-15 flex-grow-1 mb-0">Orders are shipped from our warehouse within 3-4 weeks from when you place your order, however, this is not guaranteed. Please note that whilst we guarantee a high-quality standard of delivery time, unforeseen circumstances can arise and therefore the delivery dates are not always definite. For more information on this please see our terms of sale and delivery. </p>
                        </div>
                      




                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection