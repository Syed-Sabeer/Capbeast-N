@extends('main.layouts.master')


@section('main-container')
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Aldrich|Allan|Allerta|Allerta+Stencil|Anton|Archivo+Black|Arvo|Atomic+Age|Audiowide|Bangers|Berkshire+Swash|Bitter|Black+Ops+One|Butcherman|Calligraffitti|Ceviche+One|Changa+One|Chewy|Comfortaa|Coming+Soon|Contrail+One|Courgette|Coustard|Crafty+Girls|Domine|Fjalla+One|Fontdiner+Swanky|Francois+One|Geostar+Fill|Gloria+Hallelujah|Graduate|Grand+Hotel|Griffy|Hanalei+Fill|Indie+Flower|Jockey+One|Kaushan+Script|Keania+One|La+Belle+Aurore|Leckerli+One|Lilita+One|Lily+Script+One|Lobster|Marck+Script|Merienda+One|Mountains+of+Christmas|Mr+Dafoe|Nosifer|Nunito|Orbitron|Pacifico|Passero+One|Pathway+Gothic+One|Permanent+Marker|Piedra|Pirata+One|Plaster|Playball|Press+Start+2P|Quantico|Racing+Sans+One|Rationale|Rock+Salt|Ruslan+Display|Sancreek|Shadows+Into+Light+Two|Shojumaru|Sigmar+One|Six+Caps|Slackey|Special+Elite|UnifrakturCook|UnifrakturMaguntia|Waiting+for+the+Sunrise|Yanone+Kaffeesatz">


    @component('main.components.breadcrumb', [
        'pageTitle' => 'Product Details',
        'pageRoute' => '',
        'imageURL' => asset('assetsMain/images/PDetails.jpg'), // Evaluated here
    ])
    @endcomponent

    <style>
        .avatar-xs {
            height: 2rem;
            width: 2rem;
        }

        .customization-btn {
            background-color: white;
            color: #000;
            border: 1px solid #000;
            margin-top: 10px;
            padding: 10px;
            border-radius: 5px;
            width: 100%;
        }

        .customization-btn:hover {
            background-color: #000;
            color: #fff;
            border: 1px solid #000;
            margin-top: 10px;
            padding: 10px;
            border-radius: 5px;
            width: 100%;
        }
    </style>

    <section class="section">
        <div class="container">
            <div class="row gx-2">
                <div class="slider-container mt-3">
                    <button class="ProductSliderArrow left" onclick="changeSlide(-1)">&lt;</button>

                    <img src="{{ asset(
                        'storage/' .
                            ($product->productColors->first()->front_image ??
                                ($product->productColors->first()->right_image ??
                                    ($product->productColors->first()->left_image ??
                                        ($product->productColors->first()->back_image ?? 'ProductImages/default.jpg')))),
                    ) }}"
                        alt="Main Product" class="main-image" id="mainImage">

                    <button class="ProductSliderArrow right" onclick="changeSlide(1)">&gt;</button>

                    <div class="thumbnail-container">

                    </div>
                </div>
                <div class="col-lg-5 ms-auto">
                    <div class="ecommerce-product-widgets mt-4 mt-lg-0">
                        <div class="mb-4">

                            <h4 class="lh-base mb-1">{{ $product->title ?? '' }}</h4>
                            <ul class="list-unstyled vstack gap-2">
                                @if ($product->productCategory)
                                    <li><i class="bi bi-tags-fill me-2 align-middle text-primary"></i>Category:
                                        {{ $product->productCategory->title }}</li>
                                @endif

                                @if ($product->brand_id)
                                    <li><i class="bi bi-shop me-2 align-middle text-warning"></i>Brand:
                                        {{ $product->brand->title ?? 'No Brand' }}</li>
                                @endif
                            </ul>

                            <h5 class="fs-24 mb-4">${{ $product->selling_price }} <span
                                    class="text-muted fs-14"><del>$280.99</del></span> <span class="fs-14 ms-2 text-danger">
                                    (50% off)</span></h5>

                        </div>
                        @if ($product->productColors->isNotEmpty())
                            <h6 class="fs-14 fw-medium text-muted">Color :</h6>
                            <div class="color-slider-container">
                                <span class="arrow left disabled"><i class="fa-solid fa-circle-chevron-left"></i></span>
                                <div class="color-slider">
                                    @foreach ($product->productColors as $color)
                                        <div class="color-option border p-1 {{ $loop->first ? 'active' : '' }}"
                                            data-image="{{ asset('storage/' . ($color->front_image ?? 'ProductImages/default.jpg')) }}"
                                            data-color-id="{{ $color->id }}">
                                            <img src="{{ asset('storage/' . ($color->front_image ?? 'ProductImages/default.jpg')) }}"
                                                alt="{{ $color->name ?? 'Color Option' }}" width="90" class="img-fluid">
                                        </div>
                                    @endforeach
                                </div>
                                <span class="arrow right"><i class="fa-solid fa-circle-chevron-right"></i></span>
                            </div>
                        @endif



                        <h6 class="fs-14 fw-medium text-muted mt-3">Size :</h6>
                        <div class="d-flex align-items-center flex-wrap gap-2">
                            <div class="size-option border px-3 py-2" data-size="323">
                                324
                            </div>
                            <div class="size-option border px-3 py-2" data-size="343">
                                324
                            </div>
                            <div class="size-option border px-3 py-2" data-size="454">
                                324
                            </div>
                        </div>

                        <h6 class="fs-14 fw-medium text-muted mt-3">Quantity :</h6>
                        <div class="input-step ">
                            <button type="button" class="minus">–</button>
                            <input type="number" class="product-quantity1" value="1" min="0" max="100"
                                readonly="">
                            <button type="button" class="plus">+</button>
                        </div>

                        {{-- <button class="btn btn-primary fs-14 add-to-cart-btn" data-product-id="{{ $product->id }}"
                            data-color-id="{{ $product->productColors->first()->id ?? '' }}"
                            data-user-id="{{ auth()->id() }}" data-size="">
                            Add To Cart
                        </button> --}}
                        <button class="btn btn-primary fs-14 customization-btn" data-product-id="{{ $product->id }}"
                            data-color-id="{{ $product->productColors->first()->id ?? '' }}"
                            data-user-id="{{ auth()->id() }}" data-size="">
                            Customize
                        </button>




                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section pt-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-tabs nav-tabs-custom mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#home1" role="tab">
                                Description
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content text-muted">
                        <div class="tab-pane active" id="home1" role="tabpanel">


                            <p class="text-muted fs-15">
                                {!! $product->description !!}
                            </p>
                        </div>

                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
          localStorage.removeItem('cart');
            // document.querySelector(".add-to-cart-btn").addEventListener("click", function() {
            //     const button = this;
            //     const originalText = button.textContent;

            //     // Show loading state
            //     button.disabled = true;
            //     button.textContent = "Processing...";
            //     button.classList.add("loading"); // Optional: Add a loading class for CSS styling

            //     const isAuthenticated = "{{ Auth::check() }}" === "1"; // Ensure proper boolean conversion
            //     let productId = this.getAttribute("data-product-id");
            //     let colorId = document.querySelector(".color-option.active")?.getAttribute(
            //         "data-color-id") || this.getAttribute("data-color-id");
            //     let size = document.querySelector(".size-option.active")?.innerText || "";
            //     let quantity = document.querySelector(".product-quantity1")?.value || 1;

            //     let userId = this.getAttribute("data-user-id");

            //     if (!isAuthenticated) {
            //         let cart = JSON.parse(localStorage.getItem("cart")) || [];
            //         let newItem = {
            //             productId,
            //             colorId,
            //             size,
            //             quantity
            //         };

            //         cart.push(newItem);
            //         localStorage.setItem("cart", JSON.stringify(cart));
            //         document.cookie =
            //             `cart=${encodeURIComponent(JSON.stringify(cart))}; path=/; max-age=3600; SameSite=Lax`;

            //         setTimeout(() => {
            //             window.location.href = "{{ route('user.login') }}";
            //         }, 1000); // Redirect faster

            //         return;
            //     }

            //     fetch("{{ route('cart.add') }}", {
            //             method: "POST",
            //             headers: {
            //                 "Content-Type": "application/json",
            //                 "X-CSRF-TOKEN": "{{ csrf_token() }}"
            //             },
            //             body: JSON.stringify({
            //                 productId,
            //                 userId,
            //                 colorId,
            //                 size,
            //                 quantity
            //             })
            //         })
            //         .then(response => response.json())
            //         .then(data => {
            //             button.disabled = false;
            //             button.textContent = originalText;
            //             button.classList.remove("loading");

            //             if (data.success) {
            //                 alert("Item added to cart!");
            //                 if (data.redirect_url) { // Use `data.redirect_url` here
            //                     window.location.href = data.redirect_url;
            //                 }
            //             } else {
            //                 alert("Failed to add item to cart.");
            //             }
            //         })
            //         .catch(error => {
            //             console.error("Error:", error);
            //             button.disabled = false;
            //             button.textContent = originalText;
            //             button.classList.remove("loading");
            //         });

            // });

            document.querySelector(".customization-btn").addEventListener("click", function() {
                const button = this;
                const originalText = button.textContent;

                // Show loading state
                button.disabled = true;
                button.textContent = "Processing...";
                button.classList.add("loading"); // Optional: Add a loading class for CSS styling

                const isAuthenticated = "{{ Auth::check() }}" === "1"; // Ensure proper boolean conversion
                let productId = this.getAttribute("data-product-id");
                let colorId = document.querySelector(".color-option.active")?.getAttribute(
                    "data-color-id") || this.getAttribute("data-color-id");
                let size = document.querySelector(".size-option.active")?.innerText || "";
                let quantity = document.querySelector(".product-quantity1")?.value || 1;

                let userId = this.getAttribute("data-user-id");

                if (!isAuthenticated) {
                    let cart = JSON.parse(localStorage.getItem("cart")) || [];
                    let newItem = {
                        productId,
                        colorId,
                        size,
                        quantity
                    };

                    cart.push(newItem);
                    localStorage.setItem("cart", JSON.stringify(cart));
                    document.cookie =
                        `cart=${encodeURIComponent(JSON.stringify(cart))}; path=/; max-age=3600; SameSite=Lax`;

                    setTimeout(() => {
                        window.location.href = "{{ route('user.login') }}";
                    }, 1000); // Redirect faster

                    return;
                }

                fetch("{{ route('customizer.add') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            productId,
                            userId,
                            colorId,
                            size,
                            quantity
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        button.disabled = false;
                        button.textContent = originalText;
                        button.classList.remove("loading");

                        if (data.success) {
                            // Redirect to the customizer index page
                            window.location.href = data.redirect_url;
                        } else {
                            alert("Failed to add item to cart.");
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                        button.disabled = false;
                        button.textContent = originalText;
                        button.classList.remove("loading");
                    });
            });
        });
    </script>

    <script src="{{ asset('assetsMain/js/frontend/productquantityadjuster.js') }}"></script>

    <script src="{{ asset('assetsMain/js/frontend/productdetailcolor.js') }}"></script>
    <script src="{{ asset('assetsMain/js/frontend/productslider.js') }}"></script>

@endsection
