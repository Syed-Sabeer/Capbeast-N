@php
    $configData = Helper::appClasses();
    $currentRouteName = Route::currentRouteName();
@endphp
<style>
    .menu-link2:before {
        left: 99999999rem !important;
    }

    .menu-link2 {
        padding-left: 1.5rem !important;
    }
</style>
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    @if (!isset($navbarFull))
        <div class="app-brand demo">
            <a href="{{ url("backend/$prefix/dashboard") }}" class="app-brand-link">
                <span class="app-brand-logo demo">
                    @include('admin._partials.macros', ['height' => 20])
                </span>
                <span class="app-brand-text demo menu-text fw-bold">{{ config('variables.templateName') }}</span>
            </a>
            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
                <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
            </a>
        </div>
    @endif

    {{-- @php
    $prefix = Auth::guard('admin')->user()->role ?? 'admin';
    @endphp --}}

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

        {{-- Dashboard --}}
        {{-- @php $activeClass = $currentRouteName === 'app-ecommerce-dashboard' ? 'active' : ''; @endphp
    <li class="menu-item {{$activeClass}}">
      <a href="{{ url("backend/$prefix/dashboard") }}" class="menu-link">
        <div>Dashboard</div>
      </a>
    </li> --}}


        {{-- Products --}}
        {{-- @php

    $activeClass = str_contains($currentRouteName, 'app-ecommerce-product') ? 'active open' : '';

    @endphp --}}
        @if ($prefix === 'superadmin')
            {{-- @php $activeClass = $currentRouteName === 'app-ecommerce-dashboard' ? 'active' : ''; @endphp
  <li class="menu-item {{$activeClass}}">
    <a href="{{ url("backend/$prefix/product/list") }}" class="menu-link">
      <div>Products</div>
    </a>
  </li>
  @php $activeClass = $currentRouteName === 'app-ecommerce-dashboard' ? 'active' : ''; @endphp
  <li class="menu-item {{$activeClass}}">
    <a href="{{ url("backend/$prefix/category") }}" class="menu-link">
      <div>Categories</div>
    </a>
  </li>
  @php $activeClass = $currentRouteName === 'app-ecommerce-dashboard' ? 'active' : ''; @endphp
  <li class="menu-item {{$activeClass}}">
    <a href="{{ url("backend/$prefix/brand") }}" class="menu-link">
      <div>Brands</div>
    </a>
  </li>
   --}}
            {{-- Dashboard --}}
            <li
                class="menu-item {{ $currentRouteName === Route::prefixed($prefix, 'app-ecommerce-dashboard') ? 'active' : '' }}">
                <a href="{{ url("backend/$prefix/dashboard") }}" class="menu-link">
                    <div>Dashboard</div>
                </a>
            </li>


            {{-- Products --}}
            <li
                class="menu-item {{ in_array($currentRouteName, [
                    Route::prefixed($prefix, 'app-ecommerce-product-list'),
                    Route::prefixed($prefix, 'app-ecommerce-product-add'),
                    Route::prefixed($prefix, 'app-ecommerce-product-edit'),
                ])
                    ? 'active open'
                    : '' }}">
                <a href="{{ url("backend/$prefix/product/list") }}" class="menu-link">
                    <div>Products</div>
                </a>
            </li>

            {{-- Categories --}}
            <li
                class="menu-item {{ in_array($currentRouteName, [
                    Route::prefixed($prefix, 'app-ecommerce-product-category'),
                    Route::prefixed($prefix, 'category.add'),
                    Route::prefixed($prefix, 'category.edit'),
                ])
                    ? 'active open'
                    : '' }}">
                <a href="{{ url("backend/$prefix/category") }}" class="menu-link">
                    <div>Categories</div>
                </a>
            </li>


            {{-- Brands --}}
            <li
                class="menu-item {{ in_array($currentRouteName, [
                    Route::prefixed($prefix, 'app-ecommerce-product-brand'),
                    Route::prefixed($prefix, 'brand.add'),
                    Route::prefixed($prefix, 'brand.edit'),
                ])
                    ? 'active open'
                    : '' }}">
                <a href="{{ url("backend/$prefix/brand") }}" class="menu-link">
                    <div>Brands</div>
                </a>
            </li>

            {{-- Mlb --}}
            <li
                class="menu-item {{ in_array($currentRouteName, [
                    Route::prefixed($prefix, 'app-ecommerce-product-mlb'),
                    Route::prefixed($prefix, 'mlb.add'),
                    Route::prefixed($prefix, 'mlb.edit'),
                ])
                    ? 'active open'
                    : '' }}">
                <a href="{{ url("backend/$prefix/mlb") }}" class="menu-link">
                    <div>Mlb</div>
                </a>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    {{-- <i class="menu-icon tf-icons ti ti-users"></i> --}}
                    <div>{{ __('Customizer') }}</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ url("backend/$prefix/customizer/designs/list") }}" class="menu-link">
                            <div>{{ __('Designs') }}</div>
                        </a>
                    </li>
                    <li class="menu-item ">
                        <a href="#" class="menu-link">
                            <div>{{ __('Colors') }}</div>
                        </a>
                    </li>
                    <li class="menu-item ">
                        <a href="#" class="menu-link">
                            <div>{{ __('Price Setup') }}</div>
                        </a>
                    </li>
                </ul>
            </li>

            {{-- Order --}}
            <li
                class="menu-item {{ in_array($currentRouteName, [
                    Route::prefixed($prefix, 'app-ecommerce-order-list'),
                    Route::prefixed($prefix, 'app-ecommerce-order-detail'),
                ])
                    ? 'active open'
                    : '' }}">
                <a href="{{ url("backend/$prefix/order/list") }}" class="menu-link">
                    <div>Orders</div>
                </a>
            </li>

            {{-- Customer --}}
            <li
                class="menu-item {{ in_array($currentRouteName, [
                    Route::prefixed($prefix, 'app-ecommerce-customer-all'),
                    Route::prefixed($prefix, 'app-ecommerce-customer-detail'),
                    Route::prefixed($prefix, 'admin.customers.edit'),
                ])
                    ? 'active open'
                    : '' }}">
                <a href="{{ url("backend/$prefix/customer/all") }}" class="menu-link">
                    <div>Customers</div>
                </a>
            </li>


            {{-- TPS Tax --}}
            <li
                class="menu-item {{ in_array($currentRouteName, [
                    Route::prefixed($prefix, 'TPStax_price.index'),
                    Route::prefixed($prefix, 'TPStax_price.create'),
                    Route::prefixed($prefix, 'TPStax_price.edit'),
                ])
                    ? 'active open'
                    : '' }}">
                <a href="{{ url("backend/$prefix/component/TPS_TaxPrice/list") }}" class="menu-link">
                    <div>TPS Tax</div>
                </a>
            </li>


            {{-- TVQ Tax --}}
            <li
                class="menu-item {{ in_array($currentRouteName, [
                    Route::prefixed($prefix, 'TVQtax_price.index'),
                    Route::prefixed($prefix, 'TVQtax_price.create'),
                    Route::prefixed($prefix, 'TVQtax_price.edit'),
                ])
                    ? 'active open'
                    : '' }}">
                <a href="{{ url("backend/$prefix/component/TVQ_TaxPrice/list") }}" class="menu-link">
                    <div>TVQ Tax</div>
                </a>
            </li>



            {{-- Discount Coupons --}}
            <li
                class="menu-item {{ in_array($currentRouteName, [
                    Route::prefixed($prefix, 'content-discount-coupon-list'),
                    Route::prefixed($prefix, 'content-discount-coupon-add'),
                    Route::prefixed($prefix, 'content-discount-coupon-edit'),
                ])
                    ? 'active open'
                    : '' }}">
                <a href="{{ url("backend/$prefix/component/discountcoupon/list") }}" class="menu-link">
                    <div>Discount Coupons</div>
                </a>
            </li>
        @elseif ($prefix === 'marketing')
            {{-- Components --}}
            @php $activeClass = $currentRouteName === 'app-ecommerce-components' ? 'active open' : ''; @endphp
            <li class="menu-item {{ $activeClass }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <div>Components</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">

                        <a class="menu-link menu-toggle menu-link2">
                            <div>Discount Coupons</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item"><a href="{{ url("backend/$prefix/component/discountcoupon/add") }}"
                                    class="menu-link">Add Discount Coupons</a></li>
                        </ul>

                        <ul class="menu-sub">
                            <li class="menu-item"><a href="{{ url("backend/$prefix/component/discountcoupon/list") }}"
                                    class="menu-link">View Discount Coupons</a></li>
                        </ul>

                    </li>
                </ul>
            </li>
        @elseif ($prefix === 'sale')
            <li class="menu-item {{ $activeClass }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <div>Products</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item"><a href="{{ url("backend/$prefix/product/list") }}" class="menu-link">Product
                            List</a></li>
                    <li class="menu-item"><a href="{{ url("backend/$prefix/product/add") }}" class="menu-link">Add
                            Product</a></li>
                </ul>
            </li>

            {{-- Embroidery --}}
            @php $activeClass = str_contains($currentRouteName, 'app-ecommerce-printing') ? 'active open' : ''; @endphp
            <li class="menu-item {{ $activeClass }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <div>Embroidery</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item"><a href="{{ url("backend/$prefix/printing/list") }}"
                            class="menu-link">Embroidery List</a></li>
                    <li class="menu-item"><a href="{{ url("backend/$prefix/printing/add") }}" class="menu-link">Add
                            Embroidery</a></li>
                </ul>
            </li>

            {{-- Deliveries --}}
            @php $activeClass = str_contains($currentRouteName, 'app-ecommerce-delivery') ? 'active open' : ''; @endphp
            <li class="menu-item {{ $activeClass }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <div>Deliveries</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item"><a href="{{ url("backend/$prefix/delivery/list") }}"
                            class="menu-link">Delivery List</a></li>
                    <li class="menu-item"><a href="{{ url("backend/$prefix/delivery/add") }}" class="menu-link">Add
                            Delivery</a></li>
                </ul>
            </li>

            {{-- Order --}}
            @php $activeClass = $currentRouteName === 'app-ecommerce-order' ? 'active open' : ''; @endphp
            <li class="menu-item {{ $activeClass }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <div>Order</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item"><a href="{{ url("backend/$prefix/order/list") }}" class="menu-link">Order
                            List</a></li>
                </ul>
            </li>

            {{-- Customer --}}
            @php $activeClass = $currentRouteName === 'app-ecommerce-customer' ? 'active open' : ''; @endphp
            <li class="menu-item {{ $activeClass }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <div>Customer</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item"><a href="{{ url("backend/$prefix/customer/all") }}" class="menu-link">All
                            Customers</a></li>
                </ul>
            </li>


            {{-- Components --}}
            @php $activeClass = $currentRouteName === 'app-ecommerce-components' ? 'active open' : ''; @endphp
            <li class="menu-item {{ $activeClass }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <div>Components</div>
                </a>
                <ul class="menu-sub">

                    <li class="menu-item">

                        <a class="menu-link menu-toggle menu-link2">
                            <div>Product Color</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item"><a href="{{ url("backend/$prefix/component/productcolor/add") }}"
                                    class="menu-link">Add Color</a></li>
                        </ul>

                        <ul class="menu-sub">
                            <li class="menu-item"><a href="{{ url("backend/$prefix/component/productcolor/list") }}"
                                    class="menu-link">View Color</a></li>
                        </ul>

                    </li>

                    <li class="menu-item">

                        <a class="menu-link menu-toggle menu-link2">
                            <div>Internal Statuses</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item"><a href="{{ url("backend/$prefix/component/InternalStatus/add") }}"
                                    class="menu-link">Add Internal Status</a></li>
                        </ul>

                        <ul class="menu-sub">
                            <li class="menu-item"><a
                                    href="{{ url("backend/$prefix/component/InternalStatus/list") }}"
                                    class="menu-link">View Internal Status</a></li>
                        </ul>

                    </li>


                    <li class="menu-item">

                        <a class="menu-link menu-toggle menu-link2">
                            <div>TPS Tax</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item"><a href="{{ url("backend/$prefix/component/TPS_TaxPrice/list") }}"
                                    class="menu-link">Modify Tax</a></li>
                        </ul>



                    </li>
                    <li class="menu-item">

                        <a class="menu-link menu-toggle menu-link2">
                            <div>TVQ Tax</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item"><a href="{{ url("backend/$prefix/component/TVQ_TaxPrice/list") }}"
                                    class="menu-link">Modify Tax</a></li>
                        </ul>



                    </li>
                    <li class="menu-item">

                        <a class="menu-link menu-toggle menu-link2">
                            <div>Discount Coupons</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item"><a href="{{ url("backend/$prefix/component/discountcoupon/add") }}"
                                    class="menu-link">Add Discount Coupons</a></li>
                        </ul>

                        <ul class="menu-sub">
                            <li class="menu-item"><a
                                    href="{{ url("backend/$prefix/component/discountcoupon/list") }}"
                                    class="menu-link">View Discount Coupons</a></li>
                        </ul>

                    </li>
        @endif


    </ul>
</aside>
