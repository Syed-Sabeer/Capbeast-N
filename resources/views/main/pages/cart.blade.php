@extends('main.layouts.master')

@section('main-container')
    @component('main.components.breadcrumb', [
        'pageTitle' => 'Cart',
        'pageRoute' => 'cart',
        'imageURL' => asset('assetsMain/images/about.jpg'), // Evaluated here
    ])
    @endcomponent
    {{-- @dd($carts); --}}

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-danger text-center text-capitalize mb-4 fs-14">
                        Orders placed on our website are <b>Not Refundable</b>
                    </div>
                </div>
            </div>
            <div class="row product-list justify-content-center">
                <div class="col-lg-8">
                    <div class="d-flex align-items-center mb-4">
                        <h5 class="mb-0 flex-grow-1 fw-medium">There are <span class="fw-bold product-count"></span> products
                            in your cart</h5>
                        <div class="flex-shrink-0">
                            <a href="#!" class="text-decoration-underline link-secondary">Clear Cart</a>
                        </div>
                    </div>
                    @php
                        $subtotal = 0;
                    @endphp

                    @foreach ($carts as $cart)
                        @php
                            $customizationPrice = isset($cart->userCustomization) ? $cart->userCustomization->price : 0;
                            $itemTotal =
                                $cart->product->selling_price * $cart->quantity + $customizationPrice * $cart->quantity;
                            $subtotal += $itemTotal;
                        @endphp

                        <div class="card product">
                            <div class="card-body p-4">
                                <div class="row gy-3">
                                    <div class="col-sm-auto">
                                        <div class="avatar-lg h-100">
                                            <div class="avatar-title rounded py-3">
                                                @if ($cart->userCustomization)
                                                    <img src="{{ asset(
                                                        $cart->userCustomization->front_image ??
                                                            ($cart->userCustomization->right_image ??
                                                                ($cart->userCustomization->left_image ??
                                                                    ($cart->userCustomization->back_image ?? 'ProductImages/default.jpg'))),
                                                    ) }}"
                                                        alt="" class="avatar-lg ">
                                                @else
                                                    <img src="{{ asset(
                                                        'storage/' .
                                                            ($cart->color->front_image ??
                                                                ($cart->color->right_image ??
                                                                    ($cart->color->left_image ?? ($cart->color->back_image ?? 'ProductImages/default.jpg')))),
                                                    ) }}"
                                                        alt="" class="avatar-lg ">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <a href="#!">
                                            <h5 class="fs-16 lh-base mb-1">{{ $cart->product->title }}</h5>
                                        </a>
                                        <ul class="list-inline text-muted fs-13 mb-3">
                                            <li class="list-inline-item">Color : <span class="fw-medium">
                                                    {{ $cart->color->color_name_2 ? $cart->color->color_name_1 . ' & ' . $cart->color->color_name_2 : $cart->color->color_name_1 }}
                                                </span></li>
                                            <li class="list-inline-item">Size : <span
                                                    class="fw-medium">{{ $cart->size ?? 'OSFA' }}</span></li>
                                        </ul>
                                        <div class="input-step">
                                            <button type="button" class="minus"
                                                data-cart-id="{{ $cart->id }}">–</button>
                                            <input type="number" class="product-quantity" value="{{ $cart->quantity }}"
                                                min="1" readonly data-cart-id="{{ $cart->id }}">
                                            <button type="button" class="plus"
                                                data-cart-id="{{ $cart->id }}">+</button>
                                        </div>
                                        <div id="discount-info-{{ $cart->id }}"
                                            class="mt-2 text-success fs-13 fw-medium"></div>
                                        <div id="next-tier-info-{{ $cart->id }}" class="text-muted fs-12"></div>
                                    </div>
                                    <div class="col-sm-auto">
                                        <div class="text-lg-end">
                                            <p class="text-muted mb-1 fs-12">Item Price:
                                                <span class="original-price fs-16"
                                                    style="color: #000; font-weight:500; text-decoration: line-through;"
                                                    data-cart-id="{{ $cart->id }}">${{ number_format($cart->product->selling_price, 2) }}</span>
                                                <span class="discounted-price fs-16"
                                                    style="color: #28a745; font-weight:500;"
                                                    data-cart-id="{{ $cart->id }}"></span>
                                            </p>
                                            <p class="text-muted mb-1 fs-12">Customization Price: <span
                                                    class="customization-price fs-16"
                                                    style="color: #000; font-weight:500;">${{ number_format($customizationPrice, 2) }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="row align-items-center gy-3">
                                    <div class="col-sm">
                                        <div class="d-flex flex-wrap my-n1">
                                            <div>
                                                <a href="javascript:void(0);"
                                                    class="d-block text-body p-1 px-2 remove-item-btn"
                                                    data-item-id="{{ $cart->id }}">
                                                    <i class="ri-delete-bin-fill text-muted align-bottom me-1"></i> Remove
                                                </a>
                                            </div>
                                            <div>
                                                <a href="#!" class="d-block text-body p-1 px-2"><i
                                                        class="ri-star-fill text-muted align-bottom me-1"></i> Add
                                                    Wishlist</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-auto">
                                        <div class="d-flex align-items-center gap-2 text-muted">
                                            <div>Total :</div>
                                            <h5 class="fs-14 mb-0">$<span class="item-total-price"
                                                    data-cart-id="{{ $cart->id }}">{{ number_format($itemTotal, 2) }}</span>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach

                </div>
                <!--end col-->
                <div class="col-lg-4">
                    <div class="sticky-side-div">
                        {{-- <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <h6 class="mb-3 fs-15">Have a <span class="fw-semibold">promo</span> code ?</h6>
                                </div>
                                <div class="hstack gap-3 px-3 mx-n3">
                                    <input class="form-control me-auto" type="text" placeholder="Enter coupon code" value="" aria-label="Add Promo Code here...">
                                    <button type="button" class="btn btn-primary w-xs">Apply</button>
                                </div>
                            </div>
                        </div> --}}
                        <div class="card overflow-hidden">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0 fs-15">Order Summary</h5>
                            </div>
                            <div class="card-body pt-4">
                                <div class="table-responsive table-card">
                                    <table class="table table-borderless mb-0 fs-15">
                                        <tbody>
                                            <tr>
                                                <td>Sub Total :</td>
                                                <td class="text-end">
                                                    <span
                                                        id="subtotal-amount"><span>$</span>{{ number_format($subtotal, 2) }}</span>
                                                </td>
                                            </tr>

                                            <tr class="table-active">
                                                <th>Total (USD) :</th>
                                                <td class="text-end">
                                                    <span
                                                        id="final-total-amount"><span>$</span>{{ number_format($subtotal, 2) }}</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="hstack gap-2 justify-content-end">
                            <a href="{{ route('products') }}" class="btn btn-hover btn-danger">Continue Shopping</a>
                            <a href="{{ route('checkout') }}" class="btn btn-hover btn-success">Check Out <i
                                    class="ri-logout-box-r-line align-bottom ms-1"></i></a>
                            {{-- <button type="button" class="btn btn-hover btn-success" id="checkoutButton">Check Out <i class="ri-logout-box-r-line align-bottom ms-1"></i></button> --}}

                        </div>
                    </div>
                    <!-- end sticky -->
                </div>
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <!-- Add jQuery if it's not included -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // Remove a single item from the cart
        document.querySelectorAll('.remove-item-btn').forEach(button => {
            button.addEventListener('click', function() {
                const cartItemId = this.getAttribute('data-item-id'); // Fetching the cart item ID

                // Confirm deletion
                if (confirm("Are you sure you want to delete this item from your cart?")) {
                    // Generate the URL using the route helper
                    const url = "{{ route('cart.remove', ['itemId' => '__ITEM_ID__']) }}".replace(
                        '__ITEM_ID__', cartItemId);

                    // Sending a DELETE request
                    fetch(url, {
                            method: "DELETE", // Ensure the HTTP method is DELETE
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}", // CSRF token for security
                                "Content-Type": "application/json"
                            },
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                alert(result.message); // Show success message
                                location.reload(); // Reload page to update cart
                            } else {
                                alert(result.message); // Show error message if deletion failed
                            }
                        })
                        .catch(error => {
                            alert("An error occurred while deleting the item. Please try again.");
                            console.error("Error:", error);
                        });
                }
            });
        });


        // Clear all items from the cart
        document.querySelector('.link-secondary').addEventListener('click', function(e) {
            e.preventDefault();

            // Confirm the action
            if (confirm("Are you sure you want to clear your entire cart?")) {
                // Send a request to remove all items from the cart
                fetch("{{ route('cart.clear') }}", {
                        method: "DELETE",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "Content-Type": "application/json"
                        },
                    })
                    .then(response => response.json())
                    .then(result => {
                        if (result.success) {
                            alert(result.message); // Show success message
                            location.reload(); // Reload the page to reflect the changes
                        } else {
                            alert(result.message); // Show error message if the cart couldn't be cleared
                        }
                    })
                    .catch(error => {
                        alert("An error occurred while clearing the cart. Please try again.");
                        console.error("Error:", error);
                    });
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            let isUpdating = false;

            const volumeDiscounts = @json($cart->product->productVolumeDiscount->sortBy('quantity')->values());
            const sellingPrice = {{ $cart->product->selling_price }};
            const customizationPrice = {{ $customizationPrice }};

            function calculateVolumeDiscount(quantity, sellingPrice, volumeDiscounts) {
                let discount = 0;
                let nextTier = null;

                for (let i = volumeDiscounts.length - 1; i >= 0; i--) {
                    if (quantity >= volumeDiscounts[i].quantity) {
                        discount = volumeDiscounts[i].discount;
                        break;
                    }
                    nextTier = volumeDiscounts[i];
                }

                const discountedPrice = sellingPrice - (sellingPrice * (discount / 100));

                return {
                    discountedPrice,
                    discount,
                    nextTier
                };
            }

            function updatePriceDisplay(cartId, quantity) {
                const $discountInfo = $(`#discount-info-${cartId}`);
                const $nextTierInfo = $(`#next-tier-info-${cartId}`);
                const $itemTotalPrice = $(`.item-total-price[data-cart-id="${cartId}"]`);
                const $originalPrice = $(`.original-price[data-cart-id="${cartId}"]`);
                const $discountedPrice = $(`.discounted-price[data-cart-id="${cartId}"]`);

                const result = calculateVolumeDiscount(quantity, sellingPrice, volumeDiscounts);
                const discountedItemPrice = result.discountedPrice * quantity;
                const totalItemPrice = discountedItemPrice + (customizationPrice * quantity);

                if (result.discount > 0) {
                    $discountInfo.text(`You're saving ${result.discount}%!`);
                    $originalPrice.show();
                    $discountedPrice.text(`$${result.discountedPrice.toFixed(2)}`);
                } else {
                    $discountInfo.text('');
                    $originalPrice.hide();
                    $discountedPrice.text(`$${sellingPrice.toFixed(2)}`);
                }

                $itemTotalPrice.text(totalItemPrice.toFixed(2));

                if (result.nextTier) {
                    const itemsNeeded = result.nextTier.quantity - quantity;
                    $nextTierInfo.text(`Add ${itemsNeeded} more to get ${result.nextTier.discount}% off!`);
                } else {
                    $nextTierInfo.text('');
                }

                // Update order summary
                updateOrderSummary();
            }

            function updateOrderSummary() {
                let newSubtotal = 0;

                $('.item-total-price').each(function() {
                    newSubtotal += parseFloat($(this).text());
                });

                $('#subtotal-amount').text(`$${newSubtotal.toFixed(2)}`);
                $('#final-total-amount').text(`$${newSubtotal.toFixed(2)}`);
            }

            $(".plus, .minus").click(function() {
                if (isUpdating) return;

                isUpdating = true;
                let cartId = $(this).data("cart-id");
                let $input = $(`.product-quantity[data-cart-id="${cartId}"]`);
                let currentQuantity = parseInt($input.val());
                let isIncrease = $(this).hasClass("plus");

                if (isIncrease) {
                    currentQuantity++;
                } else {
                    if (currentQuantity > 1) currentQuantity--;
                }

                $input.val(currentQuantity);
                updatePriceDisplay(cartId, currentQuantity);

                updateCartQuantity(cartId, currentQuantity, function() {
                    isUpdating = false;
                });
            });

            // Initialize price displays for all items
            $('.product-quantity').each(function() {
                const cartId = $(this).data('cart-id');
                const quantity = parseInt($(this).val());
                updatePriceDisplay(cartId, quantity);
            });

            function updateCartQuantity(cartId, newQuantity, callback) {
                $.ajax({
                    url: "{{ route('cart.update') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        cart_id: cartId,
                        quantity: newQuantity,
                    },
                    success: function(response) {
                        if (response.success) {
                            if (callback) callback();
                        } else {
                            alert("Failed to update quantity");
                        }
                    },
                    error: function() {
                        alert("Failed to update cart. Try again.");
                        if (callback) callback();
                    }
                });
            }
        });
    </script>
@endsection
