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
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\UserCustomization;
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

  // // Handle Login Form Submission
  // public function login(Request $request)
  // {
  //   Log::info('Login request received', $request->all());

  //   $credentials = $request->validate([
  //     'email' => 'required|email',
  //     'password' => 'required'
  //   ]);

  //   if (Auth::attempt($credentials)) {
  //     $user = Auth::user();

  //     $cartCookie = request()->cookie('cart') ?? $_COOKIE['cart'] ?? null;
  //     Log::info('Cart cookie received:', ['cartCookie' => $cartCookie]);

  //     $cartFromLocalStorage = json_decode($cartCookie, true) ?? [];
  //     if (!$cartFromLocalStorage) {
  //       Log::error('Cart cookie is empty or not received properly!');
  //     }

  //     Log::info('Cart from cookie before processing:', ['cart' => $cartFromLocalStorage]);

  //     foreach ($cartFromLocalStorage as $item) {
  //       // Retrieve the product and product color
  //       $product = Product::findOrFail($item['productId']);
  //       $productColor = ProductColor::findOrFail($item['colorId']);
  //       $userCustomization = new UserCustomization();
  //       $userCustomization->user_id = auth()->id();
  //       $userCustomization->product_color_id = $productColor->id;
  //       $userCustomization->product_id = $product->id;
  //       $userCustomization->quantity = $item['quantity'];
  //       $userCustomization->size = $item['size'];

  //       // Image fields from product_color table
  //       $imageFields = ['front_image', 'back_image', 'left_image', 'right_image'];
  //       foreach ($imageFields as $imageField) {
  //         // Check if the productColor has an image path for the current field
  //         if ($productColor->$imageField) {
  //           // Get the full path to the current image (storage path)
  //           $currentImagePath = public_path('storage/' . $productColor->$imageField);

  //           // If the image exists, copy it to the 'customizations' folder
  //           if (file_exists($currentImagePath)) {
  //             $newImageName = time() . '_' . basename($productColor->$imageField);
  //             $customizationDirectory = public_path('storage/customizations');

  //             // Ensure the customizations directory exists
  //             if (!is_dir($customizationDirectory)) {
  //               mkdir($customizationDirectory, 0755, true);
  //             }

  //             // Copy the file to the customizations folder
  //             copy($currentImagePath, $customizationDirectory . '/' . $newImageName);

  //             // Save the new path to the user_customizations table
  //             $userCustomization->$imageField = 'storage/customizations/' . $newImageName;
  //           } else {
  //             throw new \Exception("Image file does not exist at the specified path: " . $currentImagePath);
  //           }
  //         }
  //       }

  //       // Save the IP address
  //       $userCustomization->ipaddress = $request->ip();

  //       // Save the user customization record
  //       $userCustomization->save();
  //       // $cartItem = Cart::create([
  //       //   'user_id' => $user->id,
  //       //   'product_id' => $item['productId'],
  //       //   'color_id' => $item['colorId'],
  //       //   'quantity' => $item['quantity'],
  //       //   'size' => $item['size'],
  //       // ]);
  //     }
  //     Log::info('Cart & Artwork migrated, clearing cookie');
  //     return redirect()->route('customizer.index', $userCustomization->id)->withCookie(cookie()->forget('cart'));
  //   }
  //   Log::error('Invalid login attempt', ['email' => $request->email]);
  //   return back()->withErrors(['email' => 'Invalid credentials']);
  // }

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
      if (empty($cartFromLocalStorage)) {
        Log::error('Cart cookie is empty or not received properly!');
        return redirect()->route('home'); // Or wherever appropriate
      }

      // Only take the first cart item
      $item = $cartFromLocalStorage[0];
      Log::info('Processing only the first cart item:', ['item' => $item]);

      try {
        $product = Product::findOrFail($item['productId']);
        $productColor = ProductColor::findOrFail($item['colorId']);

        $userCustomization = new UserCustomization();
        $userCustomization->user_id = auth()->id();
        $userCustomization->product_color_id = $productColor->id;
        $userCustomization->product_id = $product->id;
        $userCustomization->quantity = $item['quantity'];
        $userCustomization->size = $item['size'];

        // Copy image files
        $imageFields = ['front_image', 'back_image', 'left_image', 'right_image'];
        foreach ($imageFields as $imageField) {
          if ($productColor->$imageField) {
            $currentImagePath = public_path('storage/' . $productColor->$imageField);
            if (file_exists($currentImagePath)) {
              $newImageName = time() . '_' . basename($productColor->$imageField);
              $customizationDirectory = public_path('storage/customizations');
              if (!is_dir($customizationDirectory)) {
                mkdir($customizationDirectory, 0755, true);
              }
              copy($currentImagePath, $customizationDirectory . '/' . $newImageName);
              $userCustomization->$imageField = 'storage/customizations/' . $newImageName;
            } else {
              throw new \Exception("Image file does not exist at the specified path: " . $currentImagePath);
            }
          }
        }

        $userCustomization->ipaddress = $request->ip();
        $userCustomization->save();

        Log::info('First cart item saved, clearing cart cookie.');

        return redirect()->route('customizer.index', $userCustomization->id)->withCookie(cookie()->forget('cart'));
      } catch (\Exception $e) {
        Log::error('Error processing first cart item', ['error' => $e->getMessage()]);
        return back()->with('error', 'There was a problem processing your customization.');
      }
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
