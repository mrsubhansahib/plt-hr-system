<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('pages.profile.index');
    }
    public function edit()
    {
        return view('pages.profile.edit');
    }
    public function update(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'surname' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'address1' => 'required',
            'mobile_tel' => 'required', 
        ]);
        
        $user->update($request->all());         
                
        return redirect()->route('dashboard')->with('success', 'Profile updated successfully!');
    }

    public function edit_password()
    {
        return view('pages.profile.edit_password');
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
}
