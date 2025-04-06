<?php

namespace App\Http\Controllers\Admin\Apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EcommerceProductCategory extends Controller


{



  public function index()
  {
    $categories = Category::paginate(25);
    return view('admin.content.apps.app-ecommerce-category-list', compact('categories'));
  }

  public function create()
  {
    return view('admin.content.apps.app-ecommerce-category-add');
  }

  public function updateCategoryVisibility($id, Request $request)
  {
    $request->validate([
      'visibility' => 'required|boolean',
    ]);

    $category = Category::findOrFail($id);
    $category->update(['visibility' => $request->visibility]);

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
      $category = Category::create($data);
      Log::info('Category created successfully', ['category' => $category]);
    } catch (\Exception $e) {
      Log::error('Error inserting category', ['error' => $e->getMessage()]);
      return redirect()->back()->with('error', 'Failed to add category!');
    }

    return redirect()->route(app('authUser')->role . '.app-ecommerce-product-category')
      ->withSuccess('Category added successfully!');
  }



  public function edit(Category $category)
  {
    return view('admin.content.apps.app-ecommerce-category-edit', compact('category'));
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
      $category = Category::findOrFail($id);

      // Update category fields
      $category->fill($data);

      // Handle image upload if present
      if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('categories', 'public');
        $category->image = $imagePath;
        Log::info('Category image updated', ['path' => $imagePath, 'category_id' => $id]);
      }

      $category->save();
      DB::commit(); // Commit transaction

      return redirect()->route(app('authUser')->role . '.app-ecommerce-product-category')
        ->with('success', 'Category updated successfully!');
    } catch (\Exception $e) {
      DB::rollBack(); // Rollback transaction on error
      Log::error('Category update failed', ['error' => $e->getMessage(), 'category_id' => $id]);
      return redirect()->back()->with('error', 'Failed to update category. Please try again.');
    }
  }

  public function destroy($id)
  {
    try {
      $category = Category::findOrFail($id);
      $products = $category->products()->get();
      if($products->count() > 0){
        return redirect()->back()->with('error', 'Category has products. Please delete products first.');
      }
      $category->delete();
      return redirect()->route(app('authUser')->role . '.app-ecommerce-product-category')->with('success', 'Category deleted successfully!');
    } catch (\Exception $e) {
      Log::error('Category delete failed', ['error' => $e->getMessage(), 'category_id' => $id]);
      return redirect()->back()->with('error', 'Failed to delete category. Please try again.');
    }
  }
}
