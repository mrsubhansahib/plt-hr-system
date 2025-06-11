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

        // Validate date range
        if ($this->start_date && $this->end_date && $this->start_date > $this->end_date) {
            $this->errorMsg = 'Start date cannot be greater than end date.';
            return;
        }

        $query = Sickness::query();
        // dd($query->toSql());
        // Status filter


        // Date filters
        if ($this->start_date && $this->end_date) {
            $query->where('date_from', '>=', $this->start_date)
                ->where('date_to', '<=', $this->end_date . ' 23:59:59');
        } elseif ($this->start_date) {
            $query->where('date_from', '>=', $this->start_date);
        } elseif ($this->end_date) {
            $query->where('date_to', '<=', $this->end_date . ' 23:59:59');
        }

        $sicknesses = $query->latest()->with('user')->get();
        $this->colleagues = $sicknesses->map->user->filter()->unique('id')->values();
        dd($this->colleagues);
        if ($this->colleagues->isEmpty()) {
            $this->errorMsg = 'No data found. Please adjust your filters.';
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
