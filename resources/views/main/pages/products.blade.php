@extends('main.layouts.master')


<title>Design Your Own Beanie Hat in Montreal, Canada</title>
<meta name="description"
    content="Design Your Own Beanie Hat in Montreal, Canada, with custom colors and logos. Stand out in style and comfort—Design Your Own Beanie Hat today!">
<meta name="keywords" content="Design Your Own Beanie Hat in Montreal, Design Your Own Beanie Hat in Canada">
<link rel="canonical" href="https://monkeybeanies.com/products">


@section('main-container')
    @component('main.components.breadcrumb', [
        'pageTitle' => 'Products',
        'pageRoute' => 'products',
        'imageURL' => asset('assetsMain/images/profile-bg.jpg'), // Evaluated here
    ])
    @endcomponent



    <div class="position-relative section">
        <div class="container">
            <div class="ecommerce-product gap-4">
                <div class="flex-grow-1">


                    <div class="category-container">
                        <button class="categoryarrow categoryarrow-left" onclick="scrollSlider(-200)">&#10094;</button>
                        <div class="category-slider" id="categorySlider">
                            @if($filterType === 'brand')
                            @foreach ($brands as $brand)
                            <a href="{{ url('products/brand/' . Str::slug($brand->title)) }}" class="brand-link">
                                <div class="category-card {{ request()->segment(2) == 'brand' && request()->segment(3) == Str::slug($brand->title) ? 'active' : '' }}">
                                    <img src="{{ asset(  'storage/' . ($brand->image ?? 'default-brand.jpg')) }}" alt="{{ $brand->title }}">
                                    <p>{{ $brand->title }}</p>
                                </div>
                            </a>
                            {{-- 'storage/' . ($color->front_image ?? 'ProductImages/default.jpg')) }}" width="50"> --}}
                        @endforeach
                        
                            @else
                            @foreach ($categories as $category)
                            <a href="{{ url('products/category/' . Str::slug($category->title)) }}" class="category-link">
                                <div class="category-card {{ request()->segment(2) == 'category' && request()->segment(3) == Str::slug($category->title) ? 'active' : '' }}">
                                    <img src="{{ asset('storage/' . ($category->image ?? 'default-category.jpg')) }}" alt="{{ $category->title }}">
                                    <p>{{ $category->title }}</p>
                                </div>
                            </a>
                        @endforeach
                        
                            @endif
                        </div>
                        <button class="categoryarrow categoryarrow-right" onclick="scrollSlider(200)">&#10095;</button>
                    </div>
                    


                    <div class="row" id="pagination-element">
                        <div class="col-lg-12">
                            <div
                                class="pagination-block pagination pagination-separated justify-content-center justify-content-sm-end mb-sm-0">

                            </div>
                        </div>
                    </div>

                    <div class="row d-none" id="search-result-elem">
                        <div class="col-lg-12">
                            <div class="text-center py-5">
                                <div class="avatar-lg mx-auto mb-4">
                                    <div class="avatar-title bg-primary-subtle text-primary rounded-circle fs-24">
                                        <i class="bi bi-search"></i>
                                    </div>
                                </div>
                                <h5>No matching records found</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="position-relative section">
        <div class="container">
            <div class="ecommerce-product gap-4">

                <div class="flex-grow-1">
                    <div class="d-flex align-items-center gap-2 mb-4">
                        <p class="text-muted flex-grow-1 mb-0">Showing 1-12 of 84 results</p>

                        <div class="flex-shrink-0">
                            <div class="d-flex gap-2">
                                <div class="flex-shrink-0">
                                    <label for="sort-elem" class="col-form-label">Sort By:</label>
                                </div>
                                <div class="flex-shrink-0">
                                    <select class="form-select w-md" id="sort-elem">
                                        <option value="">All</option>
                                        <option value="low_to_high">Low to High</option>
                                        <option value="high_to_low">High to Low</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        @forelse ($products as $product)
                        <div class="col-xxl-3 col-lg-4 col-md-6">
                            <div
                                class="card ecommerce-product-widgets border-0 rounded-0 shadow-none overflow-hidden product-card-widget">
                                <div class="bg-light bg-opacity-50 rounded py-4 position-relative">
                                    <img src="{{ asset('storage/' . (
                                        $product->productColors->first()->front_image 
                                        ?? $product->productColors->first()->right_image 
                                        ?? $product->productColors->first()->left_image 
                                        ?? $product->productColors->first()->back_image 
                                        ?? 'ProductImages/default.jpg'
                                    )) }}" alt=""
                                        style="max-height: 200px;max-width: 100%;" class="mx-auto d-block rounded-2">
                                    <div class="action vstack gap-2">
                                        <button
                                            class="btn btn-danger avatar-xs p-0 btn-soft-warning custom-toggle product-action"
                                            data-bs-toggle="button">
                                            <span class="icon-on"><i class="ri-heart-line"></i></span>
                                            <span class="icon-off"><i class="ri-heart-fill"></i></span>
                                        </button>
                                    </div>
                                    <div class="avatar-xs label">
                                        <div class="avatar-title bg-danger rounded-circle fs-11">25%</div>
                                    </div>
                                </div>
                                <div class="pt-4">
                                    <div>
                                        <div class="color-slider-container">
                                            <span class="arrow left"><i class="fa-solid fa-circle-chevron-left"></i></span>
                                            <div class="color-slider" id="colorSlider">

                                            
                                            @if($product->productColors->isNotEmpty())
                                            @foreach($product->productColors as $color)
                                                <div class="color-option" data-image="{{ asset('storage/' . ($color->front_image ?? 'ProductImages/default.jpg')) }}">
                                                    <img src="{{ asset('storage/' . ($color->front_image ?? 'ProductImages/default.jpg')) }}" width="50">
                                                </div>
                                            @endforeach
                                        @endif
                                              

                                            </div>
                                            <span class="arrow right"><i
                                                    class="fa-solid fa-circle-chevron-right"></i></span>
                                        </div>

                                        <a href="#!">
                                            <h6 class="text-capitalize fs-15 lh-base text-truncate mb-0">{{$product->title}}</h6>
                                        </a>
                                        <div class="mt-2">
                                            <span class="float-end">4.9 <i
                                                    class="ri-star-half-fill text-warning align-bottom"></i></span>
                                            <h5 class="text-secondary mb-0">${{$product->selling_price}} <span
                                                    class="text-muted fs-12"><del>$354.99</del></span></h5>
                                        </div>
                                        <div class="tn mt-3">
                                            <a href="{{ url('/product/' . $product->slug) }}" class="btn btn-primary btn-hover w-100 add-btn">
                                                <i class="fa-solid fa-pen-to-square"></i> &nbsp;&nbsp; Customize
                                            </a>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <p>No products found.</p>
                    @endforelse

                    </div>


                    <div class="row" id="pagination-element">
                        <div class="col-lg-12">
                            <div
                                class="pagination-block pagination pagination-separated justify-content-center justify-content-sm-end mb-sm-0">
                                <div class="page-item">
                                    <a href="javascript:void(0);" class="page-link" id="page-prev">Previous</a>
                                </div>
                                <span id="page-num" class="pagination"></span>
                                <div class="page-item">
                                    <a href="javascript:void(0);" class="page-link" id="page-next">Next</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row d-none" id="search-result-elem">
                        <div class="col-lg-12">
                            <div class="text-center py-5">
                                <div class="avatar-lg mx-auto mb-4">
                                    <div class="avatar-title bg-primary-subtle text-primary rounded-circle fs-24">
                                        <i class="bi bi-search"></i>
                                    </div>
                                </div>

                                <h5>No matching records found</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end container-->
    </div>



    <section class="position-relative py-5">
        <div class="container">
            <div class="row gy-4 gy-lg-0">
                <div class="col-lg-3 col-sm-6">
                    <div class="d-flex align-items-center gap-3">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('assetsMain/images/ecommerce/fast-delivery.png') }}" alt=""
                                class="avatar-sm">
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="fs-15">Fast &amp; Secure Delivery</h5>
                            <p class="text-muted mb-0">Tell about your service.</p>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-lg-3 col-sm-6">
                    <div class="d-flex align-items-center gap-3">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('assetsMain/images/ecommerce/returns.png') }}" alt=""
                                class="avatar-sm">
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="fs-15">2 Days Return Policy</h5>
                            <p class="text-muted mb-0">No question ask.</p>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-lg-3 col-sm-6">
                    <div class="d-flex align-items-center gap-3">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('assetsMain/images/ecommerce/guarantee-certificate.png') }}" alt=""
                                class="avatar-sm">
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="fs-15">Money Back Guarantee</h5>
                            <p class="text-muted mb-0">Within 5 business days</p>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-lg-3 col-sm-6">
                    <div class="d-flex align-items-center gap-3">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('assetsMain/images/ecommerce/24-hours-support.png') }}" alt=""
                                class="avatar-sm">
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="fs-15">24 X 7 Service</h5>
                            <p class="text-muted mb-0">Online service for customer</p>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>


    
    <script src="{{ asset('assetsMain/js/frontend/productslider.js') }}"></script>
    <script src="{{ asset('assetsMain/js/frontend/productcardcolorchange.js') }}"></script>
    <script src="{{ asset('assetsMain/js/frontend/product-grid.init.js') }}"></script>
    <script src="{{ asset('assetsMain/js/frontend/categoryslider.js') }}"></script>
    
@endsection