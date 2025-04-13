@extends('admin.layouts/layoutMaster')

@section('title', 'eCommerce Product List - Apps')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
@endsection
@section('page-script')
    <script>
        $(document).ready(function() {
            $('#select2Category').select2();
            $('#select2Brand').select2();
            $('#select2Mlb').select2();
        });
    </script>
@endsection

{{-- @dd($product) --}}
@section('content')
    <form method="POST" action="{{ route($prefix . '.app-ecommerce-product-update', $product->id) }}"
        enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="card mb-4">

                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-12">
                                <label class="form-label">Product Name</label>
                                <input type="text" name="title" class="form-control" placeholder="Product title"
                                    value="{{ $product->title }}" required>
                            </div>


                        </div>
                        <div class="row">

                            <div class="mb-3 col-6">
                                <label for="select2Category" class="form-label">Select Categories</label>
                                <select name="category_ids[]" id="select2Category" class="select2 form-select form-select-lg" multiple>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            @if(isset($product) && $product->categories && $product->categories->contains($category->id)) selected @endif>
                                            {{ $category->title }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>



                            <div class="mb-3 col-3">
                                <label for="select2Brand" class="form-label">Select Brand</label>
                                <select name="brand_id" id="select2Brand" class="select2 form-select form-select-lg">
                                    <option value="">Select Brand</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}"
                                            {{ $product->brand_id == $brand->id ? 'selected' : '' }}>{{ $brand->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="mb-3 col-3">
                                <label for="select2Mlb" class="form-label">Select MLB</label>
                                <select name="mlb_id" id="select2Mlb" class="select2 form-select form-select-lg">
                                    <option value="">Select MLB</option>
                                    @foreach ($mlbs as $mlb)
                                        <option value="{{ $mlb->id }}"
                                            {{ $product->mlb_id == $mlb->id ? 'selected' : '' }}>{{ $mlb->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>




                        <div class="row">

                            <div class="mb-3 col-6">
                                <label class="form-label">Slug</label>
                                <input type="text" name="slug" class="form-control" placeholder="Product slug"
                                    value="{{ $product->slug }}" required>
                            </div>
                            <div class="mb-3 col-3">
                                <label class="form-label">Cost Price</label>
                                <input type="text" name="cost_price" class="form-control"
                                    placeholder="Product Cost Price" value="{{ $product->cost_price }}">
                            </div>

                            <div class="mb-3 col-3">
                                <label class="form-label">Selling Price</label>
                                <input type="text" name="selling_price" class="form-control"
                                    placeholder="Product Selling Price" required value="{{ $product->selling_price }}">
                            </div>


                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="5" required>{!! old('description', $product->description) !!}</textarea>
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
                            <input type="text" name="metatitle" class="form-control" placeholder="Meta Title"
                                value="{{ $product->productSEO->metatitle ?? ''}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Meta Description</label>
                            <textarea name="metadescription" class="form-control" rows="3">{{ $product->productSEO->metadescription ?? '' }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Meta Keywords</label>
                            <input type="text" name="metakeywords" class="form-control" placeholder="Meta Title"
                                value="{{ $product->productSEO->metakeywords ?? ''}}">
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-12 col-lg-12">
            <div class="card mb-4">
                <div class="card-header">Colors</div>
                <div class="card-body" id="color-section">
                    @if (isset($product->productColors) && count($product->productColors) > 0)
                        @foreach ($product->productColors as $color)
                            <div class="color-item" data-id="{{ $color->id }}">
                                <div class="row mb-3">
                                    <div class="col-3">
                                        <label class="form-label">Color Name 1</label>
                                        <p>{{ $color->color_name_1 }}</p>
                                    </div>
                                    <div class="col-3">
                                        <label class="form-label">Color Code 1</label>
                                        <div
                                            style="width: 50px; height: 20px; background-color: {{ $color->color_code_1 }}">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <label class="form-label">Color Name 2 (Optional)</label>
                                        <p>{{ $color->color_name_2 ?? '-' }}</p>
                                    </div>
                                    <div class="col-3">
                                        <label class="form-label">Color Code 2 (Optional)</label>
                                        @if ($color->color_code_2)
                                            <div
                                                style="width: 50px; height: 20px; background-color: {{ $color->color_code_2 }}">
                                            </div>
                                        @else
                                            <p>-</p>
                                        @endif
                                    </div>

                                    @php
                                        $images = [
                                            'front_image' => ['label' => 'Front', 'flag' => 'is_front'],
                                            'back_image' => ['label' => 'Back', 'flag' => 'is_back'],
                                            'right_image' => ['label' => 'Right', 'flag' => 'is_right'],
                                            'left_image' => ['label' => 'Left', 'flag' => 'is_left'],
                                        ];
                                    @endphp

                                    @foreach ($images as $key => $info)
                                        <div class="col-3 mt-4">
                                          @if (!empty($color->{$info['flag']}) && $color->{$info['flag']} == '1')
                                              <span class="badge bg-success small">Customizable</span>
                                          @else
                                              <span class="badge bg-danger small">Non Customizable</span>
                                          @endif
                                            <label class="form-label">{{ $info['label'] }} Image</label>
                                            @if ($color->$key)
                                                <img src="{{ asset('storage/' . $color->$key) }}" width="100">
                                            @else
                                                <p>-</p>
                                            @endif
                                        </div>
                                    @endforeach

                                    <div class="col-3 mt-4">
                                        <a href="{{route($prefix . '.delete.product-color', $color->id)}}" type="button" class="delete_confirm btn btn-sm btn-danger mt-2"
                                            data-id="{{ $color->id }}">Remove</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
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
                                </div>
                                <div class="col-3 mt-4">
                                    <label class="form-label">Back Image</label>
                                    <input type="file" name="backimage[]" class="form-control" multiple>
                                </div>
                                <div class="col-3 mt-4">
                                    <label class="form-label">Right Image</label>
                                    <input type="file" name="rightimage[]" class="form-control" multiple>
                                </div>
                                <div class="col-3 mt-4">
                                    <label class="form-label">Left Image</label>
                                    <input type="file" name="leftimage[]" class="form-control" multiple>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <button type="button" class="btn btn-primary" id="add-color">Add another color</button>
            </div>
        </div>

        <div class="col-12 col-lg-8">
            <div class="card mb-4">
                <div class="card-header">Volume Discount (Optional)</div>
                <div class="card-body" id="discount-section">
                    @if (isset($product->ProductVolumeDiscount) && count($product->ProductVolumeDiscount) > 0)
                        @foreach ($product->ProductVolumeDiscount as $discount)
                            <div class="discount-item">
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <label class="form-label">Minimum Quantity</label>
                                        <input type="number" name="quantity[]" class="form-control"
                                            value="{{ $discount->quantity }}">
                                    </div>
                                    <div class="col-4">
                                        <label class="form-label">Discount Percenatge</label>
                                        <input type="text" name="discount[]" class="form-control"
                                            value="{{ $discount->discount }}">
                                    </div>
                                    <div class="col-3 mt-2">
                                        <button type="button"
                                            class="btn btn-sm btn-danger mt-2 remove-discount">Remove</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="discount-item">
                            <div class="row mb-3">
                                <div class="col-4">
                                    <label class="form-label">Minimum Quantity</label>
                                    <input type="number" name="quantity[]" class="form-control">
                                </div>
                                <div class="col-4">
                                    <label class="form-label">Discount Percenatge</label>
                                    <input type="text" name="discount[]" class="form-control">
                                </div>

                            </div>
                        </div>
                    @endif
                </div>
                <button type="button" class="btn btn-primary" id="add-discount">Add Another Discount</button>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Save Product</button>
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            // Add new color section
            let colorIndex = 0;
            $("#add-color").click(function() {
                let colorHtml = `
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
                                    <input type="file" name="frontimage[]" class="form-control">
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" name="is_front[${colorIndex}]" checked>
                                        <label class="form-check-label">Allow Customization</label>
                                    </div>
                                </div>
                                <div class="col-3 mt-4">
                                    <label class="form-label">Back Image</label>
                                    <input type="file" name="backimage[]" class="form-control">
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" name="is_back[${colorIndex}]" checked>
                                        <label class="form-check-label">Allow Customization</label>
                                    </div>
                                </div>
                                <div class="col-3 mt-4">
                                    <label class="form-label">Right Image</label>
                                    <input type="file" name="rightimage[]" class="form-control">
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" name="is_right[${colorIndex}]" checked>
                                        <label class="form-check-label">Allow Customization</label>
                                    </div>
                                </div>
                                <div class="col-3 mt-4">
                                    <label class="form-label">Left Image</label>
                                    <input type="file" name="leftimage[]" class="form-control">
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" name="is_left[${colorIndex}]" checked>
                                        <label class="form-check-label">Allow Customization</label>
                                    </div>
                                </div>
                                <div class="col-3 mt-4">
                                    <button type="button" class="btn btn-sm btn-danger mt-2 remove-color">Remove</button>
                                </div>
                            </div>
                        </div>`;
                $("#color-section").append(colorHtml);
                colorIndex++;
            });

            // Remove color section
            $(document).on("click", ".remove-color", function() {
                $(this).closest(".color-item").remove();
            });

            // Add new discount section
            $("#add-discount").click(function() {
                let discountHtml = `
                  <div class="discount-item">
                      <div class="row mb-3">
                          <div class="col-4">
                              <label class="form-label">Minimum Quantity</label>
                              <input type="number" name="quantity[]" class="form-control">
                          </div>
                          <div class="col-4">
                              <label class="form-label">Discount Percentage</label>
                              <input type="number" name="discount[]" class="form-control">
                          </div>
                          <div class="col-4 mt-4">
                              <button type="button" class="btn btn-sm btn-danger remove-discount">Remove</button>
                          </div>
                      </div>
                  </div>`;
                $("#discount-section").append(discountHtml);
            });

            // Remove discount section
            $(document).on("click", ".remove-discount", function() {
                $(this).closest(".discount-item").remove();
            });
        });
    </script>
    <x-c-k-editor  />
@endsection
