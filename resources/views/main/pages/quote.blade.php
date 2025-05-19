@extends('main.layouts.master')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@section('main-container')

<script>
    const productColorRoute = @json(route('get.product.colors', ['id' => '___ID___']));
    const storageBaseUrl = @json(asset('storage'));

    $(document).ready(function () {
        $('#select2Basic').on('change', function () {
            var productId = $(this).val();
            $('#product-images').empty();
            $('#product-images-container').hide();

            if (productId) {
                const url = productColorRoute.replace('___ID___', productId);

                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function (response) {
                        if (response.status === 'success' && response.data.length > 0) {
                            $('#product-images-container').show();

                            response.data.forEach(function (color, index) {
                                let imageSrc = '';

                                if (color.front_image) {
                                    imageSrc = `${storageBaseUrl}/${color.front_image}`;
                                } else if (color.back_image) {
                                    imageSrc = `${storageBaseUrl}/${color.back_image}`;
                                } else if (color.right_image) {
                                    imageSrc = `${storageBaseUrl}/${color.right_image}`;
                                } else if (color.left_image) {
                                    imageSrc = `${storageBaseUrl}/${color.left_image}`;
                                }

                                if (imageSrc) {
        let html = `
            <div class="col-md-3 text-center">
                <div class="border p-2 rounded">
                    <div style="background-color: ${color.color_code_1}; width: 30px; height: 30px; margin: 0 auto; border-radius: 50%; border: 1px solid #000;"></div>
                    <p class="mb-1 mt-2">${color.color_name_1}</p>
                    <img src="${imageSrc}" class="img-fluid mb-2" alt="Color View" onclick="changeMainImage(this.src)">
                    
                    <div>
                        <label>
                            <input type="radio" name="color_id" value="${color.id}" required>
                            Select
                        </label>
                    </div>
                </div>
            </div>
        `;
        $('#product-images').append(html);
    }
                            });
                        }
                    }
                });
            }
        });
    });
</script>




<section class="section">
    <div class="container mt-5">
        <div class="row">

            <div class="col-lg-8 mx-auto">
                <div class="custom-form card p-4 p-lg-5">
                   <form name="myForm" method="POST" action="{{ route('quote.submit') }}">
    @csrf
    <!-- form fields -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="text-center mb-4">
                                    <h3 class="text-capitalize">REQUEST A QUOTE</h3>
                                    <p>Need some help with an order? Fill in the form below and we'll get back to you as soon as possible.</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mt-3">
                                    <label for="firstname" class="form-label">First Name<span class="text-danger">*</span></label>
                                    <input name="firstname"  type="text" class="form-control" placeholder="Enter First Name" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mt-3">
                                    <label for="lastname" class="form-label">Last Name<span class="text-danger">*</span></label>
                                    <input name="lastname"  type="text" class="form-control" placeholder="Enter Last Name" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
    <div class="form-group mt-3">
        <label for="product_id" class="form-label">Select Product<span class="text-danger">*</span></label>
      <select name="product_id" id="select2Basic" class="select2 form-select form-select-lg">
                                <option value="">Select Product</option>
                                @foreach ($products as $item)
                                    <option value="{{ $item->id }}">

                                        {{ $item->title }}
                                        
                                    </option>
                                @endforeach
                            </select>
    </div>
</div>

<div class="col-lg-12 mt-4" id="product-images-container" style="display: none;">
    <h5>Available Colors:</h5>
    <div id="product-images" class="row g-3"></div>
</div>


                            <div class="col-lg-6">
                                <div class="form-group mt-3">
                                    <label for="email" class="form-label">Email Address<span class="text-danger">*</span></label>
                                    <input type="email" class="form-control"  placeholder="Enter Email" name="email">
                                </div>
                            </div>
                             <div class="col-lg-6">
                                <div class="form-group mt-3">
                                    <label for="phone" class="form-label">Phone<span class="text-danger">*</span></label>
                                    <input type="phone" class="form-control"  placeholder="Enter Phone" name="phone">
                                </div>
                            </div>
                             <div class="col-lg-12">
                                <div class="form-group mt-3">
                                    <label for="address" class="form-label">Street Address<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter Address" name="address">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mt-3">
                                    <label for="country" class="form-label">Country<span class="text-danger">*</span></label>
                                    <input name="country"  type="text" class="form-control" placeholder="Enter Country" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mt-3">
                                    <label for="state" class="form-label">State<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="state"  placeholder="Enter State">
                                </div>
                            </div>
                             <div class="col-lg-6">
                                <div class="form-group mt-3">
                                    <label for="city" class="form-label">City<span class="text-danger">*</span></label>
                                    <input name="city" id="emailInput" type="text" class="form-control" placeholder="Enter City" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mt-3">
                                    <label for="zip" class="form-label">Zip/Postal Code<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="zip"  placeholder="Enter Zip/Postal Code">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mt-3">
                                    <label for="details" class="form-label">Details<span class="text-danger">*</span></label>
                                    <textarea name="details"  rows="4" class="form-control" placeholder="Enter Details"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="text-end mt-4">
                                    <button type="submit" id="submit" name="submit" class="btn btn-primary">Submit & Customize <i class="bi bi-arrow-right-short align-middle fs-16 ms-1"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection
