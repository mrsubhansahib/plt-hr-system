<?php

namespace App\Http\Controllers;

use App\Disclosure;
use App\Dropdown;
use App\User;
use Illuminate\Http\Request;

class DisclosureController extends Controller
{
    public function index()
    {
        $disclosures = Disclosure::with('user')->whereHas('user', function ($e) {
            $e->where('role', 'employee')->where('status', 'active');
        })->latest()->get();
        return view('pages.disclosure.list', compact('disclosures'));
    }

    public function create()
    {
        $dropdowns = Dropdown::get()->sortBy('value')->values();
        $employees = User::where('role', 'employee')
            ->where('status', 'active')->get();
        return view('pages.disclosure.create', compact('employees' , 'dropdowns'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'dbs_level' => 'required',
            'date_requested' => 'required|date',
            'contract_type' => 'required',
        ]);
        $disclosure = Disclosure::create($request->all());
        return redirect()->route('show.disclosures')->with('success', 'Disclosure created successfully.');
    }

    public function show($id)
    {
        $disclosure = Disclosure::with('user')->find($id);
        return view('pages.disclosure.show', compact('disclosure'));
    }

    public function edit(Request $request, $id)
    {
        $dropdowns = Dropdown::get()->sortBy('value')->values();
        $form_type = $request->form_type;
        $disclosure = Disclosure::with('user')->find($id);
        $employees = User::where('role', 'employee')->where('status', 'active')->get();
        return view('pages.disclosure.edit', compact('disclosure', 'employees', 'form_type', 'dropdowns'));
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'dbs_level' => 'required',
            'date_requested' => 'required|date',
            'contract_type' => 'required',
        ]);
        $disclosure = Disclosure::find($id);
        $disclosure->update($request->all());
        if ($request->form_type == "tab") {
            session()->flash('active_tab', 'disclosure-tab');
            return redirect()->route('detail.employee', $disclosure->user_id)
                ->with('success', 'Disclosure edited successfully.');
        } else {
            return redirect()->route('show.disclosures')->with('success', 'Disclosure edited successfully.');
        }
    }

    public function destroy($id)
    {
        $disclosure = Disclosure::find($id);
        $disclosure->delete();
        session()->flash('active_tab', 'disclosure-tab');
        return redirect()->back()->with('success', 'Disclosure deleted successfully.');
    }
}
