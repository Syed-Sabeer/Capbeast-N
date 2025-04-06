<?php


namespace App\Http\Controllers\Admin\Apps;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\ProductPrinting;

class EcommercePrintingList extends Controller
{
    public function index()
    {
        // Fetch all records using the model
        $printing = ProductPrinting::all();

        // Pass the data to the view
        return view('admin.content.apps.app-ecommerce-printing-list', compact('printing'));
    }
}
