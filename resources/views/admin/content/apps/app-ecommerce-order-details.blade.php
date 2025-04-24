@extends('admin.layouts/layoutMaster')

@section('title', 'eCommerce Order Details - Apps')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
@endsection
@php
            if (!function_exists('decodeFontJson')) {
                function decodeFontJson($fontData)
                {
                    $decoded = json_decode($fontData, true);
                    return is_array($decoded) ? $decoded : [];
                }
            }
        @endphp

@section('page-script')
    <script src="{{ asset('assets/js/app-ecommerce-order-details.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/modal-edit-user.js') }}"></script> --}}
    <script src="{{ asset('assets/js/modal-add-new-address.js') }}"></script>
@endsection
@section('content')
    <h4 class="py-3 mb-2">
        <span class="text-muted fw-light">eCommerce /</span> Order Details
    </h4>

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">

        <div class="d-flex flex-column justify-content-center gap-2 gap-sm-0">
            <h5 class="mb-1 mt-3 d-flex flex-wrap gap-2 align-items-end">Order #{{ $order->order_id }}
                {{-- <span class="badge bg-label-success">Paid</span>  --}}
                @if ($latestStatus && $latestStatus->internalStatus)
                    <span class="badge bg-label-info">{{ $latestStatus->internalStatus->title }}</span>
                @else
                    <span class="badge bg-label-warning">No Status Set</span>
                @endif
            </h5>
            <p class="text-body">
                Date: {{ \Carbon\Carbon::parse($order->created_at)->format('F j, Y') }}
                {{-- Time: <span id="orderYear">{{ \Carbon\Carbon::parse($order->created_at)->timezone('America/New_York')->format('g:i A') }}</span> (ET) --}}
            </p>






        </div>
        {{-- <div class="d-flex align-content-center flex-wrap gap-2">
    <button class="btn btn-label-danger delete-order">Delete Order</button>
  </div> --}}
    </div>
    <style>
        .card-equal-height {
            display: flex;
            flex-direction: column;
            height: 100%;
        }
    </style>

    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="row">

                <!-- Customer Details Card -->
                <div class="col-md-4 col-lg-4">
                    <div class="card mb-4 card-equal-height">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="card-header">
                                <h6 class="card-title m-0">Customer details</h6>
                            </div>
                            <span class="badge bg-label-info " style="margin-right: 5%">{{ $order->user->country }}</span>
                        </div>

                        <div class="card-body">
                            <div class="d-flex justify-content-start align-items-center mb-4">
                                <div class="avatar me-2">
                                    <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Avatar"
                                        class="rounded-circle">
                                </div>
                                <div class="d-flex flex-column">
                                    <a href="{{ url('app/user/view/account') }}" class="text-body text-nowrap">
                                        <h6 class="mb-0">{{ $order->user->email }}</h6>
                                    </a>
                                    <small class="text-muted">Customer ID: #{{ $order->user->id }}</small>


                                </div>
                            </div>
                            <div class="d-flex justify-content-start align-items-center mb-4">
                                <span
                                    class="avatar rounded-circle bg-label-success me-2 d-flex align-items-center justify-content-center"><i
                                        class='ti ti-shopping-cart ti-sm'></i></span>
                                <h6 class="text-body text-nowrap mb-0">{{ $order->user->orders->count() }} Orders Placed
                                </h6>

                            </div>
                            <div class="d-flex justify-content-between">
                                <h6>Reseller info</h6>

                            </div>
                            <p class="mb-1"> </p>

                        </div>
                    </div>
                </div>

                <!-- Shipping Address Card -->
                <div class="col-md-4 col-lg-6">
                    <div class="card mb-4 card-equal-height">
                        <div class="card-header d-flex justify-content-between">
                            <h6 class="card-title m-0">Shipping Details</h6>
                        </div>
                        <div class="card-body">
                            <p class="mb-0"><Span style="font-weight: bold">Firstname:</Span>
                                {{ $order->ShippingDetails->firstname }}</p>
                            <p class="mb-0"><Span style="font-weight: bold">Lastname:</Span>
                                {{ $order->ShippingDetails->lastname }}</p>
                            <p class="mb-0"><Span style="font-weight: bold">Company Name:</Span>
                                {{ $order->ShippingDetails->companyname }}</p>
                            <p class="mb-0"><Span style="font-weight: bold">Email:</Span>
                                {{ $order->ShippingDetails->email }}</p>
                            <p class="mb-0"><Span style="font-weight: bold">Phone:</Span>
                                {{ $order->ShippingDetails->phone }}</p>
                            <p class="mb-0"><Span style="font-weight: bold">Country:</Span>
                                {{ $order->ShippingDetails->country }}</p>
                            <p class="mb-0"><Span style="font-weight: bold">Address:</Span>
                                {{ $order->ShippingDetails->address }}</p>
                            <p class="mb-0"><Span style="font-weight: bold">Additional Info:</Span>
                                {{ $order->ShippingDetails->additional_info }}</p>
                        </div>
                    </div>
                </div>

                <!-- Order Details Card -->
                <div class="col-md-4 col-lg-2">
                    <div class="mb-6">
                        <label for="select2Basic" class="form-label">Update Internal Status</label>
                        <form action="{{ route($prefix . '.order-status.update', $order->id) }}" method="POST">
                            @csrf
                            <select name="internal_status_id" id="select2Basic" class="select2 form-select form-select-lg">
                                <option value="">Select Status</option>
                                @foreach ($statuses as $status)
                                    <option value="{{ $status->id }}"
                                        {{ old('internal_status_id', optional($order->internalStatus)->id) == $status->id ? 'selected' : '' }}>
                                        {{ $status->title }}
                                        @if ($status->trashed())
                                            <span class="text-muted">(Deleted)</span>
                                        @endif
                                    </option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary mt-2">Update Status</button>
                        </form>
                        <div class="mt-5">
                            <a href="{{ route($prefix . '.content-internal-status-list') }}">Add New Status Name</a>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <div class="col-12 col-lg-12 mt-5">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title m-0">Order details</h5>
                    {{-- <h6 class="m-0"><a href=" javascript:void(0)">Edit</a></h6> --}}
                </div>
                <div class="card-datatable table-responsive">
                    <table class="table border-top">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Products</th>
                                <th>Qty</th>
                                <th>Size</th>
                                <th>Color</th>

                                <th>Product Price</th>
                                <th>Customization Price</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->items as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->product->title }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->size ?? 'OSFA' }}</td>
                                    <td>
                                        {{ $item->color->color_name_2 ? $item->color->color_name_1 . ' & ' . $item->color->color_name_2 : $item->color->color_name_1 }}
                                    </td>
                                    <td>{{ $item->product_price }} $</td>
                                    <td>{{ isset($item->userCustomization) ? $item->userCustomization->price : '0.00' }} $</td>
                                </tr>
                                @if (isset($item->userCustomization))
                                    @php
                                      $totalCustomizationPrice = 0;
                                      $totalCustomizationPrice += $item->userCustomization->price;
                                    @endphp
                                    <tr>
                                        <td></td>
                                        <td></td>

                                        <td>
                                            @if ($item->userCustomization->front_image)
                                                <a href="{{ asset($item->userCustomization->front_image) }}" download>
                                                    <img style="width: 50px;"
                                                        src="{{ asset($item->userCustomization->front_image) }}"
                                                        alt="Front Image">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->userCustomization->left_image)
                                                <a href="{{ asset($item->userCustomization->left_image) }}" download>
                                                    <img style="width: 50px;"
                                                        src="{{ asset($item->userCustomization->left_image) }}"
                                                        alt="Left Image">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->userCustomization->right_image)
                                                <a href="{{ asset($item->userCustomization->right_image) }}" download>
                                                    <img style="width: 50px;"
                                                        src="{{ asset($item->userCustomization->right_image) }}"
                                                        alt="Right Image">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->userCustomization->back_image)
                                                <a href="{{ asset($item->userCustomization->back_image) }}" download>
                                                    <img style="width: 50px;"
                                                        src="{{ asset($item->userCustomization->back_image) }}"
                                                        alt="Back Image">
                                                </a>
                                            @endif
                                        </td>
                                        <td><button class="btn btn-primary" data-bs-toggle="modal"
                                          data-bs-target="#CustomizerUploadModal{{ $item->id }}">View
                                         Uploads</button>
                                         @if (
                                                $item->userCustomization->front_font ||
                                                    $item->userCustomization->back_font ||
                                                    $item->userCustomization->left_font ||
                                                    $item->userCustomization->right_font)
                                                <button class="btn btn-sm btn-secondary" data-bs-toggle="modal"
                                                    data-bs-target="#TextDetailsModal{{ $item->id }}">
                                                    View Text
                                                </button>
                                            @endif
                                        </td>
                                    </tr>


                                    @if (
                                        $item->userCustomization->front_font ||
                                            $item->userCustomization->back_font ||
                                            $item->userCustomization->left_font ||
                                            $item->userCustomization->right_font)
                                        <div class="modal fade" id="TextDetailsModal{{ $item->id }}" tabindex="-1"
                                            aria-labelledby="TextDetailsModalLabel{{ $item->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="TextDetailsModalLabel{{ $item->id }}">Font
                                                            Customization Details</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @php
                                                            // function decodeFontJson($fontData)
                                                            // {
                                                            //     $decoded = json_decode($fontData, true);
                                                            //     return is_array($decoded) ? $decoded : [];
                                                            // }
 
                                                            $fontParts = [
                                                                'Front Font' => $item->userCustomization->front_font,
                                                                'Back Font' => $item->userCustomization->back_font,
                                                                'Left Font' => $item->userCustomization->left_font,
                                                                'Right Font' => $item->userCustomization->right_font,
                                                            ];
                                                        @endphp
 
                                                        @foreach ($fontParts as $label => $json)
                                                            @if (!empty($json))
                                                                <h6>{{ $label }}:</h6>
                                                                @foreach (decodeFontJson($json) as $font)
                                                                    <div class="mb-3 p-2 border rounded bg-light">
                                                                        <p><strong>Text:</strong>
                                                                            {{ $font['content'] ?? '-' }}</p>
                                                                        <p><strong>Font Family:</strong>
                                                                            {{ $font['styles']['fontFamily'] ?? '-' }}</p>
                                                                        <p><strong>Font Size:</strong>
                                                                            {{ $font['styles']['fontSize'] ?? '-' }}</p>
                                                                        <p><strong>Font Color:</strong>
                                                                            @if (str_starts_with($font['styles']['color'] ?? '', 'url'))
                                                                                <img src="{{ str_replace(['url("', '")'], '', $font['styles']['color']) }}"
                                                                                    width="40" />
                                                                            @else
                                                                                {{ $font['styles']['color'] ?? '-' }}
                                                                            @endif
                                                                        </p>
                                                                        <p><strong>Font Weight:</strong>
                                                                            {{ $font['styles']['fontWeight'] ?? '-' }}</p>
                                                                        <p><strong>Position:</strong> Left
                                                                            {{ $font['position']['left'] ?? '?' }}, Top
                                                                            {{ $font['position']['top'] ?? '?' }}</p>
                                                                        <p><strong>Rotation:</strong>
                                                                            {{ $font['rotation'] ?? '-' }}</p>
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">
                                                            Close
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
 


                                    {{-- Modal --}}
                                    <div class="modal fade" id="CustomizerUploadModal{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="CustomizerUploadModalLabel{{ $item->id }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        id="CustomizerUploadModalLabel{{ $item->id }}">
                                                        Customization Upload Files
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    @if ($item->userCustomization->customizerUploads->count())
                                                        <ul class="list-group">
                                                            @foreach ($item->userCustomization->customizerUploads as $upload)
                                                                <li
                                                                    class="list-group-item d-flex justify-content-between align-items-center">
                                                                    <a href="{{ asset('storage/' . $upload->image) }}"
                                                                        target="_blank">
                                                                        <img src="{{ asset('storage/' . $upload->image) }}"
                                                                            style="width: 80px;" alt="Upload">
                                                                    </a>
                                                                    <a href="{{ asset('storage/' . $upload->image) }}"
                                                                        download class="btn btn-sm btn-success">
                                                                        Download
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @else
                                                        <p>No uploads available.</p>
                                                    @endif
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">
                                                        Close
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </tbody>

                    </table>

                    <div class="d-flex justify-content-end align-items-center m-3 mb-2 p-1">
                        <div class="order-calculations">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="w-px-100 text-heading">Subtotal:</span>
                                <h6 class="mb-0">${{ $order->subtotal_price }}</h6>
                            </div>
                            @if ($order->TaxDetails)
                                @if ($order->TaxDetails->tvq_tax_percentage)
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="w-px-200 text-heading">TVQ Tax
                                            {{ $order->TaxDetails->tvq_tax_percentage }}%
                                            ({{ $order->TaxDetails->tvq_tax_no }}) :</span>
                                        <h6 class="mb-0">${{ $order->TaxDetails->tvq_tax_price }}</h6>
                                    </div>
                                @endif

                                @if ($order->TaxDetails->tps_tax_percentage)
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="w-px-200 text-heading">TPS Tax
                                            {{ $order->TaxDetails->tps_tax_percentage }}%
                                            ({{ $order->TaxDetails->tps_tax_no }}) :</span>
                                        <h6 class="mb-0">${{ $order->TaxDetails->tps_tax_price }}</h6>
                                    </div>
                                @endif
                            @endif

                            {{-- <div class="d-flex justify-content-between mb-2">
                                <span class="w-px-100 text-heading">Custom. Price:</span>
                                <h6 class="mb-0"> ${{ $totalCustomizationPrice }}</h6>
                            </div> --}}

                            <div class="d-flex justify-content-between mb-2">
                                <span class="w-px-100 text-heading">Shipping ({{ $order->shippingRate->service_name }}):</span>
                                <h6 class="mb-0">${{ $order->shipping_price }}</h6>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="w-px-100 text-heading">Discount:</span>
                                <h6 class="mb-0">- ${{ $order->discount_price }}</h6>
                            </div>
                            {{-- <div class="d-flex justify-content-between mb-2">
                                  <span class="w-px-100 text-heading">Tax:</span>
                                  <h6 class="mb-0">$30</h6>
                                </div> --}}
                            <div class="d-flex justify-content-between">
                                <h6 class="w-px-100 mb-0">Total:</h6>
                                <h6 class="mb-0">${{ $order->total_price }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-8 col-lg-8 mt-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title m-0">Internal Status Activity</h5>
                </div>
                <div class="card-body">
                    <ul class="timeline">
                        @foreach ($statusHistory as $status)
                            @php
                                $internalStatus = $status->internalStatus;
                            @endphp

                            @if ($status == $latestStatus)
                                <!-- Last status (latest one) -->
                                <li class="timeline-item timeline-item-transparent border-transparent pb-0">
                                    <span class="timeline-point timeline-point-primary"></span>
                                    <div class="timeline-event pb-0">
                                        <div class="timeline-header">
                                            <h6 class="mb-0">{{ $internalStatus->title ?? 'Unknown Status' }}</h6>
                                            <span class="text-muted">{{ $status->updated_at->format('l h:i A') }}</span>
                                        </div>
                                        <p class="mt-2 mb-0">
                                            {{ $internalStatus->description ?? 'No description available' }}</p>
                                    </div>
                                </li>
                            @else
                                <!-- Other statuses -->
                                <li class="timeline-item timeline-item-transparent border-primary">
                                    <span class="timeline-point timeline-point-primary"></span>
                                    <div class="timeline-event">
                                        <div class="timeline-header">
                                            <h6 class="mb-0">{{ $internalStatus->title ?? 'Unknown Status' }}</h6>
                                            <span class="text-muted">{{ $status->updated_at->format('l h:i A') }}</span>
                                        </div>
                                        <p class="mt-2">{{ $internalStatus->description ?? 'No description available' }}
                                        </p>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>

        <div class="col-4 col-lg-4 mt-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title m-0">Upload File</h5>
                </div>
                <div class="card-body">
                    @foreach ($order->Order_files as $item)
                        @php
                            $fileExtension = pathinfo($item->file, PATHINFO_EXTENSION);
                        @endphp

                        <div class="mb-2 d-flex align-items-center"> <!-- Use d-flex to align items horizontally -->
                            <!-- Dynamic icon based on file type -->
                            @if (in_array($fileExtension, ['png']))
                                <img width="45" src="{{ asset('assetsCommon/svgs/png.svg') }}" alt="">
                            @elseif(in_array($fileExtension, ['pdf']))
                                <img width="45" src="{{ asset('assetsCommon/svgs/pdf.svg') }}" alt="">
                            @elseif(in_array($fileExtension, ['doc', 'docx']))
                                <img width="45" src="{{ asset('assetsCommon/svgs/doc.svg') }}" alt="">
                            @elseif(in_array($fileExtension, ['xls', 'xlsm', 'xlsx', 'xltx']))
                                <img width="45" src="{{ asset('assetsCommon/svgs/excel.svg') }}" alt="">
                            @elseif(in_array($fileExtension, ['jpg', 'jpeg']))
                                <img width="45" src="{{ asset('assetsCommon/svgs/jpg.svg') }}" alt="">
                            @elseif(in_array($fileExtension, ['zip']))
                                <img width="45" src="{{ asset('assetsCommon/svgs/zip.svg') }}" alt="">
                            {{-- Embroidery & custom files --}}
@elseif(in_array($fileExtension, ['dst', 'emb', 'exp', 'hus','pxf', 'jef', 'dgt', 'vp3', 'xxx', 'pcs', 'pes', 'sew']))
<img width="45" src="{{ asset("assetsCommon/svgs/{$fileExtension}.svg") }}" alt="{{ $fileExtension }}">

                            @else
                                <img width="45" src="{{ asset('assetsCommon/svgs/defaultfile.svg') }}"
                                    alt="">
                            @endif

                            <div class="ms-3"> <!-- Add margin-left for spacing between the image and text -->
                                <h6>{{ $item->title }}</h6>
                                <a href="{{ asset('storage/'.$item->file) }}" class="fs-12 fw-500 color-primary"
                                    download>Download</a>
                            </div>
                        </div>
                    @endforeach

                    <div class="mb-3 text-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#fileUploadModal">
                            Upload File
                        </button>
                    </div>
                </div>


            </div>
        </div>

    </div>

    <div class="modal fade" id="fileUploadModal" tabindex="-1" aria-labelledby="fileUploadModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fileUploadModalLabel">Upload File</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route($prefix . '.order.file.upload', $order->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <!-- Title Field -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                placeholder="Enter file title" required>
                        </div>
                        <!-- File Input Field -->
                        <div class="mb-3">
                            <label for="file" class="form-label">Select File</label>
                            <input type="file" class="form-control" id="file" name="file" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- @include('admin._partials/_modals/modal-edit-user')
            @include('admin._partials/_modals/modal-add-new-address') --}}
@endsection
