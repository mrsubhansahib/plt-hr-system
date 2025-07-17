<?php

namespace App\Http\Livewire;

use App\Dropdown;
use App\Job;
use App\User;
use Carbon\Carbon;
use Livewire\Component;

class TurnoverYearly extends Component
{
    public $overall_turnover, $casual_turnover, $contracted_turnover, $turnover_by_facility;
    public $total_users, $users_by_facility;
    public $selected_facility, $successMsg, $errorMsg;


    public function filter()
    {
        $this->successMsg = $this->errorMsg = '';
        $this->overall_turnover = $this->casual_turnover = $this->contracted_turnover = $this->turnover_by_facility = 0;
        $this->total_users = $this->users_by_facility = 0;

        if ($this->selected_facility === 'Select') {
            $this->errorMsg = 'Please select a facility.';
            return;
        }

        $endDate = Carbon::now()->format('Y-m-d');
        $startDate = Carbon::now()->subDay(365)->format('Y-m-d');
        /**
         * Get users who left this month
         */
        $leavers = User::whereBetween('left_date', [$startDate, $endDate])
            ->with(['jobs' => function ($query) {
                $query->latest();
            }])
            ->get();
        if ($leavers->isEmpty()) {
            $this->errorMsg = 'No users left during this month.';
            return;
        }

        /**
         * Get users who were active at the start of the month
         * Includes those who left later in the month
         */
        $activeUsersStartOfMonth = User::where(function ($query) use ($startDate) {
            $query->orWhereNull('left_date')->orWhere('left_date', '>=', $startDate);
        })->where('status', '!=', 'pending')->get();
        /**
         * Filter users by selected facility
         */
        $activeUsersInFacility = $activeUsersStartOfMonth->filter(function ($user) {
            return $user->jobs->first()?->facility === $this->selected_facility;
        });

        // Total active users (at start of month)
        $this->total_users = $activeUsersStartOfMonth->count();

        // Total users in selected facility
        $this->users_by_facility = $activeUsersInFacility->count();

        // Categorize leavers
        foreach ($leavers as $user) {
            $job = $user->jobs->first(); // latest job

            if (!$job) continue;

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

        /**
         * Final Calculations – All values are percentages (you can multiply by 100 if needed)
         */
        $this->overall_turnover = $this->total_users > 0 ? round($this->overall_turnover / $this->total_users, 3) : 0;
        $this->casual_turnover = $this->total_users > 0 ? round($this->casual_turnover / $this->total_users, 3) : 0;
        $this->contracted_turnover = $this->total_users > 0 ? round($this->contracted_turnover / $this->total_users, 3) : 0;
        $this->turnover_by_facility = $this->users_by_facility > 0 ? round($this->turnover_by_facility / $this->users_by_facility, 3) : 0;

        $this->successMsg = 'Turnover data calculated for ' . Carbon::parse($startDate)->format('d-m-Y') . ' to ' . Carbon::parse($endDate)->format('d-m-Y');
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
