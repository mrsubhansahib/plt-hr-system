<?php

namespace App\Http\Controllers;

use App\Dropdown; // Ensure you have this namespace if using models
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DropdownController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all dropdown records
        $dropdowns = Dropdown::all();
        return view('pages.dropdowns.list', compact('dropdowns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dropdowns.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'module_type' => 'required|string',
            'name' => 'required|string',
            'value' => 'required|string',
        ]);

        // Create the dropdown entry
        Dropdown::create([
            'module_type' => $request->module_type,
            'name' => $request->name,
            'value' => $request->value,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('show.dropdowns')->with('success', 'Dropdown added successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dropdown = Dropdown::findOrFail($id);
        return view('pages.dropdowns.edit', compact('dropdown'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'module_type' => 'required|string',
            'name' => 'required|string',
            'value' => 'required|string',
        ]);

        // Find the dropdown by its ID
        $dropdown = Dropdown::findOrFail($id);

        // Update the dropdown with the new values
        $dropdown->update([
            'module_type' => $request->module_type,
            'name' => $request->name,
            'value' => $request->value,
        ]);

        return redirect()->route('show.dropdowns')->with('success', 'Dropdown updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find and delete the dropdown
        Dropdown::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Dropdown deleted successfully.');
    }
}
