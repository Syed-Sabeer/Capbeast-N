@extends('main.layouts.master')




<!-- Include jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Select2 CSS from CDN -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<!-- Include Select2 JS from CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        // Initialize Select2 with proper event handling
        $('#country').select2({
            placeholder: 'Select Country',
            width: '100%',
            theme: 'classic'
        }).on('select2:select', function(e) {
            calculateShipping();
            updateTaxRowsVisibility();
        });

        // Function to calculate shipping
        function calculateShipping() {
            const country = $('#country').val();
            const postalCode = $('#postal_code').val();
            const address = $('#address').val();

            if (!country || !postalCode || !address) {
                $('#shipping-methods-container').html(
                    '<div class="alert alert-warning">Please fill in all address fields</div>');
                return;
            }

            // Show loading in shipping method section
            $('#shipping-methods-container').html(
                '<div class="text-center">Calculating shipping rates...</div>');
            $('#shipping-amount').text('0.00');

            // Get cart items for shipping calculation
            const cartItems = @json($cart);
            const products = cartItems.map(item => {
                const product = item.product;
                console.log('Processing product:', product); // Debug log

                return {
                    weight: parseFloat(product.weight) || 0,
                    weight_unit: product.weight_unit || 'kg',
                    length: parseInt(product.length) || 0,
                    width: parseInt(product.width) || 0,
                    height: parseInt(product.height) || 0,
                    size_unit: product.size_unit || 'cm',
                    quantity: parseInt(item.quantity) || 1
                };
            }).filter(product =>
                product.weight > 0 &&
                product.length > 0 &&
                product.width > 0 &&
                product.height > 0
            );

            console.log('Processed products:', products); // Debug log

            if (products.length === 0) {
                $('#shipping-methods-container').html(
                    '<div class="alert alert-danger">Unable to calculate shipping: No valid products found. Please ensure all products have valid dimensions.</div>'
                );
                return;
            }

            $.ajax({
                url: "{{ route('shipping.calculate') }}",
                method: 'POST',
                data: {
                    destination: {
                        country: country,
                        postal_code: postalCode,
                        address: address
                    },
                    products: products
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success && response.shipping.rates) {
                        let shippingHtml = '<div class="shipping-methods-list">';
                        response.shipping.rates.forEach(rate => {
                            shippingHtml += `
                                <div class="form-check mb-2">
                                    <input class="form-check-input shipping-method-radio" type="radio" 
                                        name="shipping_method" 
                                        value="${rate.postage_type_id}" 
                                        id="shipping_${rate.postage_type_id}"
                                        data-price="${rate.total}"
                                        data-price-usd="${rate.price_usd || (rate.total * 0.75)}"
                                        data-service="${rate.postage_type}"
                                        data-days="${rate.delivery_days}">
                                    <label class="form-check-label" for="shipping_${rate.postage_type_id}">
                                        ${rate.postage_type} - $${(rate.price_usd || (rate.total * 0.75)).toFixed(2)} USD
                                        <br>
                                        <small class="text-muted">Estimated delivery: ${rate.delivery_days} days</small>
                                    </label>
                                </div>
                            `;
                        });
                        shippingHtml += '</div>';

                        // Update shipping section in order summary
                        $('#shipping-methods-container').html(shippingHtml);

                        // Select first shipping method by default
                        if (response.shipping.rates.length > 0) {
                            $('input[name="shipping_method"]:first').prop('checked', true).trigger(
                                'change');
                        }
                    } else {
                        $('#shipping-methods-container').html(
                            '<div class="alert alert-danger">Unable to calculate shipping rates</div>'
                        );
                        $('#shipping-amount').text('0.00');
                        updateTaxAndTotal(getSubtotal(), appliedDiscount, 0);
                    }
                },
                error: function(xhr) {
                    console.error('Shipping calculation error:', xhr);
                    $('#shipping-methods-container').html(
                        '<div class="alert alert-danger">Error calculating shipping rates</div>'
                    );
                    $('#shipping-amount').text('0.00');
                    updateTaxAndTotal(getSubtotal(), appliedDiscount, 0);
                }
            });
        }

        // Handle shipping method selection
        $(document).on('change', 'input[name="shipping_method"]', function() {
            const selectedRate = $(this).data('price');
            const selectedService = $(this).data('service');
            const selectedDays = $(this).data('days');

            $('#shipping-amount').text(selectedRate.toFixed(2));

            // Store shipping details for checkout
            window.selectedShipping = {
                method: $(this).val(),
                price: selectedRate,
                service: selectedService,
                estimated_days: selectedDays
            };

            updateTaxAndTotal(getSubtotal(), appliedDiscount, selectedRate);
        });

        // Remove any existing event listeners
        $('#country, #postal_code, #address').off('change keyup');

        // Add event listeners for all address fields
        let typingTimer;
        $('#postal_code, #address').on('change keyup', function() {
            clearTimeout(typingTimer);
            typingTimer = setTimeout(calculateShipping, 500);
        });

        // Function to update tax and total
        function updateTaxAndTotal(subtotal, discount = 0, shipping = 0) {
            const country = $('#country').val();
            let TPStaxElement = document.querySelector('.tps-cart-tax');
            let TVQtaxElement = document.querySelector('.tvq-cart-tax');

            let TPStaxPercentage = parseFloat(TPStaxElement.getAttribute('tps-data-tax')) || 0;
            let TVQtaxPercentage = parseFloat(TVQtaxElement.getAttribute('tvq-data-tax')) || 0;

            let discountedTotal = subtotal - discount;
            if (discountedTotal < 0) discountedTotal = 0;

            // Only apply taxes for Canadian addresses
            let TPStaxAmount = country === "CA" ? (discountedTotal * TPStaxPercentage) / 100 : 0;
            let TVQtaxAmount = country === "CA" ? (discountedTotal * TVQtaxPercentage) / 100 : 0;

            // Convert shipping to USD if needed
            let shippingUSD = shipping * 0.75;

            // Calculate final total with shipping in USD
            let finalTotal = (discountedTotal + TPStaxAmount + TVQtaxAmount + shipping) * 0.75;

            // Update display with USD values
            $('#tps-tax-amount').text((TPStaxAmount * 0.75).toFixed(2));
            $('#tvq-tax-amount').text((TVQtaxAmount * 0.75).toFixed(2));
            $('#shipping-amount').text(shippingUSD.toFixed(2));
            $('#final-total-amount').text(finalTotal.toFixed(2));

            // Store the USD total for PayPal
            window.paypalTotal = finalTotal;
        }

        // Function to get subtotal
        function getSubtotal() {
            return parseFloat($('.cart-subtotal').text().replace(/[^0-9.]/g, '')) || 0;
        }

        // Initial update
        updateTaxAndTotal(getSubtotal(), appliedDiscount, 0);

        // Remove the shipping-options-container div from the top of the page
        $('#shipping-options-container').remove();

        // Update the checkout button click handler to include shipping details
        $('#checkoutButton').on('click', function(event) {
            event.preventDefault();

            if (!window.selectedShipping) {
                alert('Please select a shipping method before proceeding.');
                return;
            }

            // Add shipping details to the form data
            const formData = new FormData();
            const selectedShippingMethod = window.selectedShipping;

            // Add shipping price to form data
            formData.append('shipping_price', selectedShippingMethod.price);
            formData.append('shipping_method', selectedShippingMethod.method);
            formData.append('shipping_service', selectedShippingMethod.service);
            formData.append('shipping_estimated_days', selectedShippingMethod.estimated_days);

            // Add shipping rate details to session
            sessionStorage.setItem('shipping_rate_details', JSON.stringify(selectedShippingMethod));

            // Continue with the checkout process
            proceedToCheckout(formData);
        });
    });
</script>

<style>
    .shipping-methods-list {
        margin: 10px 0;
    }

    .shipping-methods-list .form-check {
        padding: 10px;
        border: 1px solid #dee2e6;
        border-radius: 5px;
        margin-bottom: 8px;
        transition: all 0.2s ease;
    }

    .shipping-methods-list .form-check:hover {
        background-color: #f8f9fa;
        cursor: pointer;
    }

    .shipping-methods-list .form-check-input {
        margin-top: 6px;
    }

    .shipping-methods-list .form-check-label {
        width: 100%;
        cursor: pointer;
    }

    .shipping-methods-list .text-muted {
        font-size: 0.875em;
    }

    .select2-container--classic .select2-selection--single {
        height: 38px !important;
        border: 1px solid #dee2e6 !important;
    }

    .select2-container--classic .select2-selection--single .select2-selection__rendered {
        line-height: 36px !important;
    }

    .select2-container--classic .select2-selection--single .select2-selection__arrow {
        height: 36px !important;
    }
</style>

<div id="shipping-options-container"></div>

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
                                            <th scope="col">Item Price</th>
                                            <th scope="col">Cust. Price</th>
                                            <th scope="col">Pompom Price</th>
                                            <th scope="col">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $subtotal = 0;
                                        @endphp

                                        @foreach ($cart as $item)
                                            @php
                                                $customizationPrice = isset($item->userCustomization)
                                                    ? $item->userCustomization->price
                                                    : 0;
                                                $pompomPrice = isset($item->pompom_price) ? $item->pompom_price : 0;
                                                $itemTotal =
                                                    ($item->product->selling_price +
                                                        $customizationPrice +
                                                        $pompomPrice) *
                                                    $item->quantity;
                                                $subtotal += $itemTotal;
                                            @endphp

                                            <tr>
                                                <td class="text-start">
                                                    <div class="d-flex align-items-center gap-2">
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <div class="avatar-title  rounded-3">
                                                              @if ($item->userCustomization)
                                                                <img src="{{ asset(
                                                                        $item->userCustomization->front_image ??
                                                                            ($item->userCustomization->right_image ??
                                                                                ($item->userCustomization->left_image ??
                                                                                    ($item->userCustomization->back_image ?? 'ProductImages/default.jpg'))),
                                                                    ) }}"
                                                                        alt="" class="avatar-lg ">
                                                              @else
                                                                <img src="{{ asset(
                                                                    'storage/' .
                                                                        ($item->color->front_image ??
                                                                            ($item->color->right_image ??
                                                                                ($item->color->left_image ?? ($item->color->back_image ?? 'ProductImages/default.jpg')))),
                                                                    ) }}"
                                                                        alt="" class="avatar-lg ">
                                                              @endif
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 style="margin-left: 5%">{{ $item->product->title }}</h6>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    {{ $item->quantity }}
                                                </td>
                                                <td class="text-end">
                                                    ${{ $item->product->selling_price }}
                                                </td>
                                                <td class="text-end">
                                                    ${{ $customizationPrice }}
                                                </td>
                                                <td class="text-end">
                                                    ${{ $pompomPrice }}
                                                </td>
                                                <td class="text-end">
                                                    ${{ ($item->product->selling_price + $customizationPrice + $pompomPrice) * $item->quantity }}
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
                                    <input type="text" id="companyname" name="companyname" class="form-control" />
                                </div>

                                <!-- Text input -->
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label" for="address">Address *</label>
                                    <input type="text" id="address" name="address" class="form-control" required />
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div data-mdb-input-init class="form-outline">
                                    <label class="form-label" for="country">Country *</label>
                                            <select id="country" name="country" class="form-control" required>
                                                <option value="">Select Country</option>
                                        @foreach ($countries as $code => $name)
                                            <option value="{{ $code }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="postal_code">Postal Code *</label>
                                            <input type="text" id="postal_code" name="postal_code" class="form-control"
                                                required />
                                        </div>
                                    </div>
                                </div>

                                <div id="shipping-methods-container" class="mb-4">
                                    <!-- Shipping methods will be loaded here -->
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
                                                <td>TPS Tax {{ $TPStaxPercentage->percentage }}%
                                                    ({{ $TPStaxPercentage->taxno }}) :</td>
                                                <td class="text-end tps-cart-tax"
                                                    tps-data-percentage="{{ $TPStaxPercentage->percentage }}"
                                                    tps-data-taxno="{{ $TPStaxPercentage->taxno }}"
                                                    tps-data-tax="{{ $TPStaxPercentage->percentage }}">

                                                    {{-- Dynamic currency symbols with JS updatable ID --}}
                                                    <span id="tps-tax-amount">0.00</span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>TVQ Tax {{ $TVQtaxPercentage->percentage }}%
                                                    ({{ $TVQtaxPercentage->taxno }}) :</td>
                                                <td class="text-end tvq-cart-tax"
                                                    tvq-data-percentage="{{ $TVQtaxPercentage->percentage }}"
                                                    tvq-data-taxno="{{ $TVQtaxPercentage->taxno }}"
                                                    tvq-data-tax="{{ $TVQtaxPercentage->percentage }}">

                                                    {{-- Dynamic currency symbols with JS updatable ID --}}
                                                    <span id="tvq-tax-amount">0.00</span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Shipping Method:</td>
                                                <td class="text-end">
                                                    <div id="shipping-methods-container">
                                                        <!-- Shipping methods will be loaded here -->
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Shipping Cost:</td>
                                                <td class="text-end">
                                                    $<span id="shipping-amount">0.00</span>
                                                </td>
                                            </tr>
                                            
                                            <tr class="table-active">
                                                <th>Total ( ) :</th>
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
        const cartItems = @json($cart); // Your cart data passed from PHP
        document.addEventListener('DOMContentLoaded', function() {
    $('#address, #country').on('change', calculateShippingLive);

    function calculateShippingLive() {
        const country = $('#country').val();
        const postalCode = $('#address').val();
        
        // Prepare products data
        const products = cartItems?.map(item => {
            const product = item.product;
            
            // Handle missing product data (dimensions or weight)
            if (!product.weight || !product.length || !product.width || !product.height) {
                console.log("Missing product data:", product);
                
                // Default to zero if any product data is missing
                product.weight = product.weight || 3;
                product.weight_unit = product.weight_unit || 'kg';
                product.length = product.length || 3;
                product.width = product.width || 3;
                product.height = product.height || 3;
                product.size_unit = product.size_unit || 'cm';
                product.quantity = product.quantity || 1;
      
                alert("Product data was incomplete, using default values.");
            }
            
            return {
                weight: product.weight,
                weight_unit: 'kg',
                length: product.length,
                width: product.width,
                height: product.height,
                size_unit: 'cm',
                quantity: item.quantity
            };
                }).filter(item => item !== null); // Filter out null items

        if (products.length === 0) {
            alert("No items in the cart to calculate shipping.");
            return;
        }

        // Validate country and postal code
        if (!country || !postalCode) return;

        // Fetch shipping data
        fetch("{{ route('shipping.calculate') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                destination: {
                    country: country,
                    postal_code: postalCode
                },
                products: products
            })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success && data.shipping?.data?.length) {
                const shippingAmount = data.shipping.data[0].rate;
                document.getElementById('shipping-amount').textContent = shippingAmount.toFixed(2);
                updateTaxAndTotal(getSubtotal(), appliedDiscount, shippingAmount);
            } else {
                alert("Shipping rate unavailable for selected address.");
            }
        })
        .catch(err => {
            console.error(err);
            alert("Error calculating shipping.");
        });
    }

            function updateTaxAndTotal(subtotal, appliedDiscount = 0, shipping = 0) {
                let TPStaxElement = document.querySelector('.tps-cart-tax');
                let TVQtaxElement = document.querySelector('.tvq-cart-tax');
                let totalElement = document.querySelector('.cart-total');
    
                let TPStaxPercentage = parseFloat(TPStaxElement.getAttribute('tps-data-tax')) || 0;
                let TVQtaxPercentage = parseFloat(TVQtaxElement.getAttribute('tvq-data-tax')) || 0;
    
                let discountedTotal = subtotal - appliedDiscount;
                if (discountedTotal < 0) discountedTotal = 0;
    
                let userCountry = $('#country').val();
    
                let TPStaxAmount = userCountry === "CA" ? (discountedTotal * TPStaxPercentage) / 100 : 0;
                let TVQtaxAmount = userCountry === "CA" ? (discountedTotal * TVQtaxPercentage) / 100 : 0;
                let finalTotal = discountedTotal + TPStaxAmount + TVQtaxAmount + shipping;
    
                document.getElementById('tps-tax-amount').textContent = TPStaxAmount.toFixed(2);
                document.getElementById('tvq-tax-amount').textContent = TVQtaxAmount.toFixed(2);
                document.getElementById('final-total-amount').textContent = finalTotal.toFixed(2);
    
                console.log("User Country:", userCountry);
                console.log("Discount Id:", discountId);
                console.log("Subtotal: $" + subtotal.toFixed(2));
                console.log("Applied Discount: $" + appliedDiscount.toFixed(2));
                console.log("TPS Tax Amount: $" + TPStaxAmount.toFixed(2));
                console.log("TVQ Tax Amount: $" + TVQtaxAmount.toFixed(2));
                console.log("Total after Tax: $" + finalTotal.toFixed(2));
            }
    
            function getSubtotal() {
                let subtotalElement = document.querySelector('.cart-subtotal');
                return parseFloat(subtotalElement.innerText.replace(/[^0-9.]/g, '')) || 0;
            }
    
            updateTaxAndTotal(getSubtotal(), 0, 0);
    
            document.getElementById('applyCoupon').addEventListener('click', function() {
                let couponCode = document.getElementById('couponCode').value;
    
                fetch("{{ route('apply.discount') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({
                        coupon_code: couponCode
                    })
                })
                    .then(response => response.json())
                    .then(result => {
                        if (result.success) {
                            alert(result.message);
                            appliedDiscount = parseFloat(result.discount) || 0;
                            discountId = result.discountId ?? null;
    
                            document.getElementById('discount-amount').textContent = appliedDiscount
                                .toFixed(2);
                            updateTaxAndTotal(getSubtotal(), appliedDiscount);
                        } else {
                            alert(result.message);
                        }
                    })
                    .catch(error => console.error('Error:', error));
            });
    
            function proceedToCheckout(event) {
                event?.preventDefault();
                if (confirm('Are you sure you want to proceed to checkout?')) {
                    let checkoutButton = document.getElementById('checkoutButton');
                    checkoutButton.innerHTML =
                        'Processing... <span class="spinner-border spinner-border-sm"></span>';
                    checkoutButton.disabled = true;
    
                    let subtotal = getSubtotal();
    
                    let TPStaxElement = document.querySelector('.tps-cart-tax');
                    let TPStaxAmount = parseFloat(TPStaxElement.innerText.replace(/[^0-9.]/g, '')) || 0;
                    let TPStaxNumber = TPStaxElement.getAttribute('tps-data-taxno');
                    let TPStaxPercentage = TPStaxElement.getAttribute('tps-data-percentage');
    
                    let TVQtaxElement = document.querySelector('.tvq-cart-tax');
                    let TVQtaxAmount = parseFloat(TVQtaxElement.innerText.replace(/[^0-9.]/g, '')) || 0;
                    let TVQtaxNumber = TVQtaxElement.getAttribute('tvq-data-taxno');
                    let TVQtaxPercentage = TVQtaxElement.getAttribute('tvq-data-percentage');
    
                    // Use the USD total for PayPal
                    let finalTotal = window.paypalTotal || (subtotal - appliedDiscount + TPStaxAmount +
                        TVQtaxAmount) * 0.75;
    
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
                        TVQtaxNumber: TVQtaxNumber,
                        finalTotal: finalTotal,
                        shipping_method: window.selectedShipping.method,
                        shipping_price: window.selectedShipping.price,
                        shipping_service: window.selectedShipping.service,
                        shipping_estimated_days: window.selectedShipping.estimated_days
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
                                    window.location.href = "{{ route('main.pages.success') }}?orderId=" +
                                        result.orderId;
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
    
            const countriesRoute = "{{ route('countries.index') }}";
            let countrySelect = document.getElementById('country');
            let tpsTaxRow = document.querySelector('.tps-cart-tax').parentElement;
            let tvqTaxRow = document.querySelector('.tvq-cart-tax').parentElement;
    
            function setLoading(selectElement) {
                selectElement.innerHTML = '<option value="">Loading...</option>';
                selectElement.disabled = true;
            }
    
            function removeLoading(selectElement, placeholder) {
                selectElement.innerHTML = `<option value="">${placeholder}</option>`;
                selectElement.disabled = false;
            }
    
            setLoading(countrySelect);
            fetch(countriesRoute)
                .then(response => response.json())
                .then(data => {
                    removeLoading(countrySelect, "Select Country");
                    for (const [code, name] of Object.entries(data)) {
                        countrySelect.innerHTML += `<option value="${code}">${name}</option>`;
                    }
                    updateTaxRowsVisibility();
                })
                .catch(error => {
                    removeLoading(countrySelect, "Failed to load countries, Kindly Refresh the page");
                    console.error(error);
                });
    
            function updateTaxRowsVisibility() {
                if (countrySelect.value === "CA") {
                    tpsTaxRow.style.display = 'table-row';
                    tvqTaxRow.style.display = 'table-row';
                    updateTaxAndTotal(getSubtotal(), appliedDiscount);
                } else {
                    tpsTaxRow.style.display = 'none';
                    tvqTaxRow.style.display = 'none';
                }
            }
    
            $('#country').on('change', function() {
                console.log("Selected country code:", $(this).val());
                updateTaxRowsVisibility();
            });
    
            updateTaxRowsVisibility();
            document.getElementById('checkoutButton').addEventListener('click', proceedToCheckout);
        });
    </script>
@endsection
