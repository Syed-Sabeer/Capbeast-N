@extends('admin.layouts/layoutMaster')

@section('title', 'eCommerce Product Color Add - Apps')

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
    <form method="POST" action="{{ route($prefix . '.app-ecommerce-product-color-store', $product->id) }}"
        enctype="multipart/form-data">
        @csrf
        <div class="col-12 col-lg-12">
            <div class="card mb-4">
                <div class="card-header">Add Product Color</div>
                <div class="card-body" id="color-section">
                    <div class="color-item">
                        <div class="row mb-3">
                            <!-- Color Name 1 -->
                            <div class="col-3">
                                <label class="form-label">Color Name 1</label>
                                <input type="text" name="colorname1"
                                    class="form-control @error('colorname1') is-invalid @enderror"
                                    value="{{ old('colorname1') }}">
                                @error('colorname1')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Color Code 1 -->
                            <div class="col-3">
                                <label class="form-label">Color Code 1</label>
                                <input type="color" name="colorcode1"
                                    class="form-control @error('colorcode1') is-invalid @enderror"
                                    value="{{ old('colorcode1', '#000000') }}">
                                @error('colorcode1')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Color Name 2 (Optional) -->
                            <div class="col-3">
                                <label class="form-label">Color Name 2 (Optional)</label>
                                <input type="text" name="colorname2"
                                    class="form-control @error('colorname2') is-invalid @enderror"
                                    value="{{ old('colorname2') }}">
                                @error('colorname2')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Color Code 2 (Optional) -->
                            <div class="col-3">
                                <label class="form-label">Color Code 2 (Optional)</label>
                                <input type="color" name="colorcode2"
                                    class="form-control @error('colorcode2') is-invalid @enderror"
                                    value="{{ old('colorcode2', '#000000') }}">
                                @error('colorcode2')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Front Image -->
                            <div class="col-3 mt-4">
                                <label class="form-label">Front Image</label>
                                <input type="file" name="frontimage"
                                    class="form-control @error('frontimage') is-invalid @enderror" accept="image/*">
                                @error('frontimage')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" name="is_front"
                                        {{ old('is_front', true) ? 'checked' : '' }}>
                                    <label class="form-check-label">Allow Customization</label>
                                </div>
                            </div>

                            <!-- Back Image -->
                            <div class="col-3 mt-4">
                                <label class="form-label">Back Image</label>
                                <input type="file" name="backimage"
                                    class="form-control @error('backimage') is-invalid @enderror" accept="image/*">
                                @error('backimage')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" name="is_back"
                                        {{ old('is_back', true) ? 'checked' : '' }}>
                                    <label class="form-check-label">Allow Customization</label>
                                </div>
                            </div>

                            <!-- Right Image -->
                            <div class="col-3 mt-4">
                                <label class="form-label">Right Image</label>
                                <input type="file" name="rightimage"
                                    class="form-control @error('rightimage') is-invalid @enderror" accept="image/*">
                                @error('rightimage')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" name="is_right"
                                        {{ old('is_right', true) ? 'checked' : '' }}>
                                    <label class="form-check-label">Allow Customization</label>
                                </div>
                            </div>

                            <!-- Left Image -->
                            <div class="col-3 mt-4">
                                <label class="form-label">Left Image</label>
                                <input type="file" name="leftimage"
                                    class="form-control @error('leftimage') is-invalid @enderror" accept="image/*">
                                @error('leftimage')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" name="is_left"
                                        {{ old('is_left', true) ? 'checked' : '' }}>
                                    <label class="form-check-label">Allow Customization</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-success">Save Product Color</button>
    </form>

@endsection


@section('page-script')
    <script></script>
@endsection
