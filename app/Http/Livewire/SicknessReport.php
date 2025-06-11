<?php

namespace App\Http\Livewire;

use App\Job;
use App\Sickness;
use Livewire\Component;

class SicknessReport extends Component
{
    public $successMsg;
    public $errorMsg;
    public $start_date = '';
    public $end_date = '';
    public $colleagues = [];
    public function filterColleagues()
    {
        $this->successMsg = $this->errorMsg = '';
        $this->colleagues = []; // Reset colleagues collection
        if ($this->start_date && $this->end_date && $this->start_date > $this->end_date) {
            $this->errorMsg = 'Start date cannot be greater than end date.';
            return;
        }

        $query = Sickness::query();

        if ($this->start_date && $this->end_date) {
            $query->whereBetween('date_from', [
                $this->start_date,
                $this->end_date . ' 23:59:59'
            ]);
        } elseif ($this->start_date) {
            $query->where('date_from', '>=', $this->start_date);
        } elseif ($this->end_date) {
            $query->where('date_from', '<=', $this->end_date . ' 23:59:59');
        }

        $sicknesses = $query->latest()->with('user')->get();

        // Group by user ID, filter to users with 3+ sicknesses
        $userSicknessCounts = $sicknesses->groupBy('user_id')->filter(function ($group) {
            return $group->count() >= 3;
        });

        // Extract users
        $this->colleagues = $userSicknessCounts->map(function ($sicknessGroup) {
            return $sicknessGroup->first()->user;
        })->filter()->unique('id')->values();

        if ($this->colleagues->isEmpty()) {
            $this->errorMsg = 'No colleagues found with 3 or more sickness records.';
        } else {
            $this->success($this->colleagues->count());
        }

        $this->resetFilters();
    }

    public function success($number)
    {
        $this->successMsg = 'Colleagues filtered successfully. We found ' . $number . ' colleagues.';
    }
    public function error($message)
    {
        $this->errorMsg = $message;
    }
    public function resetFilters()
    {
        $this->status = 'Select'; // Reset status to default
        $this->start_date = ''; // Reset start date
        $this->end_date = ''; // Reset end date
    }
    public function render()
    {
        return view('livewire.sickness-report');
    }
}
