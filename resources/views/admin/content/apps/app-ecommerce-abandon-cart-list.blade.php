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
    <script src="{{ asset('assets/vendor/libs/bootstrap/bootstrap.bundle.js') }}"></script>
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
                        {{-- <th>Cart Qty</th> --}}
                        <th>Cart Amount</th>
                        {{-- <th>Created At</th> --}}
                        <th>Updated At</th> <!-- New column -->
                        <th>Log</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($abandoncart as $item)
                        <tr>
                        <tr>
                            <td></td>
                            <td>{{ $item['user']->first_name ?? 'Unknown' }} {{ $item['user']->last_name ?? 'Unknown' }}
                            </td>
                            <td>{{ $item['user']->email ?? 'Unknown' }}</td>
                            <td>{{ $item['user']->contact_number ?? 'Unknown' }}</td>
                            {{-- <td>{{ $item['total_qty'] }}</td> --}}
                            <td>${{ number_format($item['total_amount'], 2) }}</td>
                            {{-- <td>{{ date('Y-m-d H:i', strtotime($item['created_at'])) }}</td> --}}
                            <td>{{ date('Y-m-d H:i', strtotime($item['updated_at'])) }}</td>

                            <td>
                                @if (isset($item['cart_error']) && $item['cart_error'])
                                    @php
                                        $badgeClass = 'bg-label-danger'; // Default
                                        switch (strtolower($item['cart_error']->error_status)) {
                                            case 'payment':
                                                $badgeClass = 'bg-label-danger';
                                                break;
                                            case 'shipping':
                                                $badgeClass = 'bg-label-warning';
                                                break;
                                            case 'checkout':
                                                $badgeClass = 'bg-label-info';
                                                break;
                                            case 'cart':
                                                $badgeClass = 'bg-label-info';
                                                break;
                                            default:
                                                $badgeClass = 'bg-label-danger';
                                        }
                                    @endphp
                                    <span class="badge {{ $badgeClass }}">{{ $item['cart_error']->error_status }}</span>
                                    @if ($item['cart_error']->error_status_detail)
                                        <button type="button" class="btn btn-sm btn-text-secondary p-0 ms-1"
                                            data-bs-toggle="modal"
                                            data-bs-target="#errorDetailModal{{ $item['user_id'] }}">
                                            <i class="fa-solid fa-info-circle"></i>
                                        </button>

                                        <!-- Error Detail Modal -->
                                        <div class="modal fade" id="errorDetailModal{{ $item['user_id'] }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Error Details -
                                                            {{ $item['cart_error']->error_status }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="alert {{ $badgeClass }} mb-0">
                                                            <p class="mb-0">
                                                                {{ $item['cart_error']->error_status_detail }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>

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

                                <a data-bs-toggle="modal"
                                    data-bs-target="#ViewAbandonCartCommentModal{{ $item['user_id'] }}" class="me-2"
                                    style="color: #7367f0 !important;">
                                    <span class="position-relative">
                                        <i class="fa-solid fa-comment-dots fs-5"></i>
                                        {{-- @if (count($item['comments']) > 0)
                                            <span
                                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                {{ count($item['comments']) }}
                                            </span>
                                        @endif --}}
                                    </span>
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
                                                                        <th>SKU</th>
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
                                                                                <td>{{ $cartItem->product->sku ?? 'No SKU Found' }}</td>
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



                                <!-- Modal -->
                                <div class="modal fade" id="ViewAbandonCartCommentModal{{ $item['user_id'] }}"
                                    tabindex="-1"
                                    aria-labelledby="ViewAbandonCartCommentModalLabel{{ $item['user_id'] }}"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                        <div class="modal-content shadow rounded-3">
                                            <div class="modal-header bg-light border-bottom">
                                                <h5 class="modal-title fw-bold">
                                                    <i class="fa-solid fa-comment-dots me-2 text-primary"></i>
                                                    Abandon Cart Comments - {{ $item['user']->first_name }}
                                                    {{ $item['user']->last_name }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body p-4">
                                                <!-- Comments Display Card -->
                                                <div class="card mb-4 shadow-sm">
                                                    <div class="card-header bg-primary text-white py-3">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <h6 class="mb-0 fw-bold">
                                                                <i class="fa-solid fa-comments me-2"></i>
                                                                Internal Comments
                                                            </h6>
                                                            <span
                                                                class="badge bg-light text-dark rounded-pill">{{ count($item['comments']) }}
                                                                comments</span>
                                                        </div>
                                                    </div>
                                                    <div class="card-body p-3"
                                                        id="comment-container-{{ $item['user_id'] }}"
                                                        style="max-height: 400px; overflow-y: auto;">
                                                        @forelse ($item['comments'] as $comment)
                                                            <div class="comment-item mb-3 p-3 border-bottom">
                                                                <div
                                                                    class="d-flex justify-content-between align-items-center mb-2">
                                                                    <div>
                                                                        <span
                                                                            class="fw-bold text-primary">{{ $comment->admin->email }}</span>
                                                                        <span
                                                                            class="badge bg-light text-dark ms-2">Staff</span>
                                                                    </div>
                                                                    <small
                                                                        class="text-muted">{{ Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</small>
                                                                </div>
                                                                <p class="mb-1 text-dark">{{ $comment->comment }}</p>
                                                            </div>
                                                        @empty
                                                            <div class="text-center p-4">
                                                                <i
                                                                    class="fa-solid fa-comment-slash fs-1 text-muted mb-3"></i>
                                                                <p class="text-muted">No comments available for this cart.
                                                                </p>
                                                            </div>
                                                        @endforelse
                                                    </div>
                                                </div>

                                                <!-- Add New Comment -->
                                                <div class="card shadow-sm">
                                                    <div class="card-header bg-light">
                                                        <h6 class="mb-0 fw-bold">
                                                            <i class="fa-solid fa-plus-circle me-2 text-primary"></i>
                                                            Add New Comment
                                                            @if (!$item['order_id'])
                                                                <span class="badge bg-warning text-dark ms-2">No Order
                                                                    Created Yet</span>
                                                            @endif
                                                        </h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <form id="abandon-comment-form-{{ $item['user_id'] }}"
                                                            class="comment-form" data-user-id="{{ $item['user_id'] }}"
                                                            data-order-id="{{ $item['order_id'] ?? $item['cart_id'] }}"
                                                            data-cart-id="{{ $item['cart_id'] }}">
                                                            <div class="mb-3">
                                                                <textarea class="form-control" id="comment-input-{{ $item['user_id'] }}" rows="3"
                                                                    placeholder="Add your comment here..." required></textarea>
                                                            </div>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <div>
                                                                    @if (!$item['order_id'])
                                                                        <small class="text-muted">
                                                                            <i class="fa-solid fa-info-circle me-1"></i>
                                                                            This cart doesn't have an order yet. Comments
                                                                            will be associated with the cart.
                                                                        </small>
                                                                    @endif
                                                                </div>
                                                                <button type="submit" class="btn btn-primary">
                                                                    <i class="fa-solid fa-paper-plane me-2"></i>
                                                                    Send Comment
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer bg-light">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get all comment forms
            const commentForms = document.querySelectorAll('.comment-form');

            // Add submit event listener to each form
            commentForms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();

                    const userId = this.getAttribute('data-user-id');
                    const orderId = this.getAttribute('data-order-id');
                    const commentInput = document.getElementById(`comment-input-${userId}`);
                    const commentContainer = document.getElementById(`comment-container-${userId}`);

                    // Debug info - log to console to help troubleshoot
                    console.log('User ID:', userId);
                    console.log('Order/Cart ID:', orderId);
                    console.log('Form data attributes:', this.dataset);

                    // Now the order_id should be either a valid order ID or a valid cart ID
                    if (!orderId) {
                        alert('No reference ID found. Cannot add comment.');
                        return;
                    }

                    submitComment(userId, orderId, commentInput.value, commentContainer,
                        commentInput);
                });
            });

            // Function to submit comment - extracted to avoid code duplication
            function submitComment(userId, orderId, comment, commentContainer, commentInput) {
                fetch("{{ route('abandonCartComment.store') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            order_id: orderId, // This will be a numeric value now
                            admin_id: "{{ auth()->user()->id }}",
                            comment: comment
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.status === 'success') {
                            // Check if comment container is empty (no comments message)
                            if (commentContainer.querySelector('.text-center')) {
                                commentContainer.innerHTML = '';
                            }

                            // Create new comment HTML
                            const newComment = `
                            <div class="comment-item mb-3 p-3 border-bottom">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div>
                                        <span class="fw-bold text-primary">${data.comment.admin.name}</span>
                                        <span class="badge bg-light text-dark ms-2">Staff</span>
                                    </div>
                                    <small class="text-muted">${data.formattedDate}</small>
                                </div>
                                <p class="mb-1 text-dark">${data.comment.comment}</p>
                            </div>
                        `;

                            // Insert new comment at the beginning
                            commentContainer.insertAdjacentHTML('afterbegin', newComment);

                            // Clear the input
                            commentInput.value = '';

                            // Update the comment count badge if it exists
                            const commentCountBadge = document.querySelector(
                                `[data-bs-target="#ViewAbandonCartCommentModal${userId}"] .badge`
                            );
                            if (commentCountBadge) {
                                const currentCount = parseInt(commentCountBadge.textContent) || 0;
                                commentCountBadge.textContent = currentCount + 1;
                            } else {
                                // Add badge if it doesn't exist
                                const commentIcon = document.querySelector(
                                    `[data-bs-target="#ViewAbandonCartCommentModal${userId}"] span`
                                );
                                if (commentIcon) {
                                    commentIcon.innerHTML += `
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        1
                                    </span>
                                `;
                                }
                            }
                        } else {
                            // Show error message from server if available
                            alert(data.message || 'Failed to add comment. Please try again.');
                            console.error('Server error:', data);
                        }
                    })
                    .catch(error => {
                        console.error('Error adding comment:', error);
                        alert('Failed to add comment. Please try again.');
                    });
            }
        });
    </script>

@endsection
