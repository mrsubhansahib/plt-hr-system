<?php

namespace App\Http\Controllers;

use App\Dropdown; // Ensure you have this namespace if using models
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DropdownController extends Controller
{
    public function userDropdowns()
    {
        $dropdowns = Dropdown::where('module_type', 'user')->orderBy('value', 'asc')->get();
        return view('pages.dropdowns.user', compact('dropdowns'));
    }

    public function jobDropdowns()
    {
        $dropdowns = Dropdown::where('module_type', 'job')->orderBy('value', 'asc')->get();
        return view('pages.dropdowns.job', compact('dropdowns'));
    }

    public function disclosureDropdowns()
    {
        $dropdowns = Dropdown::where('module_type', 'Disclosure')->orderBy('value', 'asc')->get();
        return view('pages.dropdowns.disclosure', compact('dropdowns'));
    }

    public function capabilityDropdowns()
    {
        $dropdowns = Dropdown::where('module_type', 'capability')->orderBy('value', 'asc')->get();
        return view('pages.dropdowns.capability', compact('dropdowns'));
    }
    public function disciplinaryDropdowns()
    {
        $dropdowns = Dropdown::where('module_type', 'Disciplinary')->orderBy('value', 'asc')->get();
        return view('pages.dropdowns.disciplinary', compact('dropdowns'));
    }

    public function latenessDropdowns()
    {
        $dropdowns = Dropdown::where('module_type', 'lateness')->orderBy('value', 'asc')->get();
        return view('pages.dropdowns.lateness', compact('dropdowns'));
    }

    public function trainingDropdowns()
    {
        $dropdowns = Dropdown::where('module_type', 'training')->orderBy('value', 'asc')->get();
        return view('pages.dropdowns.training', compact('dropdowns'));
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
        $dropdown = Dropdown::create([
            'module_type' => $request->module_type,
            'name' => $request->name,
            'value' => $request->value,
            'user_id' => Auth::id(),
        ]);

        switch ($dropdown->module_type) {
            case 'User':
                return redirect()->route('dropdown.user')->with('success', 'User dropdown added successfully!');
            case 'Job':
                return redirect()->route('dropdown.job')->with('success', 'Job dropdown added successfully!');
            case 'Disclosure':
                return redirect()->route('dropdown.disclosure')->with('success', 'Disclosure dropdown added successfully!');
            case 'Capability':
                return redirect()->route('dropdown.capability')->with('success', 'Capability dropdown added successfully!');
            case 'Disciplinary':
                return redirect()->route('dropdown.disciplinary')->with('success', 'Disciplinary dropdown added successfully!');    
            case 'Lateness':
                return redirect()->route('dropdown.lateness')->with('success', 'Lateness dropdown added successfully!');
            case 'Training':
                return redirect()->route('dropdown.training')->with('success', 'Training dropdown added successfully!');
            default:
                return redirect()->route('show.list.dropdowns')->with('success', 'Dropdown added successfully!');
        }
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

        // dd(123);
        // Validate the input
        $request->validate([
            'module_type' => 'required|string',
            'name' => 'required|string',
            'value' => 'required|string',
        ]);

        // Find the dropdown by its ID
        $dropdown = Dropdown::find($id);
        if (!$dropdown) {
            return redirect()->route('dropdown.list')->with('error', 'Dropdown not found!');
        }

        // Update the dropdown with the new values
        $dropdown->update([
            'module_type' => $request->module_type,
            'name' => $request->name,
            'value' => $request->value,
        ]);
        switch ($dropdown->module_type) {
            case 'User':
                return redirect()->route('dropdown.user')->with('success', 'User dropdown updated successfully!');
            case 'Job':
                return redirect()->route('dropdown.job')->with('success', 'Job dropdown updated successfully!');
            case 'Disclosure':
                return redirect()->route('dropdown.disclosure')->with('success', 'Disclosure dropdown updated successfully!');    
            case 'Capability':
                return redirect()->route('dropdown.capability')->with('success', 'Capability dropdown updated successfully!');
            case 'Disciplinary':
                return redirect()->route('dropdown.disciplinary')->with('success', 'Disciplinary dropdown updated successfully!');    
            case 'Lateness':
                return redirect()->route('dropdown.lateness')->with('success', 'Lateness dropdown updated successfully!');
            case 'Training':
                return redirect()->route('dropdown.training')->with('success', 'Training dropdown updated successfully!');
            default:
                return redirect()->route('dropdown.list')->with('success', 'Dropdown updated successfully!');
        }
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
