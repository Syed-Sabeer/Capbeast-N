<div class="card ecommerce-product-widgets border-0 rounded-0 shadow-none overflow-hidden product-card-widget">
    <div class="bg-light bg-opacity-50 rounded py-4 position-relative">
        <img src="{{ asset(
            'storage/' .
                ($product->productColors->first()->front_image ??
                    ($product->productColors->first()->right_image ??
                        ($product->productColors->first()->left_image ??
                            ($product->productColors->first()->back_image ?? 'ProductImages/default.jpg')))),
        ) }}"
            alt="" style="max-height: 200px;max-width: 100%;" class="mx-auto d-block rounded-2">
        <div class="action vstack gap-2">
            @php
                $inWishlist =
                    auth()->check() &&
                    \App\Models\UserWishlist::where('user_id', auth()->id())
                        ->where('product_id', $product->id)
                        ->exists();
            @endphp
            <button class="btn avatar-xs p-0 custom-toggle product-action"
                style="background-color: #1a2b4c; border: none; border-radius: 6px;"
                data-url="{{ route('add.user-wishlist', $product->id) }}" onclick="addToWishlist(this)">
                <!-- Outlined Heart (Inactive) -->
                <span class="{{ $inWishlist ? 'icon-off' : 'icon-on' }}" style="color: #28a745;">
                    <i class="ri-heart-line"></i>
                </span>

                <!-- Solid Heart (Active) -->
                <span class="{{ $inWishlist ? 'icon-on' : 'icon-off' }}" style="color: #28a745;">
                    <i class="ri-heart-fill"></i>
                </span>
            </button>

        </div>

        @php
            $maxDiscount = $product->productVolumeDiscount->max('discount');
        @endphp

        {{-- @if ($maxDiscount)
    <div class="avatar-xs label">
        <div class="avatar-title bg-danger rounded-circle fs-11">
            {{ $maxDiscount }}%
        </div>
    </div>
@endif --}}

    </div>
    <div class="pt-4">
        <div>
            <div class="color-slider-container">
                <span class="arrow left"><i class="fa-solid fa-circle-chevron-left"></i></span>
                <div class="color-slider" id="colorSlider">


                    @if ($product->productColors->isNotEmpty())
                        @foreach ($product->productColors as $color)
                            <div class="color-option"
                                data-image="{{ asset('storage/' . ($color->front_image ?? 'ProductImages/default.jpg')) }}">
                                <img src="{{ asset('storage/' . ($color->front_image ?? 'ProductImages/default.jpg')) }}"
                                    width="50">
                            </div>
                        @endforeach
                    @endif


                </div>
                <span class="arrow right"><i class="fa-solid fa-circle-chevron-right"></i></span>
            </div>

            <a href="#!">
                <h6 class="text-capitalize fs-15 lh-base text-truncate mb-0">{{ $product->title }}</h6>
            </a>
            <div class="mt-2">
                <span class="float-end">4.9 <i class="ri-star-half-fill text-warning align-bottom"></i></span>
                <h5 class="text-secondary mb-0">${{ $product->selling_price }} <span
                        class="text-muted fs-12">
                        {{-- <del>$354.99</del> --}}
                    </span></h5>
            </div>
            <div class="tn mt-3">
                <a href="{{ url('/product/' . $product->slug) }}" class="btn btn-primary btn-hover w-100 add-btn">
                    <i class="fa-solid fa-pen-to-square"></i> &nbsp;&nbsp; Customize
                </a>
            </div>

        </div>
    </div>
</div>

<script src="{{ asset('assetsMain/js/frontend/wishlist.js')}}"></script>
