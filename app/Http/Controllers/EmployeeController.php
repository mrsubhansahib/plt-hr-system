<?php

namespace App\Http\Controllers;

use App\Dropdown;
use App\Job;
use App\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
  
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $users = User::where('role', 'employee')
            ->where('status', 'active')
            ->with('jobs')
            ->get();
        foreach ($users as $user) {
            $user->mainJob = $user->jobs->firstWhere('main_job', 'yes');
        }
        return view('pages.employee.list', compact('users'));
    }


    public function temp()
    {
        $users = User::where('role', 'employee')
            ->where('status', 'pending')
            ->with('jobs')
            ->get();
        return view('pages.employee.temp-list', compact('users'));
    }


    public function temp_view($id)
    {
        $dropdowns = Dropdown::where('module_type', 'User')->orderBy('name')->get()->all();
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('employee.list')->with('error', 'User  not found.');
        }
        return view('pages.employee.temp-view', compact('user', 'dropdowns'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $dropdowns = Dropdown::whereIn('module_type', ['User', 'Job'])->orderBy('name')->get()->all();
        return view('pages.employee.create', compact('dropdowns'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the employee data
        $request->validate([
            'first_name'                => 'required',
            'surname'                   => 'required',
            'preferred_name'            => 'required',
            'email'                     => 'required',
            'address1'                  => 'required',
            'town'                      => 'required',
            'post_code'                 => 'required',
            'dob'                       => 'required',
            'age'                       => 'required',
            'gender'                    => 'required',
            'ethnicity'                 => 'required',
            'commencement_date'         => 'required',
            'default_cost_center'       => 'required',
            'salaried'                  => 'required',
            'ni_number'                 => 'required',
            'emergency_1_name'          => 'required',
            'emergency_1_ph_no'         => 'required',
            'emergency_1_relation'      => 'required',
        ]);
        $user = User::create($request->all());
        $jobData = $request->only([
            'title',
            'main_job',
            'facility',
            'cost_center',
            'start_date',
            'termination_date',
            'rate_of_pay',
            'pay_frequency',
            'number_of_hours',
            'contract_type',
            'contract_returned',
            'jd_returned',
            'dbs_required',
            'notes',
        ]);
        $jobData['user_id'] = $user->id;  
        Job::create($jobData);
        return redirect()->route('show.temp.employees')
            ->with('success', 'New Entrant created successfully.');
    }
    public function accept_employee($id)
    {
        session()->put('is_acceptance', true);
        $user = User::find($id);
        $user->update(['status' => 'active']);
        session()->forget('is_acceptance');
        return redirect()->route('show.employees')
            ->with('success', 'Employee accepted successfully.');
    }
    public function reject_employee($id)
    {
        // dd($id);
        $user = User::find($id);
        $user->update(['status' => 'rejected']);
        return redirect()->route('show.temp.employees')
            ->with('success', 'Employee rejected successfully.');
    }

    /**
     * Display the specified resource.
     * @param  int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        // dd($id);
        $user = User::with([
            'jobs' => function ($query) {
                $query->whereIn('status', ['terminated', 'active']);
            },
            'disclosures',
            'sicknesses',
            'capabilities',
            'disciplinaries',
            'latenesses',
            'trainings',
            'all_notes' => function ($query) {
                $query->orderBy('created_at', 'desc');
            },
        ])->find($id);
        // dd($user);
        $hasDisclosure = $user->disclosures()->count();
        return view('pages.employee.show', compact('user', 'hasDisclosure'));
    }
    /**
     * Show the form for editing the specified resource.
     * @param  int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $dropdowns = Dropdown::where('module_type', 'User')->orderBy('name')->get()->all();
        $user = User::find($id);

        return view('pages.employee.edit', compact('user', 'dropdowns'));
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @param  User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name'                => 'required',
            'surname'                   => 'required',
            'preferred_name'            => 'required',
            'email'                     => 'required',
            'address1'                  => 'required',
            'town'                      => 'required',
            'post_code'                 => 'required',
            'dob'                       => 'required',
            'age'                       => 'required',
            'gender'                    => 'required',
            'ethnicity'                 => 'required',
            'commencement_date'         => 'required',
            'default_cost_center'       => 'required',
            'salaried'                  => 'required',
            'emergency_1_name'          => 'required',
            'emergency_1_ph_no'         => 'required',
            'emergency_1_relation'      => 'required',
        ]);
        $user = User::find($id);
        $user->update($request->all());
        // Redirect with a success message
        if ($user->status == 'pending') {
            return redirect()->route('show.temp.employees')->with('success', 'Employee edited successfully.');
        }
        return redirect()->route('show.employees')->with('success', 'Employee edited successfully.');
    }

    public function left($id)
    {
        $user = User::findOrFail($id);
        $user->update(['status' => 'terminated']);
        Job::where('user_id', $id)
            ->where('status', 'active')
            ->update(['status' => 'terminated']);
        return redirect()->route('show.left.employees')->with('success', 'Employee left successfully.');
    }

    public function left_employees()
    {
        $users = User::where('role', 'employee')->where('status', 'terminated')->get();
        return view('pages.left_employee.list', compact('users'));
    }
    public function active_employee($id)
    {
        $user = User::find($id);
        $user->update(['status' => 'active']);
        return redirect()->route('show.employees')->with('success', 'Employee activated successfully.');
    }
    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->update(['status' => 'deleted']);
        return redirect()->route('show.employees')
            ->with('success', 'Employee deleted successfully.');
    }
}
