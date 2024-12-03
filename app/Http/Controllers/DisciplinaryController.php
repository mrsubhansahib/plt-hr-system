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
        $employees = User::where('role', 'employee')->get();
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
            'user_id'               => 'required|exists:users,id',
        ]);
        $disciplinary = disciplinary::create($request->all());
        return redirect()->route('show.disciplinaries')->with('success','disciplinary created successfully.');
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
            'user_id'               => 'required|exists:users,id'
        ]);
            $disciplinary = disciplinary::findOrFail($id);
            $disciplinary->update($request->all());
            return redirect()->route('show.disciplinaries')
            ->with('success', 'disciplinary updated successfully.');
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
        return redirect()->route('show.disciplinaries')->with('success','dsiciplinary deleted successfully');
    }
}
