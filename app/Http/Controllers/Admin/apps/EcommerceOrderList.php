<?php

namespace App\Http\Controllers\Admin\Apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderComment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class EcommerceOrderList extends Controller
{
  public function index()
  {
    // Count orders based on their status
    $processingCount = Order::where('status', 0)->count();
    $inProductionCount = Order::where('status', 1)->count();
    $completedCount = Order::where('status', 2)->count();
    $shippedCount = Order::where('status', 3)->count();
    $canceledCount = Order::where('status', 4)->count();

    // Fetch orders with related user and comments
    $orders = Order::with(['user', 'comments' => function ($query) {
      $query->with('admin')->latest();
    }])->paginate(25);

    // Pass all required variables to the view
    return view('admin.content.apps.app-ecommerce-order-list', compact(
      'orders',
      'processingCount',
      'inProductionCount',
      'completedCount',
      'shippedCount',
      'canceledCount'
    ));
  }

  /**
   * Update the order status
   * 
   * @param Request $request
   * @param int $id
   * @return \Illuminate\Http\JsonResponse
   */
  public function updateStatus(Request $request, $id)
  {
    $order = Order::findOrFail($id);
    $order->status = $request->status;
    $order->save();

    return response()->json(['success' => true]);
  }

  /**
   * Store a new comment for an order
   * 
   * @param Request $request
   * @return \Illuminate\Http\JsonResponse
   */
  public function storeComment(Request $request)
  {
    try {
      // Validate the request data
      $request->validate([
        'order_id' => 'required|exists:orders,id',
        'admin_id' => 'required|exists:admins,id',
        'comment' => 'required|string|max:1000',
      ]);

      // Create and save the comment
      $comment = OrderComment::create([
        'order_id' => $request->order_id,
        'admin_id' => $request->admin_id,
        'comment' => $request->comment,
      ]);

      // Load the admin relationship
      $comment->load('admin');

      // Format created_at for display
      $formattedCreatedAt = Carbon::parse($comment->created_at)->diffForHumans();

      // Fetch all comments for this order
      $comments = OrderComment::with('admin')
        ->where('order_id', $request->order_id)
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
}
