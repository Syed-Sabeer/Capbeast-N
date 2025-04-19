<?php

namespace App\Http\Controllers\Admin\Apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class EcommerceAbandonCartController extends Controller
{

    public function index()
{
    // Get user IDs that have abandoned carts (status = 0 and quantity > 0)
    $usersWithCarts = Cart::where('status', 0)
        ->where('quantity', '>', 0)
        ->orderBy('created_at', 'desc')
        ->pluck('user_id')
        ->unique();

    // Get user information
    $users = User::whereIn('id', $usersWithCarts)->get();

    // Build the abandoncart list
    $abandoncart = [];
    foreach ($users as $user) {
        // Get cart items with status = 0 and sort by created_at DESC
        $cartItems = Cart::with(['product', 'userCustomization.customizerUploads', 'color'])
            ->where('user_id', $user->id)
            ->where('status', 0)
            ->orderBy('created_at', 'desc')
            ->get();

        $totalQty = $cartItems->sum('quantity');
        $totalAmount = 0;

        foreach ($cartItems as $item) {
            if ($item->product) {
                $totalAmount += $item->quantity * $item->product->selling_price;
            }
        }

        // Only include users who still have valid cart items
        if ($cartItems->isNotEmpty()) {
            $abandoncart[] = [
                'user' => $user,
                'user_id' => $user->id,
                'total_qty' => $totalQty,
                'total_amount' => $totalAmount,
                'cart_items' => $cartItems,
                'status' => 0
            ];
        }
    }

    // Sort the whole abandoncart array by latest cart item's created_at
    usort($abandoncart, function ($a, $b) {
        return strtotime($b['cart_items']->first()->created_at) <=> strtotime($a['cart_items']->first()->created_at);
    });

    return view('admin.content.apps.app-ecommerce-abandon-cart-list', compact('abandoncart'));
}


    public function updateStatusCart(Request $request, $id)
    {
        // Update all cart items for this user
        $carts = Cart::where('user_id', $id)->get();
        foreach ($carts as $cart) {
            $cart->status = $request->status;
            $cart->save();
        }

        return response()->json(['success' => true]);
    }
}
