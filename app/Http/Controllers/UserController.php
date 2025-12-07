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
            'role' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = $request->all();
        $user['password'] = Hash::make($request->password);
        $user['status'] = 'active'; //  Ensure status is saved as "active"
        User::create($user);
        return redirect()->route('show.admins')
            ->with('success', 'User created successfully.');
    }
    public function show($id)
    {
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
            'email' => 'required',
        ]);
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