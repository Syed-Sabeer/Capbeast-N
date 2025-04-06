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
<form method="POST" action="{{ route($prefix .'.app-ecommerce-printing-store') }}" enctype="multipart/form-data">
  @csrf
  <div class="row">
      <div class="col-12 col-lg-8">
          <div class="card mb-4">
              <div class="card-body">
                  <div class="mb-3">
                      <label class="form-label">Product Name</label>
                      <input type="text" name="title" class="form-control" placeholder="Product title" required>
                  </div>
                  <div class="mb-3">
                      <label class="form-label">Image</label>
                      <input type="file" name="image" class="form-control" >
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Is Leather Option</label>
                    <br>
                    <label class="switch switch-primary switch-sm me-4 pe-2">
                        <input type="checkbox" class="switch-input" id="is_leather_switch">
                        <span class="switch-toggle-slider">
                            <span class="switch-on"></span>
                            <span class="switch-off"></span>
                        </span>
                    </label>
                    <input type="hidden" name="is_leather" id="is_leather" value="0"> <!-- Hidden input to store is_leather value -->
                </div>

              </div>
          </div>



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
                              <input type="text" name="price[]" class="form-control" required>
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
    document.getElementById('is_leather_switch').addEventListener('change', function () {
    const isLeatherInput = document.getElementById('is_leather');
    // Log the value before changing
    console.log('Switch is now: ', this.checked);
    isLeatherInput.value = this.checked ? 1 : 0;
});


</script>
@endsection
