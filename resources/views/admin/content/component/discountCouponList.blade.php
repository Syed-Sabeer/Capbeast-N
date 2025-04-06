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
        <span class="text-muted fw-light">eCommerce /</span> Discount Coupon List
    </h4>
    <a href="{{ route($prefix.'.content-discount-coupon-add') }}" class="btn btn-primary">Add New Coupon</a>
</div>


<!-- Internal Status Table -->
<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">Discount Coupon List</h5>
    </div>
    <div class="card-datatable table-responsive">
        <table class="table">
            <thead class="border-top" style="text-align: center">
                <tr>
                  
                    <th>Title</th>
                    <th>Code</th>
                    <th>Discount For</th>
                    <th>Percentage</th>
                    <th>Availability</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody style="text-align: center">
                @foreach($discountCoupons as $coupon)
                <tr>
                    
                    <td>{{ $coupon->title }}</td>
                    <td>{{ $coupon->code }}</td>
                    <td>{{ $coupon->discount_type == 1 ? 'Product' : 'Printing' }}</td>
                    <td>{{ $coupon->percentage }}%</td>
                    <td>
                        <div class="w-25 d-flex ">
                            <label class="switch switch-primary switch-sm me-4 pe-2">
                                <input type="checkbox" class="switch-input" data-id="{{ $coupon->id }}" {{ $coupon->visibility == 1 ? 'checked' : '' }}>
                                <span class="switch-toggle-slider">
                                    <span class="switch-on"></span>
                                    <span class="switch-off"></span>
                                </span>
                            </label>
                        </div>
                    </td>
                    <td>
                        <a href="{{ route($prefix .'.content-discount-coupon-edit', $coupon->id) }}" class="btn btn-primary">Edit</a>
                        {{-- <form action="{{ route('content-discount-coupon-delete', $coupon->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form> --}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end mt-3 me-3">
        <x-pagination :paginator="$discountCoupons" />
      </div>
</div>
<script>
    // Wait for the document to be ready
    document.addEventListener('DOMContentLoaded', function() {
        // Add event listener for checkbox changes
        document.querySelectorAll('.switch-input').forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                
                const couponId = this.dataset.id;
                const visibility = this.checked ? 1 : 0;

                // Send AJAX request to update visibility
                fetch("{{ route($prefix .'.update.visibilitycoupon', ':id') }}".replace(':id', couponId), {
                        method: 'PATCH',
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
