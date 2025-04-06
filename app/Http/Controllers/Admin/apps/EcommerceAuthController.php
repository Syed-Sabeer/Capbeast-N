<?php

namespace App\Http\Controllers\Admin\Apps;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class EcommerceAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.content.apps.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Define available guards
        $validGuards = ['superadmin', 'sale', 'marketing'];
        $authenticatedGuard = null;
        $user = null;
    
        // Attempt login with each guard
        foreach ($validGuards as $guard) {
            if (Auth::guard($guard)->attempt($request->only('email', 'password'))) {
                $user = Auth::guard($guard)->user();
                
                // Check if the user's role matches the guard
                if ($user->role === $guard) {
                    $authenticatedGuard = $guard;
                    break;
                }
    
                // Logout from the wrong guard to prevent session mix-up
                Auth::guard($guard)->logout();
            }
        }
    
        if ($authenticatedGuard) {
            $request->session()->regenerate();
    
            Log::info("Login Successful", [
                'email' => $user->email,
                'role' => $user->role,
                'guard' => $authenticatedGuard
            ]);
    
            return redirect()->intended(route(Route::prefixed($authenticatedGuard, 'app-ecommerce-dashboard')))
                ->with('success', "Welcome to the {$user->role} dashboard!");
        }
    
        Log::warning("Login Failed", [
            'email' => $request->input('email'),
        ]);
    
        return redirect()->back()->withErrors(['email' => 'Invalid email or password.'])->withInput($request->except('password'));
    }
    
        
    
    public function logout(Request $request)
    {
        $guards = ['superadmin', 'marketing', 'sale'];

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                Auth::guard($guard)->logout();
                break;
            }
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('status', 'You have been logged out.');
    }
}
