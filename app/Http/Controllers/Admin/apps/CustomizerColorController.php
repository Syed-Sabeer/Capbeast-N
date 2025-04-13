<?php

namespace App\Http\Controllers\Admin\apps;

use App\Http\Controllers\Controller;
use App\Models\TextColor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
      'color_name' => 'required|string|max:255',
      'text_color_code' => 'nullable|string|max:255',
      'color_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
    ]);

    // If validation fails
    if ($validator->fails()) {
      return redirect()->back()
        ->withErrors($validator)
        ->withInput()->with('error', 'Validation Error!');
    }

    try {
      $validated = $validator->validated();

      // Handle the image upload
      if ($request->hasFile('color_image')) {
        $file = $request->file('color_image');

        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();

        // Trim original name to 20 characters
        $shortName = Str::limit(Str::slug($originalName, '-'), 20, '');

        $filename = $shortName . '.' . $extension;

        $destinationPath = 'storage/text_colors'; // inside public/uploads/designs
        $file->move(public_path($destinationPath), $filename);
        $imagePath = $destinationPath . '/' . $filename;
      }

      // Save to DB
      TextColor::create([
        'color_name' => $validated['color_name'],
        'text_color_code' => $validated['text_color_code'],
        'color_image' => $imagePath ?? null,
      ]);

      return redirect()->route(Auth::user()->role . '.customizer-colors.list')->with('success', 'Color added successfully!');
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
      $textColor = TextColor::findOrFail($id);
      return view('admin.content.apps.customizer.colors.edit', compact('textColor'));
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
      'color_name' => 'required|string|max:255',
      'text_color_code' => 'nullable|string|max:255',
      'color_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
    ]);

    // If validation fails
    if ($validator->fails()) {
      return redirect()->back()
        ->withErrors($validator)
        ->withInput()->with('error', 'Validation Error!');
    }

    try {
      $textColor = TextColor::findOrFail($id);
      $validated = $validator->validated();

      $imagePath = $textColor->color_image; // Keep existing image path

      // If new image is uploaded
      if ($request->hasFile('color_image')) {
        // Delete the old image if it exists
        if (isset($textColor->color_image) && file_exists(public_path($textColor->color_image))) {
          unlink(public_path($textColor->color_image)); // Delete the old image
        }
        $file = $request->file('color_image');

        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();

        $shortName = Str::limit(Str::slug($originalName, '-'), 20, '');
        $filename = $shortName . '.' . $extension;

        $destinationPath = 'storage/text_colors';
        $file->move(public_path($destinationPath), $filename);

        // Overwrite old image path
        $imagePath = $destinationPath . '/' . $filename;
      }

      // Update record
      $textColor->update([
        'color_name' => $validated['color_name'],
        'text_color_code' => $validated['text_color_code'],
        'color_image' => $imagePath,
      ]);

      return redirect()->route(Auth::user()->role . '.customizer-colors.list')->with('success', 'Color updated successfully!');
      // return redirect()->back()->with('success', 'Color updated successfully!');
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
      $textColor = TextColor::findOrFail($id);
      if (isset($textColor->color_image) && file_exists(public_path($textColor->color_image))) {
        unlink(public_path($textColor->color_image)); // Delete the image
      }
      $textColor->delete();
      return redirect()->back()->with('success', 'Color Deleted Successfully!');
    } catch (\Throwable $th) {
      //throw $th;
      return redirect()->back()->with('error', 'Something went wrong. Please try again!');
    }
  }
}
