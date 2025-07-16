<?php

namespace App\Http\Controllers;

use App\Capability;
use App\Dropdown;
use App\User;
use Illuminate\Http\Request;

class CapabilityController extends Controller
{


    public function index()
    {
        $capabilities = Capability::with('user')->whereHas('user', function ($e) {
            $e->where('role', 'employee')->where('status', 'active');
        })->latest()->get();
        return view('pages.capability.list', compact('capabilities'));
    }



    public function create()
    {
        $dropdowns = Dropdown::where('module_type', 'Capability')->orderBy('name')->get()->all();
        $employees = User::where('role', 'employee')->where('status', 'active')->get();
        return view("pages.capability.create", compact('employees', 'dropdowns'));
    }



    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->on_capability_procedure === 'yes') {
            $data['capability_procedure_date'] = now()->format('Y-m-d');
        } else {
            $data['capability_procedure_date'] = null;
        }
        Capability::create($data);
        return redirect()->route('show.capabilities')->with('success', 'Capability created successfully.');
    }



    public function show(Capability $Capability)
    {
        //
    }



    public function edit(Request $request, $id)
    {
        $dropdowns = Dropdown::where('module_type', 'Capability')->orderBy('name')->get()->all();
        $form_type = $request->form_type;
        $capability = Capability::with('user')->find($id);
        $employees = User::where('role', 'employee')->where('status', 'active')->get();
        return view("pages.capability.edit", compact('capability', 'employees', 'form_type', 'dropdowns'));
    }



    public function update(Request $request, $id)
    {
        $capability = Capability::findOrFail($id);
        $data = $request->all();
        // Logic for capability_procedure_date
        if ($capability->on_capability_procedure !== 'yes' && $request->on_capability_procedure === 'yes') {
            // Case: Going from "no" to "yes" → set today's date
            $data['capability_procedure_date'] = now()->format('Y-m-d');
        } elseif ($capability->on_capability_procedure === 'yes' && $request->on_capability_procedure !== 'yes') {
            // Case: Going from "yes" to "no" → clear the date
            $data['capability_procedure_date'] = null;
        } else {
            // No change or staying the same → do not update the field
            unset($data['capability_procedure_date']);
        }
        // Update the capability
        $capability->update($data);
        if ($request->form_type == 'tab') {
            session()->flash('active_tab', 'capability-tab');
            return redirect()->route('detail.employee', $capability->user_id)
                ->with('success', 'Capability edited successfully.');
        } else {
            return redirect()->route('show.capabilities')
                ->with('success', 'Capability edited successfully.');
        }
    }

    public function destroy($id)
    {
        Capability::find($id)->delete();
        session()->flash('active_tab', 'capability-tab');
        return redirect()->back()->with('success', 'Capability deleted successfully.');
    }
}
