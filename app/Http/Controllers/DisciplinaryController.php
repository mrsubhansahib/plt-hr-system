<?php

namespace App\Http\Controllers;

use App\Disciplinary;
use App\Dropdown;
use App\User;
use Illuminate\Http\Request;

class DisciplinaryController extends Controller
{


    public function index()
    {
        $disciplinaries = disciplinary::with('user')->whereHas('user', function ($e) {
            $e->where('role', 'employee')->where('status', 'active');
        })->latest()->get();
        return view("pages.disciplinary.list", compact("disciplinaries"));
    }



    public function create()
    {
        $dropdowns = Dropdown::get()->sortBy('value')->values();
        $employees = User::where('role', 'employee')->where('status', 'active')->get();
        return view("pages.disciplinary.create", compact("employees" , "dropdowns"));
    }



    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            // // 'reason_for_disciplinary' => 'required',
            // // 'hearing_date' => 'required',
            // // 'outcome' => 'required',
            // // 'suspended' => 'required',
            // 'date_suspended' => 'required',
        ]);
        $disciplinary = disciplinary::create($request->all());
        return redirect()->route('show.disciplinaries')->with('success', 'Disciplinary created successfully.');
    }



    public function show(Disciplinary $Disciplinary)
    {
        //
    }



    public function edit(Request $request, $id)
    {
        $dropdowns = Dropdown::get()->sortBy('value')->values();
        $form_type = $request->form_type;
        $disciplinary = Disciplinary::with('user')
            ->whereHas('user', function ($query) {
                $query->where('role', 'employee')->where('status', 'active');
            })->findOrFail($id);
        return view("pages.disciplinary.edit", compact("disciplinary", "form_type" , "dropdowns"));
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            // 'reason_for_disciplinary' => 'required',
            // 'hearing_date' => 'required',
            // 'outcome' => 'required',
            // 'suspended' => 'required',
            // 'date_suspended' => 'required',
        ]);
        $disciplinary = disciplinary::findOrFail($id);
        $disciplinary->update($request->all());


        if ($request->form_type == 'tab') {
            session()->flash('active_tab', 'disciplinary-tab');
            return redirect()->route('detail.employee', $disciplinary->user_id)
                ->with('success', 'Disciplinary edited successfully.');
        } else {
            return redirect()->route('show.disciplinaries')->with('success', 'Disciplinary edited successfully.');
        }
    }



    public function destroy($id)
    {
        $disciplinary = disciplinary::find($id);
        $disciplinary->delete();
        session()->flash('active_tab', 'disciplinary-tab');
        return redirect()->back()->with('success', 'Dsiciplinary deleted successfully.');
    }
}
