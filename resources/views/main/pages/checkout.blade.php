@extends('main.layouts.master')




<!-- Include jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Select2 CSS from CDN -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<!-- Include Select2 JS from CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    const statesUrlTemplate = "{{ route('countries.states', ['code' => '__CODE__']) }}";
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

    .payment-logo {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 30px;
        padding: 0 10px;
        border-radius: 4px;
        color: white;
        font-weight: bold;
        font-size: 12px;
    }

    .paypal-logo {
        background: #0070ba;
    }

    .authorize-logo {
        background: #00a1e0;
    }
</style>
<script>
    $(document).ready(function() {
        let shippingCalculationInProgress = false;
        let lastValidState = '';
        let debounceTimer;

        // Initialize Select2 for country dropdown
        $('#country').select2({
            placeholder: 'Select Country',
            width: '100%',
            theme: 'classic'
        }).on('select2:select', function(e) {
            const countryCode = $(this).val();
            loadStates(countryCode);
            // Remove automatic shipping calculation when country is selected
            // if (countryCode) {
            //     debounceShippingCalculation();
            // }
            updateTaxRowsVisibility();
        });

        // Initialize Select2 for state dropdown
        $('#state').select2({
            placeholder: 'Select State/Province',
            width: '100%',
            theme: 'classic'
        }).on('select2:select', function(e) {
            lastValidState = $(this).val();
            // Remove the automatic shipping calculation when state is selected
            // if (lastValidState) {
            //     debounceShippingCalculation();
            // }
        });

        // Function to debounce shipping calculation
        function debounceShippingCalculation() {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(function() {
                if (validateShippingFields()) {
                    calculateShipping();
                }
            }, 500);
        }

        // Function to validate shipping fields
        function validateShippingFields() {
            const country = $('#country').val();
            const state = $('#state').val();
            const postalCode = $('#postal_code').val();
            const address = $('#address').val();
            const city = $('#city').val();

            if (!country || !state || !postalCode || !address || !city) {
                $('#shipping-methods-container').html(
                    '<div class="alert alert-warning">Please fill in all required shipping fields</div>');
                $('#shipping-amount').text('0.00');
                return false;
            }

            // Format Canadian postal codes (A1A 1A1)
            if (country === 'CA' && postalCode) {
                // Remove spaces and format as A1A 1A1
                let formatted = postalCode.toUpperCase().replace(/\s+/g, '');
                if (formatted.length > 0) {
                    // Insert a space in the middle if length is at least 4
                    if (formatted.length >= 4) {
                        formatted = formatted.substring(0, 3) + ' ' + formatted.substring(3);
                    }

                    // Truncate if too long
                    if (formatted.length > 7) {
                        formatted = formatted.substring(0, 7);
                    }

                    // Update field value
                    $('#postal_code').val(formatted);
                }
            }

            return true;
        }

        // Function to load states based on country
        function loadStates(countryCode) {
            if (!countryCode) {
                $('#state').empty().append('<option value="">Select State/Province</option>');
                return;
            }

            const url = statesUrlTemplate.replace('__CODE__', countryCode);

            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    $('#state').empty().append('<option value="">Select State/Province</option>');
                    response.forEach(function(state) {
                        $('#state').append(
                            `<option value="${state.code}">${state.name}</option>`);
                    });
                },
                error: function(xhr) {
                    console.error('Error loading states:', xhr);
                    $('#state').empty().append('<option value="">Select State/Province</option>');
                }
            });
        }

        // Function to calculate shipping
        function calculateShipping() {
            if (shippingCalculationInProgress) {
                return;
            }

            if (!validateShippingFields()) {
                return;
            }

            shippingCalculationInProgress = true;

            const country = $('#country').val();
            const state = $('#state').val();
            const postalCode = $('#postal_code').val();
            const address = $('#address').val();
            const city = $('#city').val();

            // Show loading in shipping method section
            $('#shipping-methods-container').html(
                '<div class="text-center">Calculating shipping rates...</div>');
            $('#shipping-amount').text('0.00');

            // Get cart items for shipping calculation
            const cartItems = @json($cart);
            const products = cartItems.map(item => {
                const product = item.product;

                // Get dimensions from product model
                const length = parseFloat(product.length) || 0;
                const width = parseFloat(product.width) || 0;
                const height = parseFloat(product.height) || 0;
                const weight = parseFloat(product.weight) || 0;
                const weightUnit = product.weight_unit || 'lbs';
                const sizeUnit = product.size_unit || 'cm';

                // Convert weight to kg if needed
                let weightInKg = weight;
                if (weightUnit === 'lbs') {
                    weightInKg = weight * 0.453592; // Convert lbs to kg
                }

                return {
                    weight: weightInKg.toFixed(2),
                    weight_unit: 'kg',
                    length: length,
                    width: width,
                    height: height,
                    size_unit: sizeUnit,
                    quantity: parseInt(item.quantity) || 1
                };
            });

            // Calculate total weight and package dimensions
            let totalWeight = 0;
            let maxLength = 0;
            let maxWidth = 0;
            let totalHeight = 0;

            products.forEach(product => {
                totalWeight += parseFloat(product.weight) * product.quantity;
                maxLength = Math.max(maxLength, product.length);
                maxWidth = Math.max(maxWidth, product.width);
                totalHeight += product.height * product.quantity;
            });

            // Prepare the shipping request payload
            const payload = {
                destination: {
                    country: country,
                    state: state,
                    postal_code: postalCode,
                    address: address,
                    city: city
                },
                products: products,
                package: {
                    weight: totalWeight.toFixed(2),
                    weight_unit: 'kg',
                    length: maxLength,
                    width: maxWidth,
                    height: totalHeight,
                    size_unit: 'cm'
                }
            };

            console.log('Shipping payload:', payload); // Debug log

            // Prepare Stallion Express API request
            const stallionPayload = {
                to_address: {
                    name: "Customer",
                    company: "",
                    address1: address,
                    address2: "",
                    city: "Rock Springs",
                    province_code: state,
                    postal_code: postalCode,
                    country_code: country,
                    phone: "5145618019",
                    email: "customer@example.com",
                    is_residential: true
                },
                return_address: {
                    name: "Beast Group Inc.",
                    company: "Beast Group Inc.",
                    address1: "Unit 5 - 2045 Niagara Falls Blvd",
                    address2: "SE #100085",
                    city: "Niagara Falls",
                    province_code: "NY",
                    postal_code: "14304",
                    country_code: "US",
                    phone: "5145618019",
                    email: "info@capbeast.com",
                    is_residential: false
                },
                is_return: false,
                weight_unit: 'kg',
                weight: totalWeight,
                length: maxLength,
                width: maxWidth,
                height: totalHeight,
                size_unit: 'cm',
                items: products.map(product => ({
                    description: "Product",
                    sku: "SKU123",
                    quantity: product.quantity,
                    value: 100,
                    currency: "CAD",
                    country_of_origin: "CA",
                    hs_code: "123456",
                    manufacturer_name: "Beast Group Inc.",
                    manufacturer_address1: "Unit 5 - 2045 Niagara Falls Blvd",
                    manufacturer_city: "Niagara Falls",
                    manufacturer_province_code: "NY",
                    manufacturer_postal_code: "14304",
                    manufacturer_country_code: "US"
                })),
                package_type: "Parcel",
                postage_types: [],
                signature_confirmation: true,
                insured: true
            };

            $.ajax({
                url: "{{ route('shipping.calculate') }}",
                method: 'POST',
                data: JSON.stringify(payload),
                contentType: 'application/json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    shippingCalculationInProgress = false;
                    if (response.success && response.shipping.rates) {
                        let shippingHtml = '<div class="shipping-methods-list">';
                        response.shipping.rates.forEach(rate => {
                            const rateUSD = (rate.total * 0.75).toFixed(2);
                            shippingHtml += `
                                <div class="form-check mb-2">
                                    <input class="form-check-input shipping-method-radio" type="radio"
                                        name="shipping_method"
                                        value="${rate.postage_type_id}"
                                        id="shipping_${rate.postage_type_id}"
                                        data-price="${rateUSD}"
                                        data-service="${rate.postage_type}"
                                        data-days="${rate.delivery_days}">
                                    <label class="form-check-label" for="shipping_${rate.postage_type_id}">
                                        ${rate.postage_type} - $${rateUSD} USD
                                        <br>
                                        <small class="text-muted">Estimated delivery: ${rate.delivery_days} days</small>
                                    </label>
                                </div>
                            `;
                        });
                        shippingHtml += '</div>';

                        $('#shipping-methods-container').html(shippingHtml);

                        // Add event handler for shipping method selection
                        $('.shipping-method-radio').on('change', function() {
                            const selectedPrice = $(this).data('price');
                            const selectedService = $(this).data('service');
                            const selectedDays = $(this).data('days');

                            // Update shipping amount display
                            $('#shipping-amount').text(selectedPrice);

                            // Store selected shipping details
                            window.selectedShipping = {
                                method: $(this).val(),
                                price: selectedPrice,
                                service: selectedService,
                                estimated_days: selectedDays
                            };

                            // Update total with new shipping price
                            updateTaxAndTotal(getSubtotal(), appliedDiscount, parseFloat(
                                selectedPrice));
                        });

                        if (response.shipping.rates.length > 0) {
                            const firstRate = response.shipping.rates[0];
                            const firstRateUSD = (firstRate.total * 0.75).toFixed(2);
                            $('input[name="shipping_method"]:first').prop('checked', true).trigger(
                                'change');
                            $('#shipping-amount').text(firstRateUSD);
                            updateTaxAndTotal(getSubtotal(), appliedDiscount, parseFloat(
                                firstRateUSD));
                        }

                        // Hide the calculate shipping button since we have shipping options now
                        $('#calculateShippingBtn').hide();
                    } else {
                        $('#shipping-methods-container').html(
                            '<div class="alert alert-danger">Unable to calculate shipping rates</div>'
                        );
                        $('#shipping-amount').text('0.00');
                        updateTaxAndTotal(getSubtotal(), appliedDiscount, 0);
                    }
                },
                error: function(xhr) {
                    shippingCalculationInProgress = false;
                    console.error('Shipping calculation error:', xhr);
                    $('#shipping-methods-container').html(
                        '<div class="alert alert-danger">Error calculating shipping rates</div>'
                    );
                    $('#shipping-amount').text('0.00');
                    updateTaxAndTotal(getSubtotal(), appliedDiscount, 0);
                }
            });
        }

        // Add event listeners for all address fields
        $('#postal_code, #address').on('change keyup', function() {
            // Remove automatic shipping calculation when postal code or address changes
            // if (lastValidState) {
            //     debounceShippingCalculation();
            // }
        });

        // Function to update tax and total
        function updateTaxAndTotal(subtotal, appliedDiscount = 0, shipping = 0) {
            console.log('Updating tax and total:', {
                subtotal: subtotal,
                discount: appliedDiscount,
                shipping: shipping
            });

            let TPStaxElement = document.querySelector('.tps-cart-tax');
            let TVQtaxElement = document.querySelector('.tvq-cart-tax');
            let totalElement = document.querySelector('.cart-total');

            let TPStaxPercentage = parseFloat(TPStaxElement.getAttribute('tps-data-tax')) || 0;
            let TVQtaxPercentage = parseFloat(TVQtaxElement.getAttribute('tvq-data-tax')) || 0;

            // Calculate discounted subtotal
            let discountedTotal = subtotal - appliedDiscount;
            if (discountedTotal < 0) discountedTotal = 0;

            // Get user's country
            let userCountry = $('#country').val();

            // Calculate taxes based on country
            let TPStaxAmount = userCountry === "CA" ? (discountedTotal * TPStaxPercentage) / 100 : 0;
            let TVQtaxAmount = userCountry === "CA" ? (discountedTotal * TVQtaxPercentage) / 100 : 0;

            // Calculate final total including all components
            let finalTotal = discountedTotal + TPStaxAmount + TVQtaxAmount + parseFloat(shipping);

            console.log('Calculated amounts:', {
                originalSubtotal: subtotal,
                appliedDiscount: appliedDiscount,
                discountedTotal: discountedTotal,
                TPStaxAmount: TPStaxAmount,
                TVQtaxAmount: TVQtaxAmount,
                shipping: shipping,
                finalTotal: finalTotal
            });

            // Update display values - keep subtotal as original value
            document.getElementById('tps-tax-amount').textContent = TPStaxAmount.toFixed(2);
            document.getElementById('tvq-tax-amount').textContent = TVQtaxAmount.toFixed(2);
            document.getElementById('final-total-amount').textContent = finalTotal.toFixed(2);
            document.getElementById('discount-amount').textContent = appliedDiscount.toFixed(2);
            document.getElementById('shipping-amount').textContent = shipping.toFixed(2);

            // Store the USD total for PayPal
            window.paypalTotal = finalTotal;

            console.log('Updated display values:', {
                subtotal: subtotal.toFixed(2),
                discount: appliedDiscount.toFixed(2),
                tpsTax: TPStaxAmount.toFixed(2),
                tvqTax: TVQtaxAmount.toFixed(2),
                shippingAmount: document.getElementById('shipping-amount').textContent,
                finalTotal: document.getElementById('final-total-amount').textContent
            });

            // Update the discount type text
            updateDiscountTypeText();
        }

        /**
         * Updates the discount type text in the order summary
         */
        function updateDiscountTypeText() {
            if (discountType === 'coupon') {
                $('#discount-type-text').text('(Coupon)');
            } else if (discountType === 'volume') {
                $('#discount-type-text').text('(Volume)');
            } else {
                $('#discount-type-text').text('');
            }
        }

        // Function to get subtotal
        function getSubtotal() {
            let originalSubtotal = 0;

            $('.item-total-price').each(function() {
                const itemId = $(this).data('item-id');
                const quantity = parseInt($(this).closest('tr').find('td:eq(1)').text());

                // Calculate the original price without discount
                const originalItemTotal = sellingPrice * quantity +
                    (customizationPrice * quantity) +
                    (pompomPrice * quantity) +
                    (printingPrice * quantity) +
                    (deliveryPrice * quantity);

                originalSubtotal += originalItemTotal;
            });

            return originalSubtotal;
        }

        // Initial update
        updateTaxAndTotal(getSubtotal(), appliedDiscount, 0);

        // Remove the shipping-options-container div from the top of the page
        $('#shipping-options-container').remove();

        // Update the checkout button click handler
        $('#checkoutButton').on('click', function(event) {
            event.preventDefault();

            if (!window.selectedShipping || !window.selectedShipping.method) {
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

            // Continue with the checkout process
            proceedToCheckout(formData);
        });

        // Function to update tax rows visibility
        function updateTaxRowsVisibility() {
            const country = $('#country').val();
            const tpsTaxRow = $('.tps-cart-tax').closest('tr');
            const tvqTaxRow = $('.tvq-cart-tax').closest('tr');

            if (country === "CA") {
                tpsTaxRow.show();
                tvqTaxRow.show();
            } else {
                tpsTaxRow.hide();
                tvqTaxRow.hide();
            }

            // Update totals with current values
            const subtotal = getSubtotal();
            const shipping = parseFloat($('#shipping-amount').text()) || 0;
            updateTaxAndTotal(subtotal, appliedDiscount, shipping);
        }

        // Load countries and set initial state
        const countriesRoute = "{{ route('countries.index') }}";
        let countrySelect = $('#country');

        function setLoading() {
            countrySelect.html('<option value="">Loading...</option>');
            countrySelect.prop('disabled', true);
        }

        function removeLoading() {
            countrySelect.html('<option value="">Select Country</option>');
            countrySelect.prop('disabled', false);
        }

        // Fallback countries list
        const fallbackCountries = {
            "CA": "Canada",
            "US": "United States",
            "GB": "United Kingdom",
            "AU": "Australia",
            "DE": "Germany",
            "FR": "France",
            "IT": "Italy",
            "ES": "Spain",
            "JP": "Japan",
            "CN": "China",
            "IN": "India",
            "BR": "Brazil",
            "MX": "Mexico"
        };

        function loadCountries() {
            setLoading();

            // Try to fetch from API first
            fetch(countriesRoute)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    removeLoading();
                    if (data && Object.keys(data).length > 0) {
                        // Use API data if available
                        for (const [code, name] of Object.entries(data)) {
                            countrySelect.append(`<option value="${code}">${name}</option>`);
                        }
                    } else {
                        // Fallback to static list
                        for (const [code, name] of Object.entries(fallbackCountries)) {
                            countrySelect.append(`<option value="${code}">${name}</option>`);
                        }
                    }

                    // Set initial country if available
                    const initialCountry = "{{ old('country') }}";
                    if (initialCountry) {
                        countrySelect.val(initialCountry).trigger('change');
                    }

                    updateTaxRowsVisibility();
                })
                .catch(error => {
                    console.error('Error loading countries:', error);
                    removeLoading();

                    // Use fallback countries
                    for (const [code, name] of Object.entries(fallbackCountries)) {
                        countrySelect.append(`<option value="${code}">${name}</option>`);
                    }

                    // Show error message but allow user to proceed
                    const errorMessage = 'Unable to load all countries. Using limited list.';
                    console.warn(errorMessage);

                    updateTaxRowsVisibility();
                });
        }

        // Initialize country loading
        loadCountries();

        // Handle country change
        countrySelect.on('change', function() {
            const selectedCountry = $(this).val();
            console.log("Selected country:", selectedCountry);
            updateTaxRowsVisibility();
        });

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

        document.addEventListener('DOMContentLoaded', function() {
            // Initialize price displays for all items
            $('.item-price, .item-total-price').each(function() {
                const itemId = $(this).data('item-id');
                const quantity = parseInt($(this).closest('tr').find('td:eq(1)').text());
                updatePriceDisplay(itemId, quantity);
            });

            // Calculate initial subtotal and volume discount using the updateOrderSummary function
            updateOrderSummary();
        });

        function updatePriceDisplay(itemId, quantity) {
            const result = calculateVolumeDiscount(quantity, sellingPrice, volumeDiscounts);
            const discountedItemPrice = result.discountedPrice * quantity;
            const totalCustomizationPrice = (customizationPrice * quantity) + (pompomPrice * quantity) + (
                printingPrice * quantity) + (deliveryPrice * quantity);
            const totalItemPrice = discountedItemPrice + totalCustomizationPrice;

            // Update all price displays
            $(`.item-price[data-item-id="${itemId}"]`).text(`$${result.discountedPrice.toFixed(2)}`);
            $(`.cust-price[data-item-id="${itemId}"]`).text(`$${totalCustomizationPrice.toFixed(2)}`);
            $(`.item-total-price[data-item-id="${itemId}"]`).text(`$${totalItemPrice.toFixed(2)}`);

            if (result.discount > 0) {
                $(`#discount-info-${itemId}`).text(`You're saving ${result.discount}%!`);
                $(`.original-price[data-item-id="${itemId}"]`).show().text(`$${sellingPrice.toFixed(2)}`);
                $(`.discounted-price[data-item-id="${itemId}"]`).show().text(
                    `$${result.discountedPrice.toFixed(2)}`);
            } else {
                $(`#discount-info-${itemId}`).text('');
                $(`.original-price[data-item-id="${itemId}"]`).hide();
                $(`.discounted-price[data-item-id="${itemId}"]`).text(`$${sellingPrice.toFixed(2)}`);
            }

            // Update order summary
            updateOrderSummary();
        }

        function updateOrderSummary() {
            let originalSubtotal = 0;
            let discountedSubtotal = 0;
            let totalVolumeDiscount = 0;

            $('.item-total-price').each(function() {
                const itemId = $(this).data('item-id');
                const quantity = parseInt($(this).closest('tr').find('td:eq(1)').text());

                // Calculate the original price without discount
                const originalItemTotal = sellingPrice * quantity +
                    (customizationPrice * quantity) +
                    (pompomPrice * quantity) +
                    (printingPrice * quantity) +
                    (deliveryPrice * quantity);

                // Get the current displayed total price with discount applied
                const currentItemTotal = parseFloat($(this).text().replace(/[^0-9.]/g, ''));

                // The difference is the discount amount
                const itemDiscount = Math.max(0, originalItemTotal - currentItemTotal);
                totalVolumeDiscount += itemDiscount;

                originalSubtotal += originalItemTotal;
                discountedSubtotal += currentItemTotal;
            });

            // Update the subtotal display to show original price before discounts
            $('.cart-subtotal').text(originalSubtotal.toFixed(2));

            // If no other discount is applied (like a coupon) and we have volume discount
            if (discountType !== 'coupon' && totalVolumeDiscount > 0) {
                appliedDiscount = totalVolumeDiscount;
                discountType = 'volume';
                $('#discount-amount').text(totalVolumeDiscount.toFixed(2));
                $('#discount-type-text').text('(Volume)');
            }

            // Pass the original subtotal and the discount amount to updateTaxAndTotal
            updateTaxAndTotal(originalSubtotal, appliedDiscount, parseFloat($('#shipping-amount').text()) || 0);
        }

        function calculateShippingLive() {
            const country = $('#country').val();
            const state = $('#state').val();
            const postalCode = $('#postal_code').val();
            const address = $('#address').val();
            const city = $('#city').val();

            if (!country || !state || !postalCode || !address || !city) {
                $('#shipping-methods-container').html(
                    '<div class="alert alert-warning">Please fill in all required shipping fields</div>');
                $('#shipping-amount').text('0.00');
                return;
            }

            // Validate address fields
            if (address.length < 5 || city.length < 2) {
                $('#shipping-methods-container').html(
                    '<div class="alert alert-warning">Please enter a valid address and city</div>');
                $('#shipping-amount').text('0.00');
                return;
            }

            // Show loading state
            $('#shipping-methods-container').html(
                '<div class="text-center"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div><p class="mt-2">Calculating shipping rates...</p></div>'
            );

            // Prepare products data
            const products = cartItems?.map(item => {
                const product = item.product;

                // Handle missing product data (dimensions or weight)
                if (!product.weight || !product.length || !product.width || !product.height) {
                    console.log("Missing product data:", product);
                    return null;
                }

                // Validate product dimensions
                const weight = parseFloat(product.weight) || 0;
                const length = parseFloat(product.length) || 0;
                const width = parseFloat(product.width) || 0;
                const height = parseFloat(product.height) || 0;

                if (weight <= 0 || length <= 0 || width <= 0 || height <= 0) {
                    console.log("Invalid product dimensions:", product);
                    return null;
                }

                // Convert weight to lbs if needed
                let weightInLbs = weight;
                if (product.weight_unit === 'kg') {
                    weightInLbs = weight * 2.20462;
                }

                return {
                    weight: weightInLbs.toFixed(2),
                    weight_unit: 'lbs',
                    length: length,
                    width: width,
                    height: height,
                    size_unit: 'cm',
                    quantity: item.quantity
                };
            }).filter(item => item !== null);

            if (products.length === 0) {
                $('#shipping-methods-container').html(
                    '<div class="alert alert-warning">No valid items in the cart to calculate shipping.</div>'
                );
                $('#shipping-amount').text('0.00');
                return;
            }

            // Calculate total package dimensions
            let totalWeight = 0;
            let maxLength = 0;
            let maxWidth = 0;
            let maxHeight = 0;

            products.forEach(product => {
                totalWeight += parseFloat(product.weight) * product.quantity;
                maxLength = Math.max(maxLength, product.length);
                maxWidth = Math.max(maxWidth, product.width);
                maxHeight = Math.max(maxHeight, product.height);
            });

            // Validate total package dimensions
            if (totalWeight > 30) { // 30lbs max weight
                $('#shipping-methods-container').html(
                    '<div class="alert alert-warning">Package weight exceeds maximum limit. Please contact support for large orders.</div>'
                );
                $('#shipping-amount').text('0.00');
                return;
            }

            if (maxLength > 100 || maxWidth > 100 || maxHeight > 100) { // 100cm max dimension
                $('#shipping-methods-container').html(
                    '<div class="alert alert-warning">Package dimensions exceed maximum limits. Please contact support for large orders.</div>'
                );
                $('#shipping-amount').text('0.00');
                return;
            }

            // Prepare the shipping request payload
            const payload = {
                destination: {
                    country: country,
                    state: state,
                    postal_code: postalCode,
                    address: address,
                    city: city
                },
                products: products,
                package: {
                    weight: totalWeight.toFixed(2),
                    weight_unit: 'lbs',
                    length: maxLength,
                    width: maxWidth,
                    height: maxHeight,
                    size_unit: 'cm'
                }
            };

            fetch("{{ route('shipping.calculate') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(payload)
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success && data.shipping?.rates?.length) {
                        const shippingAmount = data.shipping.rates[0].rate;
                        document.getElementById('shipping-amount').textContent = shippingAmount.toFixed(2);
                        updateTaxAndTotal(getSubtotal(), appliedDiscount, shippingAmount);

                        // Display shipping methods
                        let shippingHtml = '<div class="shipping-methods-list">';
                        data.shipping.rates.forEach(rate => {
                            const rateUSD = (rate.total * 0.75).toFixed(2);
                            shippingHtml += `
                                <div class="form-check mb-2">
                                    <input class="form-check-input shipping-method-radio" type="radio"
                                        name="shipping_method"
                                        value="${rate.postage_type_id}"
                                        id="shipping_${rate.postage_type_id}"
                                        data-price="${rateUSD}"
                                        data-service="${rate.postage_type}"
                                        data-days="${rate.delivery_days}">
                                    <label class="form-check-label" for="shipping_${rate.postage_type_id}">
                                        ${rate.postage_type} - $${rateUSD} USD
                                        <br>
                                        <small class="text-muted">Estimated delivery: ${rate.delivery_days} days</small>
                                    </label>
                                </div>
                            `;
                        });
                        shippingHtml += '</div>';
                        $('#shipping-methods-container').html(shippingHtml);

                        // Add event handler for shipping method selection
                        $('.shipping-method-radio').on('change', function() {
                            const selectedPrice = $(this).data('price');
                            const selectedService = $(this).data('service');
                            const selectedDays = $(this).data('days');

                            // Update shipping amount display
                            $('#shipping-amount').text(selectedPrice);

                            // Store selected shipping details
                            window.selectedShipping = {
                                method: $(this).val(),
                                price: selectedPrice,
                                service: selectedService,
                                estimated_days: selectedDays
                            };

                            // Update total with new shipping price
                            updateTaxAndTotal(getSubtotal(), appliedDiscount, parseFloat(
                                selectedPrice));
                        });

                        // Select the first shipping method by default
                        if (data.shipping.rates.length > 0) {
                            const firstRate = data.shipping.rates[0];
                            const firstRateUSD = (firstRate.total * 0.75).toFixed(2);
                            console.log('Selecting first shipping method:', {
                                rate: firstRate,
                                price: firstRateUSD
                            });
                            $(`#shipping_${firstRate.postage_type_id}`).prop('checked', true).trigger(
                                'change');

                            // Hide the calculate shipping button since we have shipping options now
                            $('#calculateShippingBtn').hide();
                        }
                    } else {
                        $('#shipping-methods-container').html(
                            '<div class="alert alert-danger">' +
                            '<strong>Unable to calculate shipping rates.</strong><br>' +
                            'The shipping provider (Stallion Express) was unable to provide rates for your address.<br>' +
                            'Please try the following:<br>' +
                            '<ul>' +
                            '<li>Verify your address is correctly formatted</li>' +
                            '<li>Make sure your postal code is valid (e.g., H1H 5A6 for Canada)</li>' +
                            '<li>Try a different address if possible</li>' +
                            '</ul>' +
                            '</div>'
                        );
                        $('#shipping-amount').text('0.00');
                        updateTaxAndTotal(getSubtotal(), appliedDiscount, 0);
                    }
                })
                .catch(err => {
                    console.error('Shipping calculation error:', err);
                    $('#shipping-methods-container').html(
                        '<div class="alert alert-danger">' +
                        '<strong>Error calculating shipping rates.</strong><br>' +
                        'The shipping provider (Stallion Express) returned an error. This may be a temporary issue.<br>' +
                        'Please try the following:<br>' +
                        '<ul>' +
                        '<li>Double-check your address and postal code</li>' +
                        '<li>Try again in a few minutes</li>' +
                        '<li>If the problem persists, please contact our support team</li>' +
                        '</ul>' +
                        '</div>'
                    );
                    $('#shipping-amount').text('0.00');
                    updateTaxAndTotal(getSubtotal(), appliedDiscount, 0);
                });
        }

        // Function to reset shipping options when address changes
        function resetShippingOptions() {
            // Clear selected shipping method
            $('#shipping-methods-container').html(
                '<div class="alert alert-info">' +
                '<i class="fas fa-info-circle me-2"></i> Please fill in all address fields and click the "Calculate Shipping" button above to see available shipping options.' +
                '</div>'
            );
            // Reset shipping amount
            $('#shipping-amount').text('0.00');
            // Clear stored shipping selection
            window.selectedShipping = null;
            // Update totals
            updateTaxAndTotal(getSubtotal(), appliedDiscount, 0);

            // Show calculate shipping button again if it was hidden
            $('#calculateShippingBtn').show();
        }

        // Add event listeners for all address fields
        $('#postal_code, #address, #city, #state, #country').on('change', function() {
            resetShippingOptions();
        });

        // Also reset when Select2 dropdowns change
        $('#country').on('select2:select', function() {
            resetShippingOptions();
        });

        $('#state').on('select2:select', function() {
            resetShippingOptions();
        });

        // Connect Calculate Shipping button to the shipping calculation function
        $('#calculateShippingBtn').on('click', function() {
            calculateShippingLive();
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
                            class="link-danger"><strong> 48 hours</strong>.</a>
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
                                                $printingPrice = isset($item->printing_price)
                                                    ? $item->printing_price
                                                    : 0;
                                                $deliveryPrice = isset($item->delivery_price)
                                                    ? $item->delivery_price
                                                    : 0;

                                                // Calculate base price components
                                                $basePrice = $item->product->selling_price;
                                                $totalCustomizationPrice = $customizationPrice * $item->quantity;
                                                $totalPompomPrice = $pompomPrice * $item->quantity;
                                                $totalPrintingPrice = $printingPrice * $item->quantity;
                                                $totalDeliveryPrice = $deliveryPrice * $item->quantity;

                                                // Calculate item total
                                                $itemTotal =
                                                    $basePrice * $item->quantity +
                                                    $totalCustomizationPrice +
                                                    $totalPompomPrice +
                                                    $totalPrintingPrice +
                                                    $totalDeliveryPrice;

                                                $subtotal += $itemTotal;
                                            @endphp

                                            <script>
                                                // Ensure these variables are unique per product item
                                                document.addEventListener('DOMContentLoaded', function() {
                                                    // Create item-specific variables using the item ID as a suffix
                                                    window['volumeDiscounts_{{ $item->id }}'] = @json($item->product->productVolumeDiscount->sortBy('quantity')->values());
                                                    window['sellingPrice_{{ $item->id }}'] = {{ $item->product->selling_price }};
                                                    window['customizationPrice_{{ $item->id }}'] = {{ $customizationPrice }};
                                                    window['pompomPrice_{{ $item->id }}'] = {{ $pompomPrice }};
                                                    window['printingPrice_{{ $item->id }}'] = {{ $printingPrice }};
                                                    window['deliveryPrice_{{ $item->id }}'] = {{ $deliveryPrice }};

                                                    // Initialize the price display for this specific item
                                                    updateItemPriceDisplay('{{ $item->id }}', {{ $item->quantity }});
                                                });
                                            </script>

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
                                                                        alt="" class="avatar-xs">
                                                                @else
                                                                    <img src="{{ asset(
                                                                        'storage/' .
                                                                            ($item->color->front_image ??
                                                                                ($item->color->right_image ??
                                                                                    ($item->color->left_image ?? ($item->color->back_image ?? 'ProductImages/default.jpg')))),
                                                                    ) }}"
                                                                        alt="" class="avatar-xs">
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6>{{ $item->product->title }}</h6>
                                                            <p class="text-muted mb-0">
                                                                <span class="original-price"
                                                                    data-item-id="{{ $item->id }}"
                                                                    style="text-decoration: line-through;">${{ number_format($basePrice, 2) }}</span>
                                                                <span class="discounted-price"
                                                                    data-item-id="{{ $item->id }}"
                                                                    style="color: #28a745;"></span>
                                                            </p>
                                                            <div id="discount-info-{{ $item->id }}"
                                                                class="text-success fs-13 fw-medium"></div>
                                                            <div id="next-tier-info-{{ $item->id }}"
                                                                class="text-muted fs-12"></div>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    {{ $item->quantity }}
                                                </td>
                                                <td class="text-end">
                                                    <span class="item-price"
                                                        data-item-id="{{ $item->id }}">${{ number_format($basePrice, 2) }}</span>
                                                </td>
                                                <td class="text-end">
                                                    <span class="cust-price" data-item-id="{{ $item->id }}">
                                                        ${{ number_format($customizationPrice, 2) }}
                                                    </span>
                                                </td>
                                                <td class="text-end">
                                                    <span class="item-total-price"
                                                        data-item-id="{{ $item->id }}">${{ number_format($itemTotal, 2) }}</span>
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

                                <!-- City input -->


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
                                            <label class="form-label" for="state">State/Province *</label>
                                            <select id="state" name="state" class="form-control" required>
                                                <option value="">Select State/Province</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <label class="form-label" for="city">City *</label>
                                            <input type="text" id="city" name="city" class="form-control"
                                                required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="postal_code">Postal Code *</label>
                                            <input type="text" id="postal_code" name="postal_code"
                                                class="form-control" required />
                                        </div>
                                    </div>

                                </div>

                                <!-- Add Calculate Shipping Button -->
                                <div class="mb-3 text-center">
                                    <button type="button" id="calculateShippingBtn" class="btn btn-primary btn-lg w-75">
                                        <i class="fas fa-shipping-fast me-2"></i> Calculate Shipping
                                    </button>
                                </div>

                                <div id="shipping-methods-container" class="mb-4">
                                    <!-- Add initial message telling users to click the button -->
                                    <div class="alert alert-info">
                                        <i class="fas fa-info-circle me-2"></i> Please fill in all address fields and click
                                        the "Calculate Shipping" button above to see available shipping options.
                                    </div>
                                </div>

                                <div class="alert alert-warning"
                                    style="margin-top: 15px; padding: 10px; background-color: #fff3cd; color: #856404; border: 1px solid #ffeeba; border-radius: 5px;">
                                    <strong>Shipping Notice:</strong>
                                    If you receive the message <em>"Error calculating shipping rates"</em>, please try the
                                    following steps:
                                    <ul style="margin-top: 5px; padding-left: 20px;">
                                        <li>Double-check your shipping details to ensure all required fields are filled
                                            correctly.</li>
                                        <li>Retype the postal code carefully, or try removing and re-entering one character.
                                        </li>
                                        <li>Make sure all location fields (country, province, city, etc.) are selected
                                            properly.</li>
                                    </ul>
                                    If the issue persists, please contact our support team for assistance.
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
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="paypalOption"
                                    value="paypal" checked>
                                <label class="form-check-label" for="paypalOption">
                                    <div class="d-flex align-items-center">
                                        <div class="payment-logo paypal-logo me-2">PayPal</div>
                                        Pay with PayPal
                                    </div>
                                </label>
                            </div>

                            <!-- Authorize.Net Option -->
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="paymentMethod"
                                    id="authorizeNetOption" value="authorize_net">
                                <label class="form-check-label" for="authorizeNetOption">
                                    <div class="d-flex align-items-center">
                                        <div class="payment-logo authorize-logo me-2">Authorize.net</div>
                                        Pay with Credit Card (Authorize.Net)
                                    </div>
                                </label>
                            </div>
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

                </div>

                <script>
                    // Toggle Authorize.Net card details form based on payment method selection
                    document.addEventListener('DOMContentLoaded', function() {
                        const paymentMethods = document.querySelectorAll('input[name="paymentMethod"]');
                        const authorizeNetCardDetails = document.getElementById('authorizeNetCardDetails');

                        function toggleCardDetails() {
                            const authorizeNetSelected = document.getElementById('authorizeNetOption').checked;
                            authorizeNetCardDetails.style.display = authorizeNetSelected ? 'block' : 'none';
                        }

                        // Add event listeners to payment method radios
                        paymentMethods.forEach(method => {
                            method.addEventListener('change', toggleCardDetails);
                        });

                        // Initialize visibility
                        toggleCardDetails();

                        // Add card number formatting
                        const cardNumberInput = document.getElementById('cardNumber');
                        if (cardNumberInput) {
                            cardNumberInput.addEventListener('input', function(e) {
                                // Remove non-digit characters
                                let value = e.target.value.replace(/\D/g, '');

                                // Add space after every 4 digits
                                if (value.length > 0) {
                                    value = value.match(/.{1,4}/g).join(' ');
                                }

                                // Update input value
                                e.target.value = value;
                            });
                        }

                        // Add expiry date formatting (MM/YY)
                        const expiryDateInput = document.getElementById('expiryDate');
                        if (expiryDateInput) {
                            expiryDateInput.addEventListener('input', function(e) {
                                // Remove non-digit characters
                                let value = e.target.value.replace(/\D/g, '');

                                // Format as MM/YY
                                if (value.length > 2) {
                                    value = value.substring(0, 2) + '/' + value.substring(2, 4);
                                }

                                // Update input value
                                e.target.value = value;
                            });
                        }
                    });
                </script>
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
                                                <td>Discount <span id="discount-type-text"></span>:</td>
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

                                            {{-- <tr>
                                                <td>Shipping Method:</td>
                                                <td class="text-end">
                                                    <div id="shipping-methods-container">
                                                     
                                                    </div>
                                                </td>
                                            </tr> --}}

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
        let discountType = 'none';
        let discountPercentage = 0;
        const cartItems = @json($cart);

        // Function to update price display for a specific item
        function updateItemPriceDisplay(itemId, quantity) {
            // Get item-specific variables
            const volumeDiscounts = window['volumeDiscounts_' + itemId];
            const sellingPrice = window['sellingPrice_' + itemId];
            const customizationPrice = window['customizationPrice_' + itemId];
            const pompomPrice = window['pompomPrice_' + itemId];
            const printingPrice = window['printingPrice_' + itemId];
            const deliveryPrice = window['deliveryPrice_' + itemId];

            const result = calculateVolumeDiscount(quantity, sellingPrice, volumeDiscounts);
            const discountedItemPrice = result.discountedPrice * quantity;
            const totalCustomizationPrice = (customizationPrice * quantity) + (pompomPrice * quantity) +
                (printingPrice * quantity) + (deliveryPrice * quantity);
            const totalItemPrice = discountedItemPrice + totalCustomizationPrice;

            // Update all price displays
            $(`.item-price[data-item-id="${itemId}"]`).text(`$${result.discountedPrice.toFixed(2)}`);
            $(`.cust-price[data-item-id="${itemId}"]`).text(`$${totalCustomizationPrice.toFixed(2)}`);
            $(`.item-total-price[data-item-id="${itemId}"]`).text(`$${totalItemPrice.toFixed(2)}`);

            if (result.discount > 0) {
                $(`#discount-info-${itemId}`).text(`You're saving ${result.discount}%!`);
                $(`.original-price[data-item-id="${itemId}"]`).show().text(`$${sellingPrice.toFixed(2)}`);
                $(`.discounted-price[data-item-id="${itemId}"]`).show().text(
                    `$${result.discountedPrice.toFixed(2)}`);
            } else {
                $(`#discount-info-${itemId}`).text('');
                $(`.original-price[data-item-id="${itemId}"]`).hide();
                $(`.discounted-price[data-item-id="${itemId}"]`).text(`$${sellingPrice.toFixed(2)}`);
            }
        }

        function updateTaxAndTotal(subtotal, appliedDiscount = 0, shipping = 0) {
            console.log('Updating tax and total:', {
                subtotal: subtotal,
                discount: appliedDiscount,
                shipping: shipping
            });

            let TPStaxElement = document.querySelector('.tps-cart-tax');
            let TVQtaxElement = document.querySelector('.tvq-cart-tax');
            let totalElement = document.querySelector('.cart-total');

            let TPStaxPercentage = parseFloat(TPStaxElement.getAttribute('tps-data-tax')) || 0;
            let TVQtaxPercentage = parseFloat(TVQtaxElement.getAttribute('tvq-data-tax')) || 0;

            // Calculate discounted subtotal
            let discountedTotal = subtotal - appliedDiscount;
            if (discountedTotal < 0) discountedTotal = 0;

            // Get user's country
            let userCountry = $('#country').val();

            // Calculate taxes based on country
            let TPStaxAmount = userCountry === "CA" ? (discountedTotal * TPStaxPercentage) / 100 : 0;
            let TVQtaxAmount = userCountry === "CA" ? (discountedTotal * TVQtaxPercentage) / 100 : 0;

            // Calculate final total including all components
            let finalTotal = discountedTotal + TPStaxAmount + TVQtaxAmount + parseFloat(shipping);

            console.log('Calculated amounts:', {
                originalSubtotal: subtotal,
                appliedDiscount: appliedDiscount,
                discountedTotal: discountedTotal,
                TPStaxAmount: TPStaxAmount,
                TVQtaxAmount: TVQtaxAmount,
                shipping: shipping,
                finalTotal: finalTotal
            });

            // Update display values - keep subtotal as original value
            document.getElementById('tps-tax-amount').textContent = TPStaxAmount.toFixed(2);
            document.getElementById('tvq-tax-amount').textContent = TVQtaxAmount.toFixed(2);
            document.getElementById('final-total-amount').textContent = finalTotal.toFixed(2);
            document.getElementById('discount-amount').textContent = appliedDiscount.toFixed(2);
            document.getElementById('shipping-amount').textContent = shipping.toFixed(2);

            // Store the USD total for PayPal
            window.paypalTotal = finalTotal;

            console.log('Updated display values:', {
                subtotal: subtotal.toFixed(2),
                discount: appliedDiscount.toFixed(2),
                tpsTax: TPStaxAmount.toFixed(2),
                tvqTax: TVQtaxAmount.toFixed(2),
                shippingAmount: document.getElementById('shipping-amount').textContent,
                finalTotal: document.getElementById('final-total-amount').textContent
            });

            // Update the discount type text
            updateDiscountTypeText();
        }

        /**
         * Updates the discount type text in the order summary
         */
        function updateDiscountTypeText() {
            if (discountType === 'coupon') {
                $('#discount-type-text').text('(Coupon)');
            } else if (discountType === 'volume') {
                $('#discount-type-text').text('(Volume)');
            } else {
                $('#discount-type-text').text('');
            }
        }

        // Function to get subtotal
        function getSubtotal() {
            let originalSubtotal = 0;

            $('.item-total-price').each(function() {
                const itemId = $(this).data('item-id');
                const quantity = parseInt($(this).closest('tr').find('td:eq(1)').text());

                // Get item-specific variables
                const sellingPrice = window['sellingPrice_' + itemId];
                const customizationPrice = window['customizationPrice_' + itemId];
                const pompomPrice = window['pompomPrice_' + itemId];
                const printingPrice = window['printingPrice_' + itemId];
                const deliveryPrice = window['deliveryPrice_' + itemId];

                // Calculate the original price without discount
                const originalItemTotal = sellingPrice * quantity +
                    (customizationPrice * quantity) +
                    (pompomPrice * quantity) +
                    (printingPrice * quantity) +
                    (deliveryPrice * quantity);

                originalSubtotal += originalItemTotal;
            });

            return originalSubtotal;
        }

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

        function updateOrderSummary() {
            let originalSubtotal = 0;
            let discountedSubtotal = 0;
            let totalVolumeDiscount = 0;

            $('.item-total-price').each(function() {
                const itemId = $(this).data('item-id');
                const quantity = parseInt($(this).closest('tr').find('td:eq(1)').text());

                // Get item-specific variables
                const sellingPrice = window['sellingPrice_' + itemId];
                const customizationPrice = window['customizationPrice_' + itemId];
                const pompomPrice = window['pompomPrice_' + itemId];
                const printingPrice = window['printingPrice_' + itemId];
                const deliveryPrice = window['deliveryPrice_' + itemId];

                // Calculate the original price without discount
                const originalItemTotal = sellingPrice * quantity +
                    (customizationPrice * quantity) +
                    (pompomPrice * quantity) +
                    (printingPrice * quantity) +
                    (deliveryPrice * quantity);

                // Get the current displayed total price with discount applied
                const currentItemTotal = parseFloat($(this).text().replace(/[^0-9.]/g, ''));

                // The difference is the discount amount
                const itemDiscount = Math.max(0, originalItemTotal - currentItemTotal);
                totalVolumeDiscount += itemDiscount;

                originalSubtotal += originalItemTotal;
                discountedSubtotal += currentItemTotal;
            });

            // Update the subtotal display to show original price before discounts
            $('.cart-subtotal').text(originalSubtotal.toFixed(2));

            // If no other discount is applied (like a coupon) and we have volume discount
            if (discountType !== 'coupon' && totalVolumeDiscount > 0) {
                appliedDiscount = totalVolumeDiscount;
                discountType = 'volume';
                $('#discount-amount').text(totalVolumeDiscount.toFixed(2));
                $('#discount-type-text').text('(Volume)');
            }

            // Pass the original subtotal and the discount amount to updateTaxAndTotal
            updateTaxAndTotal(originalSubtotal, appliedDiscount, parseFloat($('#shipping-amount').text()) || 0);
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Calculate initial subtotal and volume discount using the updateOrderSummary function
            updateOrderSummary();
        });

        function calculateShippingLive() {
            const country = $('#country').val();
            const state = $('#state').val();
            const postalCode = $('#postal_code').val();
            const address = $('#address').val();
            const city = $('#city').val();

            if (!country || !state || !postalCode || !address || !city) {
                $('#shipping-methods-container').html(
                    '<div class="alert alert-warning">Please fill in all required shipping fields</div>');
                $('#shipping-amount').text('0.00');
                return;
            }

            // Validate address fields
            if (address.length < 5 || city.length < 2) {
                $('#shipping-methods-container').html(
                    '<div class="alert alert-warning">Please enter a valid address and city</div>');
                $('#shipping-amount').text('0.00');
                return;
            }

            // Show loading state
            $('#shipping-methods-container').html(
                '<div class="text-center"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div><p class="mt-2">Calculating shipping rates...</p></div>'
            );

            // Prepare products data
            const products = cartItems?.map(item => {
                const product = item.product;

                // Handle missing product data (dimensions or weight)
                if (!product.weight || !product.length || !product.width || !product.height) {
                    console.log("Missing product data:", product);
                    return null;
                }

                // Validate product dimensions
                const weight = parseFloat(product.weight) || 0;
                const length = parseFloat(product.length) || 0;
                const width = parseFloat(product.width) || 0;
                const height = parseFloat(product.height) || 0;

                if (weight <= 0 || length <= 0 || width <= 0 || height <= 0) {
                    console.log("Invalid product dimensions:", product);
                    return null;
                }

                // Convert weight to lbs if needed
                let weightInLbs = weight;
                if (product.weight_unit === 'kg') {
                    weightInLbs = weight * 2.20462;
                }

                return {
                    weight: weightInLbs.toFixed(2),
                    weight_unit: 'lbs',
                    length: length,
                    width: width,
                    height: height,
                    size_unit: 'cm',
                    quantity: item.quantity
                };
            }).filter(item => item !== null);

            if (products.length === 0) {
                $('#shipping-methods-container').html(
                    '<div class="alert alert-warning">No valid items in the cart to calculate shipping.</div>'
                );
                $('#shipping-amount').text('0.00');
                return;
            }

            // Calculate total package dimensions
            let totalWeight = 0;
            let maxLength = 0;
            let maxWidth = 0;
            let maxHeight = 0;

            products.forEach(product => {
                totalWeight += parseFloat(product.weight) * product.quantity;
                maxLength = Math.max(maxLength, product.length);
                maxWidth = Math.max(maxWidth, product.width);
                maxHeight = Math.max(maxHeight, product.height);
            });

            // Validate total package dimensions
            if (totalWeight > 30) { // 30lbs max weight
                $('#shipping-methods-container').html(
                    '<div class="alert alert-warning">Package weight exceeds maximum limit. Please contact support for large orders.</div>'
                );
                $('#shipping-amount').text('0.00');
                return;
            }

            if (maxLength > 100 || maxWidth > 100 || maxHeight > 100) { // 100cm max dimension
                $('#shipping-methods-container').html(
                    '<div class="alert alert-warning">Package dimensions exceed maximum limits. Please contact support for large orders.</div>'
                );
                $('#shipping-amount').text('0.00');
                return;
            }

            // Prepare the shipping request payload
            const payload = {
                destination: {
                    country: country,
                    state: state,
                    postal_code: postalCode,
                    address: address,
                    city: city
                },
                products: products,
                package: {
                    weight: totalWeight.toFixed(2),
                    weight_unit: 'lbs',
                    length: maxLength,
                    width: maxWidth,
                    height: maxHeight,
                    size_unit: 'cm'
                }
            };

            fetch("{{ route('shipping.calculate') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(payload)
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success && data.shipping?.rates?.length) {
                        const shippingAmount = data.shipping.rates[0].rate;
                        document.getElementById('shipping-amount').textContent = shippingAmount.toFixed(2);
                        updateTaxAndTotal(getSubtotal(), appliedDiscount, shippingAmount);

                        // Display shipping methods
                        let shippingHtml = '<div class="shipping-methods-list">';
                        data.shipping.rates.forEach(rate => {
                            const rateUSD = (rate.total * 0.75).toFixed(2);
                            shippingHtml += `
                                <div class="form-check mb-2">
                                    <input class="form-check-input shipping-method-radio" type="radio"
                                        name="shipping_method"
                                        value="${rate.postage_type_id}"
                                        id="shipping_${rate.postage_type_id}"
                                        data-price="${rateUSD}"
                                        data-service="${rate.postage_type}"
                                        data-days="${rate.delivery_days}">
                                    <label class="form-check-label" for="shipping_${rate.postage_type_id}">
                                        ${rate.postage_type} - $${rateUSD} USD
                                        <br>
                                        <small class="text-muted">Estimated delivery: ${rate.delivery_days} days</small>
                                    </label>
                                </div>
                            `;
                        });
                        shippingHtml += '</div>';
                        $('#shipping-methods-container').html(shippingHtml);

                        // Add event handler for shipping method selection
                        $('.shipping-method-radio').on('change', function() {
                            const selectedPrice = $(this).data('price');
                            const selectedService = $(this).data('service');
                            const selectedDays = $(this).data('days');

                            // Update shipping amount display
                            $('#shipping-amount').text(selectedPrice);

                            // Store selected shipping details
                            window.selectedShipping = {
                                method: $(this).val(),
                                price: selectedPrice,
                                service: selectedService,
                                estimated_days: selectedDays
                            };

                            // Update total with new shipping price
                            updateTaxAndTotal(getSubtotal(), appliedDiscount, parseFloat(selectedPrice));
                        });

                        // Select the first shipping method by default
                        if (data.shipping.rates.length > 0) {
                            const firstRate = data.shipping.rates[0];
                            const firstRateUSD = (firstRate.total * 0.75).toFixed(2);
                            console.log('Selecting first shipping method:', {
                                rate: firstRate,
                                price: firstRateUSD
                            });
                            $(`#shipping_${firstRate.postage_type_id}`).prop('checked', true).trigger('change');

                            // Hide the calculate shipping button since we have shipping options now
                            $('#calculateShippingBtn').hide();
                        }
                    } else {
                        $('#shipping-methods-container').html(
                            '<div class="alert alert-danger">' +
                            '<strong>Unable to calculate shipping rates.</strong><br>' +
                            'The shipping provider (Stallion Express) was unable to provide rates for your address.<br>' +
                            'Please try the following:<br>' +
                            '<ul>' +
                            '<li>Verify your address is correctly formatted</li>' +
                            '<li>Make sure your postal code is valid (e.g., H1H 5A6 for Canada)</li>' +
                            '<li>Try a different address if possible</li>' +
                            '</ul>' +
                            '</div>'
                        );
                        $('#shipping-amount').text('0.00');
                        updateTaxAndTotal(getSubtotal(), appliedDiscount, 0);
                    }
                })
                .catch(err => {
                    console.error('Shipping calculation error:', err);
                    $('#shipping-methods-container').html(
                        '<div class="alert alert-danger">' +
                        '<strong>Error calculating shipping rates.</strong><br>' +
                        'The shipping provider (Stallion Express) returned an error. This may be a temporary issue.<br>' +
                        'Please try the following:<br>' +
                        '<ul>' +
                        '<li>Double-check your address and postal code</li>' +
                        '<li>Try again in a few minutes</li>' +
                        '<li>If the problem persists, please contact our support team</li>' +
                        '</ul>' +
                        '</div>'
                    );
                    $('#shipping-amount').text('0.00');
                    updateTaxAndTotal(getSubtotal(), appliedDiscount, 0);
                });
        }

        // Function to reset shipping options when address changes
        function resetShippingOptions() {
            // Clear selected shipping method
            $('#shipping-methods-container').html(
                '<div class="alert alert-info">' +
                '<i class="fas fa-info-circle me-2"></i> Please fill in all address fields and click the "Calculate Shipping" button above to see available shipping options.' +
                '</div>'
            );
            // Reset shipping amount
            $('#shipping-amount').text('0.00');
            // Clear stored shipping selection
            window.selectedShipping = null;
            // Update totals
            updateTaxAndTotal(getSubtotal(), appliedDiscount, 0);

            // Show calculate shipping button again if it was hidden
            $('#calculateShippingBtn').show();
        }

        // Add event listeners for all address fields
        $('#postal_code, #address, #city, #state, #country').on('change', function() {
            resetShippingOptions();
        });

        // Also reset when Select2 dropdowns change
        $('#country').on('select2:select', function() {
            resetShippingOptions();
        });

        $('#state').on('select2:select', function() {
            resetShippingOptions();
        });

        // Connect Calculate Shipping button to the shipping calculation function
        $('#calculateShippingBtn').on('click', function() {
            calculateShippingLive();
        });

        // Handle coupon application
        document.getElementById('applyCoupon').addEventListener('click', function() {
            let couponCode = document.getElementById('couponCode').value;

            if (!couponCode) {
                alert('Please enter a coupon code');
                return;
            }

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
                        const couponDiscount = parseFloat(result.discount) || 0;

                        // Calculate volume discount
                        let volumeDiscountAmount = 0;
                        let volumeDiscountPercentage = 0;
                        $('.item-total-price').each(function() {
                            const itemId = $(this).data('item-id');
                            const quantity = parseInt($(this).closest('tr').find('td:eq(1)')
                                .text());
                            const result = calculateVolumeDiscount(quantity, sellingPrice,
                                volumeDiscounts);
                            if (result.discount > 0) {
                                const originalTotal = sellingPrice * quantity;
                                const discountedTotal = result.discountedPrice * quantity;
                                volumeDiscountAmount += (originalTotal - discountedTotal);
                                volumeDiscountPercentage = result.discount;
                            }
                        });

                        // Check if both volume discount and coupon discount are available
                        if (volumeDiscountAmount > 0 && couponDiscount > 0) {
                            // Create and show modal for discount selection
                            showDiscountSelectionModal(couponDiscount, result.discountId,
                                volumeDiscountAmount, volumeDiscountPercentage);
                        } else {
                            // Just apply the coupon discount if no volume discount
                            appliedDiscount = couponDiscount;
                            discountId = result.discountId ?? null;
                            discountType = 'coupon';
                            discountPercentage = result.percentage || 0;

                            document.getElementById('discount-amount').textContent = appliedDiscount
                                .toFixed(2);
                            updateTaxAndTotal(getSubtotal(), appliedDiscount, parseFloat(document
                                .getElementById('shipping-amount').textContent) || 0);

                            // Update the discount type text display
                            updateDiscountTypeText();

                            alert(result.message);
                        }
                    } else {
                        alert(result.message);
                    }
                })
                .catch(error => console.error('Error:', error));
        });

        // Function to show discount selection modal
        function showDiscountSelectionModal(couponDiscount, couponId, volumeDiscount,
            volumeDiscountPercentage) {
            // If modal doesn't exist, create it
            if (!document.getElementById('discountSelectionModal')) {
                const modalHtml = `
                    <div class="modal fade" id="discountSelectionModal" tabindex="-1" aria-labelledby="discountSelectionModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="discountSelectionModalLabel">Choose Discount</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>You have two possible discounts available. Please choose one:</p>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="radio" name="discountChoice" id="volumeDiscountChoice" value="volume">
                                        <label class="form-check-label" for="volumeDiscountChoice">
                                            Volume Discount: $<span id="volumeDiscountAmount"></span> (${volumeDiscountPercentage}% off)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="discountChoice" id="couponDiscountChoice" value="coupon">
                                        <label class="form-check-label" for="couponDiscountChoice">
                                            Coupon Discount: $<span id="couponDiscountAmount"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-primary" id="applySelectedDiscount">Apply Selected Discount</button>
                                </div>
                            </div>
                        </div>
                    </div>
                `;

                document.body.insertAdjacentHTML('beforeend', modalHtml);

                // Add event listener for applying the selected discount
                document.getElementById('applySelectedDiscount').addEventListener('click', function() {
                    const selectedDiscountType = document.querySelector(
                        'input[name="discountChoice"]:checked')?.value;

                    if (!selectedDiscountType) {
                        alert('Please select a discount type');
                        return;
                    }

                    if (selectedDiscountType === 'volume') {
                        // Apply volume discount
                        appliedDiscount = volumeDiscount;
                        discountId = null;
                        discountType = 'volume';
                        discountPercentage = volumeDiscountPercentage;
                    } else {
                        // Apply coupon discount
                        appliedDiscount = couponDiscount;
                        discountId = couponId;
                        discountType = 'coupon';
                        discountPercentage = couponDiscount / getSubtotal() * 100;
                    }

                    document.getElementById('discount-amount').textContent = appliedDiscount.toFixed(2);
                    updateTaxAndTotal(getSubtotal(), appliedDiscount, parseFloat(document
                        .getElementById('shipping-amount').textContent) || 0);

                    // Update the discount type text display
                    updateDiscountTypeText();

                    // Close the modal
                    const modalElement = document.getElementById('discountSelectionModal');
                    const modal = bootstrap.Modal.getInstance(modalElement);
                    modal.hide();

                    alert('Discount applied successfully!');
                });
            }

            // Update discount amounts in the modal
            document.getElementById('volumeDiscountAmount').textContent = volumeDiscount.toFixed(2);
            document.getElementById('couponDiscountAmount').textContent = couponDiscount.toFixed(2);

            // Select the higher discount by default
            if (volumeDiscount >= couponDiscount) {
                document.getElementById('volumeDiscountChoice').checked = true;
            } else {
                document.getElementById('couponDiscountChoice').checked = true;
            }

            // Show the modal
            const modalElement = document.getElementById('discountSelectionModal');
            const modal = new bootstrap.Modal(modalElement);
            modal.show();
        }

        // Handle shipping calculation
        // Remove or comment out this line that automatically triggers shipping calculation
        // $('#address, #country').on('change', calculateShippingLive);

        // Add event listener for the calculate shipping button
        $('#calculateShippingBtn').on('click', calculateShippingLive);

        function calculateShippingLive() {
            const country = $('#country').val();
            const state = $('#state').val();
            const postalCode = $('#postal_code').val();
            const address = $('#address').val();
            const city = $('#city').val();

            if (!country || !state || !postalCode || !address || !city) {
                $('#shipping-methods-container').html(
                    '<div class="alert alert-warning">Please fill in all required shipping fields</div>');
                $('#shipping-amount').text('0.00');
                return;
            }

            // Validate address fields
            if (address.length < 5 || city.length < 2) {
                $('#shipping-methods-container').html(
                    '<div class="alert alert-warning">Please enter a valid address and city</div>');
                $('#shipping-amount').text('0.00');
                return;
            }

            // Show loading state
            $('#shipping-methods-container').html(
                '<div class="text-center"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div><p class="mt-2">Calculating shipping rates...</p></div>'
            );

            // Prepare products data
            const products = cartItems?.map(item => {
                const product = item.product;

                // Handle missing product data (dimensions or weight)
                if (!product.weight || !product.length || !product.width || !product.height) {
                    console.log("Missing product data:", product);
                    return null;
                }

                // Validate product dimensions
                const weight = parseFloat(product.weight) || 0;
                const length = parseFloat(product.length) || 0;
                const width = parseFloat(product.width) || 0;
                const height = parseFloat(product.height) || 0;

                if (weight <= 0 || length <= 0 || width <= 0 || height <= 0) {
                    console.log("Invalid product dimensions:", product);
                    return null;
                }

                // Convert weight to lbs if needed
                let weightInLbs = weight;
                if (product.weight_unit === 'kg') {
                    weightInLbs = weight * 2.20462;
                }

                return {
                    weight: weightInLbs.toFixed(2),
                    weight_unit: 'lbs',
                    length: length,
                    width: width,
                    height: height,
                    size_unit: 'cm',
                    quantity: item.quantity
                };
            }).filter(item => item !== null);

            if (products.length === 0) {
                $('#shipping-methods-container').html(
                    '<div class="alert alert-warning">No valid items in the cart to calculate shipping.</div>'
                );
                $('#shipping-amount').text('0.00');
                return;
            }

            // Calculate total package dimensions
            let totalWeight = 0;
            let maxLength = 0;
            let maxWidth = 0;
            let maxHeight = 0;

            products.forEach(product => {
                totalWeight += parseFloat(product.weight) * product.quantity;
                maxLength = Math.max(maxLength, product.length);
                maxWidth = Math.max(maxWidth, product.width);
                maxHeight = Math.max(maxHeight, product.height);
            });

            // Validate total package dimensions
            if (totalWeight > 30) { // 30lbs max weight
                $('#shipping-methods-container').html(
                    '<div class="alert alert-warning">Package weight exceeds maximum limit. Please contact support for large orders.</div>'
                );
                $('#shipping-amount').text('0.00');
                return;
            }

            if (maxLength > 100 || maxWidth > 100 || maxHeight > 100) { // 100cm max dimension
                $('#shipping-methods-container').html(
                    '<div class="alert alert-warning">Package dimensions exceed maximum limits. Please contact support for large orders.</div>'
                );
                $('#shipping-amount').text('0.00');
                return;
            }

            // Prepare the shipping request payload
            const payload = {
                destination: {
                    country: country,
                    state: state,
                    postal_code: postalCode,
                    address: address,
                    city: city
                },
                products: products,
                package: {
                    weight: totalWeight.toFixed(2),
                    weight_unit: 'lbs',
                    length: maxLength,
                    width: maxWidth,
                    height: maxHeight,
                    size_unit: 'cm'
                }
            };

            fetch("{{ route('shipping.calculate') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(payload)
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success && data.shipping?.rates?.length) {
                        const shippingAmount = data.shipping.rates[0].rate;
                        document.getElementById('shipping-amount').textContent = shippingAmount.toFixed(2);
                        updateTaxAndTotal(getSubtotal(), appliedDiscount, shippingAmount);

                        // Display shipping methods
                        let shippingHtml = '<div class="shipping-methods-list">';
                        data.shipping.rates.forEach(rate => {
                            const rateUSD = (rate.total * 0.75).toFixed(2);
                            shippingHtml += `
                                <div class="form-check mb-2">
                                    <input class="form-check-input shipping-method-radio" type="radio"
                                        name="shipping_method"
                                        value="${rate.postage_type_id}"
                                        id="shipping_${rate.postage_type_id}"
                                        data-price="${rateUSD}"
                                        data-service="${rate.postage_type}"
                                        data-days="${rate.delivery_days}">
                                    <label class="form-check-label" for="shipping_${rate.postage_type_id}">
                                        ${rate.postage_type} - $${rateUSD} USD
                                        <br>
                                        <small class="text-muted">Estimated delivery: ${rate.delivery_days} days</small>
                                    </label>
                                </div>
                            `;
                        });
                        shippingHtml += '</div>';
                        $('#shipping-methods-container').html(shippingHtml);

                        // Add event handler for shipping method selection
                        $('.shipping-method-radio').on('change', function() {
                            const selectedPrice = $(this).data('price');
                            const selectedService = $(this).data('service');
                            const selectedDays = $(this).data('days');

                            // Update shipping amount display
                            $('#shipping-amount').text(selectedPrice);

                            // Store selected shipping details
                            window.selectedShipping = {
                                method: $(this).val(),
                                price: selectedPrice,
                                service: selectedService,
                                estimated_days: selectedDays
                            };

                            // Update total with new shipping price
                            updateTaxAndTotal(getSubtotal(), appliedDiscount, parseFloat(selectedPrice));
                        });

                        // Select the first shipping method by default
                        if (data.shipping.rates.length > 0) {
                            const firstRate = data.shipping.rates[0];
                            const firstRateUSD = (firstRate.total * 0.75).toFixed(2);
                            console.log('Selecting first shipping method:', {
                                rate: firstRate,
                                price: firstRateUSD
                            });
                            $(`#shipping_${firstRate.postage_type_id}`).prop('checked', true).trigger('change');

                            // Hide the calculate shipping button since we have shipping options now
                            $('#calculateShippingBtn').hide();
                        }
                    } else {
                        $('#shipping-methods-container').html(
                            '<div class="alert alert-danger">' +
                            '<strong>Unable to calculate shipping rates.</strong><br>' +
                            'The shipping provider (Stallion Express) was unable to provide rates for your address.<br>' +
                            'Please try the following:<br>' +
                            '<ul>' +
                            '<li>Verify your address is correctly formatted</li>' +
                            '<li>Make sure your postal code is valid (e.g., H1H 5A6 for Canada)</li>' +
                            '<li>Try a different address if possible</li>' +
                            '</ul>' +
                            '</div>'
                        );
                        $('#shipping-amount').text('0.00');
                        updateTaxAndTotal(getSubtotal(), appliedDiscount, 0);
                    }
                })
                .catch(err => {
                    console.error('Shipping calculation error:', err);
                    $('#shipping-methods-container').html(
                        '<div class="alert alert-danger">' +
                        '<strong>Error calculating shipping rates.</strong><br>' +
                        'The shipping provider (Stallion Express) returned an error. This may be a temporary issue.<br>' +
                        'Please try the following:<br>' +
                        '<ul>' +
                        '<li>Double-check your address and postal code</li>' +
                        '<li>Try again in a few minutes</li>' +
                        '<li>If the problem persists, please contact our support team</li>' +
                        '</ul>' +
                        '</div>'
                    );
                    $('#shipping-amount').text('0.00');
                    updateTaxAndTotal(getSubtotal(), appliedDiscount, 0);
                });
        }

        // Handle coupon application
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
                        updateTaxAndTotal(getSubtotal(), appliedDiscount, parseFloat(document
                            .getElementById('shipping-amount').textContent) || 0);
                    } else {
                        alert(result.message);
                    }
                })
                .catch(error => console.error('Error:', error));
        });


        function proceedToCheckout(event) {
            event?.preventDefault();

            // Validate required fields
            const requiredFields = ['firstname', 'lastname', 'country', 'state', 'city', 'postal_code',
                'address', 'email', 'phone'
            ];
            const missingFields = [];

            requiredFields.forEach(field => {
                const value = document.getElementById(field).value;
                if (!value) {
                    missingFields.push(field);
                }
            });

            if (missingFields.length > 0) {
                alert('Please fill in all required fields: ' + missingFields.join(', '));
                return;
            }

            if (!window.selectedShipping || !window.selectedShipping.method) {
                alert('Please select a shipping method before proceeding.');
                return;
            }

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
                    state: document.getElementById('state').value,
                    city: document.getElementById('city').value,
                    postal_code: document.getElementById('postal_code').value,
                    address: document.getElementById('address').value,
                    email: document.getElementById('email').value,
                    phone: document.getElementById('phone').value,
                    additional_info: document.getElementById('additional_info').value,
                    paymentMethod: document.querySelector('input[name="paymentMethod"]:checked')?.value,
                    DiscountAmount: appliedDiscount,
                    discountId: discountId ? discountId : null,
                    discount_type: discountType,
                    discount_percentage: discountPercentage,
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

                // Add Authorize.Net card details if that payment method is selected
                if (formData.paymentMethod === 'authorize_net') {
                    // Validate card details
                    const cardNumber = document.getElementById('cardNumber').value;
                    const cardName = document.getElementById('cardName').value;
                    const expiryDate = document.getElementById('expiryDate').value;
                    const cvv = document.getElementById('cvv').value;

                    if (!cardNumber || !cardName || !expiryDate || !cvv) {
                        alert('Please fill in all card details');
                        checkoutButton.innerHTML = 'Proceed to Pay';
                        checkoutButton.disabled = false;
                        return;
                    }

                    // Format expiry date MM/YY to MM/YYYY for API
                    let formattedExpiryDate = expiryDate;
                    if (expiryDate.length === 5 && expiryDate.indexOf('/') === 2) {
                        const parts = expiryDate.split('/');
                        formattedExpiryDate = parts[0] + '/20' + parts[1];
                    }

                    // Add card details to form data
                    formData.cardDetails = {
                        cardNumber: cardNumber.replace(/\s+/g, ''), // Remove any spaces
                        cardName: cardName,
                        expiryDate: formattedExpiryDate,
                        cvv: cvv
                    };

                    // Log card details being sent (except sensitive info)
                    console.log('Sending payment with card details', {
                        cardName: formData.cardDetails.cardName,
                        expiryDate: formData.cardDetails.expiryDate,
                        cardNumberLength: formData.cardDetails.cardNumber.length
                    });
                }




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
                            } else if (formData.paymentMethod === 'authorize_net') {
                                // For Authorize.net, redirect to the success page with order ID
                                window.location.href = "{{ route('main.pages.success') }}?orderId=" +
                                    result.orderId;
                            } else {
                                window.location.href = "{{ route('main.pages.success') }}?orderId=" +
                                    result.orderId;
                            }
                        } else {
                            // Handle error with more details
                            let errorMsg = result.message || 'Payment processing failed. Please try again.';
                            console.error('Payment error:', errorMsg);
                            alert(errorMsg);
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

        // Function to reset shipping options when address changes
        function resetShippingOptions() {
            // Clear selected shipping method
            $('#shipping-methods-container').html(
                '<div class="alert alert-info">' +
                '<i class="fas fa-info-circle me-2"></i> Please fill in all address fields and click the "Calculate Shipping" button above to see available shipping options.' +
                '</div>'
            );
            // Reset shipping amount
            $('#shipping-amount').text('0.00');
            // Clear stored shipping selection
            window.selectedShipping = null;
            // Update totals
            updateTaxAndTotal(getSubtotal(), appliedDiscount, 0);

            // Show calculate shipping button again if it was hidden
            $('#calculateShippingBtn').show();
        }

        // Add event listeners for all address fields
        $('#postal_code, #address, #city, #state, #country').on('change', function() {
            resetShippingOptions();
        });

        // Also reset when Select2 dropdowns change
        $('#country').on('select2:select', function() {
            resetShippingOptions();
        });

        $('#state').on('select2:select', function() {
            resetShippingOptions();
        });

        // Connect Calculate Shipping button to the shipping calculation function
        $('#calculateShippingBtn').on('click', function() {
            calculateShippingLive();
        });
    </script>

    <script>
        // Function to update the discount type text
        function updateDiscountTypeText() {
            const discountTypeText = document.getElementById('discount-type-text');
            if (discountType === 'volume') {
                discountTypeText.textContent = `(Volume ${discountPercentage}%)`;
            } else if (discountType === 'coupon') {
                discountTypeText.textContent = `(Coupon ${discountPercentage.toFixed(2)}%)`;
            } else {
                discountTypeText.textContent = '';
            }
        }

        // Update the discount type text whenever discount changes
        document.addEventListener('DOMContentLoaded', function() {
            updateDiscountTypeText();
        });

        // Modify the existing discount application code to update the discount type text
        document.getElementById('applySelectedDiscount').addEventListener('click', function() {
            // ...existing code...

            // Update the discount type text
            updateDiscountTypeText();

            // ...rest of the existing code...
        });
    </script>
@endsection
