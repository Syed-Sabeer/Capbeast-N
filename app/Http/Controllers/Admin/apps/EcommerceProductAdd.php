<?php

namespace App\Http\Controllers\Admin\Apps;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductSEO;
use App\Models\ProductColor;
use Illuminate\Support\Str;
use App\Models\ProductCategory;
use App\Models\ProductVolumeDiscount;
use App\Models\Brand;
use App\Models\Mlb;
use App\Models\Category;
use Illuminate\Support\Facades\Log;

class EcommerceProductAdd extends Controller
{
  public function index()
  {

    $categories = Category::all();
    $brands = Brand::all();
    $mlbs = Mlb::all();

    return view('admin.content.apps.app-ecommerce-product-add', compact('categories', 'mlbs', 'brands'));
  }

  public function store(Request $request)
  {
    try {
      DB::beginTransaction();

      // Log the incoming request data
      Log::info('Incoming request data:', $request->all());

      $request->validate([
        'title' => 'required|string|max:255',
        'metatitle' => 'nullable|string',
        'metadescription' => 'nullable|string',
        'metakeywords' => 'nullable|string',
        'slug' => 'nullable|string|unique:products,slug|max:255',
        'description' => 'required|string',
        'base_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        'color.*' => 'required|string',
        'images.*.*' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        'front_image.*.*' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        'back_image.*.*' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        'right_image.*.*' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        'left_image.*.*' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        'quantity.*' => 'nullable|integer',
        'discount.*' => 'nullable|numeric',
      ]);

      $slug = $request->slug ? Str::slug($request->slug) : Str::slug($request->title);

      // Create the product
      $product = Product::create([
        'brand_id' => $request->brand_id,
        'mlb_id' => $request->mlb_id,
        'title' => $request->title,
        'slug' => $slug,
        'description' => $request->description,
        'cost_price' => $request->cost_price,
        'selling_price' => $request->selling_price,
        'visibility' => $request->visibility,
      ]);

      // Check if category_ids exists and is an array before looping
      if (!empty($request->category_ids) && is_array($request->category_ids)) {
        foreach ($request->category_ids as $category_id) {
          ProductCategory::create([
            'product_id' => $product->id,
            'category_id' => $category_id,
          ]);
        }
      }

      ProductSEO::create([
        'product_id' => $product->id,
        'metatitle' => $request->metatitle,
        'metadescription' => $request->metadescription,
        'metakeywords' => $request->metakeywords,
      ]);

      // Process and store images
      $colorNames = $request->input('colorname1', []);
      $colorCodes = $request->input('colorcode1', []);
      $colorNames2 = $request->input('colorname2', []);
      $colorCodes2 = $request->input('colorcode2', []);

      // Ensure all arrays have the same length
      $maxLength = max(
        count($colorNames),
        count($colorCodes),
        count($colorNames2),
        count($colorCodes2)
      );

      for ($index = 0; $index < $maxLength; $index++) {
        $colorName1 = $colorNames[$index] ?? null;
        $colorCode1 = $colorCodes[$index] ?? null;
        $colorName2 = $colorNames2[$index] ?? null;
        $colorCode2 = $colorCodes2[$index] ?? null;

        Log::info("Processing color entry", compact('index', 'colorName1', 'colorCode1', 'colorName2', 'colorCode2'));

        // Ensure each file input is correctly retrieved
        $frontImagePath = $request->hasFile("frontimage.$index") ? $request->file("frontimage")[$index]->store('ProductImages/FrontImage', 'public') : null;
        $backImagePath = $request->hasFile("backimage.$index") ? $request->file("backimage")[$index]->store('ProductImages/BackImage', 'public') : null;
        $rightImagePath = $request->hasFile("rightimage.$index") ? $request->file("rightimage")[$index]->store('ProductImages/RightImage', 'public') : null;
        $leftImagePath = $request->hasFile("leftimage.$index") ? $request->file("leftimage")[$index]->store('ProductImages/LeftImage', 'public') : null;

        Log::info("Image paths", compact('frontImagePath', 'backImagePath', 'rightImagePath', 'leftImagePath'));

        // Create the product color entry if any image or color exists
        if ($colorName1 || $colorName2 || $frontImagePath || $backImagePath || $rightImagePath || $leftImagePath) {
          $productColor = ProductColor::create([
            'product_id' => $product->id,
            'color_name_1' => $colorName1,
            'color_code_1' => $colorCode1,
            'color_name_2' => $colorName2,
            'color_code_2' => $colorCode2,
            'front_image' => $frontImagePath,
            'back_image' => $backImagePath,
            'right_image' => $rightImagePath,
            'left_image' => $leftImagePath,
          ]);

          if ($productColor) {
            Log::info("Product color entry created successfully", ['product_color_id' => $productColor->id]);
          } else {
            Log::error("Failed to create product color entry", ['product_id' => $product->id]);
          }
        } else {
          Log::warning("Skipping color entry due to missing data", ['index' => $index]);
        }
      }

      // Save product pricing in separate rows
      if ($request->has('quantity')) {
        foreach ($request->quantity as $key => $qty) {
          if (!empty($qty)) { // Skip empty entries
            ProductVolumeDiscount::create([
              'product_id' => $product->id,
              'quantity' => $qty,
              'discount' => $request->discount[$key] ?? 0, // Default discount to 0 if missing
            ]);
          }
        }
      }

      DB::commit();
      return redirect()->back()->with('success', 'Product added successfully!');
    } catch (\Exception $e) {
      DB::rollBack();
      Log::error('Error occurred while adding product:', ['error' => $e->getMessage()]);
      return redirect()->back()->with('error', 'Failed to add product. Please try again.');
    }
  }
}
