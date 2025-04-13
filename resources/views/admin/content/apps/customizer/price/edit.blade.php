@extends('admin.layouts/layoutMaster')

@section('title', 'Price Setup')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
@endsection

@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Customizer /</span> Price Setup</h4>

    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Price Setup</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route($prefix . '.customizer-price.update', $customizerPrices->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- Front Customization --}}
                        <div class="mb-3">
                            <label for="front_price" class="form-label">Front Price <span class="text-danger">*</span></label>
                            <input type="number" class="form-control @error('front_price') is-invalid @enderror" id="front_price"
                                name="front_price" value="{{ old('front_price', $customizerPrices->front_price) }}" required>
                            @error('front_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Back Customization --}}
                        <div class="mb-3">
                            <label for="back_price" class="form-label">Back Price <span class="text-danger">*</span></label>
                            <input type="number" class="form-control @error('back_price') is-invalid @enderror" id="back_price"
                                name="back_price" value="{{ old('back_price', $customizerPrices->back_price) }}" required>
                            @error('back_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Left Customization --}}
                        <div class="mb-3">
                            <label for="left_price" class="form-label">Left Price <span class="text-danger">*</span></label>
                            <input type="number" class="form-control @error('left_price') is-invalid @enderror" id="left_price"
                                name="left_price" value="{{ old('left_price', $customizerPrices->left_price) }}" required>
                            @error('left_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Right Customization --}}
                        <div class="mb-3">
                            <label for="right_price" class="form-label">Right Price <span class="text-danger">*</span></label>
                            <input type="number" class="form-control @error('right_price') is-invalid @enderror" id="right_price"
                                name="right_price" value="{{ old('right_price', $customizerPrices->right_price) }}" required>
                            @error('right_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Submit Button --}}
                        <button type="submit" class="btn btn-primary">Update Price</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




    @if (session('success') || session('success') === true)
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var myModal = new bootstrap.Modal(document.getElementById('addSuccessModal'));
                myModal.show();
            });
        </script>
    @endif
@endsection
