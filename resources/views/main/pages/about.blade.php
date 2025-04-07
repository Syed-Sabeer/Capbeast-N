@extends('main.layouts.master')

<title>Cool Beanies For Men & Women in Montreal, Canada</title>
<meta name="description" content="Shop Cool Beanies For Men & Women in Montreal, Canada. Stay stylish and warm with our high-quality collection of Cool Beanies, perfect for any season!">
<meta name="keywords" content="Cool Beanies For Men, Cool Beanies For Women">
<link rel="canonical" href="https://monkeybeanies.com/about">


@section('main-container')
    @component('main.components.breadcrumb', [
        'pageTitle' => 'About',
        'pageRoute' => 'about',
        'imageURL' => asset('assetsMain/images/about.jpg'), // Evaluated here
    ])
    @endcomponent

    <section class="ecommerce-aboutpage" style="margin-top: -15%">
        <div class="effect d-none d-md-block">
            <div class="ecommerce-effect bg-primary"></div>
            <div class="ecommerce-effect bg-info"></div>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="fw-bold mb-3">👋 About Us</h1>
                    <p class="fs-16 text-muted mb-5 mb-lg-3">At CapBeast we’re all about making custom hats. We help you make your ideas come to life, one stitch at a time.

                        Our custom hat maker enables you to design a hat with your own logo or text with the click of a button. Our vast catalog makes it possible for you to customize hats from your favorite brands like brands New Era, Flexfit, ‘47 Brand, Champion, Richardson, Adidas, Nike and many more.
                        
                        We offer many styles of headwear including Snapbacks, Fitted hats, Flat brim, Dad hats, Baseball hats, Athletic hats, Golf hats and fitted hats.
                        
                        All of the caps are custom embroidered by our team on the latest digital production equipment, so you know that you will be getting the best quality product possible.
                        
                        CapBeast ships worldwide and we have no minimum order quantities. We also offer bulk discounts on larger orders, so the more hats you order, the more you save.
                        <br>
                        MADE BY CANADIANS FOR THE WORLD</p>
                </div>
                <div class="col-lg-6">
                    <div>
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="position-relative">
                                    <img src="{{ asset('assetsMain/images/ecommerce/img-4.jpg')}}" alt=""
                                        class="img-fluid rounded">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="vstack gap-4">
                                    <img src="{{ asset('assetsMain/images/ecommerce/img-1.jpg')}}" alt=""
                                        class="img-fluid rounded">
                                    <img src="{{ asset('assetsMain/images/ecommerce/img-3.jpg')}}" alt=""
                                        class="img-fluid rounded">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    {{-- <section class="section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div>
                        <img src="{{ asset('assetsMain/images/ecommerce/img-5.jpg')}}" alt="" class="img-fluid rounded">
                    </div>
                </div> --}}
                {{-- <div class="col-lg-6">
                    <div class="mt-4 mt-lg-0">
                        <p class="text-uppercase fw-medium text-muted">Best Products Sales</p>
                        <h2 class="lh-base fw-semibold mb-3">Desgining Spaces to enhance your business growth</h2>
                        <P class="text-muted fs-16">A physical office space will promote collaboration and understanding.
                            Having a physical location for your business allows you to put together the company that you
                            want in an environment where employees can communicate with each other without having to go
                            through any extra steps.</P>
                        <a href="{{ route('products') }}" class="fw-medium link-effect">Shop Now <i
                                class="bi bi-arrow-right ms-2"></i></a>
                    </div>
                </div> --}}
            {{-- </div>
        </div>
    </section> --}}



@endsection
