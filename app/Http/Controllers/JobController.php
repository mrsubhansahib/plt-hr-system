<?php

namespace App\Http\Controllers;

use App\Dropdown;
use App\Job;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        Job::whereNotNull('termination_date')
            ->where('termination_date', '<', Carbon::today())
            ->where('status', 'active')
            ->update(['status' => 'terminated']);

        $jobs = Job::with('user')
            ->whereHas('user', function ($e) {
                $e->where('role', 'employee')->where('status', 'active');
            })
            ->where('status', 'active')
            ->get();
        return view('pages.job.list', compact('jobs'));
    }
    public function create()
    {
        $dropdowns = Dropdown::where('module_type', 'Job')->orderBy('name')->get()->all();
        $employees = User::where('role', 'employee')->where('status', 'active')->get();
        return view('pages.job.create', compact('employees', 'dropdowns'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title'             => 'required',
            'user_id'           => 'required',
            'facility'          => 'required',
            'start_date'        => 'required|date',
            'rate_of_pay'       => 'required',
            'pay_frequency'     => 'required',
            'number_of_hours'   => 'required',
            'contract_type'     => 'required',
            'dbs_required'      => 'required',
            'termination_date'  => 'nullable|date' // Ensuring termination_date is a valid date if provided
        ]);
        $jobData = $request->all();
        if (!empty($jobData['termination_date']) && strtotime($jobData['termination_date']) < strtotime(now())) {
            $jobData['status'] = 'terminated';
        }

        Job::create($jobData);

        return redirect()->route('show.jobs')->with('success', 'Job created successfully.');
    }
    public function edit(Request $request, $id)
    {
        $dropdowns = Dropdown::where('module_type', 'Job')->orderBy('name')->get()->all();
        $form_type = $request->form_type;
        $employees = User::where('role', 'employee')->where('status', 'active')->get();
        $job = Job::with('user')->findOrFail($id);
        return view('pages.job.edit', compact('job', 'employees', 'form_type', 'dropdowns'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'             => 'required',
            'facility'          => 'required',
            'start_date'        => 'required|date',
            'rate_of_pay'       => 'required',
            'number_of_hours'   => 'required',
            'contract_type'     => 'required',
            'dbs_required'      => 'required',
            'termination_date'  => 'nullable|date'
        ]);
        $job = Job::findOrFail($id);
        $jobData = $request->all();
        if (!empty($jobData['termination_date']) && strtotime($jobData['termination_date']) < strtotime(now())) {
            $jobData['status'] = 'terminated';
        }
        if (!empty($jobData['termination_date']) && strtotime($jobData['termination_date']) > strtotime(now())) {
            if ($job->status == 'terminated') {
                $jobData['status'] = 'active';
            }
        }
        $job->update($jobData);

        if ($request->form_type == "tab") {
            return redirect()->route('detail.employee', $job->user_id)
                ->with('success', 'Job edited successfully.');
        } else {
            return redirect()->route('show.jobs')->with('success', 'Job edited successfully.');
        }
    }
    public function terminate($id)
    {
        $job = Job::findOrFail($id);
        if ($job->status !== 'active') {
            return redirect()->route('show.jobs')->with('error', 'Only active jobs can be terminated.');
        }
        $job->status = 'terminated';
        $job->termination_date = Carbon::now();
        $job->save();

        return redirect()->route('show.jobs')->with('success', 'Job terminated successfully.');
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
