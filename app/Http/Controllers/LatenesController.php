<?php

namespace App\Http\Controllers;

use App\Dropdown;
use App\Lateness;
use App\User;
use Illuminate\Http\Request;

class LatenesController extends Controller
{


    public function index()
    {
        $latenesses = lateness::with('user')->whereHas('user', function ($e) {
            $e->where('role', 'employee')->where('status', 'active');
        })->latest()->get();
        return view("pages.lateness.list", compact("latenesses"));
    }



    public function create()
    {
        $dropdowns = Dropdown::where('module_type', 'Lateness')->orderBy('name')->get()->all();
        $employees = User::where('role', 'employee')->where('status', 'active')->get();
        return view("pages.lateness.create", compact("employees", 'dropdowns'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            // 'lateness_triggered'=> 'required',
            // 'lateness_stage'=> 'required',
            // 'warning_level'=> 'required',
            // 'outcome'=> 'required',
            // 'review_date'=> 'required',
        ]);
        $lateness = lateness::create($request->all());
        return redirect()->route('show.latenesses')->with('success', 'Lateness created successfully.');
    }



    public function show(Lateness $Lateness)
    {
        //
    }



    public function edit(Request $request, $id)
    {
        $dropdowns = Dropdown::where('module_type', 'Lateness')->orderBy('name')->get()->all();
        $form_type = $request->form_type;
        $employees = User::where('role', 'employee')->where('status', 'active')->get();
        $lateness = lateness::with('user')->findOrFail($id);
        return view("pages.lateness.edit", compact("lateness", "employees", "form_type", 'dropdowns'));
    }



    public function update(Request $request, $id)
    {
        // $request->validate([
        // 'lateness_triggered'=> 'required',
        // 'lateness_stage'=> 'required',
        // 'warning_level'=> 'required',
        // 'outcome'=> 'required',
        // 'review_date'=> 'required',
        // ]);
        $lateness = lateness::findOrFail($id);
        $lateness->update($request->all());
        if ($request->form_type == 'tab') {
            session()->flash('active_tab', 'lateness-tab');
            return redirect()->route('detail.employee', $lateness->user_id)
                ->with('success', 'Lateness updated successfully.');
        } else {
            return redirect()->route('show.latenesses')
                ->with('success', 'Lateness updated successfully.');
        }
    }



    public function destroy($id)
    {
        $lateness = lateness::find($id);
        $lateness->delete();
        session()->flash('active_tab', 'lateness-tab');
        return redirect()->back()->with('success', 'Lateness deleted successfully');
    }
}
