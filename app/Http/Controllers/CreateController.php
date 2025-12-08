<?php

namespace App\Http\Controllers;

use App\Capability;
use App\Disciplinary;
use App\Disclosure;
use App\Dropdown;
use App\Job;
use App\Lateness;
use App\Sickness;
use App\Training;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function jobCreate($id)
    {
        $dropdowns = Dropdown::where('module_type', 'Job')->orderBy('name')->get()->all();
        $user_id = $id;
        $employee = User::where('id', $id)->where('role', 'employee')->where('status', 'active')->first();
        return view("pages.employee.detail.job", compact("employee", "user_id", 'dropdowns'));
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
        if (!empty($request->termination_date)) {

            if (strtotime($request->termination_date) > strtotime(now())) {
                $request['status'] = 'active';
            } else {
                $request['status'] = 'terminated';
            }
        } else {
            $request['status'] = 'active';
        }
        Job::create($request->all());
        return redirect()->route('detail.employee', $request->user_id)
            ->with('success', 'Job created successfully.');
    }
    /*
|--------------------------------------------------------------------------
| disclosure tab create fuctoins
|--------------------------------------------------------------------------
|*/
    public function disclosureCreate($id)
    {
        $dropdowns = Dropdown::where('module_type', 'Disclosure')->orderBy('name')->get()->all();
        $user_id = $id;
        $employee = User::where('id', $id)->where('role', 'employee')->first();
        return view("pages.employee.detail.disclosure", compact("employee", "user_id", 'dropdowns'));
    }
    public function disclosureStore(Request $request)
    {
        $request->validate([
            'user_id'                   => 'required',
            'dbs_level'                 => 'required',
            'date_requested'            => 'required',
            'contract_type'             => 'required',
        ]);
        Disclosure::create($request->all());
        session()->flash('active_tab', 'disclosure-tab');
        return redirect()->route('detail.employee', $request->user_id)
            ->with('success', 'Disclosure created successfully.');
    }

    /*
|--------------------------------------------------------------------------
| sickness tab create fuctoins
|--------------------------------------------------------------------------
|*/
    public function sicknessCreate($id)
    {
        $user_id = $id;
        $employee = User::where('id', $id)->where('role', 'employee')->first();
        return view("pages.employee.detail.sickness", compact("employee", "user_id"));
    }
    public function sicknessStore(Request $request)
    {
        $request->validate([
            'user_id'               => 'required',
            'reason_for_absence'    => 'required',
            'date_from'             => 'required',
        ]);
        $Sickness = Sickness::create($request->all());
        $Sickness->update(['date_from' => Carbon::createFromFormat('d-m-Y', $request->date_from)->format('Y-m-d')]);
        if ($request->date_to) {
            $Sickness->update(['date_to' => Carbon::createFromFormat('d-m-Y', $request->date_to)->format('Y-m-d')]);
        }
        session()->flash('active_tab', 'sickness-tab');
        return redirect()->route('detail.employee', $request->user_id)
            ->with('success', 'Sickness created successfully.');
    }



    /*
|--------------------------------------------------------------------------
| capability tab create fuctoins
|--------------------------------------------------------------------------
|*/
    public function capabilityCreate($id)
    {
        $dropdowns = Dropdown::where('module_type', 'Capability')->orderBy('value')->get();
        $user_id = $id;
        $employee = User::where('id', $id)->where('role', 'employee')->first();
        return view("pages.employee.detail.capability", compact("employee", "user_id", 'dropdowns'));
    }
    public function capabilityStore(Request $request)
    {
        $data = $request->all();
        if ($request->on_capability_procedure === 'yes') {
            $data['capability_procedure_date'] = now()->format('Y-m-d');
        } else {
            $data['capability_procedure_date'] = null;
        }
        Capability::create($data);
        session()->flash('active_tab', 'capability-tab');
        return redirect()->route('detail.employee', $request->user_id)
            ->with('success', 'Capability created successfully.');
    }



    /*
|--------------------------------------------------------------------------
| training tab create fuctoins
|--------------------------------------------------------------------------
|*/
    public function trainingCreate($id)
    {
        $dropdowns = Dropdown::where('module_type', 'Training')->orderBy('name')->get()->all();
        $user_id = $id;
        $employee = User::where('id', $id)->where('role', 'employee')->first();
        return view("pages.employee.detail.training", compact("employee", "user_id", 'dropdowns'));
    }
    public function trainingStore(Request $request)
    {
        Training::create($request->all());
        session()->flash('active_tab', 'training-tab');
        return redirect()->route('detail.employee', $request->user_id)
            ->with('success', 'Training created successfully.');
    }


    /*
|--------------------------------------------------------------------------
| disciplinary tab create fuctoins
|--------------------------------------------------------------------------
|*/
    public function disciplinaryCreate($id)
    {
        $dropdowns = Dropdown::where('module_type', 'Disciplinary')->orderBy('name')->get();
        $user_id = $id;
        $employee = User::where('id', $id)->where('role', 'employee')->first();
        return view("pages.employee.detail.disciplinary", compact("employee", "user_id", 'dropdowns'));
    }
    public function disciplinaryStore(Request $request)
    {
        Disciplinary::create($request->all());
        session()->flash('active_tab', 'disciplinary-tab');
        return redirect()->route('detail.employee', $request->user_id)
            ->with('success', 'Disciplinary created successfully.');
    }

    /*
|--------------------------------------------------------------------------
| lateness tab create fuctoins
|--------------------------------------------------------------------------
|*/
    public function latenessCreate($id)
    {
        $dropdowns = Dropdown::where('module_type', 'Lateness')->orderBy('name')->get()->all();
        $user_id = $id;
        $employee = User::where('id', $id)->where('role', 'employee')->first();
        return view("pages.employee.detail.lateness", compact("employee", "user_id", 'dropdowns'));
    }
    public function latenessStore(Request $request)
    {
        Lateness::create($request->all());
        session()->flash('active_tab', 'lateness-tab');
        return redirect()->route('detail.employee', $request->user_id)
            ->with('success', 'Lateness created successfully.');
    }
}
