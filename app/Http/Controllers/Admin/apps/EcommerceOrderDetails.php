<?php

namespace App\Http\Controllers\Admin\Apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderFiles;
use App\Models\InternalStatus;
use App\Models\OrderInternalStatus;

class EcommerceOrderDetails extends Controller
{
    public function index($orderId)
{
   
    // $order = Order::with(['TaxDetails','user', 'Order_files', 'ShippingDetails', 'items' => function ($query) {
    //     $query->with('orderArtwork');
    // }])->findOrFail($orderId);

    $order = Order::findOrFail($orderId);

    
    $latestStatus = OrderInternalStatus::where('order_id', $orderId)
        ->orderBy('updated_at', 'desc')  
        ->with('internalStatus') 
        ->first();

    // Retrieve status history
    $statusHistory = OrderInternalStatus::where('order_id', $orderId)
        ->orderBy('updated_at', 'asc') 
        ->with('internalStatus')  
        ->get();

    // Retrieve only active (non-soft-deleted) statuses for the dropdown
    $statuses = InternalStatus::all(); // Exclude soft-deleted statuses

    return view('admin.content.apps.app-ecommerce-order-details', compact('order', 'statuses', 'latestStatus', 'statusHistory'));
}

    
    
public function updateOrderStatus(Request $request, $orderId)
{
    $request->validate([
        'internal_status_id' => 'required|exists:internal_status,id',
    ]);

    // Determine the authenticated guard
    $validGuards = ['superadmin', 'sale', 'marketing'];
    $authenticatedGuard = null;
    $user = null;

    foreach ($validGuards as $guard) {
        if (Auth::guard($guard)->check()) {
            $user = Auth::guard($guard)->user();
            
            if ($user->role === $guard) {
                $authenticatedGuard = $guard;
                break;
            }
        }
    }

    if (!$authenticatedGuard) {
        return redirect()->back()->with('error', 'Unauthorized access.');
    }

    // Check if the status already exists for this order
    $existingOrderStatus = OrderInternalStatus::where('order_id', $orderId)
        ->where('internal_status_id', $request->internal_status_id)
        ->first();

    if ($existingOrderStatus) {
        if ($existingOrderStatus->internal_status_id == $request->internal_status_id) {
            $existingOrderStatus->touch(); // Update the updated_at field
        }
    } else {
        OrderInternalStatus::create([
            'order_id' => $orderId,
            'internal_status_id' => $request->internal_status_id,
        ]);
    }

    return redirect()->route($authenticatedGuard . '.app-ecommerce-order-detail', $orderId)
        ->with('success', 'Order status updated successfully.');
}

    
    

    public function orderfileupload(Request $request, $id)
    {
       
        $request->validate([
            'title' => 'required|string|max:255', 
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf,doc,docx,zip,xls,xlsm,xlsx,xltx|max:2048', 
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
        
            // Store the file using the public disk
            $filePath = $file->store('OrderFiles', 'public');
        
            // Save the file details in the database
            OrderFiles::create([
                'order_id' => $id,
                'title' => $request->input('title'),
                'file' => $filePath, // Path stored in 'public/OrderFiles'
            ]);
        
            return back()->with('success', 'File uploaded successfully!');
        }
        
        return back()->with('error', 'No file was uploaded.');
    }
}
