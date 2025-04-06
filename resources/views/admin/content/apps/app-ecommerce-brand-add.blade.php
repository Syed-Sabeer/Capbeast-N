@extends('admin.layouts/layoutMaster')

@section('title', 'Add Brand')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
@endsection

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">eCommerce /</span> Add Brand</h4>

<div class="row">
  <div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Add New Brand</h5>
      </div>
      <div class="card-body">
        <form action="{{ route($prefix.'.brand.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="title" class="form-label">Brand Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description"></textarea>
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">Brand Image</label>
            <input type="file" class="form-control" id="image" name="image">
          </div>
          
          <button type="submit" class="btn btn-primary">Add Brand</button>
        </form>
      </div>
    </div>
  </div>
</div>


@if(session('success') || session('success') === true)
<script>
  document.addEventListener("DOMContentLoaded", function() {
      var myModal = new bootstrap.Modal(document.getElementById('addSuccessModal'));
      myModal.show();
  });
</script>
@endif



@endsection