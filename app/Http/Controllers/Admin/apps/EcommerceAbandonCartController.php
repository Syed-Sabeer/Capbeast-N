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
        // First get users with abandoned carts
        $usersWithCarts = Cart::select('user_id')
            ->groupBy('user_id')
            ->havingRaw('SUM(quantity) > 0')
            ->pluck('user_id');

        // Get user information
        $users = User::whereIn('id', $usersWithCarts)->get();

        // For each user, get their cart details
        $abandoncart = [];
        foreach ($users as $user) {
            $cartItems = Cart::with(['product', 'userCustomization.customizerUploads', 'color'])
                ->where('user_id', $user->id)
                ->get();

            $totalQty = $cartItems->sum('quantity');
            $totalAmount = 0;

            foreach ($cartItems as $item) {
                if ($item->product) {
                    $totalAmount += $item->quantity * $item->product->selling_price;
                }
            }

            $abandoncart[] = [
                'user' => $user,
                'user_id' => $user->id,
                'total_qty' => $totalQty,
                'total_amount' => $totalAmount,
                'cart_items' => $cartItems,
                // Use the first cart item's status as reference (can be improved)
                'status' => $cartItems->isNotEmpty() ? $cartItems->first()->status : 0
            ];
        }

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
