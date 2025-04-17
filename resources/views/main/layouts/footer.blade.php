<section class="section footer-landing pb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="footer-info">

                    <img src="{{ asset('assetsMain/images/logo-light.png') }}" alt="logo image" height="60"
                        alt="logo">


                    <div class="footer-social mt-4">
                        <ul class="list-inline mb-0">
                            {{-- <li class="list-inline-item">
                                <a href="#!" class="text-reset"><i class="mdi mdi-facebook"></i></a>
                            </li> --}}
                            <li class="list-inline-item">
                                <a target="_blank" href="https://www.instagram.com/capbeast?igsh=MXBkYTh4anJiNXhodQ==" class="text-reset">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                            </li>
                        
                            <!-- TikTok -->
                            <li class="list-inline-item">
                                <a target="_blank" href="https://www.tiktok.com/@capbeast?_t=ZM-8ul4cCmnR5T&_r=1" class="text-reset">
                                    <i class="fa-brands fa-tiktok"></i>
                                </a>
                            </li>
                        
                            <!-- Facebook -->
                            <li class="list-inline-item">
                                <a target="_blank" href="https://www.facebook.com/share/16Lb2Rqi7w/?mibextid=wwXIfr" class="text-reset">
                                    <i class="fa-brands fa-facebook"></i>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row ps-0 ps-lg-3">
                    <div class="col-md-3">
                        <div class="mt-lg-0 mt-4">
                            <h5 class="footer-title">Quick Link</h5>
                            <ul class="list-unstyled footer-link mt-3">
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li><a href="{{ route('about') }}">About</a></li>
                                <li><a href="{{ route('products') }}">Products</a></li>
                                <li><a href="{{ route('faqs') }}">FAQs</a></li>
                                <li><a href="{{ route('contact') }}">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mt-lg-0 mt-4">
                            <h5 class="footer-title">Info</h5>
                            <ul class="list-unstyled footer-link mt-3">
                                <li><a href="{{ route('privacypolicy') }}">Privacy & Policy</a></li>
                                <li><a href="{{ route('deliveryinfo') }}">Delivery Information</a></li>
                                <li><a href="{{ route('tosd') }}">Terms of Sale & Delivery</a></li>
                                <li><a href="{{ route('return') }}">Returns</a></li>
                                
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mt-lg-0 mt-4">
                            <h5 class="footer-title">My Account</h5>
                            <ul class="list-unstyled footer-link mt-3 ">
                                <li><a href="{{ route('user.register') }}">Sign In</a></li>

                                <li><a href="{{ route('cart') }}">View Cart</a></li>
                                {{-- <li><a href="#!">My Wishlist</a></li> --}}
                                {{-- <li><a href="#!">Track My Order</a></li> --}}
                                {{-- <li><a href="#!">Help</a></li> --}}
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mt-lg-0 mt-4">
                            <h5 class="footer-title">Information</h5>
                            <ul class="list-unstyled footer-link mt-3">
                                <li><a href="tel:18888822780"><i class="fa-solid fa-phone white-color">&nbsp; </i> +1
                                        (888)
                                        882-2780</a></li>
                                <li><a href="mailto:support@capbeast.com" style="font-size: 13px"><i
                                            class="white-color fa-solid fa-envelope">&nbsp;&nbsp;</i>support@capbeast.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row footer-border-alt mt-4 align-items-center fs-15">
            <div class="col-sm-6">

                <p>© <script>document.write(new Date().getFullYear())
      </script> CapBeast. All Rights Reserved</p>
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <a href="#!"><img src="{{ asset('assetsMain/images/ecommerce/payment/visa.png') }}" alt
                                    height="30" /></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!"><img src="{{ asset('assetsMain/images/ecommerce/payment/discover.png') }}"
                                    alt height="30" /></a>
                        </li>
                        <li class="list-inline-item">
                            <a target="_blank" href="https://syed-sabeer.web.app/"><img
                                    src="{{ asset('assetsMain/images/ecommerce/payment/american-express.png') }}" alt
                                    height="30" /></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!"><img src="{{ asset('assetsMain/images/ecommerce/payment/paypal.png') }}"
                                    alt height="30" /></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
