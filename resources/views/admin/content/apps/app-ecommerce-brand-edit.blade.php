@extends('admin.layouts/layoutMaster')

@section('title', 'Edit Brand')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
@endsection

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">eCommerce /</span> Edit Brand</h4>

<div class="row">
  <div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Edit Brand</h5>
      </div>
      <div class="card-body">
        <form action="{{ route($prefix.'.brand.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('POST')

          <div class="mb-3">
            <label for="title" class="form-label">Brand Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $brand->title }}" required>
          </div>

          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description">{{ $brand->description }}</textarea>
          </div>

          <div class="mb-3">
            <label for="image" class="form-label">Brand Image</label>
            <input type="file" class="form-control" id="image" name="image">
            @if($brand->image)
              <div class="mt-2">
                <img src="{{ asset('storage/' .$brand->image) }}" alt="Brand Image" width="100">
              </div>
            @endif
          </div>



          <button type="submit" class="btn btn-primary">Update Brand</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
