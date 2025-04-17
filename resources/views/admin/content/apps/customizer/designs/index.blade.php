@extends('admin.layouts/layoutMaster')

@section('title', 'Customizer Designs - Apps')

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
    

    <div class="d-flex align-items-center justify-content-between py-3 mb-4">
        <h4 class="mb-0">
            <span class="text-muted fw-light">Customizer /</span> Designs
        </h4>
        <a href="{{ route($prefix . '.customizer-designs.create') }}" class="btn btn-primary">Add Design</a>
      </div>
      


    <!-- Designs List Table -->
    <div class="card">
        <div class="card-datatable table-responsive">
            <table class=" table border-top">
                <thead>
                    <tr>
                        <th></th>
                        <th>Sr.#</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Image</th>
                        {{-- <th>Status</th> --}}
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customizerDesigns as $key => $design)
                        <tr>
                            <td></td>

                            <td>{{ $key + 1 }}</td>
                            <td>{{ $design->name }}</td>
                            <td>{{ $design->designCategory->name }}</td>
                            <td>
                                @if ($design->image)
                                    <img src="{{ asset($design->image) }}" alt="Design Image" width="50">
                                @else
                                    No Image
                                @endif
                            </td>
                            {{-- <td>
                                <div class="w-25 d-flex justify-content-end">
                                    <label class="switch switch-primary switch-sm me-4 pe-2">
                                        <input type="checkbox" class="switch-input" data-id="{{ $design->id }}"
                                            {{ $design->status == '1' ? 'checked' : '' }}>
                                        <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                        </span>
                                    </label>
                                </div>
                            </td> --}}

                            <td>
                                <a href="{{ route($prefix.'.customizer-designs.edit', $design->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <a href="{{ route($prefix.'.customizer-designs.destroy', $design->id) }}" class="btn btn-sm btn-danger delete_confirm">Delete</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-end mt-3 me-3">
            <x-pagination :paginator="$customizerDesigns" />
        </div>

    </div>

    <style>
    </style>

    <script></script>

@endsection
