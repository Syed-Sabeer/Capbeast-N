<?php

namespace App\Http\Controllers\Admin\Apps;

use App\Http\Controllers\Controller;
use App\Models\AbandonCartComment;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

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

            // For abandoned carts, we'll use the cart ID (user_id) as the reference
            // when no order exists yet
            $cartReference = $user->id; // Using user_id as cart reference

            // Get comments with admin details, sort by most recent first
            // Look for comments associated with either order_id (if exists) or cart reference
            $comments = [];

            // Get the first cart item's order ID if it exists
            $orderIdFromCart = optional($cartItems->first())->order_id;

            if ($orderIdFromCart) {
                // If an order exists, get comments associated with that order
                $comments = AbandonCartComment::with('admin')
                    ->where('order_id', $orderIdFromCart)
                    ->latest()
                    ->get();
            } else {
                // If no order exists, get comments associated with the cart reference
                $comments = AbandonCartComment::with('admin')
                    ->where('order_id', $cartReference)
                    ->latest()
                    ->get();
            }

            if ($cartItems->isNotEmpty()) {
                $latestCart = $cartItems->sortByDesc('updated_at')->first();
                $abandoncart[] = [
                    'user' => $user,
                    'user_id' => $user->id,
                    'total_qty' => $totalQty,
                    'total_amount' => $totalAmount,
                    'cart_items' => $cartItems,
                    'status' => $cartItems->first()->status, // assuming all items have same status
                    'created_at' => $latestCart->created_at,
                    'updated_at' => $latestCart->updated_at,
                    'order_id' => $orderIdFromCart,
                    'cart_id' => $cartReference, // Added cart_id for reference
                    'comments' => $comments,
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

    /**
     * Store a new comment for an abandoned cart
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            // Validate the request data
            $request->validate([
                'order_id' => 'required', // Could be order ID or cart ID
                'admin_id' => 'required|exists:admins,id',
                'comment' => 'required|string|max:1000',
            ]);

            // Process the order_id
            $orderId = $request->order_id;

            // If the order_id starts with 'cart_', extract the numeric cart ID
            if (is_string($orderId) && strpos($orderId, 'cart_') === 0) {
                $orderId = (int) substr($orderId, 5); // Remove 'cart_' prefix and convert to integer
            }

            // Create comment data
            $commentData = [
                'order_id' => $orderId, // Now this will be a numeric value
                'admin_id' => $request->admin_id,
                'comment' => $request->comment,
            ];

            // Save new comment
            $comment = AbandonCartComment::create($commentData);

            // Load the admin relationship
            $comment->load('admin');

            // Format created_at
            $formattedCreatedAt = Carbon::parse($comment->created_at)->diffForHumans();

            // Fetch all comments for this order/cart
            $comments = AbandonCartComment::with('admin')
                ->where('order_id', $orderId)
                ->latest()
                ->get();

            return response()->json([
                'status' => 'success',
                'message' => 'Comment added successfully',
                'comment' => $comment,
                'formattedDate' => $formattedCreatedAt,
                'comments' => $comments,
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed: ' . implode(', ', $e->errors()),
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Update the status of all cart items for a user
     * 
     * @param Request $request
     * @param int $id User ID
     * @return \Illuminate\Http\JsonResponse
     */
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
