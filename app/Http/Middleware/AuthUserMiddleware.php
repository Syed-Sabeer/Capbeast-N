<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthUserMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $authUser = Auth::user();
        
        // Store the authenticated user globally in the app container
        app()->singleton('authUser', function () use ($authUser) {
            return $authUser;
        });

        return $next($request);
    }
}
