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


<div class="d-flex align-items-center justify-content-between py-3 mb-4">
  <h4 class="mb-0">
      <span class="text-muted fw-light">eCommerce /</span> Category List
  </h4>
  <a href="{{ route($prefix.'.category.add') }}" class="btn btn-primary">Add Category</a>
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
        @foreach($categories as $key => $category)
        <tr>
          <td>{{ $key + 1 }}</td>
          <td>{{ $category->title }}</td>
          <td>{{ Str::limit($category->description, 30, '...') }}</td>
          <td>
            @if($category->image)
              <img src="{{ asset('storage/' . $category->image) }}" alt="Category Image" width="50">
            @else
              No Image
            @endif
          </td>
          <td>
            <div class="w-25 d-flex justify-content-end">
                <label class="switch switch-primary switch-sm me-4 pe-2">
                    <input type="checkbox" class="switch-input" data-id="{{ $category->id }}" {{ $category->visibility == 1 ? 'checked' : '' }}>
                    <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                    </span>
                </label>
            </div>
        </td>

          <td>
            <a href="{{ route($prefix.'.category.edit', $category->id) }}" class="btn btn-sm btn-warning">Edit</a>
            <a href="{{ route($prefix.'.category.delete', $category->id) }}" class="btn btn-sm btn-danger delete_confirm">Delete</a>
            {{-- <button type="button" class="btn btn-sm btn-danger delete-btn"
            data-url="{{ route($prefix.'.category.delete', $category->id) }}"
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
    <x-pagination :paginator="$categories" />
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
            const route = "{{ route($prefix . '.category.update.visibility', ':id') }}".replace(':id', id);

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
