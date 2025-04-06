    @extends('admin.layouts.layoutMaster')

    @section('title', 'Add New Coupon')
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
                $('#expiryOptions').hide(); // Initially hide expiry options
        
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
                
        <script>


                $('#couponFor').on('change', function() {
                    let selectedType = $(this).val();
                    let itemSelect = $('#itemSelect');
                    itemSelect.html('<option value="0">Select All</option>'); // Reset dropdown

                    if (selectedType == "1" || selectedType == "3") {
                        $.ajax({
                            url: "{{ route($prefix .'.get-items') }}",
                            type: "GET",
                            data: { type: selectedType },
                            dataType: "json",
                            success: function(response) {
                                console.log("Response Data:", response);
                                if (response.length > 0) {
                                    response.forEach(item => {
                                        itemSelect.append(`<option value="${item.id}">${item.title}</option>`);
                                    });
                                } else {
                                    itemSelect.append('<option value="">No items found</option>');
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error("AJAX Error:", xhr.responseText);
                            }
                        });
                    }
                });
            
        </script>
    @endsection

    @section('content')
    <form method="POST" action="{{ route($prefix .'.content-discount-coupon-store') }}">
        @csrf
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Coupon Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter title" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Coupon Code</label>
                            <input type="text" name="code" class="form-control" placeholder="Enter title" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Coupon Country</label>
                            <select name="coupon_country" id="couponCountry" class="select2 form-select form-select-lg">
                                <option value="">Loading...</option> 
                            </select>
                        </div>
                        

                        <script>
                     document.addEventListener('DOMContentLoaded', function () {
    const countriesRoute = "{{ route('countries.index') }}";

    let countrySelect = document.getElementById('couponCountry');
    
    // Show loading indicator
    function setLoading(selectElement) {
        selectElement.innerHTML = '<option value="">Loading...</option>';
        selectElement.disabled = true;
    }

    // Remove loading indicator and set placeholder text
    function removeLoading(selectElement, placeholder) {
        selectElement.innerHTML = '';  // Clear existing options
        const placeholderOption = document.createElement('option');
        placeholderOption.value = '';
        placeholderOption.textContent = placeholder;
        selectElement.appendChild(placeholderOption);
        selectElement.disabled = false;
    }

    // Fetch countries
    setLoading(countrySelect);
    fetch(countriesRoute)
        .then(response => response.json())
        .then(data => {
            removeLoading(countrySelect, "Select Country");
            
            // Add 'All' option
            const allOption = document.createElement('option');
            allOption.value = "0";
            allOption.textContent = "All";
            countrySelect.appendChild(allOption);
            
            // Add other country options dynamically
            for (const [code, name] of Object.entries(data)) {
                const option = document.createElement('option');
                option.value = code;
                option.textContent = name;
                countrySelect.appendChild(option);
            }
        })
        .catch(error => {
            removeLoading(countrySelect, "Failed to load countries, Kindly Refresh the page");
            console.error(error);
        });
});


                        </script>
                        
                       

                        <div class="mb-3">
                            <label class="form-label">Coupon For</label>
                            <select name="discount_type" id="couponFor" class="select2 form-select form-select-lg">
                                <option value="">Select Status</option>
                                <option value="1">Products</option>
                                {{-- <option value="3">Printing</option>   --}}
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Select Item</label>
                            <select name="item_id" id="itemSelect" class="select2 form-select form-select-lg" required>
                                <option value="0">Select All</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Discount Percentage</label>
                            <input type="text" name="percentage" class="form-control" placeholder="Enter Number" required>
                        </div>  

                        <!-- Expiry Option -->
                        <div class="mb-3 ">
                            <label class="form-label">Expiry</label>
                            <br>
                            <label class="switch switch-primary switch-sm me-4 pe-2">
                                <input type="checkbox" class="switch-input" id="is_expiry_switch">
                                <span class="switch-toggle-slider">
                                    <span class="switch-on"></span>
                                    <span class="switch-off"></span>
                                </span>
                            </label>
                            <input type="hidden" name="is_expiry" id="is_expiry" value="0">
                        </div> 

                        <!-- Expiry Options (Hidden initially) -->
                <!-- Expiry Options (Hidden initially) -->
<div id="expiryOptions">
    <!-- Count (for time limit) -->
    <div id="countField" class="mb-3">
        <label class="form-label">Count</label>
        <input type="number" name="count" class="form-control" placeholder="Enter count" min="1">
    </div>

    <!-- Duration (from & to) in a single row -->
    <div id="durationField" class="d-flex gap-3">
        <div class="w-50">
            <label class="form-label">Duration From</label>
            <input type="datetime-local" name="duration_from" class="form-control">
        </div>
        <div class="w-50">
            <label class="form-label">Duration To</label>
            <input type="datetime-local" name="duration_to" class="form-control">
        </div>
    </div>
</div>

                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Save Coupon</button>
    </form>
    @endsection
