@extends('admin.layouts/layoutMaster')

@section('title', 'eCommerce Order List - Apps')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/app-ecommerce-order-list.js')}}"></script>
@endsection

@section('content')
<h4 class="py-3 mb-2">
  <span class="text-muted fw-light">eCommerce /</span> Order List
</h4>

<!-- Order List Widget -->

<div class="card mb-4">
  <div class="card-widget-separator-wrapper">
    <div class="card-body card-widget-separator">
      <div class="row gy-4 gy-sm-1">
        <div class="col-sm-6 col-lg-2">
          <div class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
            <div>
              <h4 class="mb-2">{{ $processingCount }}</h4>
              <p class="mb-0 fw-medium">Processing</p>
            </div>
            <span class="avatar me-sm-4">
              <span class="avatar-initial bg-label-info rounded">
                <i class="ti-md ti ti-calendar-stats text-body"></i>
              </span>
            </span>
          </div>
        </div>
        <div class="col-sm-6 col-lg-2">
          <div class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-3 pb-sm-0">
            <div>
              <h4 class="mb-2">{{ $inProductionCount }}</h4>
              <p class="mb-0 fw-medium">In Production</p>
            </div>
            <span class="avatar p-2 me-lg-4">
              <span class="avatar-initial bg-label-warning rounded">
                <i class="ti-md ti ti-tools text-body"></i>
              </span>
            </span>
          </div>
        </div>
        <div class="col-sm-6 col-lg-2">
          <div class="d-flex justify-content-between align-items-start border-end pb-3 pb-sm-0 card-widget-3">
            <div>
              <h4 class="mb-2">{{ $completedCount }}</h4>
              <p class="mb-0 fw-medium">Completed</p>
            </div>
            <span class="avatar p-2 me-sm-4">
              <span class="avatar-initial bg-label-success rounded">
                <i class="ti-md ti ti-checks text-body"></i>
              </span>
            </span>
          </div>
        </div>
        <div class="col-sm-6 col-lg-2">
          <div class="d-flex justify-content-between align-items-start border-end pb-3 pb-sm-0 card-widget-3">
            <div>
              <h4 class="mb-2">{{ $shippedCount }}</h4>
              <p class="mb-0 fw-medium">Shipped</p>
            </div>
            <span class="avatar p-2 me-sm-4">
              <span class="avatar-initial bg-label-primary rounded">
                <i class="ti-md ti ti-truck text-body"></i>
              </span>
            </span>
          </div>
        </div>
        <div class="col-sm-6 col-lg-2">
          <div class="d-flex justify-content-between align-items-start">
            <div>
              <h4 class="mb-2">{{ $canceledCount }}</h4>
              <p class="mb-0 fw-medium">Canceled</p>
            </div>
            <span class="avatar p-2">
              <span class="avatar-initial bg-label-danger rounded">
                <i class="ti-md ti ti-alert-octagon text-body"></i>
              </span>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</div>

<!-- Order List Table -->
<div class="card">
  <div class="card-datatable table-responsive">
    <table class=" table border-top">
      <thead>

        <tr>
          <th></th>
        
          <th>order #</th>
          <th>order placed at</th>
          <th>customers</th>
          <th>Total Amount</th>
           <th>user status</th>
         {{-- <th>method</th> --}}
          <th>actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($orders as $order)
        <tr>
          <td></td>
        
          <td>{{$order->order_id}}</td>
          <td>{{$order->created_at}}</td>
          <td>{{$order->user->email}}</td> <!-- Displaying user's email -->
          <td>{{$order->total_price}} $</td>
          <td>
            <!-- Using the OrderStatus component -->
            <x-order-status :status="$order->status" />
          </td>
          
          <td>
            <a class="me-2" href=" {{ route($prefix .'.app-ecommerce-order-detail', $order->id) }}"  data-order-id="{{ $order->id }}" ><i class="fa-solid fa-eye"></i></a>
            <a href="javascript:void(0);" class="me-2" onclick="toggleDropdown({{ $order->id }})">
              <i class="fa-solid fa-ellipsis-vertical"></i>
            </a>
            <div id="dropdownMenu-{{ $order->id }}" class="custom-dropdown-content">
              <a href="javascript:void(0);" class="custom-dropdown-item" onclick="updateStatus({{ $order->id }}, 0)">Mark as Processing</a>
              <a href="javascript:void(0);" class="custom-dropdown-item" onclick="updateStatus({{ $order->id }}, 1)">Mark as In Production</a>
              <a href="javascript:void(0);" class="custom-dropdown-item" onclick="updateStatus({{ $order->id }}, 2)">Mark as Complete</a>
              <a href="javascript:void(0);" class="custom-dropdown-item" onclick="updateStatus({{ $order->id }}, 3)">Mark as Shipped</a>
              <a href="javascript:void(0);" class="custom-dropdown-item" onclick="updateStatus({{ $order->id }}, 4)">Cancel Order</a>
          </div>
          
            
          
          </td>
      </tr>

        @endforeach
 
      </tbody>
    </table>
  </div>

  <div class="d-flex justify-content-end mt-3 me-3">
    <x-pagination :paginator="$orders" />
  </div>
  
</div>

<style>
  /* Dropdown content (hidden by default) */
.custom-dropdown-content {
  display: none;
  position: absolute;
  background-color: #2F3349;
  min-width: 100px;
  box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
  z-index: 1;
}

.custom-dropdown-content .custom-dropdown-item {
  color: #CBC9E0;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.custom-dropdown-content a:hover {
  background-color: #383D53;
}

</style>

<script>
  function toggleDropdown(orderId) {
    const dropdown = document.getElementById(`dropdownMenu-${orderId}`);
    dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
}

function updateStatus(orderId, newStatus) {
        // Use the route name dynamically with a placeholder for `orderId`
        const url = "{{ route($prefix .'.admin.orders.updateStatus', ':id') }}".replace(':id', orderId);
        
        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ status: newStatus })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload(); // Refresh to update the UI
            } else {
                alert('Error updating status');
            }
        })
        .catch(error => console.error('Error:', error));
    }


</script>

@endsection
