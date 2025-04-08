<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class ProductDetailController extends Controller
{

  // public function index($slug)
  // {
  //   $product = Product::where('slug', $slug)->firstOrFail();
  //   return view('main.pages.productDetail', [
  //     'product' => $product,

  //   ]);
  // }
  public function index($slug)
  {
      $product = Product::where('slug', $slug)->firstOrFail();

      // Create the response and clear the 'cart' cookie
      $response = response()->view('main.pages.productDetail', [
          'product' => $product,
      ]);

      // Expire the 'cart' cookie immediately
      $response->cookie('cart', '', -1, '/');

      return $response;
  }
}
