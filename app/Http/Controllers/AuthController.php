<?php

namespace App\Http\Controllers;

// use App\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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
        if (auth()->attempt($data)) {

            return redirect('/dashboard')->with('success', 'Login Successful');
        } else {
            return back()->with('error', 'Invalid Credentials');
        }
    }

    public function getprofile()
    {
        $user = Auth::user();
        return view('pages.general.profile', compact('user'));
    }
    public function edit_profile()
    {
        $user = Auth::user();
        return view('pages.general.editprofile', compact('user'));
    }
    public function update_profile(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'firstName' => 'required',
            'middleName' => 'required',
            'surname' => 'required',  
            'email' => 'required|email|unique:users,email,' . $user->id,
            'address' => 'nullable', 
            'mobile_tel' => 'nullable', 
        ]);
        $user->first_name = $request->firstName;
        $user->middle_name = $request->middleName;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->address1 = $request->address;
        $user->mobile_tel = $request->mobile_tel;
        $user->save();
        return redirect()->route('dashboard')->with('success', 'Profile updated successfully!');
    }

    public function edit_password()
    {
        $user = Auth::user();
        return view('pages.general.editpassword', compact('user'));
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'currentPassword' => 'required',
            'new_password' => 'required|confirmed|min:8',
            'new_password_confirmation' => 'required'
        ]);

        $user = auth()->user();
        if (!Hash::check($request->currentPassword, $user->password)) {
            return back()->with(['error' => 'The current password is incorrect.']);
        } else {
            $user->update([
                'password' => Hash::make($request->new_password)
            ]);
            return redirect()->route('dashboard')->with('success', 'Password updated successfully!');
        }
    }

    public function logout(Request $request)
    {
        auth()->logout();
        return redirect('/')->with('success', 'Logout Successful');
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
