@extends('admin.layouts/layoutMaster')

@section('title', 'eCommerce Product List - Apps')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
@endsection

@section('page-script')

@endsection

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">eCommerce /</span> Delivery List
    </h4>

    <!-- Product List Widget -->


    <!-- Product List Table -->
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Filter</h5>
            <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
                <div class="col-md-4 product_status"></div>
                <div class="col-md-4 product_category"></div>
                <div class="col-md-4 product_stock"></div>
            </div>
        </div>
        <div class="card-datatable table-responsive">
          <table class="datatables-products table">
              <thead class="border-top">
                  <tr>
                      <th>Id</th>

                      <th>Delivery Quantity Range</th>
                      <th>Delivery Price Range</th>
                      <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($delivery as $deliveries)
                      <tr>
                          <td>{{ $deliveries->id }}</td>



                          <td>
                            @php
                                // Handle the price field, ensuring it's an array
                                $quantity = is_array($deliveries->quantity) ? $deliveries->quantity : json_decode($deliveries->quantity, true);
                                $minQuantity = is_array($quantity) ? min($quantity) : 0;
                                $maxQuantity = is_array($quantity) ? max($quantity) : 0;
                            @endphp
                            {{ number_format( $minQuantity) }} Pcs ~ {{ number_format($maxQuantity) }} Pcs
                        </td>
                          <td>
                              @php
                                  // Handle the price field, ensuring it's an array
                                  $prices = is_array($deliveries->pricing) ? $deliveries->pricing : json_decode($deliveries->pricing, true);
                                  $minPrice = is_array($prices) ? min($prices) : 0;
                                  $maxPrice = is_array($prices) ? max($prices) : 0;
                              @endphp
                              ${{ number_format($minPrice, 2) }} ~ ${{ number_format($maxPrice, 2) }}
                          </td>
                          <td>
                              <a href="#" class="me-2"><i class="fa-solid fa-pen-to-square"></i></a>
                              <a href="#" class="me-2"><i class="fa-solid fa-trash"></i></a>
                              <a href="#" data-bs-toggle="modal" data-bs-target="#onboardHorizontalImageModal"><i
                                      class="fa-solid fa-eye"></i></a>
                          </td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
      </div>


    </div>





@endsection
