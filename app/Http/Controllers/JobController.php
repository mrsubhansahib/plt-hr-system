<?php

namespace App\Http\Controllers;

use App\Dropdown;
use App\Job;
use App\User;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('user')
            ->where('status', 'active')
            ->whereHas('user', function ($e) {
                $e->where('role', 'employee')->where('status', 'active');
            })
            ->get();

        // dd($jobs);
        return view('pages.job.list', compact('jobs'));
    }
    public function create()
    {
        $dropdowns = Dropdown::where('module_type', 'Job')->orderBy('name')->get()->all();
        $employees = User::where('role', 'employee')->where('status', 'active')->get();
        return view('pages.job.create', compact('employees' , 'dropdowns' ));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title'             => 'required',
            'user_id'           => 'required',
            'facility'          => 'required',
            'start_date'        => 'required',
            'rate_of_pay'       => 'required',
            'number_of_hours'   => 'required',
            'contract_type'     => 'required',
            'dbs_required'      => 'required'
        ]);
        $job = Job::create($request->all());
        return redirect()->route('show.jobs')
            ->with('success', 'Job created successfully.');
    }
    public function edit(Request $request, $id)
    {
        $dropdowns = Dropdown::where('module_type', 'Job')->orderBy('name')->get()->all();
        $form_type = $request->form_type;
        $employees = User::where('role', 'employee')->where('status', 'active')->get();
        $job = Job::with('user')->findOrFail($id);
        return view('pages.job.edit', compact('job', 'employees','form_type', 'dropdowns'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'                 => 'required',
            'facility'              => 'required',
            'start_date'            => 'required',
            'rate_of_pay'           => 'required',
            'number_of_hours'       => 'required',
            'contract_type'         => 'required',
            'dbs_required'          => 'required',
        ]);
        $job = Job::findOrFail($id);
        $job->update($request->all());


        // $user_id=$job->user_id;
        if ($request->form_type == "tab") {
            return redirect()->route('detail.employee', $job->user_id)
                ->with('success', 'Job edited successfully.');
        } else {
            return redirect()->route('show.jobs')->with('success', 'Job edited successfully.');
            // return redirect('/employee/detail/'.$user_id);
        }
    }
    public function show($id)
    {
        $job = Job::where('status', 'active')->with('user')->findOrFail($id);
        return view('pages.job.show', compact('job'));
    }
    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        $job->update(['status' => 'deleted']);
        return redirect()->back()
            ->with('success', 'Job deleted successfully.');
    }
}
