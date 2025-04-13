@extends('admin.layouts/layoutMaster')

@section('title', 'Edit Design')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
@endsection

@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Customizer /</span> Edit Design</h4>

    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit Design</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route($prefix . '.customizer-designs.update', $customizerDesign->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- Design Name --}}
                        <div class="mb-3">
                            <label for="name" class="form-label">Design Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name', $customizerDesign->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Category Select --}}
                        <div class="mb-3">
                            <label for="select2DesignCategory" class="form-label">Select Category <span
                                    class="text-danger">*</span></label>
                            <select name="design_category_id" id="select2DesignCategory"
                                class="select2 form-select form-select-lg @error('design_category_id') is-invalid @enderror"
                                required>
                                <option value="">Select Category</option>
                                @foreach ($designCategories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('design_category_id', $customizerDesign->design_category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('design_category_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Image Upload --}}
                        <div class="mb-3">
                            <label for="image" class="form-label">Design Image</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                                name="image" accept="image/*">
                            @error('image')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror

                            {{-- Show Current Image --}}
                            @if ($customizerDesign->image)
                                <div class="mt-2">
                                    <img src="{{ asset($customizerDesign->image) }}" alt="Current Image" width="150"
                                        class="img-thumbnail">
                                </div>
                            @endif
                        </div>

                        {{-- Submit Button --}}
                        <button type="submit" class="btn btn-primary">Update Design</button>
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
