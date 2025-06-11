<?php

namespace App\Http\Controllers;

use App\Dropdown;
use App\User;
use Illuminate\Http\Request;

class HrController extends Controller
{


    public function index()
    {
        // $users = User::where('role', 'employee')->where('status', 'active')->get();
        // only show those employes whoses atleast 1 fiels is empty
        $users = User::where('role', 'employee')->where('status', 'active')->where(function ($query) {
            $query->whereNull('middle_name')
                ->orWhereNull('home_tel')
                ->orWhereNull('address2')
                ->orWhereNull('address3')
                ->orWhereNull('disability')
                ->orWhereNull('emergency_2_name')
                ->orWhereNull('emergency_2_ph_no')
                ->orWhereNull('emergency_2_home_ph')
                ->orWhereNull('emergency_2_relation')
            ->orWhereNull('emergency_2_ph_no')
                ->orWhereNull('emergency_2_relation')
                ->orWhereNull('contracted_from_date')
                ->orWhereNull('termination_date')
                ->orWhereNull('reason_termination')
                ->orWhereNull('handbook_sent')
                ->orWhereNull('medical_form_returned')
                ->orWhereNull('new_entrant_form_returned')
                ->orWhereNull('confidentiality_statement_returned')
                ->orWhereNull('work_document_received')
                ->orWhereNull('qualifications_checked')
                ->orWhereNull('references_requested')
                ->orWhereNull('references_returned')
                ->orWhereNull('payroll_informed')
                ->orWhereNull('probation_complete')
                ->orWhereNull('equipment_required')
                ->orWhereNull('equipment_ordered')
                ->orWhereNull('p45')
                ->orWhereNull('employee_pack_sent')
                ->orWhereNull('termination_form_to_payroll')
                ->orWhereNull('casual_holiday_pay')
                ->orWhereNull('default_cost_center')
                ->orWhereNull('notes');
        })->latest()->get();

        return view('pages.hr-list.list', compact('users'));
    }


    public function create()
    {
        //
    }



    public function store(Request $request)
    {
        //
    }



    public function show($id)
    {
        //
    }



    public function edit($id)
    {
        $dropdowns = Dropdown::where('module_type', 'User')->orderBy('name')->get()->all();
        $user = User::find($id);
        return view('pages.hr-list.edit', compact('user', 'dropdowns'));
    }



    public function update(Request $request, $id)
    {
        // dd($request->all());
        $user = User::findOrFail($id);
        $user->update($request->all());
        if ($request->has('hr_checklist_employee_detail')) {
        session()->flash('active_tab', 'hr-checklist-tab');
            return redirect()->back()->with('success', 'Employee edited successfully.');
        }
        return redirect()->route('hr_list')->with('success', 'Employee edited successfully.');
    }




    public function destroy($id)
    {
        //
    }
}
