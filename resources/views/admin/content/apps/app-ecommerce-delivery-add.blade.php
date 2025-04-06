@extends('admin.layouts/layoutMaster')

@section('title', 'eCommerce Print Add - Apps')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/typography.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/katex.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/editor.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/dropzone/dropzone.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/tagify/tagify.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/quill/katex.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/quill/quill.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/dropzone/dropzone.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/jquery-repeater/jquery-repeater.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/tagify/tagify.js') }}"></script>
@endsection

{{-- @section('page-script')
    <script src="{{ asset('assets/js/app-ecommerce-product-add.js') }}"></script>
@endsection --}}

@section('content')
<form method="POST" action="{{ route('app-ecommerce-delivery-store') }}" enctype="multipart/form-data">
  @csrf
  <div class="row">
      <div class="col-12 col-lg-8">




          <div class="card mb-4">
              <div class="card-header">Pricing</div>
              <div class="card-body" id="pricing-section">
                  <div class="pricing-item">
                      <div class="row mb-3">
                          <div class="col-6">
                              <label class="form-label">Quantity</label>
                              <input type="number" name="quantity[]" class="form-control" required>
                          </div>
                          <div class="col-6">
                              <label class="form-label">Price</label>
                              <input type="text" name="pricing[]" class="form-control" required>
                          </div>
                      </div>
                  </div>
              </div>
              <button type="button" class="btn btn-primary" id="add-pricing">Add another pricing</button>
          </div>
      </div>


  </div>

  <button type="submit" class="btn btn-success">Save Product</button>
</form>

<script>


    document.getElementById('add-pricing').addEventListener('click', () => {
        const pricingSection = document.getElementById('pricing-section');
        const newPricingItem = pricingSection.firstElementChild.cloneNode(true);
        newPricingItem.querySelectorAll('input').forEach(input => input.value = '');
        pricingSection.appendChild(newPricingItem);
    });


</script>
@endsection
