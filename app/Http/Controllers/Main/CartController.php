<?php

namespace App\Http\Controllers\Main;

use App\Helpers\CartHelper;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartArtwork;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller
{

  public function index()
  {
    $userId = auth()->id();


    $carts = Cart::with(['product', 'color', 'userCustomization'])
      ->where('user_id', $userId)
      ->get();

      if (auth()->check()) {
        // Update the cart error with the new method
        CartHelper::trackError('Cart', 'Cart Page');
    }


    return view('main.pages.cart', compact('carts'));
  }



  public function add(Request $request)
  {


    $user = Auth::user();

    Log::info('Request Data:', $request->all());

    try {

      $validated = $request->validate([
        'productId' => 'required|integer',
        'userId' => 'required|integer',
        'colorId' => 'required|integer',
        'quantity' => 'required|integer|min:1',
        'size' => 'nullable|string',
      ]);

      $cartItem = Cart::create([
        'user_id' => $user->id,
        'product_id' => $validated['productId'],
        'color_id' => $validated['colorId'],
        'quantity' => $validated['quantity'],
        'size' => $validated['size'],
      ]);
      if (auth()->check()) {
        // Update the cart error with the new method
        CartHelper::trackError('Cart', 'Cart Page');
    }
    
    return response()->json([
        'success' => true,
        'message' => 'Item added to cart!',
        'cartItem' => $cartItem,
        'redirect_url' => route('cart') // Cart route for redirection
    ]);
    
    } catch (\Exception $e) {
      Log::error('Error adding to cart: ' . $e->getMessage());
      return response()->json(['success' => false, 'message' => 'Failed to add item to cart.'], 500);
    }
  }
  // public function remove($itemId)
  // {
  //   try {
  //     $cartItem = Cart::findOrFail($itemId);
  //     $cartItem->delete();

  //     return response()->json(['success' => true, 'message' => 'Item removed from cart!']);
  //   } catch (\Exception $e) {
  //     return response()->json(['success' => false, 'message' => 'Failed to remove item from cart.'], 500);
  //   }
  // }

  public function remove($itemId)
  {
    try {
      $cartItem = Cart::with('userCustomization.customizerUploads')->findOrFail($itemId);

      if ($cartItem->userCustomization) {
        $customization = $cartItem->userCustomization;

        // Delete front, back, left, right images if they exist
        $imageFields = ['front_image', 'back_image', 'left_image', 'right_image'];
        foreach ($imageFields as $field) {
          if (!empty($customization->$field)) {
            Storage::disk('public')->delete($customization->$field);
          }
        }

        // Delete all uploaded images related to customization
        foreach ($customization->customizerUploads as $upload) {
          if (!empty($upload->image)) {
            Storage::disk('public')->delete($upload->image);
          }
          $upload->delete(); // Delete DB record
        }

        // Delete customization record
        $customization->delete();
      }

      // Delete cart item
      $cartItem->delete();

      return response()->json(['success' => true, 'message' => 'Item removed from cart!']);
    } catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'message' => 'Failed to remove item from cart.',
        'error' => $e->getMessage()
      ], 500);
    }
  }

  public function clear()
  {
    try {
      $userId = auth()->id();  // Get the user ID

      Cart::where('user_id', $userId)->delete();

      return response()->json(['success' => true, 'message' => 'All items have been removed from your cart.']);
    } catch (\Exception $e) {
      Log::error('Error clearing cart: ' . $e->getMessage());
      return response()->json(['success' => false, 'message' => 'Failed to clear the cart.'], 500);
    }
  }
  public function updateQuantity(Request $request)
  {
    $cart = Cart::with('product')->find($request->cart_id);

    if (!$cart) {
      return response()->json(['success' => false, 'message' => 'Cart item not found.'], 404);
    }

    try {
      \DB::beginTransaction(); // Start database transaction

      // Check if quantity is valid
      if ($request->quantity < 1) {
        return response()->json(['success' => false, 'message' => 'Invalid quantity.'], 400);
      }

      // Apply optimistic locking by checking the last updated timestamp
      $cart->quantity = $request->quantity;
      $cart->updated_at = now();
      $cart->save();


      $subtotal = Cart::where('user_id', auth()->id())->get()->sum(function ($item) {
        return $item->quantity * $item->product->selling_price;
      });

      \DB::commit();

      return response()->json([
        'success' => true,
        'message' => 'Cart updated successfully',
        'subtotal' => number_format($subtotal, 2),
        'total' => number_format($subtotal, 2),
      ]);
    } catch (\Exception $e) {
      \DB::rollBack(); // Rollback on error
      Log::error('Error updating cart: ' . $e->getMessage());
      return response()->json(['success' => false, 'message' => 'Failed to update cart.'], 500);
    }
  }
}
