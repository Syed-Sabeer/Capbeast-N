<?php

namespace App\Http\Controllers\Admin\apps;

use App\Http\Controllers\Controller;
use App\Models\CustomizerDesign;
use Illuminate\Http\Request;

class CustomizerDesignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
          $customizerDesigns = CustomizerDesign::with('designCategory')->paginate(10);
          return view('admin.content.apps.customizer.designs.index', compact('customizerDesigns'));
        } catch (\Throwable $th) {
          //throw $th;
          return redirect()->back()->with('error', 'Something went wrong. Please try again!');
        }
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
