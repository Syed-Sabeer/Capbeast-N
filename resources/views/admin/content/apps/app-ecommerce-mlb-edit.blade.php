@extends('admin.layouts/layoutMaster')

@section('title', 'Edit Mlb')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
@endsection

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">eCommerce /</span> Edit Mlb</h4>

<div class="row">
  <div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Edit Mlb</h5>
      </div>
      <div class="card-body">
        <form action="{{ route($prefix.'.mlb.update', $mlb->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('POST')

          <div class="mb-3">
            <label for="title" class="form-label">Mlb Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $mlb->title }}" required>
          </div>

          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description">{{ $mlb->description }}</textarea>
          </div>

          <div class="mb-3">
            <label for="image" class="form-label">Mlb Image</label>
            <input type="file" class="form-control" id="image" name="image">
            @if($mlb->image)
              <div class="mt-2">
                <img src="{{ asset('storage/' .$mlb->image) }}" alt="Mlb Image" width="100">
              </div>
            @endif
          </div>
          <button type="submit" class="btn btn-primary">Update Mlb</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
