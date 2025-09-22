<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;

class NewColleagues extends Component
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

        // Validate date range
        if ($this->start_date && $this->end_date && $this->start_date > $this->end_date) {
            $this->errorMsg = 'Start date cannot be greater than end date.';
            return;
        } elseif (!$this->start_date || !$this->end_date) {
            $this->errorMsg = 'Both start date and end date are required.';
            return;
        }

        $query = User::query()->where('role', 'employee');
        // Date filters
        if ($this->start_date && $this->end_date) {
            
            $query->whereBetween('commencement_date', [
                $this->start_date,
                $this->end_date . ' 23:59:59'
            ])->where(column: function ($q) {
                $q->orWhereNull('left_date')
                    ->orWhere('left_date', '>', $this->end_date);
            });
        }


        $this->colleagues = $query->latest()->get();
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
        $this->start_date = ''; // Reset start date
        $this->end_date = ''; // Reset end date
    }
    public function render()
    {
        return view('livewire.new-colleagues');
    }
}
