<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;

class CurrrentColleaguesAllContracts extends Component
{
    public $successMsg;
    public $errorMsg;

    public $date;

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
            ->where('commencement_date', '<=', $this->date)
            ->where(function ($q) {
                $q->orWhereNull('left_date')
                    ->orWhere('left_date', '>', $this->date);
            })              
            ->with('jobs', function ($q) {
                $q->where(function($query){
                    $query->orWhere('termination_date','>', $this->date)
                    ->orWhereNull('termination_date');
                })
                    ->where('start_date', '<=', $this->date);
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
        $this->successMsg = 'Colleagues are filtered successfully for active contracts.';
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
        return view('livewire.currrent-colleagues-all-contracts');
    }
}
