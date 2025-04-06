<?php

namespace App\Http\Controllers\Admin\Apps;

use App\Http\Controllers\Controller;
use App\Models\ProductDelivery;
use Illuminate\Http\Request;

class EcommerceDeliveryAdd extends Controller
{
    public function index()
    {
        return view('admin.content.apps.app-ecommerce-delivery-add');
    }

    public function store(Request $request)
    {
        try {
          
            $request->validate([
                'quantity.*' => 'required|integer',
                'pricing.*' => 'required|numeric',
            ]);

          
            ProductDelivery::create([
                
                'quantity' => json_encode($request->input('quantity')), 
                'pricing' => json_encode($request->input('pricing')),
            ]);

            return redirect()->back()->with('success', 'Product delivery added successfully.');
        } catch (\Exception $e) {
            
            return redirect()->back()->with('error', 'Failed to add product delivery. Please try again.');
        }
    }
}