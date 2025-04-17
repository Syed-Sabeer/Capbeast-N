<?php

namespace App\Http\Controllers\Admin\Apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;

class EcommerceAbandonCartController extends Controller
{
  public function index()
  {
    $abandoncart = Cart::all();
    return view('admin.content.apps.app-ecommerce-abandon-cart-list', compact('abandoncart'));
  }
}
