<?php

namespace App\Http\Controllers\Admin\Apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class EcommerceAbandonCartController extends Controller
{
    


    public function index()
    {
        $abandoncart = Cart::with('user', 'product')
            ->select('user_id', DB::raw('SUM(quantity) as total_qty'), DB::raw('SUM(quantity * products.selling_price) as total_amount'))
            ->join('products', 'products.id', '=', 'cart.product_id')
            ->groupBy('user_id')
            ->havingRaw('SUM(quantity) > 0')
            ->get();
    
        return view('admin.content.apps.app-ecommerce-abandon-cart-list', compact('abandoncart'));
    }
    
}
