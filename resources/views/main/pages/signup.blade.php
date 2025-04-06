@extends('main.layouts.master')


@section('main-container')
<section class="auth-page-wrapper position-relative bg-light min-vh-100 d-flex align-items-center justify-content-between" >
    <div class="w-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="auth-card mx-lg-3">
                        <div class="card border-0 mb-0">
                            <div class="card-header bg-primary border-0">
                                <div class="row">
                                    <div class="col-lg-4 col-3">
                                      <a href="{{ route('home') }}">  <img src="{{ asset('assetsCommon/images/logo-light.png') }}" alt="" class="img-fluid mt-4"></a>
                                    </div>
                                    <div class="col-lg-8 col-9">
                                        <h2 class="text-white text-capitalize lh-base fw-lighter">Let's get started with CapBeast</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="text-muted fs-15">Signup Your CapBeast account now</p>
                                <div class="p-2">
                                    <form class="needs-validation" novalidate method="POST" action="{{ route('user.register.post') }}">
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="userfirstname" class="form-label">First Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="userfirstname" name="firstname" value="{{ old('firstname') }}" required>
                                                @error('firstname')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="userlastname" class="form-label">Last Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="userlastname" name="lastname" value="{{ old('lastname') }}" required>
                                                @error('lastname')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                        
                                        <div class="mb-3 col-md-6">
                                            <label for="contactnumber" class="form-label">Contact Number <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="contactnumber" name="contact_number" value="{{ old('contact_number') }}" required>
                                            @error('contact_number')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="mb-3 col-md-6">
                                            <label for="country" class="form-label">Country <span class="text-danger">*</span></label>
                                            <select class="form-control" id="country" name="country" required>
                                                <option value="" disabled selected>Select Country</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country }}">{{ $country }}</option>
                                                @endforeach
                                            </select>
                                            
                                            @error('country')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>           

                                        <div class="mb-3">
                                            <label for="useremail" class="form-label">Email <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" id="useremail" name="email" value="{{ old('email') }}" required>
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                      
                                        <div class="mb-3">
                                            <label class="form-label" for="password-input">Password</label>
                                            <input type="password" class="form-control" name="password" required>
                                            @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="confirm-password-input">Confirm Password</label>
                                            <input type="password" class="form-control" name="password_confirmation" required>
                                        </div>
                                        <div class="mt-4">
                                            <button class="btn btn-primary w-100" type="submit">Sign Up</button>
                                        </div>
                                    </form>
                                    
                                </div>
                                <div class="mt-4 text-center">
                                    <p class="mb-0">Already have an account? <a href="{{ route('user.login') }}" class="fw-semibold text-primary text-decoration-underline"> Signin </a> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </div>
</section>
@endsection
