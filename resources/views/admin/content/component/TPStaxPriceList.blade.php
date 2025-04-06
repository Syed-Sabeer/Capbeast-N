@extends('admin.layouts.layoutMaster')

@section('title', 'Tax Pricing Modification')

@section('content')

<div class="d-flex align-items-center justify-content-between py-3 mb-4">
    <h4 class="mb-0">
        <span class="text-muted fw-light">eCommerce /</span> TPS Tax Pricing Modification
    </h4>
    @if(!$taxPercentage)
    <a href="{{ route($prefix.'.TPStax_price.create') }}" class="btn btn-primary">Add Tax</a>
    
    @endif
    
</div>

<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">TPS Tax Percentage</h5>
    </div>
    <div class="card-datatable table-responsive">
        <table class="table ">
            <thead class="border-top">
                <tr>
                    <th >Tax No</th>
                    <th >Tax Percentage</th>
                    <th >Actions</th>
                </tr>
            </thead>
            <tbody>
                @if($taxPercentage)
                <tr>
                    <td>{{ $taxPercentage->taxno }}</td>
                    <td>{{ $taxPercentage->percentage }}%</td>
                    <td>
                        <a href="{{ route($prefix .'.TPStax_price.edit', $taxPercentage->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route($prefix .'.TPStax_price.destroy', $taxPercentage->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
              
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
