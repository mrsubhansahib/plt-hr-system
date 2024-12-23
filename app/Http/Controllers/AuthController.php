<?php

namespace App\Http\Controllers;

// use App\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('pages.auth.login');
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
    public function authenticate(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ]);
        $user = User::where('email', $data['email'])->first();

        if ($user->role == 'admin' || $user->role == 'super_admin') {
            if (auth()->attempt($data)) {
                
                return redirect('/dashboard')->with('success', 'Login Successful.');
            } else {
                return back()->with('error', 'Invalid Credentials.');
            }
        } else {
            return back()->with('error', 'You are not authorized to login.');
        }
    }


    public function logout(Request $request)
    {
        auth()->logout();
        return redirect('/')->with('success', 'Logout Successful.');
    }
    public function dashboard()
    {
        $total_employees = User::where('role', 'employee')->where('status', 'active')->count();
        $total_admins = User::where('role', 'admin')->where('status', 'active')->count();
        $total_employees_left = User::where('role', 'employee')->where('status', 'left')->count();
        return view('dashboard', compact('total_employees', 'total_admins', 'total_employees_left'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Auth  $auth
     * @return \Illuminate\Http\Response
     */
    public function edit(Auth $auth)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Auth  $auth
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Auth $auth)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Auth  $auth
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auth $auth)
    {
        //
    }
}
