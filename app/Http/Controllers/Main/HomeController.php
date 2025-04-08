<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\OrderItem;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    
    
    public function index()
    {
        // Recently added top 8 products
        $recentProducts = Product::where('visibility', true)
            ->latest()
            ->take(8)
            ->with('productColors') // eager load for better performance
            ->get();

            
    
        // Most ordered top 8 products
        $mostOrderedProducts = Product::where('visibility', true)
            ->withCount(['orderItems as total_ordered_quantity' => function ($query) {
                $query->select(\DB::raw("SUM(quantity)"));
            }])
            ->orderByDesc('total_ordered_quantity')
            ->take(8)
            ->with('productColors')
            ->get();
    
        return view('main.pages.home', [
            
            'recentProducts' => $recentProducts,
            'mostOrderedProducts' => $mostOrderedProducts,
        ]);
    }
    
    

}
