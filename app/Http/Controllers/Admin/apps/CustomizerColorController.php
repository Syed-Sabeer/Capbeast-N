<?php

namespace App\Http\Controllers\Admin\apps;

use App\Http\Controllers\Controller;
use App\Models\TextColor;
use Illuminate\Http\Request;

class CustomizerColorController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    try {
      $textColors = TextColor::paginate(10);
      return view('admin.content.apps.customizer.colors.index', compact('textColors'));
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
    try {
      return view('admin.content.apps.customizer.colors.add');
    } catch (\Throwable $th) {
      //throw $th;
      return redirect()->back()->with('error', 'Something went wrong. Please try again!');
    }
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    // Manual validation
    $validator = Validator::make($request->all(), [
      'name' => 'required|string|max:255',
      'design_category_id' => 'required|exists:design_categories,id',
      'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
    ]);

    // If validation fails
    if ($validator->fails()) {
      return redirect()->back()
        ->withErrors($validator)
        ->withInput();
    }

    try {
      $validated = $validator->validated();

      // Handle the image upload
      if ($request->hasFile('image')) {
        $file = $request->file('image');

        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();

        // Trim original name to 20 characters
        $shortName = Str::limit(Str::slug($originalName, '-'), 20, '');

        $filename = $shortName . '.' . $extension;

        $destinationPath = 'storage/designs'; // inside public/uploads/designs
        $file->move(public_path($destinationPath), $filename);
        $imagePath = $destinationPath . '/' . $filename;
      }

      // Save to DB
      CustomizerDesign::create([
        'name' => $validated['name'],
        'design_category_id' => $validated['design_category_id'],
        'image' => $imagePath ?? null,
      ]);

      return redirect()->route(Auth::user()->role . '.customizer-designs.list')->with('success', 'Design added successfully!');
      // return redirect()->back()->with('success', 'Design added successfully!');
    } catch (\Throwable $th) {
      Log::error($th->getMessage());
      return redirect()->back()->with('error', 'Something went wrong. Please try again!')->withInput();
    }
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
    try {
      $designCategories = DesignCategory::all();
      $customizerDesign = CustomizerDesign::findOrFail($id);
      return view('admin.content.apps.customizer.designs.edit', compact('customizerDesign', 'designCategories'));
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
      'name' => 'required|string|max:255',
      'design_category_id' => 'required|exists:design_categories,id',
      'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
    ]);

    // If validation fails
    if ($validator->fails()) {
      return redirect()->back()
        ->withErrors($validator)
        ->withInput()->with('error', 'Validation Error!');
    }

    try {
      $customizerDesign = CustomizerDesign::findOrFail($id);
      $validated = $validator->validated();

      $imagePath = $customizerDesign->image; // Keep existing image path

      // If new image is uploaded
      if ($request->hasFile('image')) {
        // Delete the old image if it exists
        if (isset($customizerDesign->image) && file_exists(public_path($customizerDesign->image))) {
          unlink(public_path($customizerDesign->image)); // Delete the old image
        }
        $file = $request->file('image');

        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();

        $shortName = Str::limit(Str::slug($originalName, '-'), 20, '');
        $filename = $shortName . '.' . $extension;

        $destinationPath = 'storage/designs';
        $file->move(public_path($destinationPath), $filename);

        // Overwrite old image path
        $imagePath = $destinationPath . '/' . $filename;
      }

      // Update record
      $customizerDesign->update([
        'name' => $validated['name'],
        'design_category_id' => $validated['design_category_id'],
        'image' => $imagePath,
      ]);

      return redirect()->back()->with('success', 'Design updated successfully!');
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
    try {
      $customizerDesign = CustomizerDesign::findOrFail($id);
      if (isset($customizerDesign->image) && file_exists(public_path($customizerDesign->image))) {
        unlink(public_path($customizerDesign->image)); // Delete the image
      }
      $customizerDesign->delete();
      return redirect()->back()->with('success', 'Design Deleted Successfully!');
    } catch (\Throwable $th) {
      //throw $th;
      return redirect()->back()->with('error', 'Something went wrong. Please try again!');
    }
  }
}
