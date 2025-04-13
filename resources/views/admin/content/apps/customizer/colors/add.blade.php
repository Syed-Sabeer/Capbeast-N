@extends('admin.layouts/layoutMaster')

@section('title', 'Add Color')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
@endsection

@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Customizer /</span> Add Color</h4>

    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Add New Color</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route($prefix . '.customizer-colors.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        {{-- Color Name --}}
                        <div class="mb-3">
                            <label for="color_name" class="form-label">Color Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('color_name') is-invalid @enderror" id="color_name"
                                name="color_name" value="{{ old('color_name') }}" required>
                            @error('color_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Color Code --}}
                        <div class="mb-3">
                            <label for="text_color_code" class="form-label">Color Code </label>
                            <input type="text" class="form-control @error('text_color_code') is-invalid @enderror" id="text_color_code"
                                name="text_color_code" value="{{ old('text_color_code') }}">
                            @error('text_color_code')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Image Upload --}}
                        <div class="mb-3">
                            <label for="image" class="form-label">Design Image <span class="text-danger">*</span></label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                                name="image" accept="image/*" required>
                            @error('image')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Submit Button --}}
                        <button type="submit" class="btn btn-primary">Add Design</button>
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            $('#select2DesignCategory').select2();
        });
    </script>



@endsection
