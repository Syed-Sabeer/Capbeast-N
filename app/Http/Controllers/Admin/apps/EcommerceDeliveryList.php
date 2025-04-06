<?php

namespace App\Http\Controllers\Admin\Apps;

use App\Http\Controllers\Controller;
use App\Models\ProductDelivery;
use Illuminate\Http\Request;

class EcommerceDeliveryList extends Controller
{
  public function index(){
  $delivery = ProductDelivery::all();

      
        return view('admin.content.apps.app-ecommerce-delivery-list', compact('delivery'));
    }
}
