<?php

namespace App\Http\Controllers;

use App\Capability;
use App\Disciplinary;
use App\Disclosure;
use App\Job;
use App\Lateness;
use App\Sickness;
use App\Training;
use App\User;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function jobCreate($id)
    {
        $employee = User::where('id', $id)->where('role', 'employee')->first();
        return view("pages.employee.detail.job" , compact("employee"));
    }
    public function jobStore(Request $request)
{
    $request->validate([
        'user_id'               => 'required',
        'title'                 => 'required',
        'facility'              => 'required',
        'start_date'            => 'required',
        'rate_of_pay'           => 'required',
        'number_of_hours'       => 'required',
        'contract_type'         => 'required',
        'dbs_required'          => 'required',
    ]);
    Job::create($request->all());
    return redirect()->route('detail.employee' , $request->user_id)
        ->with('success', 'Job created successfully.');
}






    public function disclosureCreate($id)
    {
        $employee = User::where('id', $id)->where('role', 'employee')->first();
        return view("pages.employee.detail.disclosure" , compact("employee"));

    }
    public function disclosureStore(Request $request)
{
    $request->validate([
        'user_id'                   => 'required',
        'dbs_level'                 => 'required',
        'date_requested'            => 'required',
        'date_on_certificate'       => 'required',
        'certificate_no'            => 'required',
        'contract_type'             => 'required',
    ]);
    Disclosure::create($request->all());
    // dd($request->all());
    return redirect()->route('detail.employee' , $request->user_id)
        ->with('success', 'Disclosure created successfully.');
}





    public function sicknessCreate($id)
    {
        $employee = User::where('id', $id)->where('role', 'employee')->first();
        return view("pages.employee.detail.sickness" , compact("employee"));

    }
    public function sicknessStore(Request $request)
    {
        $request->validate([
            'user_id'               => 'required',
            'reason_for_absence'    => 'required',
            'date_from'             => 'required',
            'date_to'               => 'required'
        ]);
        Sickness::create($request->all());
        // dd($request->all());
        return redirect()->route('detail.employee' , $request->user_id)
            ->with('success', 'Sickness created successfully.');
    }







    public function capabilityCreate($id)
    {
        $employee = User::where('id', $id)->where('role', 'employee')->first();
        return view("pages.employee.detail.capability" , compact("employee"));
        
    }
    public function capabilityStore(Request $request)
    {
        $request->validate([
            'user_id'                       => 'required',
            'on_capability_procedure'       => 'required',
            'stage'                         => 'required',
            'date'                          => 'required',
            'outcome'                       => 'required',
            'warning_issued_type'           => 'required',
            'review_date'                   => 'required',
            'notes'                         => 'required'
        ]);
        Capability::create($request->all());
        // dd($request->all());
        return redirect()->route('detail.employee' , $request->user_id)
            ->with('success', 'Capability created successfully.');
    }






    public function trainingCreate($id)
    {
        $employee = User::where('id', $id)->where('role', 'employee')->first();
        return view("pages.employee.detail.training" , compact("employee"));

    }
    public function trainingStore(Request $request)
    {
        $request->validate([
            'user_id'                       => 'required',
            'training_title'                => 'required',
            'course_date'                   => 'required',
            'renewal_date'                  => 'required',
            'ihasco_training_sent'          => 'required',
            'ihasco_training_complete'      => 'required',
            'notes'                         => 'required'
        ]);
        Training::create($request->all());
        // dd($request->all());
        return redirect()->route('detail.employee' , $request->user_id)
            ->with('success', 'Training created successfully.');
    }





    public function disciplinaryCreate($id)
    {
        $employee = User::where('id', $id)->where('role', 'employee')->first();
        return view("pages.employee.detail.disciplinary" , compact("employee"));
        
    }
    public function disciplinaryStore(Request $request)
    {
        $request->validate([
            'user_id'                           => 'required',
            'reason_for_disciplinary'           => 'required',
            'hearing_date'                      => 'required',
            'outcome'                           => 'required',
            'suspended'                         => 'required',
            'date_suspended'                    => 'required',
            'notes'                             => 'required'
        ]);
        Disciplinary::create($request->all());
        // dd($request->all());
        return redirect()->route('detail.employee' , $request->user_id)
            ->with('success', 'Disciplinary created successfully.');
    }





    public function latenessCreate($id)
    {
        $employee = User::where('id', $id)->where('role', 'employee')->first();
        return view("pages.employee.detail.lateness" , compact("employee"));
        
    }
    public function latenessStore(Request $request)
    {
        $request->validate([
            'user_id'                           => 'required',
            'lateness_triggered'                => 'required',
            'lateness_stage'                    => 'required',
            'warning_level'                     => 'required',
            'outcome'                           => 'required',
            'review_date'                       => 'required',
            'notes'                             => 'required'
        ]);
        Lateness::create($request->all());
        // dd($request->all());
        return redirect()->route('detail.employee' , $request->user_id)
            ->with('success', 'Lateness created successfully.');
    }



    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
