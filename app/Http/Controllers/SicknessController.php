<?php

namespace App\Http\Controllers;

use App\Sickness;
use Illuminate\Http\Request;
use App\User;

class SicknessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sicknesses = Sickness::with('user')->get();
        return view("pages.sickness.list", compact( "sicknesses"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = User::where('role', 'employee')->where('status','active')->get();
        return view("pages.sickness.create", compact("employees"));
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
            'user_id'               => 'required|exists:users,id',
            'reason_for_absence'    => 'required',
            'date_from'             => 'required',
            'date_to'               => 'required'
        ]);
        // dd($request->all());    
        $Sickness = Sickness::create($request->all());
        return redirect()->route('show.sicknesses')->with('success','Sickness created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sickness  $Sickness
     * @return \Illuminate\Http\Response
     */
    public function show(Sickness $Sickness)
    {
        // return view("pages.sickness.show");

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sickness  $Sickness
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employees = User::where('role', 'employee')->where('status','active')->get();
        $sickness = sickness::with('user')->findOrFail($id);
        return view("pages.sickness.edit", compact("sickness","employees"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sickness  $Sickness
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id'               => 'required|exists:users,id',
            'reason_for_absence'    => 'required',
            'date_from'             => 'required',
            'date_to'               => 'required'
        ]);
            $sickness = sickness::findOrFail($id);
            $sickness->update($request->all());
            return redirect()->route('show.sicknesses')
            ->with('success', 'Sickness updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sickness  $Sickness
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sickness = Sickness::find($id);
        $sickness->delete();
        return redirect()->route('show.sicknesses')->with('success', 'Sickness deleted successfully.');
    }
}
