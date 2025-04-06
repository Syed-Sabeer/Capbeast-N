<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Carbon\Carbon;

class SitemapController extends Controller
{
    public function index()
    {
        $products = Product::select('slug', 'updated_at')->get();

        // Generate XML content
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        // Static URLs
        $staticUrls = [
            'https://monkeybeanies.com/select-country',
            'https://monkeybeanies.com/products',
            'https://monkeybeanies.com/faqs',
            'https://monkeybeanies.com/contact',
            'https://monkeybeanies.com/home',
        ];

        foreach ($staticUrls as $url) {
            $xml .= '<url>';
            $xml .= '<loc>' . htmlspecialchars($url) . '</loc>';
            $xml .= '<lastmod>' . Carbon::now()->toAtomString() . '</lastmod>';
            $xml .= '</url>';
        }

        // Dynamic product URLs
        foreach ($products as $product) {
            $xml .= '<url>';
            $xml .= '<loc>' . htmlspecialchars(url('/product/' . $product->slug)) . '</loc>';
            $xml .= '<lastmod>' . $product->updated_at->toAtomString() . '</lastmod>';
            $xml .= '</url>';
        }

        $xml .= '</urlset>';

        // Clean output buffer to prevent extra spaces
        if (ob_get_contents()) {
            ob_end_clean();
        }

        // Return XML response
        return response($xml, 200)
            ->header('Content-Type', 'application/xml');
    }
}
