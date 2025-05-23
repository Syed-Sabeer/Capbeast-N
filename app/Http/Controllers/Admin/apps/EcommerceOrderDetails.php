<?php

namespace App\Http\Controllers\Admin\Apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderFiles;
use App\Models\InternalStatus;
use App\Models\OrderInternalStatus;
use Illuminate\Support\Facades\File;

class EcommerceOrderDetails extends Controller
{
  public function index($orderId)
  {

    // $order = Order::with(['TaxDetails','user', 'Order_files', 'ShippingDetails', 'items' => function ($query) {
    //     $query->with('orderArtwork');
    // }])->findOrFail($orderId);

    $order = Order::with('items.userCustomization.customizerUploads')->findOrFail($orderId);


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
    // dd($request->all());
      $request->validate([
          'title' => 'required|array',
          'title.*' => 'string|max:255',
          'file' => 'required|array',
          'file.*' => 'file|max:2048',
      ]);

      $allowedExtensions = [
          'jpg', 'jpeg', 'png', 'pdf', 'doc', 'docx', 'zip',
          'xls', 'xlsm', 'xlsx', 'xltx',
          'dst', 'emb', 'exp', 'hus', 'jef', 'dgt', 'vp3', 'xxx', 'pcs', 'pes', 'sew'
      ];

      foreach ($request->file('file') as $index => $file) {
          // Get the file extension
          $extension = strtolower($file->getClientOriginalExtension());

          // Check if the file extension is allowed
          if (!in_array($extension, $allowedExtensions)) {
              return back()->withErrors(['file' => 'One or more files have an invalid file type.'])->with('error','One or more files have an invalid file type.');
          }

          // Create a unique file name with the original extension
          $filename = uniqid('orderfile_') . '.' . $extension;

          // Store the file
          $filePath = $file->storeAs('OrderFiles', $filename, 'public');

          // Save the file details in the database
          OrderFiles::create([
              'order_id' => $id,
              'title' => $request->title[$index], // Get corresponding title for the file
              'file' => $filePath,
          ]);
      }

      // $file = $request->file('file');
      // $extension = strtolower($file->getClientOriginalExtension());

      // if (!in_array($extension, $allowedExtensions)) {
      //     return back()->withErrors(['file' => 'This file type is not allowed.']);
      // }

      // // Create a unique file name with original extension
      // $filename = uniqid('orderfile_') . '.' . $extension;

      // // Store the file with original extension
      // $filePath = $file->storeAs('OrderFiles', $filename, 'public');

      // // Save file details in DB
      // OrderFiles::create([
      //     'order_id' => $id,
      //     'title' => $request->input('title'),
      //     'file' => $filePath,
      // ]);

      return back()->with('success', 'File uploaded successfully!');
  }

  public function orderfiledelete($id)
  {
      $orderFile = OrderFiles::findOrFail($id);
      $filePath = public_path('storage/' . $orderFile->file);
      if (File::exists($filePath)) {
          File::delete($filePath);
      }
      $orderFile->delete();

      return back()->with('success', 'File deleted successfully!');
  }


}
