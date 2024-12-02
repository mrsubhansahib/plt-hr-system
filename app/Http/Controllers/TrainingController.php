<?php

namespace App\Http\Controllers;

use App\Training;
use App\User;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainings = Training::with('user')->get();
        return view('pages.training.list', compact('trainings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = User::where('role', 'employee')->where('status','active')->get();
        return view('pages.training.create', compact('employees'));
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
        ]);
        Training::create($request->all());
        return redirect()->route('show.trainings')->with('success', 'Training created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Training  $Training
     * @return \Illuminate\Http\Response
     */
    public function show(Training $Training)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Training  $Training
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $training = Training::with('user')->find($id);
        $employees = User::where('role', 'employee')->where('status','active')->get();
        return view('pages.training.edit', compact('training', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Training  $Training
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
        ]);
        Training::find($id)->update($request->all());
        return redirect()->route('show.trainings')->with('success', 'Training updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Training  $Training
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Training::find($id)->delete();
        return redirect()->route('show.trainings')->with('success', 'Training deleted successfully.');
    }
}
