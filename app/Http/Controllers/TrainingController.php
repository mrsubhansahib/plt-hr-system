<?php

namespace App\Http\Controllers;

use App\Dropdown;
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
        $trainings = Training::with('user')->whereHas('user', function ($e) {
            $e->where('role', 'employee')->where('status','active');
        })->get();
        return view('pages.training.list', compact('trainings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dropdowns = Dropdown::where('module_type', 'Training')->orderBy('name')->get()->all();

        $employees = User::where('role', 'employee')->where('status','active')->get();
        return view('pages.training.create', compact('employees', 'dropdowns'));
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
            // 'training_title' => 'required',
            // 'course_date' => 'required',
            // 'renewal_date' => 'required',
            // 'ihasco_training_sent' => 'required',
            // 'ihasco_training_complete' => 'required',
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
    public function edit(Request $request, $id)
    {
        $dropdowns = Dropdown::where('module_type', 'Training')->orderBy('name')->get()->all();
        $form_type = $request->form_type;
        $training = Training::with('user')->find($id);
        $employees = User::where('role', 'employee')->where('status','active')->get();
        return view('pages.training.edit', compact('training', 'employees' ,'form_type', 'dropdowns'));
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
            // 'training_title' => 'required',
            // 'course_date' => 'required',
            // 'renewal_date' => 'required',
            // 'ihasco_training_sent' => 'required',
            // 'ihasco_training_complete' => 'required',
        ]);
        $training = Training::findOrFail($id);
        $training->update($request->all());
        if ($request->form_type == 'tab') {
            return redirect()->route('detail.employee', $training->user_id)
                ->with('success', 'Training edited successfully.');
        } else {
        return redirect()->route('show.trainings')->with('success', 'Training edited successfully.');
        }
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
        return redirect()->back()->with('success', 'Training deleted successfully.');
    }
}
