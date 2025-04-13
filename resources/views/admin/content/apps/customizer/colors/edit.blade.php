@extends('admin.layouts/layoutMaster')

@section('title', 'Edit Color')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
@endsection

@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Customizer /</span> Edit Color</h4>

    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit Color</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route($prefix . '.customizer-colors.update', $textColor->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- Color Name --}}
                        <div class="mb-3">
                            <label for="color_name" class="form-label">Color Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('color_name') is-invalid @enderror" id="color_name"
                                name="color_name" value="{{ old('color_name', $textColor->color_name) }}" required>
                            @error('color_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Color Code --}}
                        <div class="mb-3">
                            <label for="text_color_code" class="form-label">Color Code <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('text_color_code') is-invalid @enderror" id="text_color_code"
                                name="text_color_code" value="{{ old('text_color_code', $textColor->text_color_code) }}" required>
                            @error('text_color_code')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Image Upload --}}
                        <div class="mb-3">
                            <label for="color_image" class="form-label">Color Image</label>
                            <input type="file" class="form-control @error('color_image') is-invalid @enderror" id="color_image"
                                name="color_image" accept="image/*">
                            @error('color_image')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror

                            {{-- Show Current Image --}}
                            @if ($textColor->color_image)
                                <div class="mt-2">
                                    <img src="{{ asset($textColor->color_image) }}" alt="Current Image" width="150"
                                        class="img-thumbnail">
                                </div>
                            @endif
                        </div>

                        {{-- Submit Button --}}
                        <button type="submit" class="btn btn-primary">Update Color</button>
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
