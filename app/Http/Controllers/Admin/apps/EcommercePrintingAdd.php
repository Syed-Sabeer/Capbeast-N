<?php

namespace App\Http\Controllers\Admin\Apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductPrinting;
use Illuminate\Support\Facades\Log;

class EcommercePrintingAdd extends Controller
{
    public function index()
    {
        return view('admin.content.apps.app-ecommerce-printing-add');
    }

    public function store(Request $request)
{
    try {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'quantity.*' => 'required|numeric',  // changed to numeric to allow decimal values
            'is_leather' => 'required|integer',
            'price.*' => 'required|numeric',  // changed to numeric to allow decimal values
        ]);

        // Handle image upload
        $imagePath = $request->hasFile('image') ? $this->uploadFile($request->file('image')) : null;

        // Insert data using Eloquent's create method
        ProductPrinting::create([
            'title' => $request->input('title'),
            'image' => $imagePath,
            'quantity' => $request->input('quantity'),  // store as array directly
            'price' => $request->input('price'),  // store as array directly
            'created_at' => now(),
            'updated_at' => now(),
            'is_leather' => $request->is_leather,
        ]);

        return redirect()->back()->with('success', 'Product added successfully.');
    } catch (\Exception $e) {
        // Log the error for debugging purposes
        Log::error('Error inserting product:', ['error' => $e->getMessage()]);

        return redirect()->back()->with('error', 'Failed to add product. Please try again.');
    }
}


    private function uploadFile($file)
    {
        if ($file) {
            return $file->store('ProductPrintingImages', 'public');
        }
        return null;
    }
}
