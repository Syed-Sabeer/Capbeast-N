<?php

namespace App\Http\Controllers\Admin\Components;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\TVQTaxPrice;

class TVQTaxPricingController extends Controller
{
    public function index()
    {
        $taxPercentage = TVQTaxPrice::first(); // Get the first record
        return view('admin.content.component.TVQtaxPriceList', compact('taxPercentage'));
    }

    public function create()
    {
        return view('admin.content.component.TVQtaxPriceAdd');
    }

    public function store(Request $request)
    {
        $request->validate([
            'taxpercentage' => 'required|numeric|min:0|max:100',
            'taxno' => 'required|numeric',
        ]);
    
        TVQTaxPrice::create([
            'percentage' => $request->taxpercentage,
            'taxno' => $request->taxno,
        ]);
    
        return redirect()->back()->with('success', 'Tax Percentage Added');
    }

    public function edit($id)
    {
        $taxPercentage = TVQTaxPrice::findOrFail($id);
        return view('admin.content.component.TVQtaxPriceEdit', compact('taxPercentage'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'taxpercentage' => 'required|numeric|min:0|max:100',
            'taxno' => 'required|numeric',
        ]);
    
        $taxPercentage = TVQTaxPrice::findOrFail($id);
        $taxPercentage->update([
            'percentage' => $request->taxpercentage,
            'taxno' => $request->taxno,
        ]);
    
        return redirect()->back()->with('success', 'Tax Percentage Updated');
    }

    public function destroy($id)
{
    $taxPercentage = TVQTaxPrice::findOrFail($id);
    $taxPercentage->delete();

    return redirect()->back()->with('success', 'Tax Percentage Deleted');
}

}
