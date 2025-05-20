@extends('admin.layouts/layoutMaster')

@section('title', 'eCommerce Order List - Apps')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/customAdmin.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bootstrap/bootstrap.bundle.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/app-ecommerce-order-list.js') }}"></script>
@endsection

@section('content')
    <h4 class="py-3 mb-2">
        <span class="text-muted fw-light">eCommerce /</span> Quote
    </h4>

    <!-- Order List Table -->
    <div class="card">
        <div class="card-datatable table-responsive">
            <table class=" table border-top">
                <thead>
                    <tr>
                        <th></th>
                        <th>Customer</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($quotes as $quote)
                        <tr>
                            <td></td>
                            <td>{{ $quote->firstname }} {{ $quote->lastname }}</td>
                            <td>{{ Auth::user()->email }}</td>
                            <td>{{ $quote->phone }}</td>
                            <td>
                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#viewQuoteModal{{ $quote->id }}">
                                    View
                                </button>
                            </td>
                        </tr>

                        <!-- Quote Modal -->
                        <div class="modal fade" id="viewQuoteModal{{ $quote->id }}" tabindex="-1"
                            aria-labelledby="viewQuoteLabel{{ $quote->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Quote Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>Full Name:</strong> {{ $quote->firstname }} {{ $quote->lastname }}</p>
                                        <p><strong>Email:</strong> {{ $quote->email }}</p>
                                        <p><strong>Phone:</strong> {{ $quote->phone }}</p>
                                        <p><strong>Address:</strong> {{ $quote->address }}, {{ $quote->city }},
                                            {{ $quote->state }}, {{ $quote->country }} - {{ $quote->zip }}</p>
                                        <p><strong>Product ID:</strong> {{ $quote->product->title }}</p>
                                        <p><strong>Quantity:</strong> {{ $quote->qty }}</p>
                                        @php
    $color1 = $quote->color->color_name_1 ?? 'N/A';
    $code1 = $quote->color->color_code_1 ?? '#ffffff';
    $color2 = $quote->color->color_name_2 ?? null;
    $code2 = $quote->color->color_code_2 ?? null;
@endphp

<p><strong>Selected Color(s):</strong>
<div class="d-flex align-items-center">
    <div style="width: 50px; height: 50px; display: flex; border: 1px solid #ccc; border-radius: 4px; overflow: hidden;">
        @if ($code2)
            <div style="flex: 1; background-color: {{ $code1 }}"></div>
            <div style="flex: 1; background-color: {{ $code2 }}"></div>
        @else
            <div style="flex: 1; background-color: {{ $code1 }}"></div>
        @endif
    </div>
    <div class="ms-3">
        <small>
            {{ $color1 }} ({{ $code1 }})
            @if ($color2)
                &nbsp;|&nbsp; {{ $color2 }} ({{ $code2 }})
            @endif
        </small>
    </div>
</div>
</p>
                                        <p><strong>Details:</strong> {{ $quote->details }}</p>
                                        {{-- <p><strong>Customization ID:</strong> {{ $quote->customization_id }}</p> --}}

                                        @if ($quote->customization)
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                                        <h6 class="mb-0">
                                                            Customization
                                                            Details</h6>
                                                        <button class="btn btn-sm btn-primary" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#collapseCustomization{{ $quote->id }}"
                                                            aria-expanded="false">
                                                            View Details
                                                        </button>
                                                    </div>
                                                    <div class="collapse" id="collapseCustomization{{ $quote->id }}">
                                                        <div class="row mb-3">
                                                            @if ($quote->customization->front_image)
                                                                <div class="col-md-3 mb-2">
                                                                    <div class="card">
                                                                        <div class="card-header py-2">
                                                                            <h6 class="mb-0 fs-12">
                                                                                Front
                                                                                Image
                                                                            </h6>
                                                                        </div>
                                                                        <div class="card-body p-2">
                                                                            <a href="{{ asset($quote->customization->front_image) }}"
                                                                                target="_blank">
                                                                                <img src="{{ asset($quote->customization->front_image) }}"
                                                                                    class="img-fluid" alt="Front">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif

                                                            @if ($quote->customization->back_image)
                                                                <div class="col-md-3 mb-2">
                                                                    <div class="card">
                                                                        <div class="card-header py-2">
                                                                            <h6 class="mb-0 fs-12">
                                                                                Back
                                                                                Image
                                                                            </h6>
                                                                        </div>
                                                                        <div class="card-body p-2">
                                                                            <a href="{{ asset($quote->customization->back_image) }}"
                                                                                target="_blank">
                                                                                <img src="{{ asset($quote->customization->back_image) }}"
                                                                                    class="img-fluid" alt="Back">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif

                                                            @if ($quote->customization->left_image)
                                                                <div class="col-md-3 mb-2">
                                                                    <div class="card">
                                                                        <div class="card-header py-2">
                                                                            <h6 class="mb-0 fs-12">
                                                                                Left
                                                                                Image
                                                                            </h6>
                                                                        </div>
                                                                        <div class="card-body p-2">
                                                                            <a href="{{ asset($quote->customization->left_image) }}"
                                                                                target="_blank">
                                                                                <img src="{{ asset($quote->customization->left_image) }}"
                                                                                    class="img-fluid" alt="Left">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif

                                                            @if ($quote->customization->right_image)
                                                                <div class="col-md-3 mb-2">
                                                                    <div class="card">
                                                                        <div class="card-header py-2">
                                                                            <h6 class="mb-0 fs-12">
                                                                                Right
                                                                                Image
                                                                            </h6>
                                                                        </div>
                                                                        <div class="card-body p-2">
                                                                            <a href="{{ asset($quote->customization->right_image) }}"
                                                                                target="_blank">
                                                                                <img src="{{ asset($quote->customization->right_image) }}"
                                                                                    class="img-fluid" alt="Right">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>

                                                        @if ($quote->customization->customizerUploads && $quote->customization->customizerUploads->count() > 0)
                                                            <h6 class="mb-2">
                                                                Custom Uploads
                                                            </h6>
                                                            <div class="row">
                                                                @foreach ($quote->customization->customizerUploads as $upload)
                                                                    <div class="col-md-3 mb-2">
                                                                        <div class="card">
                                                                            <div class="card-body p-2">
                                                                                <a href="{{ asset('storage/' . $upload->image) }}"
                                                                                    target="_blank">
                                                                                    <img src="{{ asset('storage/' . $upload->image) }}"
                                                                                        class="img-fluid" alt="Upload">
                                                                                </a>
                                                                                <div class="mt-2 text-center">
                                                                                    <a href="{{ asset('storage/' . $upload->image) }}"
                                                                                        download
                                                                                        class="btn btn-sm btn-primary">
                                                                                        Download
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

@endsection
