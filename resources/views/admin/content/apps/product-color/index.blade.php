@extends('admin.layouts/layoutMaster')

@section('title', 'eCommerce Product Colors - Apps')

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

@section('page-script')

@endsection

@section('content')
    <div class="d-flex align-items-center justify-content-between py-3 mb-4">
        <h4 class="mb-0">
            <span class="text-muted fw-light">eCommerce /</span> Product List / Product Colors
        </h4>
        <a href="{{route($prefix .'.app-ecommerce-product-color-add', $product->id)}}" class="btn btn-primary">Add Product Color</a>
    </div>


    <!-- Product List Table -->
    <div class="card">
        <div class="card-datatable table-responsive">
            <table class="datatables-products table">
                <thead class="border-top">
                    <tr>
                        <th>#</th>
                        <th>1st Color</th>
                        <th>1st Code</th>
                        <th>2nd Color</th>
                        <th>2nd Code</th>
                        <th>Front</th>
                        <th>Back</th>
                        <th>Left</th>
                        <th>Right</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productColors as $key => $color)
                        <tr>

                            <td>{{ $key + 1 }}</td>
                            <td>{{ $color->color_name_1 }}</td>
                            <td>{{ $color->color_code_1 }}</td>
                            <td>{{ $color->color_name_2 }}</td>
                            <td>{{ $color->color_code_2 }}</td>
                            <td>
                                @if (isset($color->front_image))
                                    <img src="{{ asset('storage/' . $color->front_image) }}" alt="Front Image"
                                        width="50">
                                @else
                                    No Front Image
                                @endif
                            </td>
                            <td>
                                @if (isset($color->back_image))
                                    <img src="{{ asset('storage/' . $color->back_image) }}" alt="Back Image"
                                        width="50">
                                @else
                                    No Back Image
                                @endif
                            </td>
                            <td>
                                @if (isset($color->left_image))
                                    <img src="{{ asset('storage/' . $color->left_image) }}" alt="Left Image"
                                        width="50">
                                @else
                                    No Left Image
                                @endif
                            </td>
                            <td>
                                @if (isset($color->right_image))
                                    <img src="{{ asset('storage/' . $color->right_image) }}" alt="Right Image"
                                        width="50">
                                @else
                                    No Right Image
                                @endif
                            </td>
                            <td>
                                <div class="d-flex justify-content-end">
                                    <label class="switch switch-primary switch-sm me-4 pe-2">
                                        <input type="checkbox" class="switch-input" data-id="{{ $color->id }}"
                                            {{ $color->visibility == '1' ? 'checked' : '' }}>
                                        <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                        </span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <a href="{{ route($prefix .'.app-ecommerce-product-color-edit', $color->id) }}"
                                    class="me-2"><i class="fa-solid fa-pen-to-square"></i></a>


                                <a href="{{ route($prefix .'.app-ecommerce-product-color-delete', $color->id) }}"
                                    class="me-2 delete-product delete_confirm" data-id="{{ $color->id }}">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-end mt-3 me-3">
            <x-pagination :paginator="$productColors" />
        </div>

    </div>

    <script>
        // Wait for the document to be ready
        document.addEventListener('DOMContentLoaded', function() {
            // Add event listener for checkbox changes
            document.querySelectorAll('.switch-input').forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    // Get the product ID and the new visibility value (1 for checked, 0 for unchecked)
                    const productColorId = this.dataset.id;
                    const visibility = this.checked ? '1' : '0';

                    // Send AJAX request to update visibility
                    fetch("{{ route($prefix . '.update.product-color.visibility', ':id') }}".replace(':id',
                    productColorId), {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                            body: JSON.stringify({
                                visibility: visibility
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                console.log('Visibility updated successfully');
                            } else {
                                console.error('Failed to update visibility');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                });
            });
        });
    </script>

@endsection
