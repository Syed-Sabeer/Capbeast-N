@extends('admin.layouts.layoutMaster')

@section('title', 'Edit Coupon')
@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />    
@endsection

@section('vendor-script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/modal-add-new-address.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#couponFor').on('change', function() {
                let selectedType = $(this).val();
                let itemSelect = $('#itemSelect');
                itemSelect.html('<option value="0">Select All</option>');

                if (selectedType == "1" || selectedType == "3") {
                    $.ajax({
                        url: "{{ route($prefix .'.get-items') }}",
                        type: "GET",
                        data: { type: selectedType },
                        dataType: "json",
                        success: function(response) {
                            itemSelect.empty();
                            itemSelect.append('<option value="0">Select All</option>');
                            response.forEach(item => {
                                itemSelect.append(`<option value="${item.id}" ${item.id == {{ $discountCoupon->item_id }} ? 'selected' : ''}>${item.title}</option>`);
                            });
                        },
                        error: function(xhr) {
                            console.error("AJAX Error:", xhr.responseText);
                        }
                    });
                }
            });

            // Populate items on page load
            $('#couponFor').trigger('change');
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#is_expiry_switch').change(function () {
                if ($(this).is(':checked')) {
                    $('#expiryOptions').show();
                    $('#is_expiry').val(1);
                } else {
                    $('#expiryOptions').hide();
                    $('#is_expiry').val(0);
                }
            });
        });
    </script>
    
@endsection

@section('content')
<form method="POST" action="{{ route($prefix .'.content-discount-coupon-update', $discountCoupon->id) }}">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Coupon Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $discountCoupon->title }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Coupon Code</label>
                        <input type="text" name="code" class="form-control" value="{{ $discountCoupon->code }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Coupon Country</label>
                        <select name="coupon_country" class="select2 form-select form-select-lg">
                            <option value="0" {{ $discountCoupon->coupon_country == 0 ? 'selected' : '' }}>All</option>
                            <option value="1" {{ $discountCoupon->coupon_country == 1 ? 'selected' : '' }}>CANADA</option>
                            <option value="2" {{ $discountCoupon->coupon_country == 2 ? 'selected' : '' }}>USA</option>  
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Coupon User</label>
                        <select name="coupon_user" class="select2 form-select form-select-lg">
                            <option value="0" {{ $discountCoupon->coupon_user == 0 ? 'selected' : '' }}>Both</option>
                            <option value="1" {{ $discountCoupon->coupon_user == 1 ? 'selected' : '' }}>Reseller</option>
                            <option value="2" {{ $discountCoupon->coupon_user == 2 ? 'selected' : '' }}>Regular Customer</option>  
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Coupon For</label>
                        <select name="discount_type" id="couponFor" class="select2 form-select form-select-lg">
                            <option value="1" {{ $discountCoupon->discount_type == 1 ? 'selected' : '' }}>Products</option>
                            <option value="3" {{ $discountCoupon->discount_type == 3 ? 'selected' : '' }}>Printing</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Select Item</label>
                        <select name="item_id" id="itemSelect" class="select2 form-select form-select-lg">
                            <option value="0" {{ $discountCoupon->is_all ? 'selected' : '' }}>Select All</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Discount Percentage</label>
                        <input type="text" name="percentage" class="form-control" value="{{ $discountCoupon->percentage }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Has Expiry?</label><br>
                        <input type="checkbox" id="is_expiry_switch" {{ $discountCoupon->is_expiry ? 'checked' : '' }}>
                        <input type="hidden" name="is_expiry" id="is_expiry" value="{{ $discountCoupon->is_expiry }}">
                    </div>
                    
                    <div id="expiryOptions" style="{{ $discountCoupon->is_expiry ? '' : 'display: none;' }}">
                        <div class="mb-3">
                            <label class="form-label">Limit Count</label>
                            <input type="number" name="count" class="form-control" value="{{ $discountCoupon->count ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Duration From</label>
                            <input type="date" name="duration_from" class="form-control" value="{{ $discountCoupon->duration_from ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Duration To</label>
                            <input type="date" name="duration_to" class="form-control" value="{{ $discountCoupon->duration_to ?? '' }}">
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Update Coupon</button>
</form>
@endsection
