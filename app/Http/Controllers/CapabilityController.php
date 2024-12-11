<?php

namespace App\Http\Controllers;

use App\Capability;
use App\User;
use Illuminate\Http\Request;

class CapabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $capabilities = Capability::with('user')->get();
        return view('pages.capability.list', compact('capabilities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = User::where('role', 'employee')->where('status','active')->get();
        return view("pages.capability.create", compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id'=> 'required',
            'on_capability_procedure'=> 'required',
            'stage'=> 'required',
            'date'=> 'required',
            'outcome'=> 'required',
            'warning_issued_type'=> 'required',
            'review_date'=> 'required',
            'notes'=> 'required',
        ]);
        Capability::create($request->all());
        return redirect()->route('show.capabilities')->with('success', 'Capability created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Capability  $Capability
     * @return \Illuminate\Http\Response
     */
    public function show(Capability $Capability)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Capability  $Capability
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $capability = Capability::with('user')->find($id);
        $employees = User::where('role', 'employee')->where('status','active')->get();
        return view("pages.capability.edit", compact('capability', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Capability  $Capability
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'on_capability_procedure'=> 'required',
            'stage'=> 'required',
            'date'=> 'required',
            'outcome'=> 'required',
            'warning_issued_type'=> 'required',
            'review_date'=> 'required',
            'notes'=> 'required',
        ]);
        Capability::find($id)->update($request->all());
        return redirect()->route('show.capabilities')->with('success', 'Capability updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Capability  $Capability
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Capability::find($id)->delete();
        return redirect()->route('show.capabilities')->with('success', 'Capability deleted successfully');
    }
}
