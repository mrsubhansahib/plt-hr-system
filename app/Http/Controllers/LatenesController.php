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
        $latenesses = lateness::with('user')->whereHas('user', function ($e) {
            $e->where('role', 'employee')->where('status','active');
        })->get();
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
            'user_id' => 'required',
            'lateness_triggered'=> 'required',
            'lateness_stage'=> 'required',
            'warning_level'=> 'required',
            'outcome'=> 'required',
            'review_date'=> 'required',
        ]);
        $lateness = lateness::create($request->all());
        return redirect()->route('show.latenesses')->with('success','Lateness created successfully.');
        return redirect()->route('show.latenesses')->with('success','Lateness created successfully.');
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
    public function edit(Request $request, $id)
    {
        $form_type = $request->form_type;
        $employees = User::where('role', 'employee')->where('status','active')->get();
        $lateness = lateness::with('user')->findOrFail($id);
        return view("pages.lateness.edit", compact("lateness","employees", "form_type"));
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
            'lateness_triggered'=> 'required',
            'lateness_stage'=> 'required',
            'warning_level'=> 'required',
            'outcome'=> 'required',
            'review_date'=> 'required',
        ]);
            $lateness = lateness::findOrFail($id);
            $lateness->update($request->all());
            if ($request->form_type == 'tab') {
                return redirect()->route('detail.employee', $lateness->user_id)
                    ->with('success', 'Lateness updated successfully.');
            } else {
            return redirect()->route('show.latenesses')
            ->with('success', 'Lateness updated successfully.');
            }
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
        return redirect()->back()->with('success','Lateness deleted successfully');
    }
}
