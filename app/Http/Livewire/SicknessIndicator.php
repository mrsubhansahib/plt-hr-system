<?php

namespace App\Http\Livewire;

use App\Sickness;
use App\User;
use Livewire\Component;

class SicknessIndicator extends Component
{
    public $start_date = '';
    public $end_date = '';
    public $sicknesses = [];
    public $errorMsg = '';
    public $successMsg = '';

    public function filterSicknesses()
    {
        $this->errorMsg = $this->successMsg = '';
        $this->sicknesses = [];

        if (!$this->start_date || !$this->end_date) {
            $this->errorMsg = 'Please provide both start and end dates.';
            return;
        }

        if ($this->start_date > $this->end_date) {
            $this->errorMsg = 'Start date cannot be after end date.';
            return;
        }

        // Get users who have capability records with conditions
        $userIds = User::where('status', 'active')
            ->whereHas('capabilities', function ($query) {
                $query->where('on_capability_procedure', 'yes')
                    ->whereBetween('capability_procedure_date', [$this->start_date, $this->end_date]);
            })
            ->pluck('id');

        if ($userIds->isEmpty()) {
            $this->errorMsg = 'No users found with capability procedure in selected range.';
            return;
        }

        // Now fetch their sicknesses from date range onward
        $this->sicknesses = Sickness::with('user')
            ->whereIn('user_id', $userIds)
            ->whereDate('date_from', '>=', $this->start_date)
            ->get();

        if ($this->sicknesses->isEmpty()) {
            $this->errorMsg = 'No sickness records found for filtered users.';
        } else {
            $this->successMsg = 'Sickness data filtered successfully. Found ' . $this->sicknesses->count() . ' records.';
        }
    }

    public function render()
    {
        return view('livewire.sickness-indicator');
    }
}
