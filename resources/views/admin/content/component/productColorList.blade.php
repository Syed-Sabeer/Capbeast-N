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
<h4 class="py-3 mb-4">
    <span class="text-muted fw-light">Component /</span> Product Color List
</h4>

<!-- Color List Table -->
<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">Color List</h5>
    </div>
    <div class="card-datatable table-responsive">
        <table class="table">
            <thead class="border-top">
                <tr>
                    <th>ID</th>
                    <th>Color Name</th>
                    <th>Color Code</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($colors as $color)
                    <tr>
                        <td>{{ $color->id }}</td>
                        <td>{{ $color->color_name }}</td>
                        <td>
                            <span style="display:inline-block; width: 20px; height: 20px; background-color: {{ $color->color_code }}; border: 1px solid #000;"></span>
                            {{ $color->color_code }}
                        </td>
                        <td>
                            <!-- Edit Button -->
                            <a href="{{ route($prefix .'.content-product-color-edit', $color->id) }}" class="me-2">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        
                            <!-- Delete Button -->
                            <form action="{{ route($prefix .'.content-product-color-delete', $color->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="border: none; background: none;" onclick="return confirm('Are you sure you want to delete this color?')">
                                    <i class="fa-solid fa-trash" style="color: red;"></i>
                                </button>
                            </form>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
