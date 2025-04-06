@extends('main.layouts.master')

@section('main-container')


    @component('main.components.breadcrumb', [
        'pageTitle' => 'Product Details',
        'pageRoute' => '',
        'imageURL' => asset('assetsMain/images/PDetails.jpg'), // Evaluated here
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
                                <div class="alert alert-danger text-center text-capitalize mb-4 fs-14">
                                    Color calibration varies from monitor to monitor, so the colors in a product image may
                                    vary from the actual colors of the physical product. It is recommended that, if an exact
                                    color match is required, you order a sample to determine exact color and/or shade
                                </div>

                                <select id="beanie-color" class="form-control">
                                    <option>Select Beanie Color</option>
                                    @foreach ($colors as $index => $color)
                                        <option value="{{ $color->id }}"
                                            data-color-name="{{ $color->componentColor->color_name }}"
                                            data-image="{{ asset('storage/' . $color->image) }}">
                                            {{ ucfirst($colorNames[$index]) }}
                                        </option>
                                    @endforeach
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


                                @if ($product->is_pompom == 1)
                                    <label for="beanie-color" class="section-header mt-4">Select Beanies Add on</label>
                                    <div class="d-flex" style="justify-content: space-between">
                                        <div>
                                            <input type="radio" id="withoutpompom" name="pompom" value="0">
                                            <label for="withoutpompom">
                                                <img src="{{ asset('assetsCommon/images/withoutPomPom.jpg') }}"
                                                    alt="withoutpompom" style="width: 150px; height: auto;"> Without Pom
                                                Pom
                                            </label>
                                        </div>

                                        <div>
                                            <input type="radio" id="withpompom" name="pompom" value="1">
                                            <label for="withpompom">
                                                <img src="{{ asset('assetsCommon/images/withPomPom.jpg') }}"
                                                    alt="withpompom" style="width: 140px; height: auto;"> With Pom Pom
                                                <span style="color: red">2$ Each </span>
                                            </label>


                                        </div>

                                    </div>
                                @endif

                                <div class="section-header mt-4">
                                    Select Printing Option
                                </div>
                                
                                <div class="printing-options">
                                    @if ($productPrintings->isNotEmpty())
                                        @foreach ($productPrintings as $printing)
                                            <div class="option-card printing-option" 
                                                data-id="{{ $printing->id }}"
                                                data-title="{{ $printing->title }}"
                                                data-quantities="{{ json_encode($printing->quantity) }}"
                                                data-prices="{{ json_encode($printing->price) }}"
                                                data-is-leather="{{ $printing->is_leather }}">
                                                <img src="{{ asset('storage/' . $printing->image) }}" 
                                                    alt="{{ $printing->title }}">
                                                <h3>{{ $printing->title }}</h3>
                                            </div>
                                        @endforeach
                                    
                                        {{-- <p  style="color: red; display: none;"></p> --}}

                                    @else
                                        <p>No printing options available.</p>
                                    @endif

                                </div>
                                <div id="printing-error" style="color: red; display: none;" class="mt-5 alert alert-danger text-center text-capitalize mb-4 fs-14">
                                    Selected quantity is not available for this printing option.
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


                                    <div class=" mb-3" id="leatherwork" style="display: none;">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="leathercolor" class="form-label fw-bold">Enter Leather
                                                    Color</label>
                                                <input type="number" id="leathercolor" class="form-control"
                                                    placeholder="Leather Color Number">
                                                <small class="form-text text-muted">Select Color Number From The
                                                    Image</small>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="fontStyle" class="form-label fw-bold">Have a Look on Leather
                                                    Colors</label>
                                                <img class="form-control"
                                                    src="{{ asset('assetsCommon/images/LeatherPatchColors.jpeg') }}"
                                                    width="10" alt="">
                                            </div>
                                        </div>
                                    </div>



                                    <script>
                                       document.addEventListener("DOMContentLoaded", function() {
    const printingOptions = document.querySelectorAll(".printing-option");
    const leatherworkSection = document.getElementById("leatherwork");

    printingOptions.forEach(option => {
        option.addEventListener("click", function() {
            // Get the value of the data-is-leather attribute
            const isLeather = this.getAttribute("data-is-leather");

            // Check if isLeather is 1 (true)
            if (isLeather === "1") {
                leatherworkSection.style.display = "block"; // Show leatherwork section
            } else {
                leatherworkSection.style.display = "none"; // Hide leatherwork section
            }
        });
    });
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

                                    <div>
                                        <a href="{{ url('/main/view-color-book') }}" target="_blank"
                                            class="main-theme-color">View Color Card</a>
                                    </div>

                                    <!-- Imprint Colors -->
                                    <!-- Imprint Colors -->
                                    <div class="mb-3 mt-3">
                                        <label for="imprintColors" class="form-label fw-bold">Select Number Of Imprint
                                            Colors</label>
                                        <select id="imprintColors" class="form-select">
                                            <option value="0">Full Color Imprint</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
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
                                            <label for="color${i}" class="form-label fw-bold">Enter Color Code ${i}</label>
                <input id="color${i}" type="number" class="form-control" placeholder="Enter color code ${i}" 
                       maxlength="4" oninput="validateColorCode(this, ${i})">
                                               <p id="colorError${i}" class="text-danger" style="display:none; font-size: 0.9rem;">Color code must be exactly 4 digits.</p>
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
                                    <li style="background-color: #F7B708;">
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
                                    <ul class="dselects">
                                       
                                                <li class="shippingCharging">
                                                    <span class="check"><i class="fa-solid fa-truck"></i></span>
                                                    {{-- <div class="delivery_date w3_bg">
                                                         
                                                        </div> --}}
                                                    <div class="delivery_price w3_bg">Price:
                                                        30 $
                                                    </div>
                                                </li>

                                                <li class="shippingCharging">
                                                    <span class="check"><i class="fa-solid fa-truck"></i></span>
                                                    <div class="delivery_price w3_bg">
                                                        <span class="delivery_price_number text-danger"
                                                            style="font-weight:700">For Order more than 500 $</span>
                                                    </div>
                                        
                                                    <div class="delivery_price w3_bg">Price:
                                                        0$
                                                    </div>
                                                </li>
                                            
                                    </ul>
                                

                            </div>

                        </div>
                        <div class="mt-5 text-align-center">
                            @if (Auth::check() && Auth::user()->status == 0)
                                <div style="color: red" role="alert">
                                    Contact admin to activate your account to proceed with adding items to your cart.
                                </div>
                            @elseif(Auth::check() && Auth::user()->status == 1)
                                <!-- Show Add to Cart button -->
                                <button class="btn btn-success" id="add-to-cart-button">
                                    <i class="fa-solid fa-cart-shopping"></i> &nbsp;&nbsp;Add to Cart
                                </button>
                            @else
                                <button class="btn btn-success" id="add-to-cart-button">
                                    <i class="fa-solid fa-cart-shopping"></i> &nbsp;&nbsp;Add to Cart
                                </button>
                            @endif
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
            const pompomOptions = document.querySelectorAll('input[name="pompom"]');

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
                        selectedPrintingQuantities = JSON.parse(this.dataset.quantities).map(Number);
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

            pompomOptions.forEach(option => {
                option.addEventListener("change", function() {
                    console.log("Selected Pom Pom Option:", this.value);
                    calculateTotalPrice(); // Recalculate prices when pom-pom option changes
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
    totalQtyElements.forEach(element => {
        element.textContent = enteredQty;
    });

    selectedPrintingPrice = calculatePrice(enteredQty, selectedPrintingQuantities, pricesForSelectedPrinting);

    // Ensure a printing option is selected
    const activePrintingOption = document.querySelector(".printing-option.active");
    const selectedPrintingId = activePrintingOption ? parseInt(activePrintingOption.getAttribute("data-id")) : null;

    let isValidQuantity = false;
    for (let i = 0; i < selectedPrintingQuantities.length; i++) {
        if (enteredQty >= selectedPrintingQuantities[i]) {
            isValidQuantity = true;
            break;
        }
    }



if (selectedPrintingId !== null && (!isValidQuantity || (selectedPrintingPrice === 0 && selectedPrintingId > 1))) {
    console.log("Selected Printing ID:", selectedPrintingId);
    document.getElementById("printing-error").style.display = "block";
} else {
    document.getElementById("printing-error").style.display = "none";
}




    calculateTotalPrice();
}

// Ensure error message disappears when quantity is corrected
quantityInput.addEventListener("input", function () {
    document.getElementById("printing-error").style.display = "none";
});





            // Update total price based on quantity and selected printing option
            function calculateTotalPrice() {
                const enteredQty = parseInt(quantityInput.value) || 0;
                let calculatedPrice = calculatePrice(enteredQty, quantities, prices);

                const isWithPompom = document.querySelector('input[name="pompom"]:checked')?.value === "1";
                const pompomCustomizationPrice = isWithPompom ? enteredQty * 2 : 0;

                const total = calculatedPrice * enteredQty;
                const totalCustomization = selectedPrintingPrice * enteredQty + pompomCustomizationPrice;

                console.log("Quantity:", enteredQty);
                console.log("Printing ID:", selectedPrintingQuantities);
                console.log("Printing Price:", selectedPrintingPrice);
                console.log("Product Price:", calculatedPrice);
                console.log("Delivery Price:", calculatePrice(enteredQty, quantitiesDelivery, pricesDelivery));

                totalPrice.textContent = `$${total.toFixed(2)}`;
                totalPriceCustomization.textContent = `$${totalCustomization.toFixed(2)}`;

                if (selectedPrintingPrice === 0 && total >= 1) {
                    artworkSelection.style.display = "none";
                } else {
                    artworkSelection.style.display = "block";
                }

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
    const productPrice = calculatePrice(enteredQty, quantities, prices);
    const printingPrice = selectedPrintingPrice * enteredQty;
    const isWithPompom = document.querySelector('input[name="pompom"]:checked')?.value === "1";
    const pompomPrice = isWithPompom ? enteredQty * 2 : 0;

    // Calculate total price
    const total = (productPrice * enteredQty) + printingPrice + pompomPrice;

    // Determine the selected shipping option
    const selectedOption = document.querySelector('input[name="shippingOption"]:checked')?.value;

    let deliveryPrice = 0;
    if (selectedOption === "viewBundle") {
        deliveryPrice = total > 500 ? 0 : 30;
    }

    // Update the delivery price display
    totalPriceDelivery.textContent = `$${deliveryPrice.toFixed(2)}`;

    // Update the background color for selected shipping option
    document.querySelectorAll(".shippingCharging").forEach((shippingElement) => {
        const priceText = shippingElement.querySelector(".delivery_price").textContent.trim();
        const priceMatch = priceText.match(/\d+(\.\d+)?/); // Extract numeric value
        const priceValue = priceMatch ? parseFloat(priceMatch[0]) : null;

        if (priceValue !== null && priceValue === deliveryPrice) {
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

            shippingOptions.forEach(option => {
                option.addEventListener('change', toggleOptions);
            });

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

            toggleOptions();

            quantityInput.addEventListener("blur", function() {
                const enteredQty = parseInt(quantityInput.value) || 0;
                const minQty = Math.min(...quantities);

                if (enteredQty < minQty) {
                    quantityInput.value = minQty;
                    calculateTotalPrice();
                }

                totalQtyElements.forEach(element => {
                    element.textContent = quantityInput.value;
                });
            });
            let printingId;  // Declare printingId outside the blocks

document.getElementById("add-to-cart-button").addEventListener("click", function() {
    const isAuthenticated = {{ Auth::check() ? 'true' : 'false' }};

    if (!isAuthenticated) {
        // Redirect to the login page if not authenticated
        window.location.href = "{{ route('user.login') }}";
        return;
    }

    const quantity = parseInt(quantityInput.value) || 0;
    const colorId = document.getElementById("beanie-color").value;
    const beanieType = document.querySelector('input[name="beanie"]:checked')?.value || null;
    const PomPomOption = document.querySelector('input[name="pompom"]:checked')?.value || 0;
    const pompomPrice = PomPomOption === "1" ? 2 : 0;
    const printingPrice = selectedPrintingPrice;

    // Declare and assign printingId based on the condition
    if (printingPrice === 0) {
        printingId = 1;
    } else {
        printingId = parseInt(document.querySelector(".printing-option.active")?.getAttribute("data-id")) || null;
    }

    // const total = (printingPrice * quantity) + (productPrice * quantity);
    

    const productPrice = calculatePrice(quantity, quantities, prices);

    // Check which shipping option is selected
    const selectedOption = document.querySelector('input[name="shippingOption"]:checked').value;
    
    // Calculate total cost
    const total = (productPrice * quantity) + (printingPrice * quantity) + pompomPrice;

   // Set delivery price based on total cost and selected shipping option
    let deliveryPrice;
    if (selectedOption === "pickYourself") {
        deliveryPrice = 0;
    } else {
        deliveryPrice = total > 500 ? 0 : 30;
    }


    // Set delivery price based on total cost
    // let deliveryPrice = total > 500 ? 0 : 30;
    // const deliveryPrice = selectedOption === "pickYourself" ? 0 : calculatePrice(quantity, quantitiesDelivery, pricesDelivery);

    const formData = new FormData();
    formData.append("productId", productId);
    formData.append("userId", userId);
    formData.append("colorId", colorId);
    formData.append("quantity", quantity);
    formData.append("beanieType", beanieType);
    formData.append("PomPomOption", PomPomOption);
    formData.append("printingId", printingId);
    formData.append("printingPrice", printingPrice);
    formData.append("productPrice", productPrice);
    formData.append("deliveryPrice", deliveryPrice);
    formData.append("pompomPrice", pompomPrice);

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
        const leathercolor = document.getElementById("leathercolor").value;
        const patchLength = document.getElementById("patchLength").value ? parseFloat(document.getElementById("patchLength").value) : null;
        const patchHeight = document.getElementById("patchHeight").value ? parseFloat(document.getElementById("patchHeight").value) : null;
        const fontStyle = document.getElementById("fontStyle").value || null;
        const numOfImprint = document.getElementById("imprintColors").value ? parseInt(document.getElementById("imprintColors").value) : null;

        const imprintColors = Array.from(document.querySelectorAll("#additionalDropdowns input")).map(input => parseInt(input.value, 10));

        formData.append("leathercolor", leathercolor);
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

<script src="{{ asset('assetsMain/js/frontend/productDetail.js') }}"></script>  
@endsection 
