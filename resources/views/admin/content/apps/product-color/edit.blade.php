@extends('admin.layouts/layoutMaster')

@section('title', 'eCommerce Product Color Edit - Apps')

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
    {{-- <script src="{{ asset('assets/vendor/libs/quill/katex.js') }}"></script> --}}
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


@section('content')
    <form method="POST" action="{{ route($prefix . '.app-ecommerce-product-color-update', $productColor->id) }}"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-12 col-lg-12">
            <div class="card mb-4">
                <div class="card-header">Edit Product Color</div>
                <div class="card-body" id="color-section">
                    <div class="color-item">
                        <div class="row mb-3">
                            <div class="col-3">
                                <label class="form-label">Color Name 1</label>
                                <input type="text" name="colorname1" class="form-control"
                                    value="{{ old('colorname1', $productColor->color_name_1) }}">
                                @error('colorname1')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-3">
                                <label class="form-label">Color Code 1</label>
                                <input type="color" name="colorcode1" class="form-control"
                                    value="{{ old('colorcode1', $productColor->color_code_1) }}">
                                @error('colorcode1')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-3">
                                <label class="form-label">Color Name 2 (Optional)</label>
                                <input type="text" name="colorname2" class="form-control"
                                    value="{{ old('colorname2', $productColor->color_name_2) }}">
                            </div>
                            <div class="col-3">
                                <label class="form-label">Color Code 2 (Optional)</label>
                                <input type="color" name="colorcode2" class="form-control"
                                    value="{{ old('colorcode2', $productColor->color_code_2) }}">
                            </div>

                            @php
                                $isFront = old('is_front', $productColor->is_front == '1');
                                $isBack = old('is_back', $productColor->is_back == '1');
                                $isRight = old('is_right', $productColor->is_right == '1');
                                $isLeft = old('is_left', $productColor->is_left == '1');
                            @endphp

                            <div class="col-3 mt-4">
                                <label class="form-label">Front Image</label>
                                <input type="file" name="frontimage" class="form-control" accept="image/*">
                                @if ($productColor->front_image)
                                    <img src="{{ asset('storage/' . $productColor->front_image) }}" class="img-fluid mt-2"
                                        style="max-height: 100px;">
                                @endif
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" name="is_front"
                                        {{ $isFront ? 'checked' : '' }}>
                                    <label class="form-check-label">Allow Customization</label>
                                </div>
                            </div>

                            <div class="col-3 mt-4">
                                <label class="form-label">Back Image</label>
                                <input type="file" name="backimage" class="form-control" accept="image/*">
                                @if ($productColor->back_image)
                                    <img src="{{ asset('storage/' . $productColor->back_image) }}" class="img-fluid mt-2"
                                        style="max-height: 100px;">
                                @endif
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" name="is_back"
                                        {{ $isBack ? 'checked' : '' }}>
                                    <label class="form-check-label">Allow Customization</label>
                                </div>
                            </div>

                            <div class="col-3 mt-4">
                                <label class="form-label">Right Image</label>
                                <input type="file" name="rightimage" class="form-control" accept="image/*">
                                @if ($productColor->right_image)
                                    <img src="{{ asset('storage/' . $productColor->right_image) }}" class="img-fluid mt-2"
                                        style="max-height: 100px;">
                                @endif
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" name="is_right"
                                        {{ $isRight ? 'checked' : '' }}>
                                    <label class="form-check-label">Allow Customization</label>
                                </div>
                            </div>

                            <div class="col-3 mt-4">
                                <label class="form-label">Left Image</label>
                                <input type="file" name="leftimage" class="form-control" accept="image/*">
                                @if ($productColor->left_image)
                                    <img src="{{ asset('storage/' . $productColor->left_image) }}" class="img-fluid mt-2"
                                        style="max-height: 100px;">
                                @endif
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" name="is_left"
                                        {{ $isLeft ? 'checked' : '' }}>
                                    <label class="form-check-label">Allow Customization</label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Update Product Color</button>
    </form>

@endsection


@section('page-script')
    <script></script>
@endsection
