<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;

class CurrentColleagues extends Component
{
    public $successMsg;
    public $errorMsg;

    public $date = '';

    public $colleagues = [];
    public function filterColleagues()
    {
        $this->successMsg = $this->errorMsg = '';
        $this->colleagues = []; // Reset colleagues collection

        // Validate date range
        if (!$this->date) {
            $this->errorMsg = 'Date is required.';
            return;
        }

       $query = User::query()
        ->where('role', 'employee')
        ->where('joined_date', '<=', $this->date)
        ->where(function ($q) {
            $q->orWhereNull('left_date')
              ->orWhere('left_date', '>', $this->date);
        })
        ->whereHas('jobs', function ($q) {
            $q->where('status', 'active')
              ->where('main_job', 'yes');
        });

        // Date filters
        
        $this->colleagues = $query->latest()->get();
        
        if ($this->colleagues->isEmpty()) {
            $this->errorMsg = 'No active colleagues found.';
        } else {
            $this->success($this->colleagues->count());
        }

        $this->resetFilters();
    }
    public function success($number)
    {
        $this->successMsg = 'Colleagues filtered successfully. We found ' . $number . ' active  colleagues.';
    }
    public function error($message)
    {
        $this->errorMsg = $message;
    }
    public function resetFilters()
    {
        $this->date = ''; // Reset date
    }
    public function render()
    {
        return view('livewire.current-colleagues');
    }
}
