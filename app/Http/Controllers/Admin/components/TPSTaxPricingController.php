<?php

namespace App\Http\Controllers\Admin\Components;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\TPSTaxPrice;

class TPSTaxPricingController extends Controller
{
    public function index()
    {
        $taxPercentage = TPSTaxPrice::first(); // Get the first record
        return view('admin.content.component.TPStaxPriceList', compact('taxPercentage'));
    }

    public function create()
    {
        return view('admin.content.component.TPStaxPriceAdd');
    }

    public function store(Request $request)
    {
        $request->validate([
            'taxpercentage' => 'required|numeric|min:0|max:100',
            'taxno' => 'required|numeric',
        ]);
    
        TPSTaxPrice::create([
            'percentage' => $request->taxpercentage,
            'taxno' => $request->taxno,
        ]);
    
        return redirect()->back()->with('success', 'Tax Percentage Added');
    }

    public function edit($id)
    {
        $taxPercentage = TPSTaxPrice::findOrFail($id);
        return view('admin.content.component.TPStaxPriceEdit', compact('taxPercentage'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'taxpercentage' => 'required|numeric|min:0|max:100',
            'taxno' => 'required|numeric',

        ]);
    
        $taxPercentage = TPSTaxPrice::findOrFail($id);
        $taxPercentage->update([
            'percentage' => $request->taxpercentage,
            'taxno' => $request->taxno,
        ]);
    
        return redirect()->back()->with('success', 'Tax Percentage Updated');
    }

    public function destroy($id)
{
    $taxPercentage = TPSTaxPrice::findOrFail($id);
    $taxPercentage->delete();

    return redirect()->back()->with('success', 'Tax Percentage Deleted');
}
}
