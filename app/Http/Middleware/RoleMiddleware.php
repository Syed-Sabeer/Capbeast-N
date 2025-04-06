<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $guards = ['superadmin', 'marketing', 'sale']; // List of admin-related guards
        $authenticatedUser = null;

        // Check each guard for an authenticated user
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $authenticatedUser = Auth::guard($guard)->user();
                break;
            }
        }

        // If no admin user is authenticated or role mismatch, deny access
        if (!$authenticatedUser || strtolower($authenticatedUser->role) !== strtolower($role)) {
            abort(403, 'Unauthorized access');
        }
        

        return $next($request);
    }
}
