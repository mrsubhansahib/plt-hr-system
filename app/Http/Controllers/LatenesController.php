<?php

namespace App\Http\Controllers;

use App\Lateness;
use App\User;
use Illuminate\Http\Request;

class LatenesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $latenesses = lateness::with('user')->get();
        return view("pages.lateness.list", compact( "latenesses"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = User::where('role', 'employee')->where('status','active')->get();
        return view("pages.lateness.create", compact("employees"));
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
        $lateness = lateness::create($request->all());
        return redirect()->route('show.latenesses')->with('success','lateness created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lateness  $Lateness
     * @return \Illuminate\Http\Response
     */
    public function show(Lateness $Lateness)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lateness  $Lateness
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employees = User::where('role', 'employee')->where('status','active')->get();
        $lateness = lateness::with('user')->findOrFail($id);
        return view("pages.lateness.edit", compact("lateness","employees"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lateness  $Lateness
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id'               => 'required|exists:users,id'
        ]);
            $lateness = lateness::findOrFail($id);
            $lateness->update($request->all());
            return redirect()->route('show.latenesses')
            ->with('success', 'lateness updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lateness  $Lateness
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lateness = lateness::find($id);
        $lateness->delete();
        return redirect()->route('show.latenesses')->with('success','lateness deleted successfully');
    }
}
