@extends('main.layouts.master')

@section('main-container')



@component('main.components.breadcrumb', [
    'pageTitle' => 'FAQs',
    'pageRoute' => 'faqs',
    'imageURL' => asset('assetsMain/images/Faqs.jpg') // Evaluated here
])
@endcomponent

<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="text-center">
                    <h3>Have any Questions ?</h3>
                    <p class="text-muted mb-4">
                        You can ask anything you want to know about Feedback.
                    </p>
                </div>
            </div>
        </div>
        <!--end row-->

        <div class="row gy-4 justify-content-center mt-2">
            <div class="col-xxl-8 col-lg-8">
                <div>
                    <div class="mb-4">
                        <h5 class="fs-16 mb-0 fw-semibold">General Questions</h5>
                    </div>

                    <div class="accordion accordion-border-box" id="genques-accordion">
                        {{-- <div class="accordion-item">
                            <h2 class="accordion-header" id="genques-headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#genques-collapseOne" aria-expanded="true"
                                    aria-controls="genques-collapseOne">
                                    Do you have any minimum order quantities?
                                </button>
                            </h2>
                            <div id="genques-collapseOne" class="accordion-collapse collapse show"
                                aria-labelledby="genques-headingOne" data-bs-parent="#genques-accordion">
                                <div class="accordion-body">
                                    <p>
                                        Of course, you can. Following are the ways you can place
                                        your order:
                                    </p>
                                    <ul>
                                        <li>Online</li>
                                        <li>On the phone</li>
                                        <li>On chat</li>
                                        <li>Via email</li>
                                    </ul>
                                </div>
                            </div>
                        </div> --}}
                        
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="genques-headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#genques-collapseFour" aria-expanded="false"
                                    aria-controls="genques-collapseFour">
                                    Do you have any minimum order quantities?
                                </button>
                            </h2>
                            <div id="genques-collapseFour" class="accordion-collapse collapse"
                                aria-labelledby="genques-headingFour" data-bs-parent="#genques-accordion">
                                <div class="accordion-body">
                                    <p>
                                        No we don’t have any minimums, you can order as many or as few hats as you’d like. We do however offer bulk discounts so the more you purchase the more you can save.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="genques-headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#genques-collapseFive" aria-expanded="false"
                                    aria-controls="genques-collapseFive">
                                    Can I use my own hats?
                                </button>
                            </h2>
                            <div id="genques-collapseFive" class="accordion-collapse collapse"
                                aria-labelledby="genques-headingFive" data-bs-parent="#genques-accordion">
                                <div class="accordion-body">
                                    <p>
                                        Due to the professional nature of our service we will only customize and embroider hats that are purchased on our website.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="genques-headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#genques-collapseSix" aria-expanded="false"
                                    aria-controls="genques-collapseSix">
                                    How much does shipping cost?
                                </button>
                            </h2>
                            <div id="genques-collapseSix" class="accordion-collapse collapse"
                                aria-labelledby="genques-headingSix" data-bs-parent="#genques-accordion">
                                <div class="accordion-body">
                                    <p>
                                        Shipping fees depend on the size of your order and your shipping destination. We advise that you create a dry run of your order and enter your shipping location. Our system will calculate the exact shipping cost for you so you can make a quick decision.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="genques-headingSeven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#genques-collapseSeven" aria-expanded="false"
                                    aria-controls="genques-collapseSeven">
                                    Do you ship internationally?
                                </button>
                            </h2>
                            <div id="genques-collapseSeven" class="accordion-collapse collapse"
                                aria-labelledby="genques-headingSeven" data-bs-parent="#genques-accordion">
                                <div class="accordion-body">
                                    <p>
                                        Absolutely. We ship orders all over the world on a daily basis.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="genques-headingEight">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#genques-collapseEight" aria-expanded="false"
                                    aria-controls="genques-collapseEight">
                                    How long does my order take to ship?
                                </button>
                            </h2>
                            <div id="genques-collapseEight" class="accordion-collapse collapse"
                                aria-labelledby="genques-headingEight" data-bs-parent="#genques-accordion">
                                <div class="accordion-body">
                                    <p>
                                        Each order is personally customized and made for you. That means the total time from us to you can be 4-6 weeks. We'll keep you updated as your order goes through the different stages of production.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="genques-headingNine">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#genques-collapseNine" aria-expanded="false"
                                    aria-controls="genques-collapseNine">
                                    What is a digitizing fee?
                                </button>
                            </h2>
                            <div id="genques-collapseNine" class="accordion-collapse collapse"
                                aria-labelledby="genques-headingNine" data-bs-parent="#genques-accordion">
                                <div class="accordion-body">
                                    <p>
                                        Before your logo can be embroidered, our artists must digitally prepare it. This process is called ‘digitizing’. After we have digitized your logo once, we keep it on file so you are not charged again.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="genques-headingTen">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#genques-collapseTen" aria-expanded="false"
                                    aria-controls="genques-collapseTen">
                                    How many colors can you embroider in a logo?
                                </button>
                            </h2>
                            <div id="genques-collapseTen" class="accordion-collapse collapse"
                                aria-labelledby="genques-headingTen" data-bs-parent="#genques-accordion">
                                <div class="accordion-body">
                                    <p>
                                        We can stitch up to 8 colors for your logo.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="genques-headingEleven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#genques-collapseEleven" aria-expanded="false"
                                    aria-controls="genques-collapseEleven">
                                    How big can my logo be embroidered?
                                </button>
                            </h2>
                            <div id="genques-collapseEleven" class="accordion-collapse collapse"
                                aria-labelledby="genques-headingEleven" data-bs-parent="#genques-accordion">
                                <div class="accordion-body">
                                    <p>
                                        This is dependent on the size of your hat. On larger hats the maximum size that we can stitch a logo is 4 inches wide and 2.25 inches high.
                                        
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="genques-headingTwelve">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#genques-collapseTwelve" aria-expanded="false"
                                    aria-controls="genques-collapseTwelve">
                                    Do you provide sample orders?
                                </button>
                            </h2>
                            <div id="genques-collapseTwelve" class="accordion-collapse collapse"
                                aria-labelledby="genques-headingTwelve" data-bs-parent="#genques-accordion">
                                <div class="accordion-body">
                                    <p>
                                        Yes. We have no minimum order quantities so you can order one hat as a sample.
                                    </p>
                                </div>
                            </div>
                        </div>


                        <div class="accordion-item">
                            <h2 class="accordion-header" id="genques-headingTwelve">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#genques-collapseTwelve" aria-expanded="false"
                                    aria-controls="genques-collapseTwelve">
                                    Do you offer bulk discounts?
                                </button>
                            </h2>
                            <div id="genques-collapseTwelve" class="accordion-collapse collapse"
                                aria-labelledby="genques-headingTwelve" data-bs-parent="#genques-accordion">
                                <div class="accordion-body">
                                    <p>
                                        Of course! The more you buy, the more you save. See the chart in our hat designer for further details on discount percentages.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="genques-headingTwelve">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#genques-collapseTwelve" aria-expanded="false"
                                    aria-controls="genques-collapseTwelve">
                                    What forms of payment do you accept?
                                </button>
                            </h2>
                            <div id="genques-collapseTwelve" class="accordion-collapse collapse"
                                aria-labelledby="genques-headingTwelve" data-bs-parent="#genques-accordion">
                                <div class="accordion-body">
                                    <p>
                                        CapBeast accepts all major brands of payment including Visa, MasterCard, PayPal and American Express.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="genques-headingTwelve">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#genques-collapseTwelve" aria-expanded="false"
                                    aria-controls="genques-collapseTwelve">
                                    How do I know what size garment to choose?
                                </button>
                            </h2>
                            <div id="genques-collapseTwelve" class="accordion-collapse collapse"
                                aria-labelledby="genques-headingTwelve" data-bs-parent="#genques-accordion">
                                <div class="accordion-body">
                                    <p>
                                        We have sizing charts for you to reference for all corresponding products. Message our customer service for more details.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end accordion-->
                </div>
            </div>
            <!--end col-->
        </div>
    </div>
    <!--end container-->
</section>





@endsection
