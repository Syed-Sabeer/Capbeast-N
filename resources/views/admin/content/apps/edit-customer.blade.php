
@extends('admin.layouts.layoutMaster')
@section('title', 'Edit Customer')
@section('vendor-style')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}">
@endsection

@section('vendor-script')

    
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    
@endsection

@section('page-script')
<script>
    $(document).ready(function() {
        $('#select2Customer').select2({
            placeholder: 'Select Country',
            width: '100%' // ensure full width styling
        });
    });
</script>
@endsection

@section('content')


<h4 class="py-3 mb-2">Edit Customer</h4>
<div class="card">
    <div class="card-body">
        <form action="{{ route($prefix.'.admin.customers.update', $user->id) }}" method="POST">
            @csrf

            
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}" required>
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" name="last_name" class="form-control" value="{{ $user->last_name }}" required>
            </div>
           
            <div class="mb-3">
                <label for="contact_number" class="form-label">Contact Number</label>
                <input type="text" name="contact_number" class="form-control" value="{{ $user->contact_number }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password (Leave blank to keep unchanged)</label>
                <input type="password" name="password" class="form-control">
            </div>
            
            <div class="mb-3">
                <label for="country" class="form-label">Country <span class="text-danger">*</span></label>
                <select class="form-control select2Customer" id="select2Customer" name="country" required>
                    @foreach ($countries as $country)
                        <option value="{{ $country }}" {{ $user->country === $country ? 'selected' : '' }}>
                            {{ $country }}
                        </option>
                    @endforeach
                </select>
                @error('country')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            {{-- <div class="mb-3">
                <label for="country" class="form-label">Country</label>
                <input type="text" name="country" class="form-control" value="" required>
            </div> --}}
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
