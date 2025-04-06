@extends('admin.layouts/layoutMaster')

@section('title', 'eCommerce Product List - Apps')

@section('vendor-style')

<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>

<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/modal-delete.js')}}"></script>
<script src="{{asset('assets/js/app-ecommerce-product-list.js')}}"></script>
@endsection

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">eCommerce /</span> Product List
</h4>

<!-- Product List Widget -->

<div class="card mb-4">
  <div class="card-widget-separator-wrapper">
    <div class="card-body card-widget-separator">
      <div class="row gy-4 gy-sm-1">
        <div class="col-sm-6 col-lg-3">
          <div class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
            <div>
              <h6 class="mb-2">In-store Sales</h6>
              <h4 class="mb-2">$5,345.43</h4>
              <p class="mb-0"><span class="text-muted me-2">5k orders</span><span class="badge bg-label-success">+5.7%</span></p>
            </div>
            <span class="avatar me-sm-4">
              <span class="avatar-initial bg-label-secondary rounded"><i class="ti-md ti ti-smart-home text-body"></i></span>
            </span>
          </div>
          <hr class="d-none d-sm-block d-lg-none me-4">
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-3 pb-sm-0">
            <div>
              <h6 class="mb-2">Website Sales</h6>
              <h4 class="mb-2">$674,347.12</h4>
              <p class="mb-0"><span class="text-muted me-2">21k orders</span><span class="badge bg-label-success">+12.4%</span></p>
            </div>
            <span class="avatar p-2 me-lg-4">
              <span class="avatar-initial bg-label-secondary rounded"><i class="ti-md ti ti-device-laptop text-body"></i></span>
            </span>
          </div>
          <hr class="d-none d-sm-block d-lg-none">
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="d-flex justify-content-between align-items-start border-end pb-3 pb-sm-0 card-widget-3">
            <div>
              <h6 class="mb-2">Discount</h6>
              <h4 class="mb-2">$14,235.12</h4>
              <p class="mb-0 text-muted">6k orders</p>
            </div>
            <span class="avatar p-2 me-sm-4">
              <span class="avatar-initial bg-label-secondary rounded"><i class="ti-md ti ti-gift text-body"></i></span>
            </span>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="d-flex justify-content-between align-items-start">
            <div>
              <h6 class="mb-2">Affiliate</h6>
              <h4 class="mb-2">$8,345.23</h4>
              <p class="mb-0"><span class="text-muted me-2">150 orders</span><span class="badge bg-label-danger">-3.5%</span></p>
            </div>
            <span class="avatar p-2">
              <span class="avatar-initial bg-label-secondary rounded"><i class="ti-md ti ti-wallet text-body"></i></span>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="d-flex justify-content-end mb-4">
  <a href="{{ route($prefix.'.brand.add') }}" class="btn btn-primary">Add Brand</a>
</div>

<div class="card">
  <div class="table-responsive">
    <table class="table">
      <thead class="border-top">
        <tr>
          <th>#</th>
          <th>Title</th>
          <th>Description</th>
          <th>Image</th>
          <th>Visibility</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($brands as $key => $brand)
        <tr>
          <td>{{ $key + 1 }}</td>
          <td>{{ $brand->title }}</td>
          <td>{{ Str::limit($brand->description, 30, '...') }}</td>

          <td>
            @if($brand->image)
              <img src="{{ asset('storage/' . $brand->image) }}" alt="Brand Image" width="50">
            @else
              No Image
            @endif
          </td>
          <td>
            <div class="w-25 d-flex justify-content-end">
                <label class="switch switch-primary switch-sm me-4 pe-2">
                    <input type="checkbox" class="switch-input" data-id="{{ $brand->id }}" {{ $brand->visibility == 1 ? 'checked' : '' }}>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                </label>
            </div>
        </td>
          <td>
            <a href="{{ route($prefix.'.brand.edit', $brand->id) }}" class="btn btn-sm btn-warning">Edit</a>
            <a href="{{ route($prefix.'.brand.delete', $brand->id) }}" class="btn btn-sm btn-danger delete_confirm">Delete</a>
            {{-- <button type="button" class="btn btn-sm btn-danger delete-btn"
                    data-url="{{ route($prefix.'.brand.delete', $brand->id) }}"
                    data-bs-toggle="modal"
                    data-bs-target="#deleteModal">
                Delete
            </button> --}}

        </td>

        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="d-flex justify-content-end mt-3 me-3">
    <x-pagination :paginator="$brands" />
  </div>

</div>



<script>
  document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".delete-btn").forEach(button => {
        button.addEventListener("click", function () {
            let deleteForm = document.getElementById("deleteForm");
            let deleteUrl = this.getAttribute("data-url"); // Get URL from button
            deleteForm.setAttribute("action", deleteUrl);
        });
    });
});

</script>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".switch-input").forEach(function (checkbox) {
        checkbox.addEventListener("change", function () {
            const id = this.dataset.id;
            const visibility = this.checked ? 1 : 0;

            // Ensure the correct route is used
            const route = "{{ route($prefix . '.brand.update.visibility', ':id') }}".replace(':id', id);

            fetch(route, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                },
                body: JSON.stringify({ visibility }),
            })
                .then(response => response.json()) // Ensure the response is JSON
                .then(data => {
                    if (data.success) {
                        console.log("Visibility updated successfully");
                    } else {
                        console.error("Failed to update visibility");
                    }
                })
                .catch(error => console.error("Error:", error));
        });
    });
});

</script>

@endsection
