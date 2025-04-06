@extends('admin.layouts.layoutMaster')

@section('title', 'Add New Status')

@section('content')
<form method="POST" action="{{ route($prefix .'.order-internal-status.store') }}">
    @csrf
    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Status Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Enter title" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status Description</label>
                        <textarea name="description" class="form-control" placeholder="Enter description" required></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Save Status</button>
</form>
@endsection
