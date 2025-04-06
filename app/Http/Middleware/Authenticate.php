<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // Check if the current route belongs to the admin prefix
        if ($request->is('superadmin/*')) {
            return route('admin.login'); 
        }
        if ($request->is('sale/*')) {
            return route('admin.login'); 
        }
        if ($request->is('marketing/*')) {
            return route('admin.login'); 
        }

        // Default to user login
        return $request->expectsJson() ? null : route('user.login');
    }
}
