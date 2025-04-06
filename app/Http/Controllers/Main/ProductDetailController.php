<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;


class ProductDetailController extends Controller
{

    public function index($slug)
{
    $product = Product::where('slug', $slug)->firstOrFail();
     

        return view('main.pages.productDetail', [
            'product' => $product,
     
        ]);
    }
}
