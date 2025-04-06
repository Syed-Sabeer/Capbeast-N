@php
$configData = Helper::appClasses();
@endphp
@extends('layouts/layoutMaster')

@section('title', 'Create Deal - Wizard Examples')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.js')}}"></script>
<script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/wizard-ex-create-deal.js')}}"></script>
@endsection

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Wizard examples /</span> Create Deal
</h4>

<!-- Create Deal Wizard -->
<div id="wizard-create-deal" class="bs-stepper vertical mt-2">
  <div class="bs-stepper-header">
    <div class="step" data-target="#deal-type">
      <button type="button" class="step-trigger">
        <span class="bs-stepper-circle"><i class="ti ti-users ti-sm"></i></span>
        <span class="bs-stepper-label">
          <span class="bs-stepper-title">Deal Type</span>
          <span class="bs-stepper-subtitle">Choose type of deal</span>
        </span>
      </button>
    </div>
    <div class="line"></div>
    <div class="step" data-target="#deal-details">
      <button type="button" class="step-trigger">
        <span class="bs-stepper-circle"><i class="ti ti-id ti-sm"></i></span>
        <span class="bs-stepper-label">
          <span class="bs-stepper-title">Deal Details</span>
          <span class="bs-stepper-subtitle">Provide deal details</span>
        </span>
      </button>
    </div>
    <div class="line"></div>
    <div class="step" data-target="#deal-usage">
      <button type="button" class="step-trigger">
        <span class="bs-stepper-circle"><i class="ti ti-credit-card ti-sm"></i></span>
        <span class="bs-stepper-label">
          <span class="bs-stepper-title">Deal Usage</span>
          <span class="bs-stepper-subtitle">Limitations & Offers</span>
        </span>
      </button>
    </div>
    <div class="line"></div>
    <div class="step" data-target="#review-complete">
      <button type="button" class="step-trigger">
        <span class="bs-stepper-circle"><i class="ti ti-checkbox ti-sm"></i></span>
        <span class="bs-stepper-label">
          <span class="bs-stepper-title">Review & Complete</span>
          <span class="bs-stepper-subtitle">Launch a deal!</span>
        </span>
      </button>
    </div>
  </div>
  <div class="bs-stepper-content">
    <form id="wizard-create-deal-form" onSubmit="return false">
      <!-- Deal Type -->
      <div id="deal-type" class="content">
        <div class="row g-3">
          <div class="col-12 d-flex justify-content-center border rounded pt-4">
            <img src="{{ asset('assets/img/illustrations/wizard-create-deal-girl-with-laptop-'.$configData['style'].'.png') }}" alt="wizard-create-deal" data-app-light-img="illustrations/wizard-create-deal-girl-with-laptop-light.png" data-app-dark-img="illustrations/wizard-create-deal-girl-with-laptop-dark.png" width="650" class="img-fluid">
          </div>
          <div class="col-12 pb-2">
            <div class="row">
              <div class="col-md mb-md-0 mb-2">
                <div class="form-check custom-option custom-option-icon">
                  <label class="form-check-label custom-option-content" for="customRadioPercentage">
                    <span class="custom-option-body">
                      <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.51562 31.4844C7.07812 30.0469 8.03125 27.0312 7.29688 25.2656C6.5625 23.5 3.75 21.9531 3.75 20C3.75 18.0469 6.53125 16.5625 7.29688 14.7344C8.0625 12.9063 7.07812 9.95312 8.51562 8.51562C9.95312 7.07812 12.9688 8.03125 14.7344 7.29688C16.5 6.5625 18.0469 3.75 20 3.75C21.9531 3.75 23.4375 6.53125 25.2656 7.29688C27.0938 8.0625 30.0469 7.07812 31.4844 8.51562C32.9219 9.95312 31.9688 12.9688 32.7031 14.7344C33.4375 16.5 36.25 18.0469 36.25 20C36.25 21.9531 33.4688 23.4375 32.7031 25.2656C31.9375 27.0938 32.9219 30.0469 31.4844 31.4844C30.0469 32.9219 27.0312 31.9688 25.2656 32.7031C23.5 33.4375 21.9531 36.25 20 36.25C18.0469 36.25 16.5625 33.4688 14.7344 32.7031C12.9063 31.9375 9.95312 32.9219 8.51562 31.4844Z" fill="currentColor" fill-opacity="0.2" />
                        <path d="M27.5653 16.9736C27.9649 16.5923 27.9798 15.9593 27.5986 15.5597C27.2173 15.1601 26.5843 15.1452 26.1847 15.5264L27.5653 16.9736ZM17.7031 25L17.0122 25.723C17.3985 26.0921 18.0068 26.0924 18.3934 25.7236L17.7031 25ZM13.8159 19.902C13.4166 19.5205 12.7836 19.5348 12.402 19.9341C12.0205 20.3334 12.0348 20.9664 12.4341 21.348L13.8159 19.902ZM9.22273 30.7773C8.81886 30.3734 8.67646 29.6614 8.64216 28.4693C8.62718 27.9485 8.63055 27.2885 8.59282 26.7144C8.554 26.1238 8.46686 25.4746 8.22019 24.8816L6.37356 25.6497C6.49407 25.9394 6.56319 26.3293 6.59712 26.8456C6.63215 27.3785 6.62477 27.8933 6.64299 28.5268C6.67511 29.6433 6.77489 31.1579 7.80852 32.1915L9.22273 30.7773ZM8.22019 24.8816C7.97509 24.2923 7.57894 23.7686 7.18888 23.3181C6.80742 22.8775 6.34152 22.409 5.97905 22.0207C5.58964 21.6036 5.27275 21.2322 5.05267 20.8745C4.83579 20.5219 4.75 20.2412 4.75 20H2.75C2.75 20.7353 3.01577 21.3804 3.34919 21.9224C3.6794 22.4592 4.11154 22.9511 4.51705 23.3855C4.94949 23.8488 5.32441 24.2201 5.67684 24.6272C6.02067 25.0243 6.25147 25.3561 6.37356 25.6497L8.22019 24.8816ZM4.75 20C4.75 19.7574 4.83486 19.4805 5.04779 19.1351C5.26477 18.7831 5.57782 18.4182 5.96587 18.0043C6.32802 17.618 6.79152 17.1533 7.17664 16.7072C7.57055 16.2509 7.96763 15.7215 8.21925 15.1207L6.3745 14.3481C6.24331 14.6613 6.00563 15.003 5.66272 15.4002C5.31102 15.8077 4.93565 16.1789 4.50679 16.6364C4.10383 17.0662 3.67371 17.5528 3.34528 18.0856C3.0128 18.6249 2.75 19.266 2.75 20H4.75ZM8.21925 15.1207C8.47312 14.5145 8.56516 13.8597 8.60585 13.2615C8.64546 12.679 8.64066 12.0249 8.65397 11.5041C8.68424 10.3194 8.82032 9.62514 9.22273 9.22273L7.80852 7.80852C6.77343 8.84361 6.68295 10.3446 6.65462 11.453C6.63864 12.0786 6.64653 12.5954 6.61046 13.1257C6.57546 13.6403 6.50344 14.0402 6.3745 14.3481L8.21925 15.1207ZM9.22273 9.22273C9.6266 8.81886 10.3386 8.67646 11.5307 8.64216C12.0515 8.62718 12.7115 8.63055 13.2856 8.59282C13.8762 8.554 14.5254 8.46686 15.1184 8.22019L14.3503 6.37356C14.0606 6.49407 13.6707 6.56319 13.1544 6.59712C12.6215 6.63215 12.1067 6.62477 11.4732 6.64299C10.3567 6.67511 8.84215 6.77489 7.80852 7.80852L9.22273 9.22273ZM15.1184 8.22019C15.7077 7.97509 16.2314 7.57894 16.6819 7.18888C17.1225 6.80742 17.5909 6.34152 17.9793 5.97905C18.3964 5.58964 18.7678 5.27275 19.1255 5.05267C19.4781 4.83579 19.7588 4.75 20 4.75V2.75C19.2647 2.75 18.6196 3.01577 18.0776 3.34919C17.5408 3.6794 17.0489 4.11154 16.6145 4.51705C16.1512 4.94949 15.7799 5.32441 15.3728 5.67684C14.9757 6.02067 14.6439 6.25147 14.3503 6.37356L15.1184 8.22019ZM20 4.75C20.2426 4.75 20.5195 4.83486 20.8649 5.04779C21.2169 5.26477 21.5818 5.57782 21.9957 5.96587C22.382 6.32802 22.8467 6.79152 23.2928 7.17664C23.7491 7.57055 24.2785 7.96763 24.8793 8.21925L25.6519 6.3745C25.3387 6.24331 24.997 6.00563 24.5998 5.66272C24.1923 5.31102 23.8211 4.93565 23.3636 4.50679C22.9338 4.10383 22.4472 3.67371 21.9144 3.34528C21.3751 3.0128 20.734 2.75 20 2.75V4.75ZM24.8793 8.21925C25.4855 8.47312 26.1403 8.56516 26.7385 8.60585C27.321 8.64546 27.9751 8.64066 28.4959 8.65397C29.6806 8.68424 30.3749 8.82032 30.7773 9.22273L32.1915 7.80852C31.1564 6.77343 29.6554 6.68295 28.547 6.65462C27.9214 6.63864 27.4046 6.64653 26.8743 6.61046C26.3597 6.57546 25.9598 6.50344 25.6519 6.3745L24.8793 8.21925ZM30.7773 9.22273C31.1811 9.6266 31.3235 10.3386 31.3578 11.5307C31.3728 12.0515 31.3695 12.7115 31.4072 13.2856C31.446 13.8762 31.5331 14.5254 31.7798 15.1184L33.6264 14.3503C33.5059 14.0606 33.4368 13.6707 33.4029 13.1544C33.3679 12.6215 33.3752 12.1067 33.357 11.4732C33.3249 10.3567 33.2251 8.84215 32.1915 7.80852L30.7773 9.22273ZM31.7798 15.1184C32.0249 15.7077 32.4211 16.2314 32.8111 16.6819C33.1926 17.1225 33.6585 17.5909 34.021 17.9793C34.4104 18.3964 34.7273 18.7678 34.9473 19.1255C35.1642 19.4781 35.25 19.7588 35.25 20H37.25C37.25 19.2647 36.9842 18.6196 36.6508 18.0776C36.3206 17.5408 35.8885 17.0489 35.483 16.6145C35.0505 16.1512 34.6756 15.7799 34.3232 15.3728C33.9793 14.9757 33.7485 14.6439 33.6264 14.3503L31.7798 15.1184ZM35.25 20C35.25 20.2426 35.1651 20.5195 34.9522 20.8649C34.7352 21.2169 34.4222 21.5818 34.0341 21.9957C33.672 22.382 33.2085 22.8467 32.8234 23.2928C32.4295 23.7491 32.0324 24.2785 31.7808 24.8793L33.6255 25.6519C33.7567 25.3387 33.9944 24.997 34.3373 24.5998C34.689 24.1923 35.0643 23.8211 35.4932 23.3636C35.8962 22.9338 36.3263 22.4472 36.6547 21.9144C36.9872 21.3751 37.25 20.734 37.25 20H35.25ZM31.7808 24.8793C31.5269 25.4855 31.4348 26.1403 31.3941 26.7385C31.3545 27.321 31.3593 27.9751 31.346 28.4959C31.3158 29.6806 31.1797 30.3749 30.7773 30.7773L32.1915 32.1915C33.2266 31.1564 33.3171 29.6554 33.3454 28.547C33.3614 27.9214 33.3535 27.4046 33.3895 26.8743C33.4245 26.3597 33.4966 25.9598 33.6255 25.6519L31.7808 24.8793ZM30.7773 30.7773C30.3734 31.1811 29.6614 31.3235 28.4693 31.3578C27.9485 31.3728 27.2885 31.3695 26.7144 31.4072C26.1238 31.446 25.4746 31.5331 24.8816 31.7798L25.6497 33.6264C25.9394 33.5059 26.3293 33.4368 26.8456 33.4029C27.3785 33.3679 27.8933 33.3752 28.5268 33.357C29.6433 33.3249 31.1579 33.2251 32.1915 32.1915L30.7773 30.7773ZM24.8816 31.7798C24.2923 32.0249 23.7686 32.4211 23.3181 32.8111C22.8775 33.1926 22.409 33.6585 22.0207 34.021C21.6036 34.4104 21.2322 34.7273 20.8745 34.9473C20.5219 35.1642 20.2412 35.25 20 35.25V37.25C20.7353 37.25 21.3804 36.9842 21.9224 36.6508C22.4592 36.3206 22.9511 35.8885 23.3855 35.483C23.8488 35.0505 24.2201 34.6756 24.6272 34.3232C25.0243 33.9793 25.3561 33.7485 25.6497 33.6264L24.8816 31.7798ZM20 35.25C19.7574 35.25 19.4805 35.1651 19.1351 34.9522C18.7831 34.7352 18.4182 34.4222 18.0043 34.0341C17.618 33.672 17.1533 33.2085 16.7072 32.8234C16.2509 32.4295 15.7215 32.0324 15.1207 31.7808L14.3481 33.6255C14.6613 33.7567 15.003 33.9944 15.4002 34.3373C15.8077 34.689 16.1789 35.0643 16.6364 35.4932C17.0662 35.8962 17.5528 36.3263 18.0856 36.6547C18.6249 36.9872 19.266 37.25 20 37.25V35.25ZM15.1207 31.7808C14.5145 31.5269 13.8597 31.4348 13.2615 31.3941C12.679 31.3545 12.0249 31.3593 11.5041 31.346C10.3194 31.3158 9.62514 31.1797 9.22273 30.7773L7.80852 32.1915C8.84361 33.2266 10.3446 33.3171 11.453 33.3454C12.0786 33.3614 12.5954 33.3535 13.1257 33.3895C13.6403 33.4245 14.0402 33.4966 14.3481 33.6255L15.1207 31.7808ZM26.1847 15.5264L17.0129 24.2764L18.3934 25.7236L27.5653 16.9736L26.1847 15.5264ZM18.394 24.277L13.8159 19.902L12.4341 21.348L17.0122 25.723L18.394 24.277Z" fill="currentColor" />
                      </svg>

                      <span class="custom-option-title">Percentage</span>
                      <small>Create a deal which offer uses some % off (i.e 5% OFF) on total.</small>
                    </span>
                    <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="customRadioPercentage" checked />
                  </label>
                </div>
              </div>
              <div class="col-md mb-md-0 mb-2">
                <div class="form-check custom-option custom-option-icon">
                  <label class="form-check-label custom-option-content" for="customRadioFlat">
                    <span class="custom-option-body">
                      <svg width="41" height="40" viewBox="0 0 41 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 15.1406H36.5V30C36.5 30.3315 36.3683 30.6495 36.1339 30.8839C35.8995 31.1183 35.5815 31.25 35.25 31.25H5.25C4.91848 31.25 4.60054 31.1183 4.36612 30.8839C4.1317 30.6495 4 30.3315 4 30V15.1406Z" fill="currentColor" fill-opacity="0.2" />
                        <path d="M26.5 25.25C25.9477 25.25 25.5 25.6977 25.5 26.25C25.5 26.8023 25.9477 27.25 26.5 27.25V25.25ZM31.5 27.25C32.0523 27.25 32.5 26.8023 32.5 26.25C32.5 25.6977 32.0523 25.25 31.5 25.25V27.25ZM19 25.25C18.4477 25.25 18 25.6977 18 26.25C18 26.8023 18.4477 27.25 19 27.25V25.25ZM21.5 27.25C22.0523 27.25 22.5 26.8023 22.5 26.25C22.5 25.6977 22.0523 25.25 21.5 25.25V27.25ZM4 14.1406C3.44772 14.1406 3 14.5883 3 15.1406C3 15.6929 3.44772 16.1406 4 16.1406V14.1406ZM36.5 16.1406C37.0523 16.1406 37.5 15.6929 37.5 15.1406C37.5 14.5883 37.0523 14.1406 36.5 14.1406V16.1406ZM5.25 9.75H35.25V7.75H5.25V9.75ZM35.25 9.75C35.3881 9.75 35.5 9.86193 35.5 10H37.5C37.5 8.75736 36.4926 7.75 35.25 7.75V9.75ZM35.5 10V30H37.5V10H35.5ZM35.5 30C35.5 30.1381 35.3881 30.25 35.25 30.25V32.25C36.4926 32.25 37.5 31.2426 37.5 30H35.5ZM35.25 30.25H5.25V32.25H35.25V30.25ZM5.25 30.25C5.11193 30.25 5 30.1381 5 30H3C3 31.2426 4.00736 32.25 5.25 32.25V30.25ZM5 30V10H3V30H5ZM5 10C5 9.86193 5.11193 9.75 5.25 9.75V7.75C4.00736 7.75 3 8.75736 3 10H5ZM26.5 27.25H31.5V25.25H26.5V27.25ZM19 27.25H21.5V25.25H19V27.25ZM4 16.1406H36.5V14.1406H4V16.1406Z" fill="currentColor" />
                      </svg>

                      <span class="custom-option-title"> Flat Amount </span>
                      <small>Create a deal which offer uses flat $ off (i.e $5 OFF) on the total.</small>
                    </span>
                    <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="customRadioFlat" />
                  </label>
                </div>
              </div>
              <div class="col-md mb-md-0 mb-2">
                <div class="form-check custom-option custom-option-icon">
                  <label class="form-check-label custom-option-content" for="customRadioPrime">
                    <span class="custom-option-body">
                      <svg width="41" height="40" viewBox="0 0 41 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M29 6.25H20.25L12.5781 16.25L20.25 35L37.75 16.25L29 6.25Z" fill="currentColor" fill-opacity="0.2" />
                        <path d="M11.5 6.25H29L37.75 16.25L20.25 35L2.75 16.25L11.5 6.25Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M21.0434 5.64131C20.8542 5.39462 20.5609 5.25 20.25 5.25C19.9391 5.25 19.6458 5.39462 19.4566 5.64131L12.0849 15.25H2.75C2.19772 15.25 1.75 15.6977 1.75 16.25C1.75 16.8023 2.19772 17.25 2.75 17.25H11.9068L19.3245 35.3787C19.4782 35.7545 19.844 36 20.25 36C20.656 36 21.0218 35.7545 21.1755 35.3787L28.5932 17.25H37.75C38.3023 17.25 38.75 16.8023 38.75 16.25C38.75 15.6977 38.3023 15.25 37.75 15.25H28.4151L21.0434 5.64131ZM25.8943 15.25L20.25 7.89287L14.6057 15.25H25.8943ZM14.0678 17.25L20.25 32.3593L26.4322 17.25H14.0678Z" fill="currentColor" />
                      </svg>
                      <span class="custom-option-title"> Prime Member </span>
                      <small>Create prime member only deal to encourage the prime members.</small>
                    </span>
                    <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="customRadioPrime" />
                  </label>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <label class="form-label" for="dealAmount">Discount</label>
            <input type="text" name="dealAmount" id="dealAmount" class="form-control" placeholder="25" min="0" max="100" aria-describedby="dealAmountHelp" />
            <div id="dealAmountHelp" class="form-text">Enter the discount percentage. 10 = 10%</div>
          </div>
          <div class="col-sm-6">
            <label class="form-label" for="dealRegion">Region</label>
            <select id="dealRegion" name="dealRegion" class="select2 form-select" multiple aria-describedby="dealRegionHelp">
              <option disabled value="">Select targeted region</option>
              <option value="asia">Asia</option>
              <option value="africa">Africa</option>
              <option value="europe">Europe</option>
              <option value="north america">North America</option>
              <option value="south america">South America</option>
              <option value="australia">Australia</option>
            </select>
            <div id="dealRegionHelp" class="form-text">Select applicable regions for the deal.</div>
          </div>
          <div class="col-12 d-flex justify-content-between mt-4">
            <button class="btn btn-label-secondary btn-prev" disabled> <i class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
              <span class="align-middle d-sm-inline-block d-none">Previous</span>
            </button>
            <button class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="ti ti-arrow-right ti-xs"></i></button>
          </div>
        </div>
      </div>
      <!-- Deal Details -->
      <div id="deal-details" class="content">
        <div class="row g-3">
          <div class="col-sm-6">
            <label class="form-label" for="dealTitle">Deal Title</label>
            <input type="text" id="dealTitle" name="dealTitle" class="form-control" placeholder="Black friday sale, 25% off" />
          </div>
          <div class="col-sm-6">
            <label class="form-label" for="dealCode">Deal Code</label>
            <input type="text" id="dealCode" name="dealCode" class="form-control" placeholder="25PEROFF" />
          </div>
          <div class="col-sm-6">
            <label class="form-label" for="dealDescription">Deal Description</label>
            <textarea id="dealDescription" name="dealDescription" class="form-control" rows="5" placeholder="To sell or distribute something as a business deal"></textarea>
          </div>
          <div class="col-sm-6">
            <div class="row">
              <div class="col-12 mb-3">
                <label class="form-label" for="dealOfferedItem">Offered Items</label>
                <select class="select2" id="dealOfferedItem" name="dealOfferedItem" multiple>
                  <option disabled value="">Select offered item</option>
                  <option value="65328">Apple iPhone 12 Pro Max (256GB)</option>
                  <option value="25612">Apple iPhone 12 Pro (512GB)</option>
                  <option value="65454">Apple iPhone 12 Mini (256GB)</option>
                  <option value="12365">Apple iPhone 11 Pro Max (256GB)</option>
                  <option value="85466">Apple iPhone 11 (64GB)</option>
                  <option value="98564">OnePlus Nord CE 5G (128GB)</option>
                </select>
              </div>
              <div class="col-12">
                <label class="form-label" for="dealCartCondition">Cart condition</label>
                <select class="form-select" id="dealCartCondition" name="dealCartCondition">
                  <option disabled value="">Select cart condition</option>
                  <option value="all">Cart must contain all selected Downloads</option>
                  <option value="any">Cart needs one or more of the selected Downloads</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <label for="dealDuration" class="form-label">Deal Duration</label>
            <input type="text" id="dealDuration" name="dealDuration" class="form-control" placeholder="YYYY-MM-DD to YYYY-MM-DD" />
          </div>
          <div class="col-sm-6">
            <label class="form-label">Notify Users</label>
            <div class="row">
              <div class="col mt-2">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="dealNotifyEmail" name="dealNotifyEmail" value="email">
                  <label class="form-check-label" for="dealNotifyEmail">Email</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="dealNotifySMS" name="dealNotifySMS" value="sms">
                  <label class="form-check-label" for="dealNotifySMS">SMS</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="dealNotifyPush" name="dealNotifyPush" value="push">
                  <label class="form-check-label" for="dealNotifyPush">Push Notification</label>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 d-flex justify-content-between mt-4">
            <button class="btn btn-label-secondary btn-prev"> <i class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
              <span class="align-middle d-sm-inline-block d-none">Previous</span>
            </button>
            <button class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="ti ti-arrow-right ti-xs"></i></button>
          </div>
        </div>
      </div>
      <!-- Deal Usage -->
      <div id="deal-usage" class="content">
        <div class="row g-3">
          <div class="col-sm-6">
            <label class="form-label" for="dealUserType">User Type</label>
            <select id="dealUserType" name="dealUserType" class="form-select">
              <option selected disabled value="">Select user type</option>
              <option value="all">All</option>
              <option value="registered">Registered</option>
              <option value="unregistered">Unregistered</option>
              <option value="prime-members">Prime members</option>
            </select>
          </div>
          <div class="col-sm-6">
            <label class="form-label" for="dealMaxUsers">Max Users</label>
            <input type="number" id="dealMaxUsers" name="dealMaxUsers" class="form-control" placeholder="500" />
          </div>
          <div class="col-sm-6">
            <label class="form-label" for="dealMinimumCartAmount">Minimum Cart Amount</label>
            <input type="number" id="dealMinimumCartAmount" name="dealMinimumCartAmount" class="form-control" placeholder="$99" />
          </div>
          <div class="col-sm-6">
            <label class="form-label" for="dealPromotionalFee">Promotional Fee</label>
            <input type="number" id="dealPromotionalFee" name="dealPromotionalFee" class="form-control" placeholder="$9" />
          </div>
          <div class="col-sm-6">
            <label class="form-label" for="dealPaymentMethod">Payment Method</label>
            <select id="dealPaymentMethod" name="dealPaymentMethod" class="form-select">
              <option selected disabled value="">Select payment method</option>
              <option value="any">Any</option>
              <option value="credit-card">Credit Card</option>
              <option value="net-banking">Net Banking</option>
              <option value="wallet">Wallet</option>
            </select>
          </div>
          <div class="col-sm-6">
            <label class="form-label" for="dealStatus">Deal Status</label>
            <select id="dealStatus" name="dealStatus" class="form-select">
              <option selected disabled value="">Select status</option>
              <option value="active">Active</option>
              <option value="inactive">Inactive</option>
              <option value="suspend">Suspend</option>
              <option value="abandon">Abandone</option>
            </select>
          </div>
          <div class="col-lg-12">
            <label class="switch">
              <input type="checkbox" class="switch-input" id="dealLimitUser" name="dealLimitUser">
              <span class="switch-toggle-slider">
                <span class="switch-on"></span>
                <span class="switch-off"></span>
              </span>
              <span class="switch-label"> Limit this discount to a single-use per customer?</span>
            </label>
          </div>
          <div class="col-12 d-flex justify-content-between mt-4">
            <button class="btn btn-label-secondary btn-prev"> <i class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
              <span class="align-middle d-sm-inline-block d-none">Previous</span>
            </button>
            <button class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="ti ti-arrow-right ti-xs"></i></button>
          </div>
        </div>
      </div>
      <!-- Review & Complete -->
      <div id="review-complete" class="content">
        <div class="row g-3">

          <div class="col-lg-6">
            <div class="row">
              <div class="col-12 mb-0">
                <h3>Almost done! 🚀</h3>
                <p>Confirm your deal details information and submit to create it.</p>
              </div>
              <div class="col-12 mb-0">
                <table class="table table-borderless">
                  <tbody>
                    <tr>
                      <td class="ps-0 align-top text-nowrap py-1"><span class="fw-medium">Deal Type</span></td>
                      <td class="px-0 py-1">Percentage</td>
                    </tr>
                    <tr>
                      <td class="ps-0 align-top text-nowrap py-1"><span class="fw-medium">Amount</span></td>
                      <td class="px-0 py-1">25%</td>
                    </tr>
                    <tr>
                      <td class="ps-0 align-top text-nowrap py-1"><span class="fw-medium">Deal Code</span></td>
                      <td class="px-0 py-1">
                        <div class="badge bg-label-warning">25PEROFF</div>
                      </td>
                    </tr>
                    <tr>
                      <td class="ps-0 align-top text-nowrap py-1"><span class="fw-medium">Deal Title</span></td>
                      <td class="px-0 py-1">Black friday sale, 25% OFF</td>
                    </tr>
                    <tr>
                      <td class="ps-0 align-top text-nowrap py-1"><span class="fw-medium">Deal Duration</span></td>
                      <td class="px-0 py-1"><span class="fw-medium">2021-07-14</span> to <span class="fw-medium">2021-07-30</span></td>
                    </tr>
                  </tbody>
                </table>

              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-5 d-flex justify-content-center border rounded pt-3">
            <img class="img-fluid" src="{{ asset('assets/img/illustrations/wizard-create-deal-confirm.png') }}" alt="deal image cap" />
          </div>
          <div class="col-md-12">
            <label class="switch">
              <input type="checkbox" class="switch-input" id="dealConfirmed" name="dealConfirmed">
              <span class="switch-toggle-slider">
                <span class="switch-on"></span>
                <span class="switch-off"></span>
              </span>
              <span class="switch-label"> I have confirmed the deal details.</span>
            </label>
          </div>
          <div class="col-12 d-flex justify-content-between mt-4">
            <button class="btn btn-label-secondary btn-prev"> <i class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
              <span class="align-middle d-sm-inline-block d-none">Previous</span>
            </button>
            <button class="btn btn-success btn-submit btn-next"><span class="align-middle d-sm-inline-block d-none me-sm-1">Submit</span><i class="ti ti-check ti-xs"></i></button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- /Create Deal Wizard -->

@endsection
