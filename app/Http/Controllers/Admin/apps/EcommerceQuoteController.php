<?php

namespace App\Http\Controllers\Admin\Apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quote;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class EcommerceQuoteController extends Controller
{

 public function index()
{
    $quotes = Quote::with('product', 'color', 'customization')->get();

    return view('admin.content.apps.app-ecommerce-quote-list', compact('quotes'));
}

}
