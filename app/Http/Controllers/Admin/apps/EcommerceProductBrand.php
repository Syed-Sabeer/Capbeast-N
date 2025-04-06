<?php

namespace App\Http\Controllers\Admin\Apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use DB;
use Illuminate\Support\Facades\Log;

class EcommerceProductBrand extends Controller
{
  public function index()
  {
    $brands = Brand::paginate(25);
    return view('admin.content.apps.app-ecommerce-brand-list', compact('brands'));
  }

  public function create()
  {
    return view('admin.content.apps.app-ecommerce-brand-add');
  }

  public function updateBrandVisibility($id, Request $request)
  {
    $request->validate([
      'visibility' => 'required|boolean',
    ]);

    $brand = Brand::findOrFail($id);
    $brand->update(['visibility' => $request->visibility]);

    return response()->json(['success' => true]);
  }

  public function store(Request $request)
  {
    Log::info('Store method called', ['request_data' => $request->all()]);

    try {
      $data = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        'visibility' => 'nullable|integer'
      ]);
    } catch (\Illuminate\Validation\ValidationException $e) {
      Log::error('Validation failed', ['errors' => $e->errors()]);
      return redirect()->back()->withErrors($e->errors())->withInput();
    }

    if ($request->hasFile('image')) {
      $imagePath = $request->file('image')->store('brands', 'public');
      $data['image'] = $imagePath;
      Log::info('Image stored', ['path' => $data['image']]);
    }

    try {
      $brands = Brand::create($data);
      Log::info('Brand created successfully', ['brand' => $brands]);
    } catch (\Exception $e) {
      Log::error('Error inserting brand', ['error' => $e->getMessage()]);
      return redirect()->back()->with('error', 'Failed to add brand!');
    }

    return redirect()->route(app('authUser')->role . '.app-ecommerce-product-brand')->withSuccess('Brand added successfully!');
  }



  public function edit($id)
  {
    $brand = Brand::findOrFail($id);
    return view('admin.content.apps.app-ecommerce-brand-edit', compact('brand'));
  }

  public function update(Request $request, $id)
  {
    try {
      // Validate request data
      $data = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
      ]);

      DB::beginTransaction(); // Start a transaction

      // Fetch category or throw an exception if not found
      $brand = Brand::findOrFail($id);

      // Update category fields
      $brand->fill($data);

      // Handle image upload if present
      if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('categories', 'public');
        $brand->image = $imagePath;
        Log::info('brand image updated', ['path' => $imagePath, 'brand_id' => $id]);
      }

      $brand->save();
      DB::commit(); // Commit transaction

      return redirect()->route(app('authUser')->role . '.app-ecommerce-product-brand')
        ->with('success', 'Brand updated successfully!');
    } catch (\Exception $e) {
      DB::rollBack(); // Rollback transaction on error
      Log::error('Brand update failed', ['error' => $e->getMessage(), 'brand_id' => $id]);
      return redirect()->back()->with('error', 'Failed to update brand. Please try again.');
    }
  }

  public function destroy($id)
  {
    try {
      $brand = Brand::findOrFail($id);
      $products = $brand->products()->get();
      if($products->count() > 0){
        return redirect()->back()->with('error', 'Brand has products. Please delete products first.');
      }
      $brand->delete();
      return redirect()->route(app('authUser')->role . '.app-ecommerce-product-brand')->with('success', 'Brand deleted successfully!');
    } catch (\Exception $e) {
      Log::error('Category delete failed', ['error' => $e->getMessage(), 'brand_id' => $id]);
      return redirect()->back()->with('error', 'Failed to delete brand. Please try again.');
    }
  }
}
