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
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="genques-headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#genques-collapseOne" aria-expanded="true"
                                    aria-controls="genques-collapseOne">
                                    Can I place my order online?
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
                        </div>
                        {{-- <div class="accordion-item">
                            <h2 class="accordion-header" id="genques-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#genques-collapseTwo" aria-expanded="false"
                                    aria-controls="genques-collapseTwo">
                                    Can I place my order oIs someone available to help me with
                                    my order?nline?
                                </button>
                            </h2>
                            <div id="genques-collapseTwo" class="accordion-collapse collapse"
                                aria-labelledby="genques-headingTwo" data-bs-parent="#genques-accordion">
                                <div class="accordion-body">
                                    <p>
                                        Of course! You can Live Chat with one of our employees
                                        or call Customer Service at (855)-205-3213 or phone us
                                        at (226) 204-9018 to obtain help with your order.
                                    </p>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="accordion-item">
                            <h2 class="accordion-header" id="genques-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#genques-collapseThree" aria-expanded="false"
                                    aria-controls="genques-collapseThree">
                                    I want a custom table cover, is your price the lowest of
                                    all?
                                </button>
                            </h2>
                            <div id="genques-collapseThree" class="accordion-collapse collapse"
                                aria-labelledby="genques-headingThree" data-bs-parent="#genques-accordion">
                                <div class="accordion-body">
                                    <p>
                                        Our prices are always the lowest in the market for
                                        custom. We can assure you that there will be no company
                                        in the market that will be able to provide a lower price
                                        and faster turnaround than our company.
                                    </p>
                                </div>
                            </div>
                        </div> --}}
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="genques-headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#genques-collapseFour" aria-expanded="false"
                                    aria-controls="genques-collapseFour">
                                    What does production time mean?
                                </button>
                            </h2>
                            <div id="genques-collapseFour" class="accordion-collapse collapse"
                                aria-labelledby="genques-headingFour" data-bs-parent="#genques-accordion">
                                <div class="accordion-body">
                                    <p>
                                        Production time refers to the period it takes to make
                                        your table cover order in our production facility. The
                                        time is based on business days, Monday through Friday,
                                        excluding holidays.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="genques-headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#genques-collapseFive" aria-expanded="false"
                                    aria-controls="genques-collapseFive">
                                    What happens if there is a mistake with my order?
                                </button>
                            </h2>
                            <div id="genques-collapseFive" class="accordion-collapse collapse"
                                aria-labelledby="genques-headingFive" data-bs-parent="#genques-accordion">
                                <div class="accordion-body">
                                    <p>
                                        Before production, we will send you a proof. Once the proof is approved by the customer, there will be no refunds for custom design unless the design is shown to be different from what was approved. We advise customers to check the proof thoroughly.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="genques-headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#genques-collapseSix" aria-expanded="false"
                                    aria-controls="genques-collapseSix">
                                    Will I see a proof before my order goes into production?
                                </button>
                            </h2>
                            <div id="genques-collapseSix" class="accordion-collapse collapse"
                                aria-labelledby="genques-headingSix" data-bs-parent="#genques-accordion">
                                <div class="accordion-body">
                                    <p>
                                        Yes! Unless it is an exact reorder, you always see an
                                        e-proof of your item which must be approved by you
                                        before we proceed!
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="genques-headingSeven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#genques-collapseSeven" aria-expanded="false"
                                    aria-controls="genques-collapseSeven">
                                    Do you keep my art on file?
                                </button>
                            </h2>
                            <div id="genques-collapseSeven" class="accordion-collapse collapse"
                                aria-labelledby="genques-headingSeven" data-bs-parent="#genques-accordion">
                                <div class="accordion-body">
                                    <p>
                                        Yes! We keep your artwork on file to make reordering and
                                        using your art on other products simple and easy!
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="genques-headingEight">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#genques-collapseEight" aria-expanded="false"
                                    aria-controls="genques-collapseEight">
                                    Where do I send my artwork?
                                </button>
                            </h2>
                            <div id="genques-collapseEight" class="accordion-collapse collapse"
                                aria-labelledby="genques-headingEight" data-bs-parent="#genques-accordion">
                                <div class="accordion-body">
                                    <p>
                                        Simply upload it on our website and attach it to your
                                        order and we’ll take it from there. You can also send it
                                        to sales@monkeybeanies.com .
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="genques-headingNine">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#genques-collapseNine" aria-expanded="false"
                                    aria-controls="genques-collapseNine">
                                    What image file types can I upload?
                                </button>
                            </h2>
                            <div id="genques-collapseNine" class="accordion-collapse collapse"
                                aria-labelledby="genques-headingNine" data-bs-parent="#genques-accordion">
                                <div class="accordion-body">
                                    <p>
                                        We highly recommend you send a vector-based file in EPS,
                                        AI or PDF format. If you have a raster-based image such
                                        as PSD, PNG or JPG, please send it in the actual size it
                                        will be imprinted on your table cover. We suggest you
                                        send the highest resolution file you have available. The
                                        highest resolution files work best.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="genques-headingTen">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#genques-collapseTen" aria-expanded="false"
                                    aria-controls="genques-collapseTen">
                                    Is it OK to use copyrighted or licensed material for my
                                    table cover?
                                </button>
                            </h2>
                            <div id="genques-collapseTen" class="accordion-collapse collapse"
                                aria-labelledby="genques-headingTen" data-bs-parent="#genques-accordion">
                                <div class="accordion-body">
                                    <p>
                                        We do not knowingly reproduce copyrighted material and
                                        will not accept liability for such infringement when
                                        reproducing orders. You are solely responsible for
                                        ensuring the artwork you submit does not infringe on
                                        property rights by obtaining proper permission for the
                                        reproduction of logos, trademarks and copyrighted
                                        material.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="genques-headingEleven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#genques-collapseEleven" aria-expanded="false"
                                    aria-controls="genques-collapseEleven">
                                    Can I use multiple artwork designs for my table cover
                                    order?
                                </button>
                            </h2>
                            <div id="genques-collapseEleven" class="accordion-collapse collapse"
                                aria-labelledby="genques-headingEleven" data-bs-parent="#genques-accordion">
                                <div class="accordion-body">
                                    <p>
                                        Yes absolutely! Feel free to upload as many as you’d
                                        like or you can also email us your designs.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="genques-headingTwelve">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#genques-collapseTwelve" aria-expanded="false"
                                    aria-controls="genques-collapseTwelve">
                                    What are PromoBucks?
                                </button>
                            </h2>
                            <div id="genques-collapseTwelve" class="accordion-collapse collapse"
                                aria-labelledby="genques-headingTwelve" data-bs-parent="#genques-accordion">
                                <div class="accordion-body">
                                    <p>
                                        PromoBucks are credits that you can apply to your next
                                        purchase. Think of them as our thank you for choosing
                                        us. These credits reduce your pre-tax total, making your
                                        future orders even more affordable.
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
