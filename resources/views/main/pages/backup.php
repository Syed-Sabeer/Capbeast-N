@extends('main.layouts.master')

@section('main-container')


@component('main.components.breadcrumb', [
    'pageTitle' => 'Product Details',
    'pageRoute' => '' ,
    'imageURL' => asset('assetsMain/images/about.jpg') // Evaluated here
])
@endcomponent


    

    <section class="section pt-0 pb-0">
        <h4 class="lh-base mb-1 p-3 mt-3"
            style="font-size: 2rem; color: #F7B708; background-color: rgba(247, 183, 8, 0.1); text-align: center">
            {{ $product->title }}
        </h4>
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-12">

                    <ul class="nav nav-tabs nav-tabs-custom mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#pricechart" role="tab">
                                Price Chart
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#home1" role="tab">
                                Description
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#profile1" role="tab">
                                Ratings & Reviews
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content text-muted">
                        <div class="tab-pane active" id="pricechart" role="tabpanel">
                            <table class="table fs-15 align-middle table-nowrap mt-4">
                                <thead>
                                    <tr>
                                        <th scope="col">Qty</th>
                                        @foreach ($quantities as $quantity)
                                            <th scope="col" class="text-align-center"
                                                data-quantity="{{ $quantity }}">{{ $quantity }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="#" class="text-body">Price</a>
                                        </td>
                                        @foreach ($prices as $price)
                                            <td class="fw-medium text-align-center" data-price="{{ $price }}"
                                                id="pricing-{{ $price }}">
                                                ${{ number_format($price, 2) }}
                                            </td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>

                        </div>

                        <div class="tab-pane" id="home1" role="tabpanel">


                            <p class=" fs-15">
                                {{ $product->description }}
                            </p>
                        </div>

                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="row gx-2">
                <div class="slider-container mt-3">
                    <button class="ProductSliderArrow left" onclick="changeSlide(-1)">&lt;</button>

                    <!-- Display main product image (first base image) -->
                    <img src="{{ asset('storage/' . ($product->productBaseImages->first()->base_image ?? 'placeholder.png')) }}"
                        alt="Main Product" class="main-image" id="mainImage">

                    <button class="ProductSliderArrow right" onclick="changeSlide(1)">&gt;</button>

                    <div class="thumbnail-container">
                        <!-- Display all product base images as thumbnails -->
                        @foreach ($product->productBaseImages as $image)
                            <img src="{{ asset('storage/' . $image->base_image) }}" alt="Product Thumbnail"
                                class="thumbnail {{ $loop->first ? 'active' : '' }}" onclick="changeImage(this)">
                        @endforeach

                        <!-- Display color-related images if available -->
                        @if ($product->productColors && $product->productColors->isNotEmpty())
                            @foreach ($product->productColors as $color)
                                <img src="{{ asset('storage/' . $color->image) }}" alt="Color Thumbnail" class="thumbnail"
                                    data-color-id="{{ $color->id }}" onclick="changeImage(this)">
                            @endforeach
                        @endif

                    </div>
                    <div class="mt-5">
                        <button class="btn btn-success" id="add-to-cart-button"><i class="fa-solid fa-cart-shopping"></i> &nbsp;&nbsp;Add to Cart  </button>
                    </div>

                </div>





                <!--end col-->
                <div class="col-lg-8 ms-auto">

                    <div class="container">
                        <div class="customization-section bg-white border border-light" id="customization-section">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <!-- Step 1 on the left -->
                                <div class="d-flex align-items-center">
                                    <div class="step me-3">
                                        <strong>STEP 1</strong>
                                    </div>
                                    <h2 class="h4 mb-0">Enter Quantity</h2>
                                </div>

                                <!-- Total quantity and price on the right -->
                                <div class="price-details">
                                    Total Qty: <span class="total-qty">0</span> | Price: <span id="total-price">$0.00</span>
                                </div>
                            </div>


                            <div>
                                <input type="number" id="quantity-input" placeholder="Qty" class="form-control"
                                    min="0">
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="customization-section bg-white border border-light">
                            <!-- Header -->
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <!-- Step 2 on the left -->
                                <div class="d-flex align-items-center">
                                    <div class="step me-3">
                                        <strong>STEP 2</strong>
                                    </div>
                                    <h2 class="h4 mb-0">Customization</h2>
                                </div>

                                <!-- Total quantity and price on the right -->
                                <div class="price-details">
                                    Total Qty: <span class="total-qty">0</span> | Price: <span
                                        id="total-price2">$0.00</span>
                                </div>
                            </div>


                            <!-- Dropdown Section -->
                            <div class="form-group">
                                <label for="beanie-color" class="section-header">Select Beanies Color</label>
                                <select id="beanie-color" class="form-control">
                                    <option>Select Beanie Color</option>

                                    @if (!empty($colorNames))
                                        @foreach ($colors as $index => $color)
                                            <option value="{{ $color->id }}" data-color-id="{{ $color->id }}">
                                                {{ ucfirst($colorNames[$index]) }}
                                            </option>
                                        @endforeach
                                    @else
                                        <option>No colors available</option>
                                    @endif

                                </select>


                                <label for="beanie-color" class="section-header mt-4">Select Beanies Type</label>
                                <div class="d-flex " style="justify-content: space-between">
                                    <div>
                                        <input type="radio" id="flipped" name="beanie" value="1">
                                        <label for="flipped">
                                            <img src="{{ asset('assetsCommon/images/flipbeanie.jpg') }}" alt="flipped"
                                                style="width: 150px; height: auto;"> Flipped Beanies
                                        </label>
                                    </div>

                                    <div>
                                        <input type="radio" id="unflipped" name="beanie" value="2">
                                        <label for="unflipped">
                                            <img src="{{ asset('assetsCommon/images/unflipbeanie.png') }}"
                                                alt="unflipped" style="width: 150px; height: auto;"> UnFlipped Beanies
                                        </label>
                                    </div>

                                </div>




                                <div class="section-header mt-4">
                                    Select Printing Option
                                </div>

                                <div class="printing-options">
                                    @if ($productPrintings->isNotEmpty())
                                        @foreach ($productPrintings as $printing)
                                            <div class="option-card printing-option" data-id="{{ $printing->id }}"
                                                data-title="{{ $printing->title }}"
                                                data-quantities="{{ json_encode($printing->quantity) }}"
                                                data-prices="{{ json_encode($printing->price) }}">
                                                <img src="{{ asset('storage/' . $printing->image) }} "
                                                    alt="{{ $printing->title }}">
                                                <h3>{{ $printing->title }}</h3>
                                            </div>
                                        @endforeach
                                    @else
                                        <p>No printing options available.</p>
                                    @endif
                                </div>





                                <div class="container my-5" id="artwork-upload">
                                    <h2 class="text-center mb-4">Upload Your Artwork</h2>

                                    <!-- Artwork Type -->
                                    <div class="mb-3">
                                        <label for="artworkType" class="form-label fw-bold">Artwork Type</label>
                                        <select id="artworkType" class="form-select">
                                            <option value="1">Upload my Artwork</option>
                                            <option value="2">Enter Your Message</option>
                                        </select>
                                    </div>

                                    <!-- File Upload -->
                                    <div class="mb-3" id="fileUploadContainer">
                                        <label for="fileUpload" class="form-label fw-bold">Browse Files To Upload</label>
                                        <form enctype="multipart/form-data">
                                        <input type="file" id="fileUpload" class="form-control">
                                    </form>
                                        <div class="form-text">
                                            File Accepted: JPEG, JPG, GIF, PNG, EPS, PDF, PSD, AI, BMP, TIF, TIFF<br>
                                            <strong>Preferred File Type for Better Quality Product:</strong> AI, EPS, PSD,
                                            PDF
                                        </div>
                                    </div>

                                    <!-- Message Input -->
                                    <div class="mb-3" id="messageInputContainer" style="display: none;">
                                        <label for="messageInput" class="form-label fw-bold">Enter Your Message</label>
                                        <input type="text" id="messageInput" class="form-control"
                                            placeholder="Type your message here">
                                    </div>

                                    <script>
                                        document.getElementById('artworkType').addEventListener('change', function() {
                                            const fileUploadContainer = document.getElementById('fileUploadContainer');
                                            const messageInputContainer = document.getElementById('messageInputContainer');

                                            if (this.value === '1') {
                                                fileUploadContainer.style.display = 'block';
                                                messageInputContainer.style.display = 'none';
                                            } else if (this.value === '2') {
                                                fileUploadContainer.style.display = 'none';
                                                messageInputContainer.style.display = 'block';
                                            }
                                        });
                                    </script>


                                    <!-- Patch Dimensions -->
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="patchLength" class="form-label fw-bold">Patch Length</label>
                                            <input type="text" id="patchLength" class="form-control"
                                                placeholder="Patch Length">
                                            <small class="form-text text-muted">Min Length - 1", Max Length - 4"</small>
                                            <div id="patchLengthError" style="color: red; display: none;">Length must be
                                                between 1 and 4 inches.</div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="patchHeight" class="form-label fw-bold">Patch Height</label>
                                            <input type="text" id="patchHeight" class="form-control"
                                                placeholder="Patch Height">
                                            <small class="form-text text-muted">Max Height - 2.5"</small>
                                            <div id="patchHeightError" style="color: red; display: none;">Height cannot
                                                exceed 2.5 inches.</div>
                                        </div>
                                    </div>
                                    <!-- Font Style -->
                                    <div class="mb-3">
                                        <label for="fontStyle" class="form-label fw-bold">Select Font Style</label>
                                        <select id="fontStyle" class="form-select">
                                            <option value="arial">Arial</option>
                                            <option value="times">Times New Roman</option>
                                            <option value="courier">Courier New</option>
                                        </select>
                                    </div>

                                    <!-- Imprint Colors -->
                                    <div class="mb-3">
                                        <label for="imprintColors" class="form-label fw-bold">Select Number Of Imprint
                                            Colors</label>
                                        <select id="imprintColors" class="form-select">
                                            <option value="0">Full Color Imprint</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </div>

                                    <div id="additionalDropdowns"></div>

                                    <script>
                                        const imprintColors = document.getElementById('imprintColors');
                                        const additionalDropdowns = document.getElementById('additionalDropdowns');

                                        imprintColors.addEventListener('change', function() {
                                            const numColors = parseInt(imprintColors.value);
                                            additionalDropdowns.innerHTML = ''; // Clear previous dropdowns

                                            if (numColors !== 0) { // Exclude Full Color Imprint (value = 0)
                                                for (let i = 1; i <= numColors; i++) {
                                                    const newSelect = document.createElement('div');
                                                    newSelect.classList.add('mb-3');
                                                    newSelect.innerHTML = `
                                            <label for="color${i}" class="form-label fw-bold">Select Color ${i}</label>
                                            <select id="color${i}" class="form-select">
                                                <option value="color${i}">Color ${i}</option>
                                            </select>
                                        `;
                                                    additionalDropdowns.appendChild(newSelect);
                                                }
                                            }
                                        });
                                    </script>
                                </div>











                            </div>
                        </div>
                    </div>


                    <div class="container">
                        <div class="customization-section bg-white border border-light">

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="step">
                                    STEP 3
                                </div>
                                <h2 class="h4 mb-0 ml-2">Shipping</h2>
                                <div class="price-details">
                                    Total Qty: <span class="total-qty"></span> | Price: <span
                                        id="total-price3">$168.12</span>
                                </div>
                            </div>
                            <div class="radio-options">
                                <label>
                                    <input type="radio" name="shippingOption" value="pickYourself" checked
                                        onchange="toggleOptions()"> Pick Yourself
                                </label>
                                <label>
                                    <input type="radio" name="shippingOption" value="viewBundle"
                                        onchange="toggleOptions()"> View Shipping Bundle
                                </label>
                            </div>
                            <div id="pickYourselfBox" class="option-box">
                                <ul class="dselects">
                                    <li  style="background-color: #F7B708;">
                                        <span class="check"> 

                                            <i class="fa-solid fa-truck white-color"></i>
                                        </span>
                                        <div class="delivery_date w3_bg white-color">Pick Yourself


                                        </div>
                                        <div class="delivery_price w3_bg">
                                            <span class="delivery_price_number text-danger"
                                                style="font-weight:700">FREE</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div id="viewBundleBox" class="option-box" style="display: none;">

                                @if ($latestProductDelivery)

                                    <ul class="dselects">
                                        @php
                                            $quantitiesdelivery = json_decode($latestProductDelivery->quantity, true);
                                            $pricesDelivery = json_decode($latestProductDelivery->pricing, true);
                                        @endphp

                                        @if ($quantitiesdelivery && $pricesDelivery && count($quantitiesdelivery) === count($pricesDelivery))
                                            @foreach ($quantitiesdelivery as $index => $quantitydelivery)
                                                <li class="shippingCharging">
                                                    <span class="check"><i class="fa-solid fa-truck"></i></span>
                                                    <div class="delivery_date w3_bg">Qty: {{ $quantitydelivery }}</div>
                                                    <div class="delivery_price w3_bg">Price:
                                                        ${{ number_format($pricesDelivery[$index], 2) }}</div>
                                                </li>
                                            @endforeach
                                        @else
                                            <li>
                                                <div class="delivery_date w3_bg">Data mismatch or incomplete</div>
                                            </li>
                                        @endif
                                    </ul>
                                @else
                                    <p>No delivery records found.</p>
                                @endif

                            </div>

                        </div>
                    </div>


                </div>
            </div>


        </div>
        <!--end row-->
        </div>
        <!--end container-->
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const productId = {{ $product->id }};
        const userId = {{ auth()->id() ?? 'null' }};
        console.log("Product ID:", productId);
        console.log("User ID:", userId);

            const quantityInput = document.getElementById("quantity-input");
            const totalQtyElements = document.querySelectorAll(".total-qty");
            const totalPrice = document.getElementById("total-price");
            const totalPriceCustomization = document.getElementById("total-price2");
            const totalPriceDelivery = document.getElementById("total-price3");
            const printingOptions = document.querySelectorAll(".printing-option");
            const shippingOptions = document.querySelectorAll('input[name="shippingOption"]');
            const pickYourselfBox = document.getElementById("pickYourselfBox");
            const viewBundleBox = document.getElementById("viewBundleBox");
            const artworkSelection = document.getElementById("artwork-upload");
            const beanieColorSelect = document.getElementById("beanie-color");
            const beanieOptions = document.querySelectorAll('input[name="beanie"]');

            let selectedPrintingPrice = 0;
            let selectedPrintingQuantities = [];
            let pricesForSelectedPrinting = [];

            // Quantities and prices from server (ensure they are numbers)
            const quantities = @json($quantities).map(Number);
            const prices = @json($prices).map(Number);
            const quantitiesDelivery = @json($quantitiesdelivery).map(Number);
            const pricesDelivery = @json($pricesDelivery).map(Number);

            // Handle printing option selection
            printingOptions.forEach(option => {
                option.addEventListener("click", function() {
                    printingOptions.forEach(opt => opt.classList.remove("active"));
                    this.classList.add("active");

                    // Log the selected printing ID
                    const selectedPrintingId = this.getAttribute("data-id");
                    console.log("Selected Printing ID:", selectedPrintingId);

                    try {
                        selectedPrintingQuantities = JSON.parse(this.dataset.quantities).map(
                        Number);
                        pricesForSelectedPrinting = JSON.parse(this.dataset.prices).map(Number);
                        updatePrintingPriceAndTotal();
                    } catch (error) {
                        console.error("Error parsing quantities or prices data:", error);
                    }
                });
            });

            // Log selected beanie color ID instead of name
            beanieColorSelect.addEventListener("change", function() {
                console.log("Selected Beanie Color ID:", this.value);
            });

            // Log selected beanie type
            beanieOptions.forEach(option => {
                option.addEventListener("change", function() {
                    console.log("Selected Beanie Type:", this.value);
                });
            });

            // Function to calculate printing price based on quantity
            function calculatePrice(quantity, quantities, prices) {
                quantity = parseInt(quantity);
                if (isNaN(quantity)) return 0;

                let price = 0;
                for (let i = quantities.length - 1; i >= 0; i--) {
                    if (quantity >= quantities[i]) {
                        price = prices[i];
                        break;
                    }
                }
                return price;
            }

            // Update printing price and total price
            function updatePrintingPriceAndTotal() {
                const enteredQty = parseInt(quantityInput.value) || 0;

                // Update all quantity displays
                totalQtyElements.forEach(element => {
                    element.textContent = enteredQty;
                });

                selectedPrintingPrice = calculatePrice(enteredQty, selectedPrintingQuantities,
                    pricesForSelectedPrinting);
                calculateTotalPrice();
            }

            // Update total price based on quantity and selected printing option
            function calculateTotalPrice() {
                const enteredQty = parseInt(quantityInput.value) || 0;
                let calculatedPrice = calculatePrice(enteredQty, quantities, prices);
                const total = calculatedPrice * enteredQty;

                // Log prices to console
                console.log("Quantity:", enteredQty);
                console.log("Printing ID:", selectedPrintingQuantities);
                console.log("Printing Price:", selectedPrintingPrice);
                console.log("Product Price:", calculatedPrice);
                console.log("Delivery Price:", calculatePrice(enteredQty, quantitiesDelivery, pricesDelivery));

                totalPrice.textContent = `$${total.toFixed(2)}`;
                totalPriceCustomization.textContent = `$${(selectedPrintingPrice * enteredQty).toFixed(2)}`;

                if (selectedPrintingPrice === 0 && total >= 1) {
                    artworkSelection.style.display = "none";
                } else {
                    artworkSelection.style.display = "block";
                }

                // Update background color based on calculated price
                document.querySelectorAll('[id^="pricing-"]').forEach(function(priceElement) {
                    const priceValue = parseFloat(priceElement.getAttribute('data-price'));

                    if (priceValue === calculatedPrice) {
                        priceElement.style.backgroundColor = "#F7B708";
                        priceElement.style.color = "#fff";
                    } else {
                        priceElement.style.backgroundColor = "";
                        priceElement.style.color = "black";
                    }
                });
            }

            // Update delivery price and total cost for "View Shipping Bundle"
            function updateDeliveryPriceAndTotal() {
                const enteredQty = parseInt(quantityInput.value) || 0;
                const deliveryPrice = calculatePrice(enteredQty, quantitiesDelivery, pricesDelivery);
                const totalDelivery = deliveryPrice * enteredQty;

                // Update the delivery price display
                totalPriceDelivery.textContent = `$${totalDelivery.toFixed(2)}`;

                // Highlight the corresponding shippingCharging element
             // Highlight the corresponding shippingCharging element
document.querySelectorAll(".shippingCharging").forEach((shippingElement) => {
    const priceText = shippingElement.querySelector(".delivery_price").textContent.trim();
    const priceMatch = priceText.match(/\d+(\.\d+)?/); // Extract numeric value
    const priceValue = priceMatch ? parseFloat(priceMatch[0]) : null;

    if (priceValue !== null && Math.abs(priceValue - deliveryPrice) < 0.01) {
        shippingElement.style.backgroundColor = "#F7B708";
        shippingElement.style.color = "#fff";
    } else {
        shippingElement.style.backgroundColor = "";
        shippingElement.style.color = "";
    }
});

            }

            // Toggle between "Pick Yourself" and "View Shipping Bundle"
            function toggleOptions() {
                const selectedOption = document.querySelector('input[name="shippingOption"]:checked').value;

                if (selectedOption === 'pickYourself') {
                    pickYourselfBox.style.display = 'block';
                    viewBundleBox.style.display = 'none';
                    totalPriceDelivery.textContent = '$0.00';
                    resetTotalPrice();

                    // Reset highlights for shippingCharging elements
                    document.querySelectorAll(".shippingCharging").forEach((shippingElement) => {
                        shippingElement.style.backgroundColor = "";
                        shippingElement.style.color = "";
                    });
                } else {
                    pickYourselfBox.style.display = 'none';
                    viewBundleBox.style.display = 'block';

                    // Calculate and log the shipping price
                    const enteredQty = parseInt(quantityInput.value) || 0;
                    const shippingPrice = calculatePrice(enteredQty, quantitiesDelivery, pricesDelivery);
                    console.log("Shipping Price (View Shipping Bundle):", shippingPrice);

                    updateDeliveryPriceAndTotal();
                }
            }


            // Reset the total price to $0 for "Pick Yourself"
            function resetTotalPrice() {
                totalPrice.textContent = "$0.00";
                totalPriceCustomization.textContent = "$0.00";
            }

            // Listen to changes in shipping options and update the view
            shippingOptions.forEach(option => {
                option.addEventListener('change', toggleOptions);
            });

            // Recalculate total price and update view on quantity change
            quantityInput.addEventListener("input", function() {
                const selectedOption = document.querySelector('input[name="shippingOption"]:checked').value;

                if (selectedOption === 'pickYourself') {
                    totalPriceDelivery.textContent = '$0.00';
                    resetTotalPrice();
                } else {
                    updateDeliveryPriceAndTotal();
                }

                updatePrintingPriceAndTotal();
            });

            // Ensure correct view on page load
            toggleOptions();

            // Prevent entering a value below the minimum quantity and update the UI accordingly
            quantityInput.addEventListener("blur", function() {
                const enteredQty = parseInt(quantityInput.value) || 0;
                const minQty = Math.min(...quantities);

                if (enteredQty < minQty) {
                    quantityInput.value = minQty;
                    calculateTotalPrice();
                }

                // Ensure the total quantity and price are updated
                totalQtyElements.forEach(element => {
                    element.textContent = quantityInput.value;
                });
            });

            document.getElementById("add-to-cart-button").addEventListener("click", function () {
    const quantity = parseInt(quantityInput.value) || 0;
    const colorId = document.getElementById("beanie-color").value;
    const beanieType = document.querySelector('input[name="beanie"]:checked')?.value || null;
    const printingId = parseInt(document.querySelector(".printing-option.active")?.getAttribute("data-id")) || null;
    const printingPrice = selectedPrintingPrice;
    const productPrice = calculatePrice(quantity, quantities, prices);

    // Check which shipping option is selected
    const selectedOption = document.querySelector('input[name="shippingOption"]:checked').value;
    const deliveryPrice = selectedOption === "pickYourself" ? 0 : calculatePrice(quantity, quantitiesDelivery, pricesDelivery);

    const formData = new FormData();
    formData.append("productId", productId);
    formData.append("userId", userId);
    formData.append("colorId", colorId);
    formData.append("quantity", quantity);
    formData.append("beanieType", beanieType);
    formData.append("printingId", printingId);
    formData.append("printingPrice", printingPrice);
    formData.append("productPrice", productPrice);
    formData.append("deliveryPrice", deliveryPrice);

    // Only include artwork data if the artwork form is visible
    if (artworkSelection.style.display !== "none") {
        const artworkType = parseInt(document.getElementById("artworkType").value) || null;
        const artworkDataText = document.getElementById("messageInput").value || null;
        const artworkDataImage = document.getElementById("fileUpload").files[0] || null;

        formData.append("artworkType", artworkType);
        formData.append("artworkDataText", artworkDataText);
        if (artworkDataImage) {
            formData.append("artworkDataImage", artworkDataImage);
        }

        const patchLength = document.getElementById("patchLength").value ? parseFloat(document.getElementById("patchLength").value) : null;
        const patchHeight = document.getElementById("patchHeight").value ? parseFloat(document.getElementById("patchHeight").value) : null;
        const fontStyle = document.getElementById("fontStyle").value || null;
        const numOfImprint = document.getElementById("imprintColors").value ? parseInt(document.getElementById("imprintColors").value) : null;
        const imprintColors = Array.from(document.querySelectorAll("#additionalDropdowns select")).map(
            dropdown => dropdown.value
        );

        formData.append("patchLength", patchLength);
        formData.append("patchHeight", patchHeight);
        formData.append("fontStyle", fontStyle);
        formData.append("numOfImprint", numOfImprint);
        imprintColors.forEach((color, index) => {
            formData.append(`imprintColors[${index}]`, color);
        });
    }

    fetch("{{ route('cart.add') }}", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
        },
        body: formData,
    })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                alert("Product added to cart successfully!");
                window.location.href = "{{ route('cart') }}";
            } else {
                alert("Failed to add product to cart.");
            }
        })
        .catch(error => {
            console.error("Error:", error);
        });
});

        });
    </script>

    <script>
        const mainImage = document.getElementById('mainImage');
        const thumbnails = document.querySelectorAll('.thumbnail');
        const colorDropdown = document.getElementById('beanie-color');
        let currentIndex = 0;

        // Change the main image based on the clicked thumbnail
        function changeImage(element) {
            mainImage.src = element.src;
            thumbnails.forEach(thumbnail => thumbnail.classList.remove('active'));
            element.classList.add('active');
            currentIndex = Array.from(thumbnails).indexOf(element);

            // Synchronize the dropdown with the selected image
            const colorId = element.dataset.colorId;
            if (colorId) {
                colorDropdown.value = colorId;
            }
        }

        // Change the main image when navigating through the slider
        function changeSlide(direction) {
            currentIndex += direction;
            if (currentIndex < 0) {
                currentIndex = thumbnails.length - 1;
            } else if (currentIndex >= thumbnails.length) {
                currentIndex = 0;
            }
            changeImage(thumbnails[currentIndex]);
        }

        // Change the image when selecting a color from the dropdown
        colorDropdown.addEventListener('change', () => {
            const selectedColorId = colorDropdown.value;
            const targetThumbnail = Array.from(thumbnails).find(thumbnail => thumbnail.dataset.colorId ==
                selectedColorId);
            if (targetThumbnail) {
                changeImage(targetThumbnail);
            }
        });
    </script>

    <script>
        document.getElementById('patchLength').addEventListener('input', function() {
            const patchLength = parseFloat(this.value);
            const errorElement = document.getElementById('patchLengthError');
            if (isNaN(patchLength) || patchLength < 1 || patchLength > 4) {
                errorElement.style.display = 'block';
            } else {
                errorElement.style.display = 'none';
            }
        });

        document.getElementById('patchHeight').addEventListener('input', function() {
            const patchHeight = parseFloat(this.value);
            const errorElement = document.getElementById('patchHeightError');
            if (isNaN(patchHeight) || patchHeight > 2.5) {
                errorElement.style.display = 'block';
            } else {
                errorElement.style.display = 'none';
            }
        });
    </script>

@endsection
