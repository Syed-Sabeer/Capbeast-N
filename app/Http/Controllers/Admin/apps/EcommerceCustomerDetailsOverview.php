<?php

namespace App\Http\Controllers\Admin\Apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EcommerceCustomerDetailsOverview extends Controller
{
  public function index()
  {
    return view('admin.content.apps.app-ecommerce-customer-details-overview');
  }
}
