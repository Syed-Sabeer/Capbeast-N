@extends('main.layouts.master')




<!-- Include jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Select2 CSS from CDN -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<!-- Include Select2 JS from CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('#country').select2({
            placeholder: 'Select Country',
            width: '100%' // ensure full width styling
        });
    });
</script>

</script>
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
                                            <th scope="col">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $subtotal = 0;
                                        @endphp

                                        @foreach ($cart as $item)
                                        @php
                                        $itemTotal = $item->product->selling_price * $item->quantity;
                                        $subtotal += $itemTotal;
                                        @endphp

                                            <tr>
                                                <td class="text-start">
                                                    <div class="d-flex align-items-center gap-2">
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <div class="avatar-title  rounded-3">
                                                                <img src="{{ asset('storage/' . (
                                                                    $item->color->front_image
                                                                    ?? $item->color->right_image
                                                                    ?? $item->color->left_image
                                                                    ?? $item->color->back_image
                                                                    ?? 'ProductImages/default.jpg'
                                                                )) }}"
                                                                    alt="" class="avatar-xs">
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 style="margin-left: 5%">{{ $item->product->title }}</h6>
                                                            {{-- <p class="text-muted mb-0">{{ $item->printing->title }}</p> --}}
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    {{ $item->quantity }}
                                                </td>
                                                <td class="text-end">
                                                    ${{ $item->product->selling_price  }}
                                                </td>
                                                <td class="text-end">
                                                    ${{ $item->product->selling_price * $item->quantity }}
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
                                <h5 class="mb-0">Shipping Details</h5>
                            </div>

                        </div>
                        <div class="row gy-3">
                            <form>
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                <div class="row mb-4">
                                    <div class="col">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="form6Example1">First name *</label>
                                            <input type="text" id="firstname" name="firstname" class="form-control"
                                                required />

                                        </div>
                                    </div>
                                    <div class="col">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="form6Example2">Last name *</label>
                                            <input type="text" id="lastname" name="lastname" class="form-control"
                                                required />
                                        </div>
                                    </div>
                                </div>

                                <!-- Text input -->
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label" for="form6Example3">Company name </label>
                                    <input type="text" id="companyname" name="companyname" class="form-control"
                                         />
                                </div>

                                <!-- Text input -->
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label" for="form6Example4">Address *</label>
                                    <input type="text" id="address" name="address" class="form-control" required />
                                </div>

                                <input type="number" id="weight" placeholder="Weight (kg)">
                                <input type="number" id="length" placeholder="Length (cm)">
                                <input type="number" id="width" placeholder="Width (cm)">
                                <input type="number" id="height" placeholder="Height (cm)">
                                <input type="text" id="country" placeholder="Country">
                                <input type="text" id="postal_code" placeholder="Postal Code">
                                
                                



                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label" for="country">Country *</label>
                                    <select id="country" name="country" class="select2 form-select" required>

                                        @foreach ($countries as $code => $name)
                                            <option value="{{ $code }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <!-- Email input -->
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label" for="form6Example5">Email *</label>
                                    <input type="email" id="email" name="email" class="form-control" required />

                                </div>
                                <!-- Number input -->
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label" for="form6Example6">Phone *</label>
                                    <input type="number" id="phone" name="phone" class="form-control" required />
                                </div>
                                <!-- Message input -->
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label" for="form6Example7">Additional information</label>
                                    <textarea class="form-control" id="additional_info" name="additional_info" rows="4"></textarea>
                                </div>
                            </form>
                        </div>
                    </div>


                    <div class="mt-4 pt-2">
                        <div class="row gy-3">
                            <h5 class="mb-0 flex-grow-1">Payment Selection</h5>

                            <!-- PayPal Option -->
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="paypalOption"
                                    value="paypal" checked>
                                <label class="form-check-label" for="paypalOption">
                                    Pay with PayPal
                                </label>
                            </div>

                            <!-- Authorize.Net Option -->
                            {{-- <div class="form-check">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="authorizeNetOption" value="authorize_net">
                                <label class="form-check-label" for="authorizeNetOption">
                                    Pay with Authorize.Net
                                </label>
                            </div> --}}
                        </div>
                        <!-- Authorize.Net Card Details -->
                        <div id="authorizeNetCardDetails" class="mt-3" style="display: none;">
                            <h6 class="mb-3">Enter Card Details</h6>
                            <div class="row gy-3">
                                <div class="col-md-6">
                                    <label class="form-label" for="cardNumber">Card Number</label>
                                    <input type="text" id="cardNumber" name="cardNumber" class="form-control"
                                        placeholder="1234 5678 9012 3456">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="cardName">Cardholder Name</label>
                                    <input type="text" id="cardName" name="cardName" class="form-control"
                                        placeholder="John Doe">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="expiryDate">Expiry Date</label>
                                    <input type="text" id="expiryDate" name="expiryDate" class="form-control"
                                        placeholder="MM/YY">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="cvv">CVV</label>
                                    <input type="text" id="cvv" name="cvv" class="form-control"
                                        placeholder="123">
                                </div>

                                <input type="hidden" id="discount" name="discount" value="">
                            </div>
                        </div>
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', () => {
                            const paypalOption = document.getElementById('paypalOption');
                            const authorizeNetOption = document.getElementById('authorizeNetOption');
                            const authorizeNetCardDetails = document.getElementById('authorizeNetCardDetails');

                            // Toggle card details visibility based on the selected payment method
                            function toggleCardDetails() {
                                if (authorizeNetOption.checked) {
                                    authorizeNetCardDetails.style.display = 'block';
                                } else {
                                    authorizeNetCardDetails.style.display = 'none';
                                }
                            }
                            // Add event listeners
                            paypalOption.addEventListener('change', toggleCardDetails);
                            authorizeNetOption.addEventListener('change', toggleCardDetails);

                            // Initialize the visibility
                            toggleCardDetails();
                        });
                    </script>
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
                                        id="couponCode" value="" aria-label="Add Promo Code here...">
                                    <button type="button" class="btn btn-success w-xs" id="applyCoupon">Apply</button>

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
                                                    <td class="text-end cart-subtotal">

                                                       {{ number_format($subtotal, 2) }}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Discount :</td>
                                                    <td class="text-end cart-discount">
                                                       <span id="discount-amount">0.00</span>
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <td>TPS Tax {{ $TPStaxPercentage->percentage }}% ({{ $TPStaxPercentage->taxno }}) :</td>
                                                    <td class="text-end tps-cart-tax"
                                                        tps-data-percentage="{{ $TPStaxPercentage->percentage }}"
                                                        tps-data-taxno="{{ $TPStaxPercentage->taxno }}"
                                                        tps-data-tax="{{ $TPStaxPercentage->percentage }}">

                                                        {{-- Dynamic currency symbols with JS updatable ID --}}
                                                        <span id="tps-tax-amount">0.00</span>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>TVQ Tax {{ $TVQtaxPercentage->percentage }}% ({{ $TVQtaxPercentage->taxno }}) :</td>
                                                    <td class="text-end tvq-cart-tax"
                                                        tvq-data-percentage="{{ $TVQtaxPercentage->percentage }}"
                                                        tvq-data-taxno="{{ $TVQtaxPercentage->taxno }}"
                                                        tvq-data-tax="{{ $TVQtaxPercentage->percentage }}">

                                                        {{-- Dynamic currency symbols with JS updatable ID --}}
                                                        <span id="tvq-tax-amount">0.00</span>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Shipping Rate:</td>
                                                    <td class="text-end"><span id="shipping-rate">Calculating...</span></td>
                                                </tr>
                                                
                                                <tr class="table-active">
                                                    <th>Total (  ) :</th>
                                                    <td class="text-end">
                                                        {{-- Currency symbol components stay, only amount updates --}}
                                                     <span id="final-total-amount">{{ number_format($subtotal, 2) }}</span>
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
                                    {{ count($cart) == 0 ? 'disabled' : '' }} onclick="proceedToCheckout()">
                                    Proceed to Pay <i class="ri-logout-box-r-line align-bottom ms-1"></i>
                                </button>
                            </div>

                        </div>
                        <!-- end sticky -->
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section>

        <script>
            let appliedDiscount = 0;
            let discountId = null;
        
            document.addEventListener('DOMContentLoaded', function () {
        
                // Function to update tax and total amounts
                function updateTaxAndTotal(subtotal, appliedDiscount = 0) {
                    let TPStaxElement = document.querySelector('.tps-cart-tax');
                    let TVQtaxElement = document.querySelector('.tvq-cart-tax');
                    let totalElement = document.querySelector('.cart-total');
        
                    // Get tax percentages from the server-side variables
                    let TPStaxPercentage = parseFloat(TPStaxElement.getAttribute('tps-data-tax')) || 0;
                    let TVQtaxPercentage = parseFloat(TVQtaxElement.getAttribute('tvq-data-tax')) || 0;
        
                    let discountedTotal = subtotal - appliedDiscount;
                    if (discountedTotal < 0) discountedTotal = 0; // Prevent negative totals
        
                    // Update userCountry dynamically
                    let userCountry = $('#country').val();
        
                    // If the country is Canada, apply TPS and TVQ taxes
                    let TPStaxAmount = userCountry === "CA" ? (discountedTotal * TPStaxPercentage) / 100 : 0;
                    let TVQtaxAmount = userCountry === "CA" ? (discountedTotal * TVQtaxPercentage) / 100 : 0;
                    let finalTotal = discountedTotal + TPStaxAmount + TVQtaxAmount;
        
                    // ✅ Only update the amount, keep symbols intact
                    document.getElementById('tps-tax-amount').textContent = TPStaxAmount.toFixed(2);
                    document.getElementById('tvq-tax-amount').textContent = TVQtaxAmount.toFixed(2);
                    document.getElementById('final-total-amount').textContent = finalTotal.toFixed(2);
                }
        
                // Function to get the subtotal value from the DOM
                function getSubtotal() {
                    let subtotalElement = document.querySelector('.cart-subtotal');
                    return parseFloat(subtotalElement.innerText.replace(/[^0-9.]/g, '')) || 0;
                }
        
                // Initial Tax Calculation on Load
                updateTaxAndTotal(getSubtotal());
        
                document.getElementById('applyCoupon').addEventListener('click', function () {
                    let couponCode = document.getElementById('couponCode').value;
        
                    fetch("{{ route('apply.discount') }}", {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "Content-Type": "application/json",
                        },
                        body: JSON.stringify({ coupon_code: couponCode })
                    })
                    .then(response => response.json())
                    .then(result => {
                        if (result.success) {
                            alert(result.message);
                            appliedDiscount = parseFloat(result.discount) || 0;
                            discountId = result.discountId ?? null;
        
                            // ✅ Only update the amount, keep symbols intact
                            document.getElementById('discount-amount').textContent = appliedDiscount.toFixed(2);
        
                            updateTaxAndTotal(getSubtotal(), appliedDiscount);
                        } else {
                            alert(result.message);
                        }
                    })
                    .catch(error => console.error('Error:', error));
                });
        
                // Fetch shipping rate based on country, weight, and dimensions
            // Fetch shipping rate based on country, weight, and dimensions
function getShippingRate() {
    let weightElement = document.getElementById('weight');
    let lengthElement = document.getElementById('length');
    let widthElement = document.getElementById('width');
    let heightElement = document.getElementById('height');
    let countryElement = document.getElementById('country');
    let postalCodeElement = document.getElementById('postal_code');

    // Ensure all required input fields are filled
    if (!weightElement.value || !lengthElement.value || !widthElement.value || !heightElement.value || !countryElement.value || !postalCodeElement.value) {
        console.log('Form is incomplete, shipping rate calculation cannot proceed.');
        return; // Don't proceed if the form is incomplete
    }

    // Extract values from the input fields
    let weight = parseFloat(weightElement.value);
    let length = parseFloat(lengthElement.value);
    let width = parseFloat(widthElement.value);
    let height = parseFloat(heightElement.value);
    let country = countryElement.value;
    let postalCode = postalCodeElement.value;

    // Show "Calculating..." until the result is fetched
    document.getElementById('shipping-rate').textContent = 'Calculating...';

    fetch("{{ route('shipping.rate') }}", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            weight: weight,
            length: length,
            width: width,
            height: height,
            country: country,
            postal_code: postalCode,
        })
    })
    .then(response => {
        if (!response.ok) {
            console.error('Network response was not ok', response);
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(result => {
        if (result.success) {
            // Update the page with shipping rate, service name, and delivery time
            document.getElementById('shipping-rate').textContent = "$" + result.rate;
            document.getElementById('shipping-service').textContent = result.service_name;
            document.getElementById('shipping-delivery-time').textContent = result.delivery_time;
        } else {
            console.error('Unable to fetch shipping rates: ', result.message);
            document.getElementById('shipping-rate').textContent = 'Error fetching rate';
        }
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById('shipping-rate').textContent = 'Error fetching rate';
    });
}

    // Event listener for Country change to update shipping rates
    document.getElementById('country').addEventListener('change', getShippingRate);

    // Trigger shipping rate calculation once the form is filled completely
    const formFields = ['weight', 'length', 'width', 'height', 'country', 'postal_code'];
    formFields.forEach(field => {
        document.getElementById(field).addEventListener('input', function() {
            if (formFields.every(fieldId => document.getElementById(fieldId).value)) {
                getShippingRate();
            }
        });
    });

    // Event listener for Country change to update shipping rates
    document.getElementById('country').addEventListener('change', getShippingRate);

    // Initial Shipping Rate fetch when the page loads
    getShippingRate();

        
                // Event listener for Country change to update shipping rates
                document.getElementById('country').addEventListener('change', getShippingRate);
        
                // Checkout function
                function proceedToCheckout() {
                    if (confirm('Are you sure you want to proceed to checkout?')) {
                        let checkoutButton = document.getElementById('checkoutButton');
                        checkoutButton.innerHTML = 'Processing... <span class="spinner-border spinner-border-sm"></span>';
                        checkoutButton.disabled = true;
        
                        let subtotalElement = document.querySelector('.cart-subtotal');
                        let subtotal = parseFloat(subtotalElement.innerText.replace(/[^0-9.]/g, '')) || 0;
        
                        let TPStaxElement = document.querySelector('.tps-cart-tax');
                        let TPStaxAmount = parseFloat(TPStaxElement.innerText.replace(/[^0-9.]/g, '')) || 0;
                        let TPStaxNumber = TPStaxElement.getAttribute('tps-data-taxno');
                        let TPStaxPercentage = TPStaxElement.getAttribute('tps-data-percentage');
        
                        let TVQtaxElement = document.querySelector('.tvq-cart-tax');
                        let TVQtaxAmount = parseFloat(TVQtaxElement.innerText.replace(/[^0-9.]/g, '')) || 0;
                        let TVQtaxNumber = TVQtaxElement.getAttribute('tvq-data-taxno');
                        let TVQtaxPercentage = TVQtaxElement.getAttribute('tvq-data-percentage');
        
                        let finalTotal = subtotal - appliedDiscount + TPStaxAmount + TVQtaxAmount;
        
                        const formData = {
                            firstname: document.getElementById('firstname').value,
                            lastname: document.getElementById('lastname').value,
                            companyname: document.getElementById('companyname').value,
                            country: document.getElementById('country').value,
                            address: document.getElementById('address').value,
                            email: document.getElementById('email').value,
                            phone: document.getElementById('phone').value,
                            additional_info: document.getElementById('additional_info').value,
                            paymentMethod: document.querySelector('input[name="paymentMethod"]:checked')?.value,
                            DiscountAmount: appliedDiscount,
                            discountId: discountId ? discountId : null,
                            subtotal: subtotal,
                            TPStaxAmount: TPStaxAmount,
                            TPStaxNumber: TPStaxNumber,
                            TVQtaxAmount: TVQtaxAmount,
                            TPStaxPercentage: TPStaxPercentage,
                            TVQtaxPercentage: TVQtaxPercentage,
                            TVQtaxAmount: TVQtaxAmount,
                            TVQtaxNumber: TVQtaxNumber,
                            finalTotal: finalTotal
                        };
        
                        fetch("{{ route('checkout.add') }}", {
                            method: "POST",
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                "Content-Type": "application/json",
                            },
                            body: JSON.stringify(formData),
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                if (formData.paymentMethod === 'paypal') {
                                    window.location.href = result.paypalUrl;
                                } else {
                                    window.location.href = "{{ route('main.pages.success') }}?orderId=" + result.orderId;
                                }
                            } else {
                                alert(result.message);
                                checkoutButton.innerHTML = 'Proceed to Pay';
                                checkoutButton.disabled = false;
                            }
                        })
                        .catch(error => {
                            alert('An error occurred during checkout. Please try again.');
                            checkoutButton.innerHTML = 'Proceed to Pay';
                            checkoutButton.disabled = false;
                        });
                    }
                }
        
                // Add event listener to checkout button
                document.getElementById('checkoutButton').addEventListener('click', proceedToCheckout);
        
                // Initial Shipping Rate fetch when the page loads
                getShippingRate();
        
            });
        </script>
        



    @endsection
