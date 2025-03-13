<?php

namespace App\Http\Controllers;

use App\Dropdown;
use App\User;
use Illuminate\Http\Request;

class HrController extends Controller
{


    public function index()
    {
        $users = User::where('role', 'employee')->where('status', 'active')->get();
        return view('pages.hr-list.list', compact('users'));
    }


    public function create()
    {
        //
    }



    public function store(Request $request)
    {
        //
    }



    public function show($id)
    {
        //
    }



    public function edit($id)
    {
        $dropdowns = Dropdown::where('module_type', 'User')->orderBy('name')->get()->all();
        $user = User::find($id);
        return view('pages.hr-list.edit', compact('user', 'dropdowns'));
    }



    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);


        $user->update($request->all());

        return redirect()->route('hr_list')->with('success', 'Employee edited successfully.');
    }




    public function destroy($id)
    {
        //
    }
}
