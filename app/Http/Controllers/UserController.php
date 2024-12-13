<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

        $users = User::where('role', 'admin')->get();
        return view('pages.admin.list', compact('users'));
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
        $request->validate([
            'first_name'            => 'required',
            'surname'               => 'required',
            'preferred_name'        => 'required',
            'email'                 => 'required',
            'password'              => 'required',
            'address1'              => 'required',
            'town'                  => 'required',
            'post_code'             => 'required',
            'dob'                   => 'required',
            'age'                   => 'required',
            'gender'                => 'required',
            'ethnicity'             => 'required',
            'commencement_date'     => 'required',
            'default_cost_center'   => 'required',
            'salaried'              => 'required',
            'emergency_1_name'      => 'required',
            'emergency_1_ph_no'     => 'required',
            'emergency_1_relation'  => 'required',
        ]);
        $user = $request->all();
        $user['password'] = Hash::make($request->password);
        // dd($user);
        User::create($user);

        return redirect()->route('show.admins')
            ->with('success', 'Admin created successfully.');
    }

    /**
     * Display the specified resource.
     * @param  int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        // dd($id);
        $user = user::find($id);
        return view('pages.admin.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('pages.admin.edit', compact('user'));
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
        // dd($id);

        $user= User::find($id);
        $user->update($request->all());



        // Redirect with a success message
        return redirect()->route('show.admins')->with('success', 'Admin updated successfully.');
    }


    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();

        return redirect()->route('show.admins')
            ->with('success', 'Admin deleted successfully');
    }
}
