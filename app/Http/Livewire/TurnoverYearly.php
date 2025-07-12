<?php

namespace App\Http\Livewire;

use App\Dropdown;
use App\Job;
use Carbon\Carbon;
use Livewire\Component;

class TurnoverYearly extends Component
{
    public $successMsg = '';
    public $errorMsg = '';
    public $total_users = 0;
    public $overall_turnover = 0;
    public $casual_turnover = 0;
    public $contracted_turnover = 0;
    public $turnover_by_facility = 0;
    public $users_by_facility = 0;
    public $facilities = [];
    public $selected_facility; // Default value for facility


    public function filter()
    {
        $this->successMsg = $this->errorMsg = '';
        $this->overall_turnover = $this->casual_turnover = $this->contracted_turnover = $this->turnover_by_facility = $this->total_users = $this->users_by_facility = 0;

        if ($this->selected_facility === 'Select') {
            $this->errorMsg = 'Please select a facility.';
            return view('livewire.turnover-monthly');
        }
        // Count total distinct active users
        $this->total_users = Job::where('status', 'active')->distinct('user_id')->count('user_id');
        $this->users_by_facility = Job::where('status', 'active')
            ->where('facility', $this->selected_facility)
            ->distinct('user_id')
            ->count('user_id');

        $endDate = Carbon::now()->format('Y-m-d');
        $startDate = Carbon::now()->subDays(365)->format('Y-m-d');

        // Get jobs that ended in the last month
        $jobs = Job::with('user')
            ->whereBetween('termination_date', [$startDate, $endDate])
            ->get();

        if ($jobs->isEmpty()) {
            $this->errorMsg = 'No jobs found for the selected date.';
            return view('livewire.turnover-monthly');
        }

        $groupedJobs = $jobs->groupBy('user_id');

        foreach ($groupedJobs as $userId => $userJobs) {
            $job = $userJobs->first(); // Latest or relevant job entry
            $contract_type = $job->contract_type;

            if ($contract_type === 'Casual') {
                $this->casual_turnover++;
            }

            if ($contract_type === 'Permanent') {
                $this->contracted_turnover++;
            }

            if (in_array($contract_type, ['Permanent', 'Casual', 'Fixed Term', 'Temporary', 'Permanent Variable'])) {
                $this->overall_turnover++;
            }
            if ($job->facility === $this->selected_facility) {
                $this->turnover_by_facility++;
            }
        }
        $this->total_users += $this->overall_turnover;
        $this->users_by_facility += $this->turnover_by_facility;
        $this->successMsg = 'Data retrieved successfully for last year from ' . Carbon::parse($startDate)->format('d-m-Y') . ' to ' . Carbon::parse($endDate)->format('d-m-Y');
        $this->resetFilter();
    }
    public function resetFilter()
    {
        $this->selected_facility = 'Select'; // Reset facility selection
    }
    public function mount()
    {
        $this->facilities = Dropdown::where('module_type', 'Job')
            ->where('name', 'Facility')
            ->pluck('value')
            ->toArray();
        $this->selected_facility = 'Select'; // Default value for facility

    }



    public function render()
    {
        return view('livewire.turnover-yearly');
    }
}
