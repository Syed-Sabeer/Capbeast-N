
@extends('admin.layouts.layoutMaster')
@section('title', 'Edit Customer')
@section('content')
<h4 class="py-3 mb-2">Edit Customer</h4>
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.customers.update', $user->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}" required>
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" name="last_name" class="form-control" value="{{ $user->last_name }}" required>
            </div>
            <div class="mb-3">
                <label for="language" class="form-label">Language</label>
                <input type="text" name="language" class="form-control" value="{{ $user->language }}" required>
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
                <label for="neq_number" class="form-label">NEQ Number</label>
                <input type="text" name="neq_number" class="form-control" value="{{ $user->neq_number }}" required>
            </div>
            <div class="mb-3">
                <label for="is_reseller" class="form-label">Reseller</label>
                <select name="is_reseller" class="form-select">
                    <option value="0" {{ $user->is_reseller == 0 ? 'selected' : '' }}>No</option>
                    <option value="1" {{ $user->is_reseller == 1 ? 'selected' : '' }}>Yes</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>Inactive</option>
                    <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Active</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="country" class="form-label">Country</label>
                <input type="text" name="country" class="form-control" value="{{ $user->country }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
