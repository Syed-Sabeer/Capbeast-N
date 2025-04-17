@extends('admin.layouts/layoutMaster')

@section('title', 'eCommerce Product Add - Apps')

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


<style>
    body {
        overflow-x: hidden
    }
</style>
@section('page-script')
    <script>
        $(document).ready(function() {
            $('#select2Category').select2();
            $('#select2Brand').select2();
            $('#select2Mlb').select2();
        });
    </script>
@endsection


@section('content')
    <form method="POST" action="{{ route($prefix . '.app-ecommerce-product-store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="card mb-4">

                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-8">
                                <label class="form-label">Product Name</label>
                                <input type="text" name="title" class="form-control" placeholder="Product title"
                                    required>
                            </div>

                            <div class="mb-3 col-4">
                                <label class="form-label">Product SKU</label>
                                <input type="text" name="sku" class="form-control" placeholder="Product SKU"
                                    required>
                            </div>


                        </div>

                        <div class="row">

                            <div class="mb-3 col-6">
                                <label for="select2Category" class="form-label">Select Categories (Optional)</label>
                                <select name="category_ids[]" id="select2Category"
                                    class="select2 form-select form-select-lg" multiple>

                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3 col-3">
                                <label for="select2Brand" class="form-label">Select Brand (Optional)</label>
                                <select name="brand_id" id="select2Brand" class="select2 form-select form-select-lg">
                                    <option value="">Select Brand</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3 col-3">
                                <label for="select2Mlb" class="form-label">Select MLB (Optional)</label>
                                <select name="mlb_id" id="select2Mlb" class="select2 form-select form-select-lg">
                                    <option value="">Select MLB</option>
                                    @foreach ($mlbs as $mlb)
                                        <option value="{{ $mlb->id }}">{{ $mlb->title }}</option>
                                    @endforeach
                                </select>
                            </div>


                        </div>

                        <div class="row">
                            <div class="mb-3 col-6">
                                <label class="form-label">Slug</label>
                                <input type="text" name="slug" class="form-control" placeholder="Product slug">
                            </div>
                            <div class="mb-3 col-3">
                                <label class="form-label">Cost Price</label>
                                <input type="text" name="cost_price" class="form-control"
                                    placeholder="Product Cost Price">
                            </div>

                            <div class="mb-3 col-3">
                                <label class="form-label">Selling Price</label>
                                <input type="text" name="selling_price" class="form-control"
                                    placeholder="Product Selling Price" required>
                            </div>

                        </div>



                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            {{-- <textarea name="description" class="form-control" rows="5" required></textarea> --}}
                            <textarea id="description" name="description"></textarea>
                        </div>

                    </div>


                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header">Product SEO</div>
                    <div class="card-body" id="base-image-section">
                        <div class="mb-3">
                            <label class="form-label">Meta Title</label>
                            <input type="text" name="metatitle" class="form-control" placeholder="Meta Title">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Meta Description</label>
                            <textarea name="metadescription" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Meta Keywords</label>
                            <input type="text" name="metakeywords" class="form-control" placeholder="Meta Title">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">For Shipment</div>
                    <div class="card-body row">
                        <div class="col-md-2 mb-3">
                            <label class="form-label">Size Unit</label>
                            <input type="text" name="size_unit" class="form-control" placeholder="i.e. cm, mm">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="form-label">Weight Unit</label>
                            <input type="text" name="weight_unit" class="form-control" placeholder="i.e. lbs">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="form-label">Height</label>
                            <input type="number" name="height" class="form-control" min="0" step="0.1"
                                placeholder="i.e. 10">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="form-label">Width</label>
                            <input type="number" name="width" class="form-control" min="0" step="0.1"
                                placeholder="i.e. 10">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="form-label">Length</label>
                            <input type="number" name="length" class="form-control" min="0" step="0.1"
                                placeholder="i.e. 10">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="form-label">Weight</label>
                            <input type="number" name="weight" class="form-control" min="0" step="0.1"
                                placeholder="i.e. 10.5">
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="sizeItem">
                                <div class="form-label d-flex justify-content-between">
                                    <label>Size</label>
                                    <div class="addSizeBtn">
                                        <button type="button" class="btn btn-primary btn-sm" id="addSize">Add
                                            More</button>
                                    </div>
                                </div>
                                <div class="sizeInputContainer">
                                    <div class="sizeInputItem mb-2 d-flex gap-2">
                                        <input type="number" name="size[]" class="form-control" placeholder="i.e. 10">
                                        <button type="button"
                                            class="btn btn-danger btn-sm removeSize d-none">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-12 col-lg-12">
            <div class="card mb-4">
                <div class="card-header">Colors</div>
                <div class="card-body" id="color-section">
                    <div class="color-item">
                        <div class="row mb-3">
                            <div class="col-3">
                                <label class="form-label">Color Name 1</label>
                                <input type="text" name="colorname1[]" class="form-control">
                            </div>
                            <div class="col-3">
                                <label class="form-label">Color Code 1</label>
                                <input type="color" name="colorcode1[]" class="form-control">
                            </div>

                            <div class="col-3">
                                <label class="form-label">Color Name 2 (Optional)</label>
                                <input type="text" name="colorname2[]" class="form-control">
                            </div>
                            <div class="col-3">
                                <label class="form-label">Color Code 2 (Optional)</label>
                                <input type="color" name="colorcode2[]" class="form-control">
                            </div>

                            <div class="col-3 mt-4">
                                <label class="form-label">Front Image</label>
                                <input type="file" name="frontimage[]" class="form-control" multiple>
                                <!-- Front -->
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" name="is_front[0]" checked>
                                    <label class="form-check-label">Allow Customization</label>
                                </div>
                            </div>
                            <div class="col-3 mt-4">
                                <label class="form-label">Back Image</label>
                                <input type="file" name="backimage[]" class="form-control" multiple>
                                <!-- Back -->
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" name="is_back[0]" checked>
                                    <label class="form-check-label">Allow Customization</label>
                                </div>
                            </div>
                            <div class="col-3 mt-4">
                                <label class="form-label">Right Image</label>
                                <input type="file" name="rightimage[]" class="form-control" multiple>
                                <!-- Right -->
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" name="is_right[0]" checked>
                                    <label class="form-check-label">Allow Customization</label>
                                </div>
                            </div>
                            <div class="col-3 mt-4">
                                <label class="form-label">Left Image</label>
                                <input type="file" name="leftimage[]" class="form-control" multiple>
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" name="is_left[0]" checked>
                                    <label class="form-check-label">Allow Customization</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-primary" id="add-color">Add another color</button>
            </div>
        </div>

        <div class="col-12 col-lg-8">
            <div class="card mb-4">
                <div class="card-header">Volume Discount (Optional)</div>
                <div class="card-body" id="discount-section">
                    <div class="discount-item">
                        <div class="row mb-3">
                            <div class="col-6">
                                <label class="form-label">Minimum Quantity</label>
                                <input type="number" name="quantity[]" class="form-control">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Discount Percenatge</label>
                                <input type="text" name="discount[]" class="form-control">
                            </div>

                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-primary" id="add-discount">Add Another Discount</button>
            </div>

        </div>
        <button type="submit" class="btn btn-success">Save Product</button>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // document.getElementById('add-color').addEventListener('click', () => {
        //     const colorSection = document.getElementById('color-section');
        //     const newColorItem = colorSection.firstElementChild.cloneNode(true);

        //     newColorItem.querySelectorAll('input').forEach(input => {
        //         input.value = ''; // Clear input values
        //     });

        //     // Add a remove button
        //     const removeBtn = document.createElement('button');
        //     removeBtn.type = 'button';
        //     removeBtn.classList.add('btn', 'btn-danger', 'mt-2');
        //     removeBtn.textContent = 'Remove';
        //     removeBtn.onclick = function() {
        //         this.parentElement.remove();
        //     };

        //     const wrapper = document.createElement('div');
        //     wrapper.classList.add('color-item');
        //     wrapper.appendChild(newColorItem);
        //     wrapper.appendChild(removeBtn);

        //     colorSection.appendChild(wrapper);
        // });
        $(document).ready(function() {
            $('.removeSize').removeClass('waves-effect waves-light');

            function toggleRemoveButtons() {
                const totalItems = $('.sizeInputItem').length;
                if (totalItems <= 1) {
                    $('.removeSize').addClass('d-none');
                } else {
                    $('.removeSize').removeClass('d-none');
                }
            }

            $('#addSize').on('click', function() {
                const inputHTML = `
                <div class="sizeInputItem mb-2 d-flex gap-2">
                    <input type="number" name="size[]" class="form-control" placeholder="i.e. 10">
                    <button type="button" class="btn btn-danger btn-sm removeSize">Remove</button>
                </div>`;
                $('.sizeInputContainer').append(inputHTML);
                toggleRemoveButtons();
            });

            $(document).on('click', '.removeSize', function() {
                $(this).closest('.sizeInputItem').remove();
                toggleRemoveButtons();
            });

            // Initial check on page load
            toggleRemoveButtons();
        });
        let colorIndex = 1;
        document.getElementById('add-color').addEventListener('click', () => {
            const colorSection = document.getElementById('color-section');

            const html = `
            <div class="color-item">
                <div class="row mb-3">
                    <div class="col-3">
                        <label class="form-label">Color Name 1</label>
                        <input type="text" name="colorname1[]" class="form-control">
                    </div>
                    <div class="col-3">
                        <label class="form-label">Color Code 1</label>
                        <input type="color" name="colorcode1[]" class="form-control">
                    </div>
                    <div class="col-3">
                        <label class="form-label">Color Name 2 (Optional)</label>
                        <input type="text" name="colorname2[]" class="form-control">
                    </div>
                    <div class="col-3">
                        <label class="form-label">Color Code 2 (Optional)</label>
                        <input type="color" name="colorcode2[]" class="form-control">
                    </div>

                    <div class="col-3 mt-4">
                        <label class="form-label">Front Image</label>
                        <input type="file" name="frontimage[]" class="form-control" multiple>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" name="is_front[${colorIndex}]" checked>
                            <label class="form-check-label">Allow Customization</label>
                        </div>
                    </div>
                    <div class="col-3 mt-4">
                        <label class="form-label">Back Image</label>
                        <input type="file" name="backimage[]" class="form-control" multiple>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" name="is_back[${colorIndex}]" checked>
                            <label class="form-check-label">Allow Customization</label>
                        </div>
                    </div>
                    <div class="col-3 mt-4">
                        <label class="form-label">Right Image</label>
                        <input type="file" name="rightimage[]" class="form-control" multiple>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" name="is_right[${colorIndex}]" checked>
                            <label class="form-check-label">Allow Customization</label>
                        </div>
                    </div>
                    <div class="col-3 mt-4">
                        <label class="form-label">Left Image</label>
                        <input type="file" name="leftimage[]" class="form-control" multiple>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" name="is_left[${colorIndex}]" checked>
                            <label class="form-check-label">Allow Customization</label>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-danger mt-2 remove-color-btn">Remove</button>
            </div>
            `;
            colorIndex++;
            colorSection.insertAdjacentHTML('beforeend', html);
        });

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-color-btn')) {
                e.target.closest('.color-item').remove();
            }
        });


        document.getElementById('add-discount').addEventListener('click', () => {
            const pricingSection = document.getElementById('discount-section');
            const newPricingItem = pricingSection.firstElementChild.cloneNode(true);
            newPricingItem.querySelectorAll('input').forEach(input => input.value = '');

            // Create remove button
            const removeBtn = document.createElement('button');
            removeBtn.type = 'button';
            removeBtn.classList.add('btn', 'btn-danger', 'mt-2');
            removeBtn.textContent = 'Remove';
            removeBtn.onclick = function() {
                this.parentElement.remove();
            };

            // Wrap new pricing item in a div and append the remove button
            const wrapper = document.createElement('div');
            wrapper.classList.add('discount-item');
            wrapper.appendChild(newPricingItem);
            wrapper.appendChild(removeBtn);

            pricingSection.appendChild(wrapper);
        });
    </script>
    <x-c-k-editor />

@endsection
