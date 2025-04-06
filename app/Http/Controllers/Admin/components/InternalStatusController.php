<?php

namespace App\Http\Controllers\Admin\Components;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InternalStatus;


class InternalStatusController extends Controller
{
    // Show list of statuses
    public function index()
    {
        $statuses = InternalStatus::all();  // Fetch all records (including soft-deleted ones)
        return view('admin.content.component.internalStatusList', compact('statuses'));
    }

    // Show create form
    public function create()
    {
        return view('admin.content.component.internalStatusAdd');
    }

    // Store a new status
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        InternalStatus::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
        ]);

        return redirect()->back()->with('success', 'Status created successfully.');
    }

    // Show edit form
    public function edit($id)
    {
        $status = InternalStatus::findOrFail($id);
        return view('admin.content.component.internalStatusEdit', compact('status'));
    }

    // Update an existing status
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $status = InternalStatus::findOrFail($id);
        $status->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
        ]);

        return redirect()->back()->with('success', 'Status updated successfully.');
    }

    // Soft delete a status
    public function destroy($id)
    {
        $status = InternalStatus::findOrFail($id);
        $status->delete();  // This will trigger soft delete

        return redirect()->back()->with('success', 'Status deleted successfully.');
        // return view('admin.content.component.internalStatusList')->with('success', 'Status deleted successfully.');
    }

    // Restore a soft-deleted status (optional)
    public function restore($id)
    {
        $status = InternalStatus::withTrashed()->findOrFail($id);
        $status->restore();

        return redirect()->back()->with('success', 'Status restored successfully.');
    }
}
