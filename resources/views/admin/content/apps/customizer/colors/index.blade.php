@extends('admin.layouts/layoutMaster')

@section('title', 'Customizer Colors - Apps')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/app-ecommerce-order-list.js') }}"></script>
@endsection

@section('content')
    <h4 class="py-3 mb-2">
        <span class="text-muted fw-light">Customizer /</span> Colors
    </h4>
    <div class="d-flex justify-content-end mb-4">
        <a href="{{ route($prefix . '.customizer-colors.create') }}" class="btn btn-primary">Add Colors</a>
    </div>
    <!-- Colors List Table -->
    <div class="card">
        <div class="card-datatable table-responsive">
            <table class=" table border-top">
                <thead>
                    <tr>
                        <th></th>
                        <th>Sr.#</th>
                        <th>Name</th>
                        <th>Color Code</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($textColors as $key => $color)
                        <tr>
                            <td></td>

                            <td>{{ $key + 1 }}</td>
                            <td>{{ $color->color_name }}</td>
                            <td>{{ $color->text_color_code }}</td>
                            <td>
                                @if ($color->color_image)
                                    <img src="{{ asset($color->color_image) }}" alt="Color Image" width="50">
                                @else
                                    No Image
                                @endif
                            </td>
                            <td>
                                <a href="{{ route($prefix.'.customizer-colors.edit', $color->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <a href="{{ route($prefix.'.customizer-colors.destroy', $color->id) }}" class="btn btn-sm btn-danger delete_confirm">Delete</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-end mt-3 me-3">
            <x-pagination :paginator="$textColors" />
        </div>

    </div>

    <style>
    </style>

    <script></script>

@endsection
