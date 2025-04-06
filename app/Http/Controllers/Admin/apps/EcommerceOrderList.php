<?php

namespace App\Http\Controllers\Admin\Apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
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
  
      // Fetch orders with related user and items (including order artwork)
      $orders = Order::with(['user', 'items' => function ($query) {
        $query->with('orderArtwork');
    }])->paginate(25);
    
  
      // Pass all required variables to the view
      return view('admin.content.apps.app-ecommerce-order-list', compact(
          'orders', 'processingCount', 'inProductionCount', 
          'completedCount', 'shippedCount', 'canceledCount'
      ));
  }
  public function updateStatus(Request $request, $id)
  {
      $order = Order::findOrFail($id);
      $order->status = $request->status;
      $order->save();
  
      return response()->json(['success' => true]);
  }
  
 
}
