<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\UserWishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
  // public function addToWishlist($id){
  //   try {
  //     $product = Product::findOrFail($id);
  //     $userWishlist = UserWishlist::where('user_id', auth()->user()->id)->where('product_id', $product->id)->first();
  //     if ($userWishlist) {
  //       return redirect()->back()->with('error', 'Product already in wishlist');
  //     }else{
  //       UserWishlist::create([
  //         'user_id' => auth()->user()->id,
  //         'product_id' => $product->id,
  //       ]);
  //       return redirect()->back()->with('success', 'Product added to wishlist');
  //     }
  //   } catch (\Throwable $th) {
  //     return redirect()->back()->with('error', $th->getMessage());
  //   }
  // }

  public function addToWishlist($id)
  {
    try {
      $product = Product::findOrFail($id);

      $userWishlist = UserWishlist::where('user_id', auth()->id())
        ->where('product_id', $product->id)
        ->first();

      if ($userWishlist) {
        $userWishlist->delete();
        return response()->json([
          'status' => 'success',
          'message' => 'Product removed from wishlist',
        ], 200);
      } else {
        UserWishlist::create([
          'user_id' => auth()->id(),
          'product_id' => $product->id,
        ]);

        return response()->json([
          'status' => 'success',
          'message' => 'Product added to wishlist',
        ], 201);
      }
    } catch (\Throwable $th) {
      return response()->json([
        'status' => 'error',
        'message' => $th->getMessage(),
      ], 500);
    }
  }
}
