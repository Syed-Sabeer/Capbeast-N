@extends('main.layouts.master')

@section('main-container')

@component('main.components.breadcrumb', [
    'pageTitle' => 'Cart',
    'pageRoute' => 'cart',
    'imageURL' => asset('assetsMain/images/about.jpg') // Evaluated here
])
@endcomponent


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
                        <h5 class="mb-0 flex-grow-1 fw-medium">There are <span class="fw-bold product-count"></span> products in your cart</h5>
                        <div class="flex-shrink-0">
                            <a href="#!" class="text-decoration-underline link-secondary">Clear Cart</a>
                        </div>
                    </div>
                    @php
                    $subtotal = 0;
                @endphp

@foreach ($carts as $cart )
@php
$itemTotal = $cart->product->selling_price * $cart->quantity; 
$subtotal += $itemTotal;
@endphp

<div class="card product">
    <div class="card-body p-4">
        <div class="row gy-3">
            <div class="col-sm-auto">
                <div class="avatar-lg h-100">
                    <div class="avatar-title rounded py-3">
                        <img src="{{ asset('storage/' . (
                            $cart->color->front_image
                            ?? $cart->color->right_image
                            ?? $cart->color->left_image
                            ?? $cart->color->back_image
                            ?? 'ProductImages/default.jpg'
                        )) }}" alt="" class="avatar-lg ">
                        
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <a href="#!">
                    <h5 class="fs-16 lh-base mb-1">{{$cart->product->title}}</h5>
                </a>
                <ul class="list-inline text-muted fs-13 mb-3">
                    <li class="list-inline-item">Color : <span class="fw-medium">  {{ $cart->color->color_name_2 ? $cart->color->color_name_1 . ' & ' . $cart->color->color_name_2 : $cart->color->color_name_1 }}
                    </span></li>
                    <li class="list-inline-item">Size : <span class="fw-medium">{{$cart->size ?? 'OSFA'}}</span></li>
                </ul>
                <div class="input-step">
                    <button type="button" class="minus" data-cart-id="{{ $cart->id }}">–</button>
                    <input type="number" class="product-quantity" value="{{ $cart->quantity }}" min="1" readonly data-cart-id="{{ $cart->id }}">
                    <button type="button" class="plus" data-cart-id="{{ $cart->id }}">+</button>
                </div>
                
            </div>
            <div class="col-sm-auto">
                <div class="text-lg-end">
                    <p class="text-muted mb-1 fs-12">Item Price:</p>
                    <h5 class="fs-16">${{ number_format($cart->product->selling_price, 2) }}
                    </h5>
                </div>
            </div>
        </div>
    </div>

    <div class="card-footer">
        <div class="row align-items-center gy-3">
            <div class="col-sm">
                <div class="d-flex flex-wrap my-n1">
                    <div>
                        <a href="javascript:void(0);" class="d-block text-body p-1 px-2 remove-item-btn" data-item-id="{{ $cart->id }}">
                            <i class="ri-delete-bin-fill text-muted align-bottom me-1"></i> Remove
                        </a>
                    </div>
                    <div>
                        <a href="#!" class="d-block text-body p-1 px-2"><i class="ri-star-fill text-muted align-bottom me-1"></i> Add Wishlist</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-auto">
                <div class="d-flex align-items-center gap-2 text-muted">
                    <div>Total :</div>
                    <h5 class="fs-14 mb-0">$<span class="product-line-price">{{$itemTotal}}</span></h5>
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
                                                    <span id="subtotal-amount"><span>$</span>{{ number_format($subtotal, 2) }}</span>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td>Discount <span class="text-muted"></span>:</td>
                                                <td class="text-end cart-discount">
                                                    <span id="discount-amount">0.00</span>
                                                </td>
                                            </tr>
                                            
                                            <tr class="table-active">
                                                <th>Total (USD) :</th>
                                                <td class="text-end">
                                                    <span id="final-total-amount"><span>$</span>{{ number_format($subtotal, 2) }}</span>
                                                </td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                                <!-- end table-responsive -->
                            </div>
                        </div>
                        <div class="hstack gap-2 justify-content-end">
                            <a href="{{ route('products') }}" class="btn btn-hover btn-danger">Continue Shopping</a>
                            <a href="{{ route('checkout') }}" class="btn btn-hover btn-success" >Check Out <i class="ri-logout-box-r-line align-bottom ms-1"></i></a>
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
    button.addEventListener('click', function () {
        const cartItemId = this.getAttribute('data-item-id'); // Fetching the cart item ID

        // Confirm deletion
        if (confirm("Are you sure you want to delete this item from your cart?")) {
            // Generate the URL using the route helper
            const url = "{{ route('cart.remove', ['itemId' => '__ITEM_ID__']) }}".replace('__ITEM_ID__', cartItemId);

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
    document.querySelector('.link-secondary').addEventListener('click', function (e) {
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
    $(document).ready(function () {
    let isUpdating = false; // Prevent multiple simultaneous updates

    $(".plus, .minus").click(function () {
        if (isUpdating) return; // Ignore clicks if an update is in progress

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

        updateCartQuantity(cartId, currentQuantity, function () {
            isUpdating = false; // Reset after request completes
        });
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
            success: function (response) {
                if (response.success) {
                    let itemPrice = parseFloat(
                        $(`.product[data-cart-id="${cartId}"]`).find(".fs-16").text().replace("$", "")
                    );
                    let totalItemPrice = (itemPrice * newQuantity).toFixed(2);
                    $(`.product-line-price[data-cart-id="${cartId}"]`).text(`$${totalItemPrice}`);

                    $("#subtotal-amount").text(`$${response.subtotal}`);
                    $("#final-total-amount").text(`$${response.total}`);
                }
            },
            error: function () {
                alert("Failed to update cart. Try again.");
            },
            complete: function () {
                if (callback) callback(); // Unlock clicking when request finishes
            }
        });
    }
});

    </script>
    

    @endsection
