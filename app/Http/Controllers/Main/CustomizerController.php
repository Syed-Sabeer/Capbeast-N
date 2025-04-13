<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CustomizerDesign;
use App\Models\CustomizerPrice;
use App\Models\CustomizerUpload;
use App\Models\DesignCategory;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\TextColor;
use App\Models\UserCustomization;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CustomizerController extends Controller
{
  public function index($id)
  {
    try {
      $userCustomization = UserCustomization::findOrFail($id);
      if ($userCustomization->cart_id != null) {
        return redirect()->route('cart')->with('error', 'This Customization is already added cart.');
      }
      $productColor = ProductColor::findOrfail($userCustomization->product_color_id);
      $product = Product::findOrFail($userCustomization->product_id);
      $textColors = TextColor::all();
      $customizerPrice = CustomizerPrice::firstOrFail();
      $designCategories = DesignCategory::all();
      // $customizerDesigns = CustomizerDesign::paginate(6);
      $query = CustomizerDesign::query()->where('status', '1');

      if (request()->has('search')) {
        $searchTerm = request()->input('search');
        $query->where('name', 'like', '%' . $searchTerm . '%');
      }

      $customizerDesigns = $query->paginate(6)->withQueryString();
      if (request()->ajax()) {
        return view('main.pages.customizer.designs', compact('customizerDesigns'))->render();
      }
      return view('main.pages.customizer.customizer', compact('userCustomization', 'textColors', 'customizerPrice', 'customizerDesigns', 'productColor', 'product'));
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
        'userId' => 'required|exists:users,id',
        'quantity' => 'required|integer|min:1',
        'size' => 'nullable|string',
      ]);

      // Retrieve the product and product color
      $product = Product::findOrFail($request->productId);
      $productColor = ProductColor::findOrFail($request->colorId);

      // Check if a customization already exists for this user and color
      $userCustomization = UserCustomization::where('user_id', auth()->id())
        ->where('product_color_id', $request->colorId)
        ->where('cart_id', null)
        ->whereDoesntHave('orderItem') // This ensures it has not been used in an order
        ->first();

      // If no customization exists, create a new one
      if (!$userCustomization) {
        $userCustomization = new UserCustomization();
        $userCustomization->user_id = auth()->id();
        $userCustomization->product_color_id = $request->colorId;
        $userCustomization->product_id = $product->id;
        $userCustomization->quantity = $request->quantity;
        $userCustomization->size = $request->size;

        // Image fields from product_color table
        // $imageFields = ['front_image', 'back_image', 'left_image', 'right_image'];
        // foreach ($imageFields as $imageField) {
        //   // Check if the productColor has an image path for the current field
        //   if ($productColor->$imageField) {
        //     // Get the full path to the current image (storage path)
        //     $currentImagePath = public_path('storage/' . $productColor->$imageField);

        //     // If the image exists, copy it to the 'customizations' folder
        //     if (file_exists($currentImagePath)) {
        //       $newImageName = time() . '_' . basename($productColor->$imageField);
        //       $customizationDirectory = public_path('storage/customizations');

        //       // Ensure the customizations directory exists
        //       if (!is_dir($customizationDirectory)) {
        //         mkdir($customizationDirectory, 0755, true);
        //       }

        //       // Copy the file to the customizations folder
        //       copy($currentImagePath, $customizationDirectory . '/' . $newImageName);

        //       // Save the new path to the user_customizations table
        //       $userCustomization->$imageField = 'storage/customizations/' . $newImageName;
        //     } else {
        //       throw new \Exception("Image file does not exist at the specified path: " . $currentImagePath);
        //     }
        //   }
        // }

        $imageFields = [
          'front_image' => 'is_front',
          'back_image' => 'is_back',
          'left_image' => 'is_left',
          'right_image' => 'is_right',
        ];

        foreach ($imageFields as $imageField => $flagField) {
          // Only proceed if the flag is '1' and the image exists
          if ($productColor->$flagField === '1' && $productColor->$imageField) {
            $currentImagePath = public_path('storage/' . $productColor->$imageField);

            if (file_exists($currentImagePath)) {
              $newImageName = time() . '_' . basename($productColor->$imageField);
              $customizationDirectory = public_path('storage/customizations');

              if (!is_dir($customizationDirectory)) {
                mkdir($customizationDirectory, 0755, true);
              }

              copy($currentImagePath, $customizationDirectory . '/' . $newImageName);

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

  public function update(Request $request, $id)
  {
    try {
      $request->validate([
        'product_id' => 'required|exists:products,id',
        'total_price' => 'required|string|max:255',
        'previews' => 'nullable|array',
      ]);

      $product = Product::findOrFail($request->product_id);
      $design_price = $request->total_price - $product->selling_price;
      $userCustomization = UserCustomization::findOrFail($id);
      $userCustomization->price = $design_price;

      $previews = $request->input('previews', []); // Get the previews array

      // Loop through views and save if present
      $viewMap = [
        'front' => 'front_image',
        'back' => 'back_image',
        'left' => 'left_image',
        'right' => 'right_image',
      ];

      foreach ($viewMap as $view => $column) {
        if (!empty($previews[$view])) {
          $imageData = $previews[$view];

          if (preg_match('/^data:image\/(\w+);base64,/', $imageData, $type)) {
            $image = substr($imageData, strpos($imageData, ',') + 1);
            $image = base64_decode($image);

            $imageExtension = strtolower($type[1]); // e.g., png, jpeg
            $fileName = uniqid($view . '_') . '.' . $imageExtension;
            $filePath = 'storage/customizations/' . $fileName;

            // Ensure directory exists
            $destination = public_path('storage/customizations');
            if (!is_dir($destination)) {
              mkdir($destination, 0755, true);
            }

            // Save the image
            file_put_contents(public_path($filePath), $image);

            // Save path to DB
            $userCustomization->$column = $filePath;
          }
        }
      }

      $cartItem = Cart::create([
        'user_id' => $userCustomization->user_id,
        'product_id' => $userCustomization->product_id,
        'color_id' => $userCustomization->product_color_id,
        'quantity' => $userCustomization->quantity,
        'size' => $userCustomization->size,
      ]);

      $userCustomization->cart_id = $cartItem->id;
      $userCustomization->save();

      return response()->json([
        'message' => 'Customizer updated successfully.',
        'success' => true,
        'data' => $userCustomization,
        'redirect_url' => route('cart'),
      ]);
    } catch (\Illuminate\Validation\ValidationException $e) {
      return response()->json([
        'message' => 'Validation failed',
        'success' => false,
        'errors' => $e->errors(),
      ], 422);
    } catch (\Exception $e) {
      return response()->json([
        'message' => 'Error occurred',
        'success' => false,
        'error' => $e->getMessage(),
      ], 500);
    }
  }

  public function uploadImage(Request $request)
  {
    $request->validate(['image' => 'required|image']);

    $imagePath = $request->file('image')->store('customizerUploads', 'public');

    $image = CustomizerUpload::create([
      'user_customization_id' => $request->user_customization_id,
      'image' => $imagePath,
    ]);

    return response()->json([
      'image_url' => asset("storage/{$imagePath}"),
      'image_id' => $image->id
    ]);
  }

  // In CustomizerController.php
  public function deleteImage($id)
  {
    $image = CustomizerUpload::findOrFail($id);
    // Delete file from storage
    Storage::disk('public')->delete($image->image);
    // Delete record from database
    $image->delete();
    return response()->json(['success' => true]);
  }
}
