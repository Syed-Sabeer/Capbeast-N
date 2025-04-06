@extends('admin.layouts/layoutMaster')
@section('title', 'eCommerce Customer All - Apps')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/app-ecommerce-customer-all.js')}}"></script>
@endsection

@section('content')
<h4 class="py-3 mb-2">
  <span class="text-muted fw-light">eCommerce /</span> All Customers
</h4>


<!-- customers List Table -->
<div class="card">

  <div class="card-datatable table-responsive">
    <table class=" table border-top">
      <thead>
        <tr>
          <th></th>
          <th>Name</th>
          <th>Email</th>
          <th>Country</th>
          
          
          <th>Status</th>
          <th>Actions</th>
          
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
        <tr>
          <td></td>
          <td>{{ $user->first_name ?? 'Unknown' }} {{ $user->last_name ?? 'Unknown' }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->country }}</td>
            <td>
              <div class="w-25 d-flex justify-content-end">
                  <label class="switch switch-primary switch-sm me-4 pe-2">
                      <input type="checkbox" class="switch-input" data-id="{{ $user->id }}" {{ $user->status == 1 ? 'checked' : '' }}>
                      <span class="switch-toggle-slider">
                          <span class="switch-on"></span>
                          <span class="switch-off"></span>
                      </span>
                  </label>
              </div>
          </td>
          <td>
            @if ($prefix == 'superadmin')
            <a href="{{ route($prefix.'.admin.customers.edit', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{ route($prefix.'.admin.customers.destroy', $user->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>

            @else
            <a href="{{ route($prefix.'.admin.customers.edit', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>
            @endif
            
        </td>
          
        </tr>
    @endforeach
    
      </tbody>
    </table>
    
  </div>

  <div class="d-flex justify-content-end mt-3 me-3">
    <x-pagination :paginator="$users" />
  </div>
  
  

</div>


<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.switch-input').forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            // Get the user ID and new status (1 for checked, 0 for unchecked)
            const userId = this.dataset.id;
            const status = this.checked ? 1 : 0;

            console.log('Sending update for User ID:', userId, 'Status:', status); // Debugging line

            // Send AJAX request to update user status
            fetch("{{ route($prefix .'.update.status', ':id') }}".replace(':id', userId), {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({
                    status: status
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log('Status updated successfully');
                } else {
                    console.error('Failed to update status');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });
});

</script>
@endsection
