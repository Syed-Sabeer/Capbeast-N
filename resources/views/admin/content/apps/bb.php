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
        <div class="col-sm-6 col-lg-3">
          <div class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
            <div>
              <h4 class="mb-2">56</h4>
              <p class="mb-0 fw-medium">Pending Payment</p>
            </div>
            <span class="avatar me-sm-4">
              <span class="avatar-initial bg-label-secondary rounded">
                <i class="ti-md ti ti-calendar-stats text-body"></i>
              </span>
            </span>
          </div>
          <hr class="d-none d-sm-block d-lg-none me-4">
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-3 pb-sm-0">
            <div>
              <h4 class="mb-2">12,689</h4>
              <p class="mb-0 fw-medium">Completed</p>
            </div>
            <span class="avatar p-2 me-lg-4">
              <span class="avatar-initial bg-label-secondary rounded"><i class="ti-md ti ti-checks text-body"></i></span>
            </span>
          </div>
          <hr class="d-none d-sm-block d-lg-none">
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="d-flex justify-content-between align-items-start border-end pb-3 pb-sm-0 card-widget-3">
            <div>
              <h4 class="mb-2">124</h4>
              <p class="mb-0 fw-medium">Refunded</p>
            </div>
            <span class="avatar p-2 me-sm-4">
              <span class="avatar-initial bg-label-secondary rounded"><i class="ti-md ti ti-wallet text-body"></i></span>
            </span>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="d-flex justify-content-between align-items-start">
            <div>
              <h4 class="mb-2">32</h4>
              <p class="mb-0 fw-medium">Failed</p>
            </div>
            <span class="avatar p-2">
              <span class="avatar-initial bg-label-secondary rounded"><i class="ti-md ti ti-alert-octagon text-body"></i></span>
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
          <th>date</th>
          <th>customers</th>
          <th>Total Amount</th>
       
          <th>actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($orders as $order)
        <tr>
            <td></td>
            <td>{{$order->order_id}}</td>
            <td>{{$order->created_at}}</td>
            <td>{{$order->user->email}}</td>
            <td>{{$order->total_price}} $</td>
            <td>{{ $order->status == 0 ? 'Pending' : ($order->status == 1 ? 'In Production' : 'Processing') }}</td>
            <td>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Actions
                    </button>
                    <ul class="dropdown-menu">
                        @if ($order->status == 0)
                        <li>
                            <a href="javascript:void(0);" class="dropdown-item" onclick="updateStatus({{ $order->id }}, 1)">Mark as In Production</a>
                        </li>
                        @elseif ($order->status == 1)
                        <li>
                            <a href="javascript:void(0);" class="dropdown-item" onclick="updateStatus({{ $order->id }}, 0)">Mark as Processing</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
    
    </table>
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

.custom-dropdown-content a {
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
        const url = "{{ route('admin.orders.updateStatus', ':id') }}".replace(':id', orderId);
        
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
