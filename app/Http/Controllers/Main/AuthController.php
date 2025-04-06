<?php

namespace App\Http\Controllers\Main;

use App\Models\Cart;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Mail\UserRegisteredMail;
use Illuminate\Support\Facades\Mail;
use Monarobase\CountryList\CountryList;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        $countries = (new CountryList())->getList('en');
        return view('main.pages.signup', compact('countries'));
    }

    public function register(Request $request)
{
    Log::info('Register request data', $request->all());

    $validator = Validator::make($request->all(), [
        'firstname' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'contact_number' => 'required|string|max:20',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|confirmed',
        'country' => 'required|string|max:255',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }
   
    $user = User::create([
        'first_name' => $request->firstname,
        'last_name' => $request->lastname,
        'contact_number' => $request->contact_number,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'status' => 1, 
        'country' => $request->country,
    ]);
    
    if ($user) {
        auth()->login($user);

        $cartCookie = $request->cookie('cart') ?? $_COOKIE['cart'] ?? null;
        $cartFromLocalStorage = $cartCookie ? json_decode($cartCookie, true) : [];
       
            if (empty($cartFromLocalStorage)) {
                Log::warning('Cart is empty during registration');
                return redirect()->route('cart')->with('error', 'Your cart is empty!');
            }
        
            foreach ($cartFromLocalStorage as $item) {
                $cartItem = Cart::create([
                    'user_id' => $user->id,
                    'product_id' => $item['productId'],
                    'color_id' => $item['colorId'],
                    'quantity' => $item['quantity'],
                    'size' => $item['size'],
                    
                ]);
            }

            return redirect()->route('cart')->withCookie(cookie()->forget('cart'));

        return redirect()->route('home')->with('success', 'Registration successful!');
    }

    return redirect()->route('home')->with('error', 'Registration failed!');
}

    public function showLoginForm()
    {
        return view('main.pages.signin');
    }

    // Handle Login Form Submission
    public function login(Request $request)
    {
        Log::info('Login request received', $request->all());

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            $cartCookie = request()->cookie('cart') ?? $_COOKIE['cart'] ?? null;
            Log::info('Cart cookie received:', ['cartCookie' => $cartCookie]);

            $cartFromLocalStorage = json_decode($cartCookie, true) ?? [];
            if (!$cartFromLocalStorage) {
                Log::error('Cart cookie is empty or not received properly!');
            }

            Log::info('Cart from cookie before processing:', ['cart' => $cartFromLocalStorage]);

                foreach ($cartFromLocalStorage as $item) {

                    $cartItem = Cart::create([
          'user_id' => $user->id,
                        'product_id' => $item['productId'],
                    'color_id' => $item['colorId'],
                    'quantity' => $item['quantity'],
                    'size' => $item['size'],
                    ]);
                }
                Log::info('Cart & Artwork migrated, clearing cookie');
                return redirect()->route('cart')->withCookie(cookie()->forget('cart'));
        }
        Log::error('Invalid login attempt', ['email' => $request->email]);
        return back()->withErrors(['email' => 'Invalid credentials']);
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect()->route('user.login')->with('status', 'You have been logged out.');
    }
}
