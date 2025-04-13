@extends('main.layouts.master')

@section('main-container')
@component('main.components.breadcrumb', [
'pageTitle' => 'Checkout',
'pageRoute' => 'checkout',
'imageURL' => asset('assetsMain/images/about.jpg'), // Evaluated here
])
@endcomponent

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-danger alert-modern alert-dismissible fade show" role="alert">
                    <i class="bi bi-box-arrow-in-right icons"></i>No Cancellation of Orders after<a
                        href="auth-signin-basic.html" class="link-danger"><strong> 48 hours</strong>.</a>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div><!--end col-->
        </div><!--end row-->
        <div class="row">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive table-card">
                            <table class="table align-middle table-borderless table-nowrap text-center mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">Product</th>

                                        <th scope="col">Quantity</th>
                                        <th scope="col">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $subtotal = 0;
                                    @endphp

                                    @foreach ($cart as $item)
                                    @php
                                    $itemTotal =
                                    ($item->product_price +
                                    $item->printing_price +
                                    $item->delivery_price +
                                    $item->pompom_price) *
                                    $item->quantity;
                                    $subtotal += $itemTotal;
                                    @endphp
                                    <tr>
                                        <td class="text-start">
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="avatar-sm flex-shrink-0">
                                                    <div class="avatar-title  rounded-3">
                                                        <img src="{{ asset('storage/' . ($item->productBaseImages->first()->base_image ?? 'ProductImages/default.jpg')) }}"
                                                            alt="" class="avatar-xs">
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6>{{ $item->product->title }}</h6>
                                                    <p class="text-muted mb-0">{{ $item->printing->title }}</p>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            {{ $item->quantity }}
                                        </td>
                                        <td class="text-end">
                                            ${{ $item->product_price * $item->quantity + $item->printing_price * $item->quantity + $item->delivery_price * $item->quantity + $item->pompom_price * $item->quantity }}
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="mt-4 pt-2">
                    <div class="d-flex align-items-center mb-4">
                        <div class="flex-grow-1">
                            <h5 class="mb-0">Shipping Address</h5>
                        </div>

                    </div>
                    <div class="row gy-3">
                        <form>
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row mb-4">
                                <div class="col">
                                    <div data-mdb-input-init class="form-outline">
                                        <label class="form-label" for="form6Example1">First name *</label>
                                        <input type="text" id="firstname" name="firstname" class="form-control" />

                                    </div>
                                </div>
                                <div class="col">
                                    <div data-mdb-input-init class="form-outline">
                                        <label class="form-label" for="form6Example2">Last name *</label>
                                        <input type="text" id="lastname" name="lastname" class="form-control" />

                                    </div>
                                </div>
                            </div>

                            <!-- Text input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="form6Example3">Company name *</label>
                                <input type="text" id="companyname" name="companyname" class="form-control" />

                            </div>

                            <!-- Text input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="form6Example4">Address *</label>
                                <input type="text" id="address" name="address" class="form-control" />

                            </div>

                            <!-- Email input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="form6Example5">Email *</label>
                                <input type="email" id="email" name="email" class="form-control" />

                            </div>

                            <!-- Number input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="form6Example6">Phone *</label>
                                <input type="number" id="phone" name="phone" class="form-control" />

                            </div>

                            <!-- Message input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="form6Example7">Additional information</label>
                                <textarea class="form-control" id="additional_info" name="additional_info" rows="4"></textarea>

                            </div>

                            <!-- Checkbox -->

                        </form>
                    </div>
                </div>

                <div class="mt-4 pt-2">

                    <!-- Payment Selection -->
                    <div class="row gy-3">
                        <h5 class="mb-0 flex-grow-1">Payment Selection</h5>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="paypalRadio" value="paypal" checked>
                                <label class="form-check-label" for="paypalRadio">
                                    PayPal
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- PayPal Button container -->
                    <div id="paypal-button-container" style="display:none;"></div>

                </div>
            </div>
            <!-- end col -->
            <div class="col-lg-4">
                <div class="sticky-side-div">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <h6 class="mb-3 fs-14">Have a <span class="fw-semibold">promo</span> code ?</h6>
                            </div>
                            <div class="hstack gap-3 px-3 mx-n3">
                                <input class="form-control me-auto" type="text" placeholder="Enter coupon code"
                                    value="" aria-label="Add Promo Code here...">
                                <button type="button" class="btn btn-success w-xs">Apply</button>
                            </div>
                        </div>
                    </div>
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
                                            <td class="text-end cart-subtotal">${{ number_format($subtotal, 2) }}</td>
                                        </tr>

                                        <tr class="table-active">
                                            <th>Total (CAD) :</th>
                                            <td class="text-end">
                                                <span
                                                    class="fw-semibold cart-total">${{ number_format($subtotal, 2) }}</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- end table-responsive -->
                        </div>
                    </div>
                    <div class="hstack gap-2 justify-content-between justify-content-end">
                        <a href="{{ route('cart') }}" class="btn btn-hover btn-soft-info w-100">Back To Cart <i
                                class="ri-arrow-right-line label-icon align-middle ms-1"></i></a>
                        <button type="button" class="btn w-100 btn-hover btn-primary" id="checkoutButton"
                            {{ count($cart) == 0 ? 'disabled' : '' }}
                            onclick="proceedToCheckout()">
                            Proceed to Pay <i class="ri-logout-box-r-line align-bottom ms-1"></i>
                        </button>
                        {{-- <a href="payment.html" class="btn btn-hover btn-primary w-100"></a> --}}
                    </div>

                </div>
                <!-- end sticky -->
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section>

<script src="https://www.paypal.com/sdk/js?client-id=Af8VFR5vqMBFBhuG7PDUOyMKQdVfIgRdJpnAVadfD9kvTtX7IqA1WwEwjpl2y2y0fmrniznyatSO_C2t&currency=USD"></script>
<script>
    document.getElementById('checkoutButton').addEventListener('click', function() {
        const selectedPaymentMethod = document.querySelector('input[name="paymentMethod"]:checked').value;

        if (selectedPaymentMethod === 'paypal') {
            // Hide the checkout button and show the PayPal button container
            document.getElementById('checkoutButton').style.display = 'none';
            document.getElementById('paypal-button-container').style.display = 'block';

            // Render PayPal button
            paypal.Buttons({
                createOrder: function(data, actions) {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: '{{ number_format($subtotal, 2, ".", "") }}' // Ensure correct number format
                            }
                        }]
                    });
                },
                onApprove: function(data, actions) {
                    return actions.order.capture().then(function(details) {
                        // Handle successful payment here
                        fetch("{{ route('checkout.add') }}", {
                                method: "POST",
                                headers: {
                                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                    "Content-Type": "application/json",
                                },
                                body: JSON.stringify({
                                    firstname: document.getElementById('firstname').value,
                                    lastname: document.getElementById('lastname').value,
                                    companyname: document.getElementById('companyname').value,
                                    address: document.getElementById('address').value,
                                    email: document.getElementById('email').value,
                                    phone: document.getElementById('phone').value,
                                    additional_info: document.getElementById('additional_info').value,
                                    payment_method: 'paypal', // Store payment method
                                    transaction_id: data.orderID, // PayPal transaction ID
                                }),
                            })
                            .then(response => response.json())
                            .then(result => {
                                console.log(result);
                                if (result.success) {
                                    window.location.href = "{{ route('main.pages.success') }}?orderId=" + result.orderId;
                                } else {
                                    alert(result.message);
                                }
                            })
                            .catch(error => {
                                alert('An error occurred during checkout. Please try again.');
                                console.error(error); // Log the error for better insight.
                            });
                    });
                },
                onCancel: function(data) {
                    alert('Payment cancelled.');
                    // Optionally handle the cancellation here.
                }
            }).render('#paypal-button-container');
        }
    });
</script>

@endsection



Route::get('/checkout', [OrderController::class, 'index'])->name('checkout');
Route::post('/checkout/add', [OrderController::class, 'add'])->name('checkout.add');
Route::get('/order-success', [OrderController::class, 'orderSuccess'])->name('main.pages.success');
Route::get('/order-history', [OrderController::class, 'orderHistory'])->name('main.pages.orderhistory');
Route::post('/paypal/webhook', [OrderController::class, 'handleWebhook']);

// PayPal Routes
Route::get('/payment-success', [OrderController::class, 'paymentSuccess'])->name('payment.success');
Route::get('/payment-cancel', [OrderController::class, 'paymentCancel'])->name('payment.cancel');