@extends('main.layouts.master')

@section('main-container')
    @component('main.components.minibreadcrumb', [
        'pageTitle' => 'Order History',
        'pageRoute' => 'main.pages.orderhistory',
    ])
    @endcomponent
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script> --}}
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
                                        <th scope="col">Status</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orderhistory as $order)
                                        <tr data-bs-order-id="{{ $order->order_id }}"
                                            data-bs-invoice-no="{{ $order->invoice_no }}"
                                            data-bs-date="{{ $order->created_at->format('d M, Y') }}"
                                            data-bs-subtotal="{{ number_format($order->subtotal_price, 2) }}"
                                            data-bs-discount="{{ number_format($order->discount_price, 2) }}"
                                            data-bs-shipping="{{ number_format($order->shipping_price, 2) }}"
                                            data-bs-TVQtax="{{ number_format($order->TaxDetails?->tvq_tax_price ?? 0, 2) }}"
                                            data-bs-TPStax="{{ number_format($order->TaxDetails?->tps_tax_price ?? 0, 2) }}"
                                            data-bs-total="{{ number_format($order->total_price, 2) }}"
                                            data-bs-TPStax-percentage="{{ $order->TaxDetails->tps_tax_percentage ?? 'N/A' }}"
                                            data-bs-TVQtax-percentage="{{ $order->TaxDetails->tvq_tax_percentage ?? 'N/A' }}"
                                            data-bs-order-service="{{ $order->shippingRate->service_name ?? 'N/A' }}"
                                            data-bs-order-tracking="{{ $order->shippingRate->tracking_number ?? 'N/A' }}"
                                            data-bs-TPStax-no="{{ $order->TaxDetails->tps_tax_no ?? 'N/A' }}"
                                            data-bs-TVQtax-no="{{ $order->TaxDetails->tvq_tax_no ?? 'N/A' }}"
                                            data-bs-billing-name="{{ $order->billing_name }}"
                                            data-bs-billing-address="{{ $order->billing_address }}"
                                            data-bs-shipping-name="{{ $order->shipping_name }}"
                                            data-bs-shipping-address="{{ $order->shipping_address }}"
                                            data-bs-products="{{ json_encode($order->items) }}">

                                            <td><a href="#" class="text-body">{{ $order->order_id }}</a></td>
                                            <td><span class="text-muted">{{ $order->created_at->format('d M, Y') }}</span>
                                            </td>
                                            <td class="fw-medium">${{ number_format($order->total_price, 2) }}</td>
                                            <td>
                                                <!-- Using the OrderStatus component -->
                                                <x-order-status :status="$order->status" />
                                            </td>
                                            <td>
                                                <a href="#invoiceModal" class="btn btn-secondary btn-sm"
                                                    data-bs-toggle="modal">Order Invoice</a>
                                                <a href="#viewModal" class="btn btn-success btn-sm"
                                                    data-bs-toggle="modal">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="text-end">
                            <a href="{{ route('products') }}" class="btn btn-hover btn-primary">Continue Shopping <i
                                    class="ri-arrow-right-line align-middle ms-1"></i></a>
                        </div>
                    </div>
                </div><!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>

    <!-- Modal for View Order Details -->
    <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="viewModalLabel">Order Items</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Product Price</th>
                                    <th>Quantity</th>
                                    <th>Color</th>
                                    <th>Size</th>



                                </tr>
                            </thead>
                            <tbody id="viewModal-products-list">
                                <!-- Dynamic content will be inserted here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Invoice -->
    <div class="modal fade" id="invoiceModal" tabindex="-1" aria-labelledby="invoiceModalLabel" aria-hidden="true"
        role="dialog">
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
                                            <img src="{{ asset('assetsCommon/images/logo-dark.png') }}"
                                                class="card-logo card-logo-dark" alt="logo dark" height="100">
                                            <img src="{{ asset('assetsCommon/images/weborka.png') }}"
                                                class="card-logo card-logo-dark mt-3" alt="logo dark" height="20">
                                            <div class="mt-sm-5 mt-4">
                                                <h6 class="text-muted text-uppercase fw-semibold fs-14">Address</h6>
                                                <p class="text-muted mb-1" id="address-details">9955 Av. Lausanne,
                                                    Montreal-Nord, Qc </p>
                                                <p class="text-muted mb-0" id="zip-code"> H1H 5A6</p>
                                                <p class="text-muted mb-0">Canada</p>

                                            </div>
                                        </div>
                                        <div class="flex-shrink-0 mt-sm-0 mt-3">
                                            {{-- <h6><span class="text-muted fw-normal">Legal Registration No:</span> <span
                                                    id="legal-register-no">123456</span></h6> --}}
                                            <h6><span class="text-muted fw-normal">Email:</span> <span id="email">
                                                    sales@capbeast.com</span></h6>
                                            <h6><span class="text-muted fw-normal">Website:</span> <a
                                                    href="https://capbeast.com/" class="link-primary" target="_blank"
                                                    id="website">www.capbeast.com</a></h6>
                                            <h6 class="mb-0"><span class="text-muted fw-normal">Contact No: </span><span
                                                    id="contact-no"> +1 888 882 2780</span></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card-body p-4">
                                    <div class="row g-3">
                                        <div class="col-lg-3 col-6">
                                            <p class="text-muted mb-2 text-uppercase fw-semibold fs-14">Order No</p>
                                            <h5 class="fs-15 mb-0">#<span id="invoice-no"></span></h5>
                                        </div>
                                        <div class="col-lg-3 col-6">
                                            <p class="text-muted mb-2 text-uppercase fw-semibold fs-14">Date</p>
                                            <h5 class="fs-15 mb-0"><span id="invoice-date"></span> <small
                                                    class="text-muted" id="invoice-time"></small></h5>
                                        </div>
                                        <div class="col-lg-3 col-6">
                                            <p class="text-muted mb-2 text-uppercase fw-semibold fs-14">Payment Status</p>
                                            <span class="badge bg-success-subtle text-success "
                                                id="payment-status">Paid</span>
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
                                            <h6 class="text-muted text-uppercase fw-semibold fs-14 mb-3">Order Tracking 
                                            </h6>
                                            <p class="fw-medium mb-2 fs-16" id="billing-name"></p>
                                            <p class="text-muted mb-1" id="billing-address-line-1"></p>
                                            {{-- <p class="text-muted mb-1"><span>Phone: +</span><span
                                                    id="billing-phone-no"></span></p> --}}
                                            <p class="text-muted mb-0"><span>Tracking Id: </span>
                                                <span id="Order-tracking"></span>
                                                {{-- <span id="billing-tax-no"></span> --}}
                                            </p>
                                        </div>
                                        {{-- <div class="col-6">
                                            <h6 class="text-muted text-uppercase fw-semibold fs-14 mb-3">Shipping Address
                                            </h6>
                                            <p class="fw-medium mb-2 fs-16" id="shipping-name"></p>
                                            <p class="text-muted mb-1" id="shipping-address-line-1"></p>
                                            <p class="text-muted mb-1"><span>Phone: +</span><span
                                                    id="shipping-phone-no"></span></p>
                                        </div> --}}
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
                                                    <th scope="col">Amount</th>
                                                    <th scope="col">Digitization Fee</th>
                                                    <th scope="col" class="text-end">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody id="invoice-products-list"></tbody>
                                        </table>
                                    </div>
                                    <div class="border-top border-top-dashed mt-2">
                                        <table class="table table-borderless table-nowrap align-middle mb-0 ms-auto"
                                            style="width:250px">
                                            <tbody>
                                                <tr>
                                                    <td>Sub Total</td>
                                                    <td class="text-end"><span id="sub-total"></span> $</td>
                                                </tr>

                                                @if ($order->TaxDetails && ($order->TaxDetails->tvq_tax_price > 0 || $order->TaxDetails->tvq_tax_percentage > 0))
                                                    <tr>
                                                        <td>TVQ Tax <span id="TVQtax-percentage"></span>% (<span
                                                                id="TVQtax-no"></span>) <small class="text-muted"></small>
                                                        </td>
                                                        <td class="text-end"><span id="TVQtax-amount"></span> $</td>
                                                    </tr>
                                                @endif

                                                @if ($order->TaxDetails && ($order->TaxDetails->tps_tax_price > 0 || $order->TaxDetails->tps_tax_percentage > 0))
                                                    <tr>
                                                        <td>TPS Tax <span id="TPStax-percentage"></span>% (<span
                                                                id="TPStax-no"></span>)<small class="text-muted"></small>
                                                        </td>
                                                        <td class="text-end"><span id="TPStax-amount"></span> $</td>
                                                    </tr>
                                                @endif

                                                <tr>
                                                    <td>Discount <small class="text-muted"></small></td>
                                                    <td class="text-end">-<span id="discount-amount"></span> $</td>
                                                </tr>

                                                <tr>
                                                    <td>Shipping (<span id="Order-service"></span>) <small class="text-muted"></small></td>
                                                    <td class="text-end"><span id="shipping-amount"></span> $</td>
                                                </tr>

                                                <tr class="border-top border-top-dashed fs-15">
                                                    <th scope="row">Total Amount</th>
                                                    <th class="text-end"><span id="total-amount-summary"></span> $</th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mt-3">
                                        <h6 class="text-muted text-uppercase fw-semibold mb-3">Payment Details:</h6>
                                        <p class="text-muted mb-1">Payment Method: <span class="fw-medium"
                                                id="payment-method">PayPal</span></p>

                                    </div>
                                    <div class="mt-4">
                                        <div class="alert alert-info">
                                            <p class="mb-0"><span class="fw-semibold">NOTES:</span>
                                                <span id="note"></span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="hstack gap-2 justify-content-end d-print-none mt-4">
                                        <a href="javascript:window.print()" class="btn btn-success"><i
                                                class="ri-printer-line align-bottom me-1"></i> Print</a>
                                        <a href="javascript:void(0);" class="btn btn-primary"><i
                                                class="ri-download-2-line align-bottom me-1"></i> Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.btn-success').forEach((button) => {
            button.addEventListener('click', function() {
                const row = this.closest('tr');
                const products = JSON.parse(row.getAttribute('data-bs-products'));
                console.log('Products data:', products);

                const viewModalBody = document.getElementById('viewModal-products-list');

                // Clear the modal body
                viewModalBody.innerHTML = '';

                // Generate the rows and append them to the modal
                const rows = products.map((item) => {
                    let productRow = `
                <tr>
                    <td>${item.product.title}</td>
                      <td>${item.product_price}</td>
                    <td>${item.quantity}</td>
                    <td>
    ${item.color.color_name_1 || 'N/A'}
    ${item.color.color_name_2 ? `& ${item.color.color_name_2}` : ''}
</td>

                      <td>${item.size || 'OSFA'}</td>
                </tr>
            `;


                    return productRow;
                });

                viewModalBody.innerHTML = rows.join('');
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const invoiceModal = document.getElementById('invoiceModal');
            if (invoiceModal) {
                invoiceModal.addEventListener('show.bs.modal', function(event) {
                    const button = event.relatedTarget;
                    const row = button.closest('tr');
                    if (!row) return;

                    // Get data attributes from the table row
                    const orderId = row.getAttribute('data-bs-order-id');
                    const date = row.getAttribute('data-bs-date');
                    const subtotal = row.getAttribute('data-bs-subtotal');
                    const discount = row.getAttribute('data-bs-discount');
                    const shipping = row.getAttribute('data-bs-shipping');
                    const TVQtax = row.getAttribute('data-bs-TVQtax');
                    const TPStax = row.getAttribute('data-bs-TPStax');
                    const TPStaxNo = row.getAttribute('data-bs-TPStax-no');
                    const TVQtaxNo = row.getAttribute('data-bs-TVQtax-no');
                    const TVQtaxPercentage = row.getAttribute('data-bs-TVQtax-percentage');
                    const OrderService = row.getAttribute('data-bs-order-service');
                    const OrderTracking = row.getAttribute('data-bs-order-tracking');
                    
                    
                    const TPStaxPercentage = row.getAttribute('data-bs-TPStax-percentage');
                    const completetotal = row.getAttribute('data-bs-total');
                    const billingName = row.getAttribute('data-bs-billing-name');
                    const billingAddress = row.getAttribute('data-bs-billing-address');
                    const shippingName = row.getAttribute('data-bs-shipping-name');
                    const shippingAddress = row.getAttribute('data-bs-shipping-address');
                    const products = JSON.parse(row.getAttribute('data-bs-products'));

                    // Helper function to safely set text content
                    function setTextContent(elementId, content) {
                        const element = document.getElementById(elementId);
                        if (element) {
                            element.textContent = content;
                        }
                    }

                    // Populate the invoice modal
                    setTextContent('invoice-no', orderId);
                    setTextContent('invoice-date', date);
                    setTextContent('discount-amount', discount);
                    setTextContent('shipping-amount', shipping);
                    setTextContent('TVQtax-amount', TVQtax);
                    setTextContent('TPStax-amount', TPStax);
                    setTextContent('TPStax-no', TPStaxNo);
                    setTextContent('TVQtax-no', TVQtaxNo);
                    setTextContent('TVQtax-percentage', TVQtaxPercentage);
                    setTextContent('Order-service', OrderService);
                    setTextContent('Order-tracking', OrderTracking);
                    
                    
                    setTextContent('TPStax-percentage', TPStaxPercentage);
                    setTextContent('sub-total', subtotal);
                    setTextContent('total-amount', completetotal);
                    setTextContent('total-amount-summary', completetotal);
                    setTextContent('billing-name', billingName);
                    setTextContent('billing-address-line-1', billingAddress);
                    setTextContent('shipping-name', shippingName);
                    setTextContent('shipping-address-line-1', shippingAddress);

                    const invoiceProductsList = document.getElementById('invoice-products-list');
                    if (invoiceProductsList) {
                        invoiceProductsList.innerHTML = '';

                        // Populate products in the invoice modal
                        products.forEach((item, index) => {
                            const productRow = `
                                <tr>
                                    <td>${index + 1}</td>
                                    <td>${item.product.title}</td>
                                    <td>${item.quantity}</td>
                                    <td>$${item.product_price}</td>
                                    <td>$${item.user_customization.price}</td>
                                    <td>$${(((parseFloat(item.product_price) || 0) + (parseFloat(item.printing_price) || 0) + (parseFloat(item.pompom_price) || 0)) * (parseInt(item.quantity) || 0) + (parseFloat(item.delivery_price) || 0)).toFixed(2)}</td>
                                </tr>
                            `;
                            invoiceProductsList.innerHTML += productRow;
                        });
                    }
                });
            }
        });
    </script>
@endsection
