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
        @foreach ($abandoncart as $item)
     
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


</script>

@endsection
