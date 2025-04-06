@extends('main.layouts.master')

@section('main-container')


@component('main.components.breadcrumb', [
'pageTitle' => 'About',
'pageRoute' => 'about',
'imageURL' => asset('assetsMain/images/about.jpg') // Evaluated here
])
@endcomponent


<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div>
                    <div class="table-responsive">
                        <table class="table fs-15 align-middle table-nowrap">
                            <thead>
                                <tr>
                                    <th scope="col">Order ID</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Total Payment</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orderhistory as $order)
                                <tr>
                                    <td>
                                        <a href="#" class="text-body">{{ $order->order_id }}</a>
                                    </td>
                                    <td><span class="text-muted">{{ $order->created_at->format('d M, Y') }}</span></td>
                                    <td class="fw-medium">${{ number_format($order->total_price, 2) }}</td>

                                    <td>
                                        <a href="#invoiceModal"
                                            class="btn btn-secondary btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-order-id="{{ $order->order_id }}"
                                            data-bs-invoice-no="{{ $order->invoice_no }}"
                                            data-bs-date="{{ $order->created_at->format('d M, Y') }}"
                                            data-bs-subtotal="{{ number_format($order->total_price, 2) }}"
                                            data-bs-billing-name="{{ $order->billing_name }}"
                                            data-bs-billing-address="{{ $order->billing_address }}"
                                            data-bs-shipping-name="{{ $order->shipping_name }}"
                                            data-bs-shipping-address="{{ $order->shipping_address }}"
                                            data-bs-products="{{ json_encode($order->items) }}">
                                            Invoice
                                        </a>

                                        <a href="#invoiceModal"
                                            class="btn btn-success btn-sm"
                                            data-bs-toggle="modal"> View </a>
                                    </td>

                                </tr>

                                <!-- Sub-table for products -->
                                <tr class="collapse" id="order{{ $order->id }}Details">
                                    <td colspan="5">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Product</th>
                                                        <th scope="col">Quantity</th>
                                                        <th scope="col">Color</th>
                                                        <th scope="col">Embroidery</th>
                                                        <th scope="col">Type</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($order->items as $item)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex gap-3">
                                                                <div class="avatar-sm flex-shrink-0">
                                                                    <div class="avatar-title bg-light rounded">
                                                                        <img src="{{ asset('assets/images/products/'.$item->product->image) }}" alt="" class="avatar-xs">
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <a>
                                                                        <h6 class="fs-15 mb-1">{{ $item->product->name }}</h6>
                                                                    </a>
                                                                    <p class="mb-0 text-muted fs-13">{{ $item->product->category }}</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>{{ $item->quantity }}</td>
                                                        <td>{{ $item->color->title  }}</td>
                                                        <td>{{ $item->printing->title }}</td>
                                                        <td>{{ $item->printing->title }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-end">
                        <a href="{{route('products')}}" class="btn btn-hover btn-primary">Continue Shopping <i class="ri-arrow-right-line align-middle ms-1"></i></a>
                    </div>
                </div>
            </div><!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</section>



<!-- Modal -->
<div class="modal fade" id="invoiceModal" tabindex="-1" aria-labelledby="invoiceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-custom-size">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="invoiceModalLabel">Invoice</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card mb-0" id="demo">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-header border-bottom-dashed p-4">
                                <div class="d-sm-flex">
                                    <div class="flex-grow-1">
                                        <img src="{{ asset('assetsMain/images/logo-dark.png') }}" class="card-logo card-logo-dark" alt="logo dark" height="100">

                                        <div class="mt-sm-5 mt-4">
                                            <h6 class="text-muted text-uppercase fw-semibold fs-14">Address</h6>
                                            <p class="text-muted mb-1" id="address-details">Av. Lausanne, Montréal, QC, Canada</p>
                                            <p class="text-muted mb-0" id="zip-code"><span>Zip-code:</span> 90201</p>
                                        </div>
                                    </div>
                                    <div class="flex-shrink-0 mt-sm-0 mt-3">
                                        <h6><span class="text-muted fw-normal">Legal Registration No:</span> <span id="legal-register-no">123456</span></h6>
                                        <h6><span class="text-muted fw-normal">Email:</span> <span id="email"> sales@monkeybeanies.com</span></h6>
                                        <h6><span class="text-muted fw-normal">Website:</span> <a href="https://themesbrand.com/" class="link-primary" target="_blank" id="website">www.monkeybeanies.com</a></h6>
                                        <h6 class="mb-0"><span class="text-muted fw-normal">Contact No: </span><span id="contact-no"> +1 (888) 882-2780</span></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card-body p-4">
                                <div class="row g-3">
                                    <div class="col-lg-3 col-6">
                                        <p class="text-muted mb-2 text-uppercase fw-semibold fs-14">Order No</p>
                                        <h5 class="fs-15 mb-0">#TTB<span id="invoice-no"></span></h5>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <p class="text-muted mb-2 text-uppercase fw-semibold fs-14">Date</p>
                                        <h5 class="fs-15 mb-0"><span id="invoice-date"></span> <small class="text-muted" id="invoice-time"></small></h5>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <p class="text-muted mb-2 text-uppercase fw-semibold fs-14">Payment Status</p>
                                        <span class="badge bg-success-subtle text-success " id="payment-status">Paid</span>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <p class="text-muted mb-2 text-uppercase fw-semibold fs-14">Total Amount</p>
                                        <h5 class="fs-15 mb-0">$<span id="total-amount"></span></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card-body p-4 border-top border-top-dashed">
                                <div class="row g-3">
                                    <div class="col-6">
                                        <h6 class="text-muted text-uppercase fw-semibold fs-14 mb-3">Billing Address</h6>
                                        <p class="fw-medium mb-2 fs-16" id="billing-name"></p>
                                        <p class="text-muted mb-1" id="billing-address-line-1"></p>
                                        <p class="text-muted mb-1"><span>Phone: +</span><span id="billing-phone-no"></span></p>
                                        <p class="text-muted mb-0"><span>Tax: </span><span id="billing-tax-no"></span> </p>
                                    </div>
                                    <div class="col-6">
                                        <h6 class="text-muted text-uppercase fw-semibold fs-14 mb-3">Shipping Address</h6>
                                        <p class="fw-medium mb-2 fs-16" id="shipping-name"></p>
                                        <p class="text-muted mb-1" id="shipping-address-line-1"></p>
                                        <p class="text-muted mb-1"><span>Phone: +</span><span id="shipping-phone-no"></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card-body p-4">
                                <div class="table-responsive">
                                    <table class="table table-borderless text-center table-nowrap align-middle mb-0">
                                        <thead>
                                            <tr class="table-active">
                                                <th scope="col" style="width: 50px;">#</th>
                                                <th scope="col">Product Details</th>
                                                {{-- <th scope="col">Rate</th> --}}
                                                <th scope="col">Quantity</th>
                                                <th scope="col" class="text-end">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody id="products-list"></tbody>
                                    </table>
                                </div>
                                <div class="border-top border-top-dashed mt-2">
                                    <table class="table table-borderless table-nowrap align-middle mb-0 ms-auto" style="width:250px">
                                        <tbody>
                                            <tr>
                                                <td>Sub Total</td>
                                                <td class="text-end" id="sub-total"></td>
                                            </tr>

                                            <tr>
                                                <td>Discount <small class="text-muted"></small></td>
                                                <td class="text-end" id="discount"></td>
                                            </tr>

                                            <tr class="border-top border-top-dashed fs-15">
                                                <th scope="row">Total Amount</th>
                                                <th class="text-end" id="total-amount-summary"></th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-3">
                                    <h6 class="text-muted text-uppercase fw-semibold mb-3">Payment Details:</h6>
                                    <p class="text-muted mb-1">Payment Method: <span class="fw-medium" id="payment-method">PayPal</span></p>

                                </div>
                                <div class="mt-4">
                                    <div class="alert alert-info">
                                        <p class="mb-0"><span class="fw-semibold">NOTES:</span>
                                            <span id="note"></span>
                                        </p>
                                    </div>
                                </div>
                                <div class="hstack gap-2 justify-content-end d-print-none mt-4">
                                    <a href="javascript:window.print()" class="btn btn-success"><i class="ri-printer-line align-bottom me-1"></i> Print</a>
                                    <a href="javascript:void(0);" class="btn btn-primary"><i class="ri-download-2-line align-bottom me-1"></i> Download</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Fullscreen Modals -->
<div class="modal fade" id="invoiceModal" tabindex="-1" aria-labelledby="invoiceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">

    </div>
</div>


<script>
    // When the modal is shown, populate it with dynamic data
    const invoiceModal = document.getElementById('invoiceModal');
    invoiceModal.addEventListener('show.bs.modal', function(event) {
        // Get the link that triggered the modal
        const button = event.relatedTarget;

        // Extract data attributes from the button
        const orderId = button.getAttribute('data-bs-order-id');
        const date = button.getAttribute('data-bs-date');
        const subtotal = button.getAttribute('data-bs-subtotal');
        const billingName = button.getAttribute('data-bs-billing-name');
        const billingAddress = button.getAttribute('data-bs-billing-address');
        const shippingName = button.getAttribute('data-bs-shipping-name');
        const shippingAddress = button.getAttribute('data-bs-shipping-address');
        const products = JSON.parse(button.getAttribute('data-bs-products'));

        // Update the modal's content
        document.getElementById('invoiceModalLabel').textContent = `Order Invoice #${orderId}`;
        document.getElementById('invoice-no').textContent = orderId;
        document.getElementById('invoice-date').textContent = date;
        document.getElementById('sub-total').textContent = `${subtotal}`;
        document.getElementById('total-amount-summary').textContent = `${subtotal}`;

        // document.getElementById('total-amount').textContent = `${total}`;
        document.getElementById('total-amount').textContent = `${subtotal}`;

        // Billing and Shipping Info
        document.getElementById('billing-name').textContent = billingName;
        document.getElementById('billing-address-line-1').textContent = billingAddress;
        document.getElementById('shipping-name').textContent = shippingName;
        document.getElementById('shipping-address-line-1').textContent = shippingAddress;

        // Populate product details in the modal
        let productRows = '';
        products.forEach((item, index) => {
            productRows += `
                <tr>
                    <th scope="row">${index + 1}</th>
                    <td class="text-start">
                        <span class="fw-medium">${item.product.title}</span>
                        <p class="text-muted mb-0">${item.product.category}</p>
                    </td>
                    
                    <td>${item.quantity}</td>
                    <td class="text-end">$${(item.product_price*item.quantity + item.printing_price*item.quantity + item.delivery_price*item.quantity).toFixed(2)}</td>
                </tr>
            `;
        });
        document.getElementById('products-list').innerHTML = productRows;
    });
</script>


<script>
    document.querySelectorAll('.table tbody tr').forEach(row => {
        row.addEventListener('click', function() {
            let detailsRow = row.nextElementSibling;
            if (detailsRow.classList.contains('collapse')) {
                detailsRow.classList.remove('collapse');
            } else {
                detailsRow.classList.add('collapse');
            }
        });
    });
</script>

@endsection