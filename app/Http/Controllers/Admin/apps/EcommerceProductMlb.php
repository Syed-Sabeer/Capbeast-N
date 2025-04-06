<?php

namespace App\Http\Controllers\Admin\Apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mlb;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EcommerceProductMlb extends Controller
{

  public function index()
  {
    $categories = Mlb::paginate(25);
    return view('admin.content.apps.app-ecommerce-mlb-list', compact('categories'));
  }

  public function create()
  {
    return view('admin.content.apps.app-ecommerce-mlb-add');
  }

  public function updateMlbVisibility($id, Request $request)
  {
    $request->validate([
      'visibility' => 'required|boolean',
    ]);

    $mlb = Mlb::findOrFail($id);
    $mlb->update(['visibility' => $request->visibility]);

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
      $imagePath = $request->file('image')->store('categories', 'public');
      $data['image'] = $imagePath;
      Log::info('Image stored', ['path' => $data['image']]);
    }


    try {
      $mlb = Mlb::create($data);
      Log::info('Mlb created successfully', ['mlb' => $mlb]);
    } catch (\Exception $e) {
      Log::error('Error inserting mlb', ['error' => $e->getMessage()]);
      return redirect()->back()->with('error', 'Failed to add mlb!');
    }

    return redirect()->route(app('authUser')->role . '.app-ecommerce-product-mlb')
      ->withSuccess('Mlb added successfully!');
  }



  public function edit(Mlb $mlb)
  {
    return view('admin.content.apps.app-ecommerce-mlb-edit', compact('mlb'));
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

      // Fetch mlb or throw an exception if not found
      $mlb = Mlb::findOrFail($id);

      // Update mlb fields
      $mlb->fill($data);

      // Handle image upload if present
      if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('categories', 'public');
        $mlb->image = $imagePath;
        Log::info('Mlb image updated', ['path' => $imagePath, 'mlb_id' => $id]);
      }

      $mlb->save();
      DB::commit(); // Commit transaction

      return redirect()->route(app('authUser')->role . '.app-ecommerce-product-mlb')
        ->with('success', 'Mlb updated successfully!');
    } catch (\Exception $e) {
      DB::rollBack(); // Rollback transaction on error
      Log::error('Mlb update failed', ['error' => $e->getMessage(), 'mlb_id' => $id]);
      return redirect()->back()->with('error', 'Failed to update mlb. Please try again.');
    }
  }

  public function destroy($id)
  {
    try {
      $mlb = Mlb::findOrFail($id);
      $products = $mlb->products()->get();
      if($products->count() > 0){
        return redirect()->back()->with('error', 'Mlb has products. Please delete products first.');
      }
      $mlb->delete();
      return redirect()->route(app('authUser')->role . '.app-ecommerce-product-mlb')->with('success', 'Mlb deleted successfully!');
    } catch (\Exception $e) {
      Log::error('Mlb delete failed', ['error' => $e->getMessage(), 'mlb_id' => $id]);
      return redirect()->back()->with('error', 'Failed to delete mlb. Please try again.');
    }
  }
}
