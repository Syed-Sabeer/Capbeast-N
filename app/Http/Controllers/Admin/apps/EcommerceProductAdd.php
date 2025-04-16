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
    // dd($request);
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
        'size' => 'nullable|array',
      ]);

      $slug = $request->slug ? Str::slug($request->slug) : Str::slug($request->title);
      $sizeArray = $request->input('size'); // already an array
      $sizeJson = json_encode($sizeArray);  // convert to JSON format
      // Create the product
      $product = Product::create([
        'brand_id' => $request->brand_id,
        'mlb_id' => $request->mlb_id,
        'title' => $request->title,
        'slug' => $slug,
        'description' => $request->description,
        'cost_price' => $request->cost_price,
        'selling_price' => $request->selling_price,
        'visibility' => $request->visibility ?? 1,
        'size' => $sizeJson,
        'size_unit' => $request->size_unit,
        'weight_unit' => $request->weight_unit,
        'height' => $request->height,
        'width' => $request->width,
        'length' => $request->length,
        'weight' => $request->weight,
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

        // Get checkbox values for this color entry
        $isFront = isset($request->is_front[$index]) && $request->is_front[$index] === 'on' ? '1' : '0';
        $isBack = isset($request->is_back[$index]) && $request->is_back[$index] === 'on' ? '1' : '0';
        $isRight = isset($request->is_right[$index]) && $request->is_right[$index] === 'on' ? '1' : '0';
        $isLeft = isset($request->is_left[$index]) && $request->is_left[$index] === 'on' ? '1' : '0';

        Log::info("Image paths", compact('frontImagePath', 'backImagePath', 'rightImagePath', 'leftImagePath'));
        // Log::info("Request", $request->all());
        // Log::info("Image allowance", ["front" => $isFront, "back" => $isBack, "right" => $isRight, "left" => $isLeft]);

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
            // Add checkbox values
            'is_front' => $isFront,
            'is_back' => $isBack,
            'is_right' => $isRight,
            'is_left' => $isLeft,
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
