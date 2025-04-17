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

@section('page-script')

@endsection

@section('content')
<div class="d-flex align-items-center justify-content-between py-3 mb-4">
    <h4 class="mb-0">
        <span class="text-muted fw-light">eCommerce /</span> Product List
    </h4>
    <a href="{{ route($prefix.'.app-ecommerce-product-add') }}" class="btn btn-primary">Add Product</a>
</div>


    <!-- Product List Table -->
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Filter</h5>
            <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
                <div class="col-md-4 product_status"></div>
                <div class="col-md-4 product_category"></div>
                <div class="col-md-4 product_stock"></div>
            </div>
        </div>
        <div class="card-datatable table-responsive">
            <table class="datatables-products table">
                <thead class="border-top">
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Product</th>
                        <th>S. Price</th>
                        <th>Brand</th>
                        <th>Category</th>
                        <th>SKU</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $key => $product)
                    <tr>

                        <td>{{ $key + 1 }}</td>

                        <td>
                            <img src="{{ asset('storage/' . (
                                $product->productColors->first()->front_image
                                ?? $product->productColors->first()->right_image
                                ?? $product->productColors->first()->left_image
                                ?? $product->productColors->first()->back_image
                                ?? 'ProductImages/default.jpg'
                            )) }}" alt="Product Image" width="50">



                        </td>


                        <td>{{ \Illuminate\Support\Str::limit($product->title, 20, '...') }}</td>


                        <td>
                            {{ $product->selling_price }}

                        </td>
                        <td>{{ $product->productBrand->title ?? 'No Brand' }}</td>
                        <td>{{ $product->categories->pluck('title')->implode(', ') ?: 'No Category' }}</td>
                        
                        <td>
                            {{ $product->sku }}

                        </td>
                        <td>
                            <div class="w-25 d-flex justify-content-end">
                                <label class="switch switch-primary switch-sm me-4 pe-2">
                                    <input type="checkbox" class="switch-input" data-id="{{ $product->id }}" {{ $product->visibility == 1 ? 'checked' : '' }}>
                                    <span class="switch-toggle-slider">
                                        <span class="switch-on"></span>
                                        <span class="switch-off"></span>
                                    </span>
                                </label>
                            </div>
                        </td>
                        <td>
                            <a href="{{ route($prefix .'.app-ecommerce-product-edit', $product->id) }}" class="me-2"><i class="fa-solid fa-pen-to-square"></i></a>


                            <a href="{{ route($prefix .'.app-ecommerce-product-delete', $product->id) }}" class="me-2 delete-product delete_confirm" data-id="{{ $product->id }}">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                            {{-- <a href="javascript:void(0);" class="me-2 delete-product" data-id="{{ $product->id }}">
                                <i class="fa-solid fa-trash"></i>
                            </a> --}}
                            <a data-bs-toggle="modal" data-bs-target="#onboardHorizontalImageModal"><i class="fa-solid fa-eye"></i></a>
                        </td>
                    </tr>


                    @endforeach

                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-end mt-3 me-3">
            <x-pagination :paginator="$products" />
          </div>

    </div>




       <!-- Form with Image horizontal Modal -->
       <div class="modal-onboarding modal fade animate__animated" id="onboardHorizontalImageModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content text-center">
            <div class="modal-header border-0">

              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              </button>
            </div>

            <div class="modal-body onboarding-horizontal p-0">

              <div class="onboarding-content mb-0">
                <h4 class="onboarding-title text-body">Product Basic Images</h4>
                <div class="onboarding-info">
                  <img src="{{ asset('storage/app/public/uploads/0x5Pm8HHpCgQY8xHs2cYlpKzozSfrkiNitKVX3jv.jpg') }}" alt="">
                </div>

              </div>

              <div class="onboarding-content mb-0">
                <h4 class="onboarding-title text-body">Product Detail</h4>
                <div class="onboarding-info">In this example you can see a form where you can request some additional
                  information from the customer when they land on the app page.</div>

              </div>

            </div>


            <div class="onboarding-content mb-0">
              <h4 class="onboarding-title text-body">Product Detail</h4>
              <div class="onboarding-info">In this example you can see a form where you can request some additional
                information from the customer when they land on the app page.</div>

            </div>

            <div class="modal-footer border-0">
              <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </div>
      </div>
      <!--/ Form with Image horizontal Modal -->




    <script>
        // Wait for the document to be ready
        document.addEventListener('DOMContentLoaded', function() {
            // Add event listener for checkbox changes
            document.querySelectorAll('.switch-input').forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    // Get the product ID and the new visibility value (1 for checked, 0 for unchecked)
                    const productId = this.dataset.id;
                    const visibility = this.checked ? 1 : 0;

                    // Send AJAX request to update visibility
                    fetch("{{ route($prefix .'.update.visibility', ':id') }}".replace(':id', productId), {
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
