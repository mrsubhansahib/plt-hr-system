<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
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

        $users = User::where('role', 'employee')->where('status','active')->get();
        // dd($users);
        return view('pages.employee.list', compact('users'));
    }
    public function temp()
    {

        $users = User::where('role', 'employee')->where('status','pending')->get();
        // dd($users);
        return view('pages.employee.temp-list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('pages.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'                => 'required',
            'surname'                   => 'required',
            'preferred_name'            => 'required',
            'email'                     => 'required',
            'password'                  => 'required',
            'address1'                  => 'required',
            'town'                      => 'required',
            'post_code'                 => 'required',
            'dob'                       => 'required',
            'age'                       => 'required',
            'gender'                    => 'required',
            'ethnicity'                 => 'required',
            'commencement_date'         => 'required',
            'default_cost_center'       => 'required',
            'salaried'                  => 'required',
            'emergency_1_name'          => 'required',
            'emergency_1_ph_no'         => 'required',
            'emergency_1_relation'      => 'required',
        ]);
        $user = User::create($request->all());

        return redirect()->route('show.employees')
            ->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     * @param  int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $user = user::find($id);
        return view('pages.employee.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('pages.employee.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @param  User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name'                => 'required',
            'surname'                   => 'required',
            'preferred_name'            => 'required',
            'email'                     => 'required',
            'address1'                  => 'required',
            'town'                      => 'required',
            'post_code'                 => 'required',
            'dob'                       => 'required',
            'age'                       => 'required',
            'gender'                    => 'required',
            'ethnicity'                 => 'required',
            'commencement_date'         => 'required',
            'default_cost_center'       => 'required',
            'salaried'                  => 'required',
            'emergency_1_name'          => 'required',
            'emergency_1_ph_no'         => 'required',
            'emergency_1_relation'      => 'required',
        ]);
        $user = User::find($id);
        $user->update($request->all());



        // Redirect with a success message
        return redirect()->route('show.employees')->with('success', 'Employee updated successfully.');
    }


    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();

        return redirect()->route('show.employees')
            ->with('success', 'Employee deleted successfully');
    }
}
