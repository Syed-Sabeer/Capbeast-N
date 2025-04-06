<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string ...$guards
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                Log::info("Authenticated with guard: {$guard}");
                
                // Redirect based on the guard
                if ($guard === 'superadmin') {
                    // Redirect to the correct named route
                    // return redirect()->route('app-ecommerce-dashboard');
                }
                elseif ($guard === 'marketing') {
                    // Redirect to the correct named route
                    // return redirect()->route('app-ecommerce-dashboard');
                }
                elseif ($guard === 'sale') {
                    // Redirect to the correct named route
                    // return redirect()->route('app-ecommerce-dashboard');
                }

                return redirect('/home');
            }
        }

        return $next($request);
    }
}
