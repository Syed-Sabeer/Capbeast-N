<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\CustomizerPrice;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\TextColor;
use App\Models\UserCustomization;
use Auth;
use Illuminate\Http\Request;

class CustomizerController extends Controller
{
  public function index($id)
  {
    try {
      $userCustomization = UserCustomization::findOrFail($id);
      $textColors = TextColor::all();
      $customizerPrice = CustomizerPrice::firstOrFail();
      return view('main.pages.customizer', compact('userCustomization', 'textColors', 'customizerPrice'));
    } catch (\Throwable $th) {
      //throw $th;
      return response()->json(['error' => $th->getMessage()], 500);
    }
  }

  public function add(Request $request)
  {
    try {
      // Validate the request
      $request->validate([
        'productId' => 'required|exists:products,id',
        'colorId' => 'required|exists:product_color,id',
      ]);

      // Retrieve the product and product color
      $product = Product::findOrFail($request->productId);
      $productColor = ProductColor::findOrFail($request->colorId);

      // Check if a customization already exists for this user and color
      $userCustomization = UserCustomization::where('user_id', auth()->id())
        ->where('product_color_id', $request->colorId)
        ->first();

      // If no customization exists, create a new one
      if (!$userCustomization) {
        $userCustomization = new UserCustomization();
        $userCustomization->user_id = auth()->id();
        $userCustomization->product_color_id = $request->colorId;
        $userCustomization->product_id = $product->id;

        // Image fields from product_color table
        $imageFields = ['front_image', 'back_image', 'left_image', 'right_image'];
        foreach ($imageFields as $imageField) {
          // Check if the productColor has an image path for the current field
          if ($productColor->$imageField) {
            // Get the full path to the current image (storage path)
            $currentImagePath = public_path('storage/' . $productColor->$imageField);

            // If the image exists, copy it to the 'customizations' folder
            if (file_exists($currentImagePath)) {
              $newImageName = time() . '_' . basename($productColor->$imageField);
              $customizationDirectory = public_path('storage/customizations');

              // Ensure the customizations directory exists
              if (!is_dir($customizationDirectory)) {
                mkdir($customizationDirectory, 0755, true);
              }

              // Copy the file to the customizations folder
              copy($currentImagePath, $customizationDirectory . '/' . $newImageName);

              // Save the new path to the user_customizations table
              $userCustomization->$imageField = 'storage/customizations/' . $newImageName;
            } else {
              throw new \Exception("Image file does not exist at the specified path: " . $currentImagePath);
            }
          }
        }

        // Save the IP address
        $userCustomization->ipaddress = $request->ip();

        // Save the user customization record
        $userCustomization->save();
      }

      return response()->json([
        'message' => 'Customizer settings updated successfully',
        'success' => true,
        'data' => $userCustomization,
        'redirect_url' => route('customizer.index', $userCustomization->id),
      ], 200);
    } catch (\Illuminate\Validation\ValidationException $e) {
      // Handle validation exceptions
      return response()->json([
        'message' => 'Validation failed',
        'success' => false,
        'errors' => $e->errors(),
      ], 422);
    } catch (\Exception $e) {
      // Handle any other exceptions
      return response()->json([
        'message' => 'An error occurred while processing your request',
        'success' => false,
        'error' => $e->getMessage(),
      ], 500);
    }
  }
}
