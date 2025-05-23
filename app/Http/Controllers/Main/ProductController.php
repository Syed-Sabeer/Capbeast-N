<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Product; 
use App\Models\Category; 
use App\Models\Brand; 
use App\Models\Mlb; 
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request, $filterType = null, $slug = null)
    {
        $query = Product::with('categories')->where('visibility', 1);
        $categories = Category::all(); 
        $brands = Brand::all();
        $mlbs = Mlb::all();
    
        if ($filterType && $slug) {
            if ($filterType === 'category') {
                $category = Category::where('title', str_replace('-', ' ', $slug))->first();
                if ($category) {
                    $query->whereHas('categories', function ($q) use ($category) {
                        $q->where('category_id', $category->id);
                    });
                }
            } elseif ($filterType === 'brand') {
                $brand = Brand::where('title', str_replace('-', ' ', $slug))->first();
                if ($brand) {
                    $query->where('brand_id', $brand->id);
                }
            } elseif ($filterType === 'mlb') {
                $mlb = Mlb::where('title', str_replace('-', ' ', $slug))->first();
                if ($mlb) {
                    $query->where('mlb_id', $mlb->id);
                }
            }
        }

        $products = $query->get();

        return view('main.pages.products', compact('products', 'categories', 'brands', 'mlbs', 'filterType', 'slug'));
    }
}
