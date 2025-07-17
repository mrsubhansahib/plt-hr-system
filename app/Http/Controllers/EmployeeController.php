<?php

namespace App\Http\Controllers;

use App\Dropdown;
use App\Job;
use App\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function index()
    {
        $users = User::where('role', 'employee')
            ->where('status', 'active')
            ->with('jobs')
            ->latest()
            ->get();
        foreach ($users as $user) {
            $user->mainJob = $user->jobs->firstWhere('main_job', 'yes');
        }
        return view('pages.employee.list', compact('users'));
    }

    public function checkNI(Request $request)
    {
        $query = User::where('ni_number', $request->ni_number);
        if ($request->has('user_id') && $request->user_id != '') {
            $query->where('id', '!=', $request->user_id);
        }
        $exists = $query->exists();
        return response()->json([
            'status' => $exists ? 'exists' : 'unique',
            'message' => $exists ? 'Already registered.' : 'Available.'
        ]);
    }
    public function temp()
    {
        $users = User::where('role', 'employee')
            ->where('status', 'pending')
            ->latest()
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

        $validatedData = $request->validate([
            'first_name' => 'required',
            'surname' => 'required',
            'preferred_name' => 'required',
            'dob' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'ethnicity' => 'required',
            'address1' => 'required',
            'town' => 'required',
            'post_code' => 'required',
            'email' => 'required',
            'commencement_date' => 'required',
            'ni_number' => 'required',
            'default_cost_center' => 'required',
            'salaried' => 'required',
            'emergency_1_name' => 'required',
            'emergency_1_ph_no' => 'required',
            'emergency_1_relation' => 'required',
        ]);

        $user = User::create($request->only([
            'first_name',
            'middle_name',
            'surname',
            'preferred_name',
            'dob',
            'age',
            'gender',
            'ethnicity',
            'address1',
            'address2',
            'address3',
            'mobile_tel',
            'home_tel',
            'disability',
            'town',
            'post_code',
            'email',
            'commencement_date',
            'ni_number',
            'default_cost_center',
            'salaried',
            'emergency_1_name',
            'emergency_1_ph_no',
            'emergency_1_relation',
            'emergency_1_home_ph',
            'emergency_2_name',
            'emergency_2_ph_no',
            'emergency_2_home_ph',
            'emergency_2_relation'
        ]));
        $user->update(['dob' => \Carbon\Carbon::createFromFormat('d-m-Y', $request->dob)->format('Y-m-d')]);

        // dd($user);
        if ($request->has('title') && is_array($request->title) && count($request->title) > 0) {
            $request->validate([
                'title.*'             => 'required',
                'facility.*'          => 'required',
                'start_date.*'        => 'required|date',
                'rate_of_pay.*'       => 'required',
                'pay_frequency.*'     => 'required',
                'number_of_hours.*'   => 'required',
                'contract_type.*'     => 'required',
                'dbs_required.*'      => 'required',
            ]);
            foreach ($request->title as $index => $title) {
                $job =  Job::create([
                    'user_id' => $user->id,
                    'title' => $title,
                    'main_job' => $request->main_job[$index] ?? 'no',
                    'facility' => $request->facility[$index],
                    'cost_center' => $request->cost_center[$index] ?? null,
                    'start_date' => ($request->start_date[$index]) ? \Carbon\Carbon::createFromFormat('d-m-Y', $request->start_date[$index])->format('Y-m-d') : null,
                    'rate_of_pay' => $request->rate_of_pay[$index],
                    'pay_frequency' => $request->pay_frequency[$index],
                    'number_of_hours' => $request->number_of_hours[$index],
                    'contract_type' => $request->contract_type[$index],
                    'contract_returned' => $request->contract_returned[$index] ?? null,
                    'jd_returned' => $request->jd_returned[$index] ?? null,
                    'dbs_required' => $request->dbs_required[$index],
                    'notes' => $request->notes[$index] ?? null,
                ]);
                if (!empty($request->termination_date[$index])) {
                    $job->update(['termination_date' => \Carbon\Carbon::createFromFormat('d-m-Y', $request->termination_date[$index])->format('Y-m-d')]);
                } else {
                    $job->update(['termination_date' => null]);
                }
            }
        }
        return redirect()->route('show.temp.employees')
            ->with('success', 'New Entrant and Jobs created successfully.');
    }
    public function accept_employee($id)
    {
        session()->put('is_acceptance', true);
        $user = User::find($id);
        $user->update(['status' => 'active', 'joined_date' => now()->format('Y-m-d'), 'left_date' => null]);
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
        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }
        $hasDisclosure = $user->disclosures()->count();
        $dropdowns = Dropdown::all();
        return view('pages.employee.show', compact(
            'user',
            'hasDisclosure',
            'dropdowns'
        ));
    }
    // showhistory main mujy user ki jo jo cheez add hoti jay gi vo saari ik ee page py disabled form ki soort main chahiy
    public function showhistory($id)
    {
        $user = User::find($id)->with([
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

        $dropdowns = Dropdown::all();
        return view('pages.employee.history', compact('user', 'dropdowns'));
    }
    public function terminatedShow($id)
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
        return view('pages.employee.show-terminated', compact('user', 'hasDisclosure'));
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
        // dd($request->all());
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
        $user->update(['dob' => \Carbon\Carbon::createFromFormat('d-m-Y', $request->dob)->format('Y-m-d')]);
        if ($user->status == 'pending') {
            return redirect()->route('show.temp.employees')->with('success', 'Employee edited successfully.');
        }
        return redirect()->route('show.employees')->with('success', 'Employee edited successfully.');
    }

    public function left($id)
    {
        $user = User::findOrFail($id);
        $user->update(['status' => 'terminated', 'left_date' => now()->format('Y-m-d')]);
        $job = Job::where('user_id', $id)
            ->where('status', 'active')
            ->update(['status' => 'terminated', 'termination_date' => now()->format('d-m-Y')]);
        return redirect()->route('show.left.employees')->with('success', 'Employee terminated successfully.');
    }

    public function left_employees()
    {
        $users = User::where('role', 'employee')->where('status', 'terminated')->get();
        return view('pages.left_employee.list', compact('users'));
    }
    public function active_employee($id)
    {
        $user = User::find($id);
        $user->update(['status' => 'active', 'joined_date' => now()->format('Y-m-d'), 'left_date' => null]);
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
