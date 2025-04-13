<?php

namespace App\Http\Controllers\Admin\apps;

use App\Http\Controllers\Controller;
use App\Models\CustomizerPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CustomizerPriceController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit()
  {
    try {
      $customizerPrices = CustomizerPrice::firstOrFail();
      return view('admin.content.apps.customizer.price.edit', compact('customizerPrices'));
    } catch (\Throwable $th) {
      //throw $th;
      return redirect()->back()->with('error', 'Something went wrong. Please try again!');
    }
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    // Manual validation
    $validator = Validator::make($request->all(), [
      'front_price' => 'required|numeric',
      'back_price' => 'required|numeric',
      'left_price' => 'required|numeric',
      'right_price' => 'required|numeric',
    ]);

    // If validation fails
    if ($validator->fails()) {
      return redirect()->back()
        ->withErrors($validator)
        ->withInput()->with('error', 'Validation Error!');
    }

    try {
      $customizerPrice = CustomizerPrice::findOrFail($id);
      $validated = $validator->validated();

      // Update record
      $customizerPrice->update([
        'front_price' => number_format((float) $validated['front_price'], 2, '.', ''),
        'back_price'  => number_format((float) $validated['back_price'], 2, '.', ''),
        'left_price'  => number_format((float) $validated['left_price'], 2, '.', ''),
        'right_price' => number_format((float) $validated['right_price'], 2, '.', ''),
      ]);

      return redirect()->back()->with('success', 'Price updated successfully!');
    } catch (\Throwable $th) {
      Log::error($th->getMessage());
      return redirect()->back()->with('error', 'Something went wrong. Please try again!')->withInput();
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}
