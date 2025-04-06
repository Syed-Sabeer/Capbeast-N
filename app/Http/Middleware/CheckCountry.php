<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckCountry
{
    public function handle(Request $request, Closure $next)
    {
        // Allow admin routes to bypass this middleware
        if ($request->is('backend/*')) {
            return $next($request);
        }

        // Bypass middleware for sitemap.xml
if ($request->is('sitemap.xml')) {
    return $next($request);
}

    
        // Allow access to country selection routes
        if ($request->route()->getName() === 'select.country' || $request->route()->getName() === 'set.country') {
            return $next($request);
        }
    
        // Check if country is set
        if (!session()->has('country')) {
            return redirect()->route('select.country');
        }
    
        return $next($request);
    }
    
    
}
