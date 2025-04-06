@extends('admin.layouts/layoutMaster')

@section('title', 'eCommerce Tax Add - Apps')




@section('content')
<form method="POST" action="{{ route($prefix .'.TVQtax_price.store') }}">

    @csrf
    <div class="row">
      <div class="col-12 col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="mb-3">
                <label class="form-label">Tax No</label>
                <input type="number" name="taxno" class="form-control" 
                placeholder="Enter Tax No" 
                 required>
         
              </div>


            <div class="mb-3">
              <label class="form-label">Tax Percentage</label>
              <input type="number" name="taxpercentage" class="form-control" 
              placeholder="Enter Tax Percentage" 
              min="0" max="100" required>
       
            </div>


            
          </div>
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-success">Save Tax</button>
  </form>
  

@endsection
