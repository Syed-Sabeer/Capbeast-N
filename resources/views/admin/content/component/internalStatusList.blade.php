@extends('admin.layouts/layoutMaster')

@section('title', 'eCommerce Product List - Apps')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
@endsection

@section('content')


<div class="d-flex align-items-center justify-content-between py-3 mb-4">
    <h4 class="mb-0">
        <span class="text-muted fw-light">eCommerce /</span> Internal Status
    </h4>
    <a href="{{ route($prefix.'.InternalStatus.index') }}" class="btn btn-primary">Add New Status</a>
</div>


<!-- Internal Status Table -->
<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">Internal Status List</h5>
    </div>
    <div class="card-datatable table-responsive">
        <table class="table">
            <thead class="border-top">
                <tr>
                    <th></th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($statuses) && count($statuses) > 0)
                    @foreach ($statuses as $status)
                        <tr>
                        <td></td>
                            <td>{{ $status->title }}</td>
                            <td>{{ $status->description }}</td>
                            <td>
                                <a href="{{ route($prefix .'.order-internal-status.edit', $status->id) }}" class="btn btn-warning">Edit</a>
                                
                                @if ($status->deleted_at)
                                    <form action="{{ route($prefix .'.order-internal-status.restore', $status->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-success">Restore</button>
                                    </form>
                                @else
                                    <form action="{{ route($prefix .'.order-internal-status.destroy', $status->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
