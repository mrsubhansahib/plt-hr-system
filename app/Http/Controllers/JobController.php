<?php

namespace App\Http\Controllers;

use App\Job;
use App\User;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('user')->get();
        return view('pages.job.list', compact('jobs'));
    }
    public function create()
    {
        $employees = User::where('role', 'employee')->where('status','active')->get();
        return view('pages.job.create', compact('employees'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'user_id' => 'required',
            'facility' => 'required',
            'start_date' => 'required',
            'rate_of_pay' => 'required',
            'number_of_hours' => 'required',
            'contract_type' => 'required',
            'dbs_required' => 'required',
        ]);
        $job = Job::create($request->all());
        return redirect()->route('show.jobs')
            ->with('success', 'Job created successfully.');
    }
    public function edit($id)
    {
        $employees = User::where('role', 'employee')->where('status','active')->get();
        $job = Job::with('user')->findOrFail($id);
        return view('pages.job.edit', compact('job' , 'employees'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required',
            'user_id' => 'required',
            'facility' => 'required',
            'start_date' => 'required',
            'rate_of_pay' => 'required',
            'number_of_hours' => 'required',
            'contract_type' => 'required',
            'dbs_required' => 'required',
        ]);
        $job = Job::findOrFail($id);
        $job->update($request->all());
        return redirect()->route('show.jobs')
            ->with('success', 'Job updated successfully.');
    }
    public function show($id){
        $job = Job::with('user')->findOrFail($id);
        return view('pages.job.show', compact('job'));
    }
    public function destroy($id){
        $job = Job::findOrFail($id)->delete();
        return redirect()->route('show.jobs')
            ->with('success', 'Job deleted successfully.');
    }
}
