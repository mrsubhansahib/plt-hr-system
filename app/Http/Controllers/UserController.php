<?php

namespace App\Http\Controllers;

use App\Dropdown;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;




class UserController extends Controller
{

    public function index()
    {
        $users = User::whereIn('role', ['admin', 'manager'])
            ->where('status', 'active')->latest()
            ->get();
        // dd($users);
        return view('pages.admin.list', compact('users'));
    }


    public function create()
    {
        $dropdowns = Dropdown::whereIn('module_type', ['User', 'Job'])->orderBy('name')->get()->all();
        return view('pages.admin.create', compact('dropdowns'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'surname' => 'required',
            // 'preferred_name'        => 'required',
            'role' => 'required',
            'email' => 'required',
            'password' => 'required',
            // 'address1'              => 'required',
            // 'town'                  => 'required',
            // 'post_code'             => 'required',
            // 'dob'                   => 'required',
            // 'age'                   => 'required',
            // 'gender'                => 'required',
            // 'ethnicity'             => 'required',
            // 'commencement_date'     => 'required',
            // 'default_cost_center'   => 'required',
            // 'salaried'              => 'required',
            // 'emergency_1_name'      => 'required',
            // 'emergency_1_ph_no'     => 'required',
            // 'emergency_1_relation'  => 'required',
        ]);
        $user = $request->all();
        $user['password'] = Hash::make($request->password);
        $user['status'] = 'active'; //  Ensure status is saved as "active"
        User::create($user);
        // dd($user);
        return redirect()->route('show.admins')
            ->with('success', 'User created successfully.');
    }


    public function show($id)
    {
        // dd($id);
        $user = User::find($id);
        return view('pages.admin.show', compact('user'));
    }


    public function edit($id)
    {
        $user = User::find($id);

        return view('pages.admin.edit', compact('user'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'surname' => 'required',
            // 'preferred_name'            => 'required',
            'email' => 'required',
            // 'address1'                  => 'required',
            // 'town'                      => 'required',
            // 'post_code'                 => 'required',
            // 'dob'                       => 'required',
            // 'age'                       => 'required',
            // 'gender'                    => 'required',
            // 'ethnicity'                 => 'required',
            // 'commencement_date'         => 'required',
            // 'default_cost_center'       => 'required',
            // 'salaried'                  => 'required',
            // 'emergency_1_name'          => 'required',
            // 'emergency_1_ph_no'         => 'required',
            // 'emergency_1_relation'      => 'required',
        ]);
        // dd($id);

        $user = User::find($id);
        $user->update($request->all());



        // Redirect with a success message
        return redirect()->route('show.admins')->with('success', 'User edited successfully.');
    }



    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->update(['status' => 'deleted']);
        return redirect()->route('show.admins')
            ->with('success', 'User deleted successfully.');
    }
}
