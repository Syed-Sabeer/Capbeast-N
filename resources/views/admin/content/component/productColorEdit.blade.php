@extends('admin.layouts.layoutMaster')

@section('title', 'Edit Product Color')

@section('content')
<form method="POST" action="{{ route($prefix .'.content-product-color-update', $color->id) }}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Color Name</label>
                        <input type="text" name="title" class="form-control" value="{{ $color->color_name }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Color Code</label>
                        <input type="color" name="color_code" class="form-control" value="{{ $color->color_code }}" required>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Update Color</button>
</form>
@endsection
