<?php

namespace App\Http\Controllers;

use App\Dropdown;
use App\User;
use Illuminate\Http\Request;

class HrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role', 'employee')->where('status', 'active')->get();
        return view('pages.hr-list.list', compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dropdowns = Dropdown::where('module_type', 'User')->orderBy('name')->get()->all();
        $user = User::find($id);
        return view('pages.hr-list.edit', compact('user', 'dropdowns'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // // Validate the request
        // $request->validate([
        //     'main_job' => 'required|in:yes,no',
        //     'cost_center' => 'nullable|string|max:255',
        //     'termination_date' => 'nullable|date',
        //     'pay_frequency' => 'required|in:Per Annum,Per Hour',
        //     'notes' => 'nullable|string'
        // ]);

        // Update user data
        $user->update([
            'main_job' => $request->main_job,
            'cost_center' => $request->cost_center,
            'termination_date' => $request->termination_date,
            'pay_frequency' => $request->pay_frequency,
            'notes' => $request->notes,
        ]);

        return redirect()->route('hr_list')->with('success', 'Employee updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
