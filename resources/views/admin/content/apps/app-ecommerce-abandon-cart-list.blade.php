@extends('admin.layouts/layoutMaster')

@section('title', 'eCommerce Order List - Apps')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/customAdmin.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/app-ecommerce-order-list.js') }}"></script>
@endsection

@section('content')
    <h4 class="py-3 mb-2">
        <span class="text-muted fw-light">eCommerce /</span> Abandon Cart List
    </h4>

    <!-- Order List Table -->
    <div class="card">
        <div class="card-datatable table-responsive">
            <table class=" table border-top">
                <thead>
                    <tr>
                        <th></th>
                        <th>Customer</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Cart Qty</th>
                        <th>Cart Amount</th>
                        <th>Created At</th>
                        <th>Updated At</th> <!-- New column -->
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($abandoncart as $item)
                        <tr>
                            <tr>
                                <td></td>
                                <td>{{ $item['user']->first_name ?? 'Unknown' }} {{ $item['user']->last_name ?? 'Unknown' }}</td>
                                <td>{{ $item['user']->email ?? 'Unknown' }}</td>
                                <td>{{ $item['user']->contact_number ?? 'Unknown' }}</td>
                                <td>{{ $item['total_qty'] }}</td>
                                <td>${{ number_format($item['total_amount'], 2) }}</td>
                                <td>{{ date('Y-m-d H:i', strtotime($item['created_at'])) }}</td>
                                <td>{{ date('Y-m-d H:i', strtotime($item['updated_at'])) }}</td>
                                

                    

                            <td>
                                @if ($item['status'] == 0)
                                    <span class="badge bg-label-danger">Not Reached</span>
                                @elseif ($item['status'] == 1)
                                    <span class="badge bg-label-success">Reached</span>
                                @endif
                            </td>

                            <td>
                                <a data-bs-toggle="modal" data-bs-target="#ViewAbandonCartModal{{ $item['user_id'] }}"
                                    class="me-2" style="color: #7367f0 !important;"><i class="fa-solid fa-eye"></i></a>
                                <a href="javascript:void(0);" class="me-2"
                                    onclick="toggleDropdown({{ $item['user_id'] }})">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </a>
                                <div id="dropdownMenu-{{ $item['user_id'] }}" class="custom-dropdown-content">
                                    <a href="javascript:void(0);" class="custom-dropdown-item"
                                        onclick="updateStatusCart({{ $item['user_id'] }}, 1)">Reached</a>
                                    <a href="javascript:void(0);" class="custom-dropdown-item"
                                        onclick="updateStatusCart({{ $item['user_id'] }}, 0)">Not Reached</a>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="ViewAbandonCartModal{{ $item['user_id'] }}" tabindex="-1"
                                    aria-labelledby="ViewAbandonCartModalLabel{{ $item['user_id'] }}" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"
                                                    id="ViewAbandonCartModalLabel{{ $item['user_id'] }}">
                                                    Abandoned Cart Details - {{ $item['user']->first_name }}
                                                    {{ $item['user']->last_name }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- User Information -->
                                                <div class="card mb-4">
                                                    <div class="card-header">
                                                        <h5 class="mb-0">Customer Information</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <p><strong>Name:</strong> {{ $item['user']->first_name }}
                                                                    {{ $item['user']->last_name }}</p>
                                                                <p><strong>Email:</strong> {{ $item['user']->email }}</p>
                                                                <p><strong>Phone:</strong>
                                                                    {{ $item['user']->contact_number ?? 'N/A' }}</p>
                                                            </div>
                                                            <div class="col-md-6">
                                                              <p><strong>Joined:</strong>
                                                                {{ optional($item['user']->created_at)->format('M d, Y') ?? 'N/A' }}
                                                            </p>
                                                            

                                                                {{-- <p><strong>Address:</strong>
                                                                    {{ $item['user']->address ?? 'N/A' }}</p> --}}
                                                                <p><strong>Country:</strong>
                                                                    {{ $item['user']->country ?? 'N/A' }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Cart Items -->
                                                <div class="card mb-4">
                                                    <div class="card-header">
                                                        <h5 class="mb-0">Cart Items</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Product</th>
                                                                        <th>Price</th>
                                                                        <th>Quantity</th>
                                                                        <th>Size</th>
                                                                        <th>Color</th>
                                                                        <th>Customization Price</th>
                                                                        <th>Subtotal</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @php
                                                                        $totalAmount = 0;
                                                                        $totalCustomizationPrice = 0;
                                                                    @endphp
                                                                    @foreach ($item['cart_items'] as $cartItem)
                                                                        @if ($cartItem->product)
                                                                            @php
                                                                                $productPrice =
                                                                                    $cartItem->product->selling_price;
                                                                                $quantity = $cartItem->quantity;
                                                                                $customizationPrice = $cartItem->userCustomization
                                                                                    ? $cartItem->userCustomization
                                                                                        ->price
                                                                                    : 0;
                                                                                $subtotal =
                                                                                    $productPrice * $quantity +
                                                                                    $customizationPrice;
                                                                                $totalAmount += $subtotal;
                                                                                $totalCustomizationPrice += $customizationPrice;
                                                                            @endphp
                                                                            <tr>
                                                                                <td>{{ $cartItem->product->title }}</td>
                                                                                <td>${{ number_format($productPrice, 2) }}
                                                                                </td>
                                                                                <td>{{ $quantity }}</td>
                                                                                <td>{{ $cartItem->size ?? 'OSFA' }}</td>
                                                                                <td>
                                                                                    {{ $cartItem->color->color_name_2 ? $cartItem->color->color_name_1 . ' & ' . $cartItem->color->color_name_2 : $cartItem->color->color_name_1 ?? 'N/A' }}
                                                                                </td>
                                                                                <td>${{ number_format($customizationPrice, 2) }}
                                                                                </td>
                                                                                <td>${{ number_format($subtotal, 2) }}</td>
                                                                            </tr>
                                                                            @if ($cartItem->userCustomization)
                                                                                <tr>
                                                                                    <td colspan="7" class="bg-light">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <div
                                                                                                    class="d-flex justify-content-between align-items-center mb-2">
                                                                                                    <h6 class="mb-0">
                                                                                                        Customization
                                                                                                        Details</h6>
                                                                                                    <button
                                                                                                        class="btn btn-sm btn-primary"
                                                                                                        type="button"
                                                                                                        data-bs-toggle="collapse"
                                                                                                        data-bs-target="#collapseCustomization{{ $cartItem->id }}"
                                                                                                        aria-expanded="false">
                                                                                                        View Details
                                                                                                    </button>
                                                                                                </div>
                                                                                                <div class="collapse"
                                                                                                    id="collapseCustomization{{ $cartItem->id }}">
                                                                                                    <div class="row mb-3">
                                                                                                        @if ($cartItem->userCustomization->front_image)
                                                                                                            <div
                                                                                                                class="col-md-3 mb-2">
                                                                                                                <div
                                                                                                                    class="card">
                                                                                                                    <div
                                                                                                                        class="card-header py-2">
                                                                                                                        <h6
                                                                                                                            class="mb-0 fs-12">
                                                                                                                            Front
                                                                                                                            Image
                                                                                                                        </h6>
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="card-body p-2">
                                                                                                                        <a href="{{ asset($cartItem->userCustomization->front_image) }}"
                                                                                                                            target="_blank">
                                                                                                                            <img src="{{ asset($cartItem->userCustomization->front_image) }}"
                                                                                                                                class="img-fluid"
                                                                                                                                alt="Front">
                                                                                                                        </a>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        @endif

                                                                                                        @if ($cartItem->userCustomization->back_image)
                                                                                                            <div
                                                                                                                class="col-md-3 mb-2">
                                                                                                                <div
                                                                                                                    class="card">
                                                                                                                    <div
                                                                                                                        class="card-header py-2">
                                                                                                                        <h6
                                                                                                                            class="mb-0 fs-12">
                                                                                                                            Back
                                                                                                                            Image
                                                                                                                        </h6>
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="card-body p-2">
                                                                                                                        <a href="{{ asset($cartItem->userCustomization->back_image) }}"
                                                                                                                            target="_blank">
                                                                                                                            <img src="{{ asset($cartItem->userCustomization->back_image) }}"
                                                                                                                                class="img-fluid"
                                                                                                                                alt="Back">
                                                                                                                        </a>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        @endif

                                                                                                        @if ($cartItem->userCustomization->left_image)
                                                                                                            <div
                                                                                                                class="col-md-3 mb-2">
                                                                                                                <div
                                                                                                                    class="card">
                                                                                                                    <div
                                                                                                                        class="card-header py-2">
                                                                                                                        <h6
                                                                                                                            class="mb-0 fs-12">
                                                                                                                            Left
                                                                                                                            Image
                                                                                                                        </h6>
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="card-body p-2">
                                                                                                                        <a href="{{ asset($cartItem->userCustomization->left_image) }}"
                                                                                                                            target="_blank">
                                                                                                                            <img src="{{ asset($cartItem->userCustomization->left_image) }}"
                                                                                                                                class="img-fluid"
                                                                                                                                alt="Left">
                                                                                                                        </a>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        @endif

                                                                                                        @if ($cartItem->userCustomization->right_image)
                                                                                                            <div
                                                                                                                class="col-md-3 mb-2">
                                                                                                                <div
                                                                                                                    class="card">
                                                                                                                    <div
                                                                                                                        class="card-header py-2">
                                                                                                                        <h6
                                                                                                                            class="mb-0 fs-12">
                                                                                                                            Right
                                                                                                                            Image
                                                                                                                        </h6>
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="card-body p-2">
                                                                                                                        <a href="{{ asset($cartItem->userCustomization->right_image) }}"
                                                                                                                            target="_blank">
                                                                                                                            <img src="{{ asset($cartItem->userCustomization->right_image) }}"
                                                                                                                                class="img-fluid"
                                                                                                                                alt="Right">
                                                                                                                        </a>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        @endif
                                                                                                    </div>

                                                                                                    @if ($cartItem->userCustomization->customizerUploads && $cartItem->userCustomization->customizerUploads->count() > 0)
                                                                                                        <h6 class="mb-2">
                                                                                                            Custom Uploads
                                                                                                        </h6>
                                                                                                        <div
                                                                                                            class="row">
                                                                                                            @foreach ($cartItem->userCustomization->customizerUploads as $upload)
                                                                                                                <div
                                                                                                                    class="col-md-3 mb-2">
                                                                                                                    <div
                                                                                                                        class="card">
                                                                                                                        <div
                                                                                                                            class="card-body p-2">
                                                                                                                            <a href="{{ asset('storage/' . $upload->image) }}"
                                                                                                                                target="_blank">
                                                                                                                                <img src="{{ asset('storage/' . $upload->image) }}"
                                                                                                                                    class="img-fluid"
                                                                                                                                    alt="Upload">
                                                                                                                            </a>
                                                                                                                            <div
                                                                                                                                class="mt-2 text-center">
                                                                                                                                <a href="{{ asset('storage/' . $upload->image) }}"
                                                                                                                                    download
                                                                                                                                    class="btn btn-sm btn-primary">
                                                                                                                                    Download
                                                                                                                                </a>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            @endforeach
                                                                                                        </div>
                                                                                                    @endif
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            @endif
                                                                        @endif
                                                                    @endforeach
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th colspan="5" class="text-end">Subtotal:</th>
                                                                        <th colspan="2">
                                                                            ${{ number_format($item['total_amount'] - $totalCustomizationPrice, 2) }}
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th colspan="5" class="text-end">
                                                                            Digitization/Customization Fees:</th>
                                                                        <th colspan="2">
                                                                            ${{ number_format($totalCustomizationPrice, 2) }}
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th colspan="5" class="text-end">Total:</th>
                                                                        <th colspan="2">
                                                                            ${{ number_format($item['total_amount'], 2) }}
                                                                        </th>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="button" class="btn btn-primary"
                                                    onclick="updateStatusCart({{ $item['user_id'] }}, {{ $item['status'] == 0 ? 1 : 0 }})">
                                                    Mark as {{ $item['status'] == 0 ? 'Reached' : 'Not Reached' }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        const abandonCartUpdateRoute = "{{ route($prefix . '.admin.abandoncart.updateStatus', ['id' => '__ID__']) }}";
    </script>

    <script>
        function toggleDropdown(user_id) {
            const dropdown = document.getElementById(`dropdownMenu-${user_id}`);
            dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
        }

        function updateStatusCart(user_id, newStatus) {
            if (!user_id || user_id === 'null') {
                alert('Invalid user ID');
                return;
            }

            const url = abandonCartUpdateRoute.replace('__ID__', user_id);

            fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        status: newStatus
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    } else {
                        alert('Error updating status');
                    }
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
@endsection
