<?php

namespace App\Http\Controllers;

use App\Disciplinary;
use App\User;
use Illuminate\Http\Request;

class DisciplinaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disciplinaries = disciplinary::with('user')->get();
        return view("pages.disciplinary.list", compact( "disciplinaries"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = User::where('role', 'employee')->where('status', 'active')->get();
        return view("pages.disciplinary.create", compact("employees"));
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
            'user_id' => 'required',
            'reason_for_disciplinary' => 'required',
            'hearing_date' => 'required',
            'outcome' => 'required',
            'suspended' => 'required',
            'date_suspended' => 'required',
            'notes' => 'required',
        ]);
        $disciplinary = disciplinary::create($request->all());
        return redirect()->route('show.disciplinaries')->with('success','Disciplinary created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Disciplinary  $Disciplinary
     * @return \Illuminate\Http\Response
     */
    public function show(Disciplinary $Disciplinary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Disciplinary  $Disciplinary
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $employees = User::where('role', 'employee')->get();
        $disciplinary = disciplinary::with('user')->findOrFail($id);
        return view("pages.disciplinary.edit", compact("disciplinary","employees"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Disciplinary  $Disciplinary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'reason_for_disciplinary' => 'required',
            'hearing_date' => 'required',
            'outcome' => 'required',
            'suspended' => 'required',
            'date_suspended' => 'required',
            'notes' => 'required',
        ]);
            $disciplinary = disciplinary::findOrFail($id);
            $disciplinary->update($request->all());
            return redirect()->route('show.disciplinaries')
            ->with('success', 'Disciplinary edited successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Disciplinary  $Disciplinary
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $disciplinary = disciplinary::find($id);
        $disciplinary->delete();
        return redirect()->back()->with('success','Dsiciplinary deleted successfully.');
    }
}
