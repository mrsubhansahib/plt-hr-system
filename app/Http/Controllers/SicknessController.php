<?php

namespace App\Http\Controllers;

use App\Sickness;
use Illuminate\Http\Request;
use App\User;

class SicknessController extends Controller
{


    public function index()
    {
        $sicknesses = Sickness::with('user')->whereHas('user', function ($e) {
            $e->where('role', 'employee')->where('status', 'active');
        })->get();
        return view("pages.sickness.list", compact("sicknesses"));
    }



    public function create()
    {
        $employees = User::where('role', 'employee')->where('status', 'active')->get();
        return view("pages.sickness.create", compact("employees"));
    }



    public function store(Request $request)
    {
        $request->validate([
            'user_id'               => 'required|exists:users,id',
            'reason_for_absence'    => 'required',
            'date_from'             => 'required',
            'date_to'               => 'required'
        ]);
        // dd($request->all());    
        $Sickness = Sickness::create($request->all());
        return redirect()->route('show.sicknesses')->with('success', 'Sickness created successfully.');
    }



    public function show(Sickness $Sickness)
    {
        // return view("pages.sickness.show");

    }



    public function edit(Request $request, $id)
    {
        $form_type = $request->form_type;
        $employees = User::where('role', 'employee')->where('status', 'active')->get();
        $sickness = sickness::with('user')->findOrFail($id);
        return view("pages.sickness.edit", compact("sickness", "employees", 'form_type'));
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'reason_for_absence'    => 'required',
            'date_from'             => 'required',
            'date_to'               => 'required'
        ]);
        $sickness = sickness::findOrFail($id);
        $sickness->update($request->all());


        if ($request->form_type == 'tab') {
            return redirect()->route('detail.employee', $sickness->user_id)
                ->with('success', 'Sickness edited successfully.');
        } else {
            return redirect()->route('show.sicknesses')
                ->with('success', 'Sickness edited successfully.');
        }

    }



    public function destroy($id)
    {
        $sickness = Sickness::find($id);
        $sickness->delete();
        return redirect()->back()->with('success', 'Sickness deleted successfully.');
    }
}
