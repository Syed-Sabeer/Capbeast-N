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
        // Get all users who have carts (regardless of status), grouped by user
        $usersWithCarts = Cart::select('user_id')
            ->groupBy('user_id')
            ->havingRaw('SUM(quantity) > 0')
            ->pluck('user_id');
    
        // Get user info
        $users = User::whereIn('id', $usersWithCarts)->get();
    
        $abandoncart = [];
    
        foreach ($users as $user) {
            $cartItems = Cart::with(['product', 'userCustomization.customizerUploads', 'color'])
                ->where('user_id', $user->id)
                ->orderBy('created_at', 'desc')
                ->get();
    
            $totalQty = $cartItems->sum('quantity');
            $totalAmount = 0;
    
            foreach ($cartItems as $item) {
                if ($item->product) {
                    $totalAmount += $item->quantity * $item->product->selling_price;
                }
            }
    
            if ($cartItems->isNotEmpty()) {
                $abandoncart[] = [
                    'user' => $user,
                    'user_id' => $user->id,
                    'total_qty' => $totalQty,
                    'total_amount' => $totalAmount,
                    'cart_items' => $cartItems,
                    'status' => $cartItems->first()->status // assuming all items have same status
                ];
            }
        }
    
        // Sort: status 0 first, then by latest cart created_at
        usort($abandoncart, function ($a, $b) {
            // First sort by status (0 first)
            if ($a['status'] !== $b['status']) {
                return $a['status'] - $b['status'];
            }
    
            // If same status, sort by latest created cart
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
