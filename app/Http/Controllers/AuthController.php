<?php

namespace App\Http\Controllers;

// use App\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class AuthController extends Controller
{

    public function login()
    {
        return view('pages.auth.login');
    }



    public function create()
    {
        //
    }


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



    public function edit(Auth $auth)
    {
        //
    }


    public function update(Request $request, Auth $auth)
    {
        //
    }


    public function destroy(Auth $auth)
    {
        //
    }
}
