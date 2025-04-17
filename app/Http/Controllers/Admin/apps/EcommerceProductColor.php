<?php

namespace App\Http\Controllers\Admin\apps;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductColor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EcommerceProductColor extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index($id)
  {
    try {
      $product = Product::findOrFail($id);
      $productColors = ProductColor::where('product_id', $product->id)->paginate(10);
      return view('admin.content.apps.product-color.index', compact('productColors', 'product'));
    } catch (\Throwable $th) {
      Log::error('Error Fetching Product Color' . $th->getMessage());
      return redirect()->back()->with('error', 'Error Fetching Product Color');
    }
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create($id)
  {
    // dd($id);
    try {
      $product = Product::findOrFail($id);
      return view('admin.content.apps.product-color.create', compact('product'));
    } catch (\Throwable $th) {
      Log::error('Error Creating Product Color' . $th->getMessage());
      return redirect()->back()->with('error', 'Error Fetching Product Color');
    }
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request, $id)
  {
    $validator = Validator::make($request->all(), [
      'colorname1' => 'required|string|max:255',
      'colorcode1' => 'required|string|max:255',
      'colorname2' => 'nullable|string|max:255',
      'colorcode2' => 'nullable|string|max:255',
      'frontimage' => 'nullable|image|mimes:jpeg,png,jpg,gif',
      'backimage' => 'nullable|image|mimes:jpeg,png,jpg,gif',
      'rightimage' => 'nullable|image|mimes:jpeg,png,jpg,gif',
      'leftimage' => 'nullable|image|mimes:jpeg,png,jpg,gif',
      'is_front' => 'sometimes|in:on',
      'is_back' => 'sometimes|in:on',
      'is_left' => 'sometimes|in:on',
      'is_right' => 'sometimes|in:on',
    ]);

    if ($validator->fails()) {
      return redirect()->back()
        ->withErrors($validator)
        ->withInput()
        ->with('error', 'Validation failed. Please check inputs.');
    }
    try {

      $product = Product::findOrFail($id);

      $productColor = new ProductColor();
      $productColor->product_id = $product->id;
      $productColor->color_name_1 = $request->colorname1;
      $productColor->color_code_1 = $request->colorcode1;
      $productColor->color_name_2 = $request->colorname2;
      $productColor->color_code_2 = $request->colorcode2;

      if ($request->hasFile('frontimage')) {
        $frontImagePath = $request->hasFile("frontimage") ? $request->file("frontimage")->store('ProductImages/FrontImage', 'public') : null;
      }
      if ($request->hasFile('backimage')) {
        $backImagePath = $request->hasFile("backimage") ? $request->file("backimage")->store('ProductImages/BackImage', 'public') : null;
      }
      if ($request->hasFile('rightimage')) {
        $rightImagePath = $request->hasFile("rightimage") ? $request->file("rightimage")->store('ProductImages/RightImage', 'public') : null;
      }
      if ($request->hasFile('leftimage')) {
        $leftImagePath = $request->hasFile("leftimage") ? $request->file("leftimage")->store('ProductImages/LeftImage', 'public') : null;
      }

      $productColor->front_image = $frontImagePath ?? null;
      $productColor->back_image = $backImagePath ?? null;
      $productColor->right_image = $rightImagePath ?? null;
      $productColor->left_image = $leftImagePath ?? null;

      $productColor->is_front = isset($request->is_front) && $request->is_front == 'on' ? '1' : '0';
      $productColor->is_back = isset($request->is_back) && $request->is_back == 'on' ? '1' : '0';
      $productColor->is_left = isset($request->is_left) && $request->is_left == 'on' ? '1' : '0';
      $productColor->is_right = isset($request->is_right) && $request->is_right == 'on' ? '1' : '0';

      $productColor->save();

      return redirect()->back()->with('success', 'Product Color created successfully');
    } catch (\Throwable $th) {
      Log::error('Error Storing Product Color' . $th->getMessage());
      return redirect()->back()->with('error', 'Error Creating Product Color');
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    try {
      $productColor = ProductColor::findOrFail($id);
      return view('admin.content.apps.product-color.edit', compact('productColor'));
    } catch (\Throwable $th) {
      Log::error('Error Editing Product Color' . $th->getMessage());
      return redirect()->back()->with('error', 'Error Fetching Product Color');
    }
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $validator = Validator::make($request->all(), [
      'colorname1' => 'required|string|max:255',
      'colorcode1' => 'required|string|max:255',
      'colorname2' => 'nullable|string|max:255',
      'colorcode2' => 'nullable|string|max:255',
      'frontimage' => 'nullable|image|mimes:jpeg,png,jpg,gif',
      'backimage' => 'nullable|image|mimes:jpeg,png,jpg,gif',
      'rightimage' => 'nullable|image|mimes:jpeg,png,jpg,gif',
      'leftimage' => 'nullable|image|mimes:jpeg,png,jpg,gif',
      'is_front' => 'sometimes|in:on',
      'is_back' => 'sometimes|in:on',
      'is_left' => 'sometimes|in:on',
      'is_right' => 'sometimes|in:on',
    ]);

    if ($validator->fails()) {
      return redirect()->back()
        ->withErrors($validator)
        ->withInput()
        ->with('error', 'Validation failed. Please check inputs.');
    }

    try {
      $productColor = ProductColor::findOrFail($id);
      $productColor->color_name_1 = $request->colorname1;
      $productColor->color_code_1 = $request->colorcode1;
      $productColor->color_name_2 = $request->colorname2;
      $productColor->color_code_2 = $request->colorcode2;

      if ($request->hasFile('frontimage')) {
        if ($productColor->front_image) {
          Storage::disk('public')->delete($productColor->front_image);
        }
        $productColor->front_image = $request->file('frontimage')->store('ProductImages/FrontImage', 'public');
      }

      if ($request->hasFile('backimage')) {
        if ($productColor->back_image) {
          Storage::disk('public')->delete($productColor->back_image);
        }
        $productColor->back_image = $request->file('backimage')->store('ProductImages/BackImage', 'public');
      }

      if ($request->hasFile('rightimage')) {
        if ($productColor->right_image) {
          Storage::disk('public')->delete($productColor->right_image);
        }
        $productColor->right_image = $request->file('rightimage')->store('ProductImages/RightImage', 'public');
      }

      if ($request->hasFile('leftimage')) {
        if ($productColor->left_image) {
          Storage::disk('public')->delete($productColor->left_image);
        }
        $productColor->left_image = $request->file('leftimage')->store('ProductImages/LeftImage', 'public');
      }

      $productColor->is_front = $request->filled('is_front') ? '1' : '0';
      $productColor->is_back = $request->filled('is_back') ? '1' : '0';
      $productColor->is_left = $request->filled('is_left') ? '1' : '0';
      $productColor->is_right = $request->filled('is_right') ? '1' : '0';

      $productColor->save();

      return redirect()->back()->with('success', 'Product Color updated successfully');
    } catch (\Throwable $th) {
      Log::error('Error Updating Product Color: ' . $th->getMessage());
      return redirect()->back()->with('error', 'Error Updating Product Color');
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    try {
      $productColor = ProductColor::findOrFail($id);

      // Delete images from storage if they exist
      if ($productColor->front_image) {
        Storage::disk('public')->delete($productColor->front_image);
      }
      if ($productColor->back_image) {
        Storage::disk('public')->delete($productColor->back_image);
      }
      if ($productColor->right_image) {
        Storage::disk('public')->delete($productColor->right_image);
      }
      if ($productColor->left_image) {
        Storage::disk('public')->delete($productColor->left_image);
      }

      // Delete the record
      $productColor->delete();

      return redirect()->back()->with('success', 'Product Color deleted successfully');
    } catch (\Throwable $th) {
      Log::error('Error Deleting Product Color: ' . $th->getMessage());
      return redirect()->back()->with('error', 'Error deleting Product Color');
    }
  }

  public function updateVisibility($id, Request $request)
  {

    $request->validate([
      'visibility' => 'required|boolean',
    ]);


    $product = ProductColor::findOrFail($id);
    $product->update(['visibility' => $request->visibility]);

    return response()->json(['success' => true]);
  }
}
