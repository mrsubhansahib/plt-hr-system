<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
  
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('pages.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'first_name'=>'required',
        //     'middle_name'=>'required',
        //     'surname'=>'required',
        //     'preferred_name'=>'required',
        //     'email'=>'required',
        //     'role'=>'required',
        //     'status'=>'required',
        //     'password'=>'required',
        //     'address1'=>'required',
        //     'address2'=>'required',
        //     'address3'=>'required',
        //     'town'=>'required',
        //     'Postcode'=>'required',
        //     'mobile_tel'=>'required',
        //     'home_tel'=>'required',
        //     'dob'=>'required',
        //     'age'=>'required',
        //     'gender'=>'required',
        //     'ethnicity'=>'required',
        //     'disability'=>'required',
        //     'ni_number'=>'required',
        //     'employment_date'=>'required',
        //     'contracted_from_date'=>'required',
        //     'termination_date'=>'required',
        //     'reason_termination'=>'required',
        //     'handbook_sent'=>'required',
        //     'medical_form_returned'=>'required',
        //     'new_entrant_form_returned'=>'required',
        //     'confidentiality_statement_returned'=>'required',
        //     'work_document_received'=>'required',
        //     'qualifications_checked'=>'required',
        //     'references_requested'=>'required',
        //     'references_returned'=>'required',
        //     'payroll_informed'=>'required',
        //     'probation_complete'=>'required',
        //     'equipment_required'=>'required',
        //     'equipment_ordered'=>'required',
        //     'default_cost_centre'=>'required',
        //     'salaried'=>'required',
        //     'casual_holiday_pay'=>'required',
        //     'p45'=>'required',
        //     'employee_pack_sent'=>'required',
        //     'emergency_1_name'=>'required',
        //     'emergency_1_ph_no'=>'required',
        //     'emergency_1_home_ph'=>'required',
        //     'emergency_1_relation'=>'required',
        //     'emergency_2_name'=>'required',
        //     'emergency_2_ph_no'=>'required',
        //     'emergency_2_home_ph'=>'required',
        //     'emergency_2_relation'=>'required',
        //     'termination_form_to_payroll'=>'required',
        //     'notes'=>'required'

        // ]);
        $user = User::create($request->all());

        return redirect('/dashboard')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     * @param  int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @param  User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->all());

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
