<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Sickness;
use App\Capability;
use Carbon\Carbon;

class FullSicknessCapability extends Component
{
    public $start_date = '';
    public $end_date = '';
    public $successMsg;
    public $errorMsg;
    public $sickUsers = [];

    public function filterSickness()
    {
        $this->successMsg = $this->errorMsg = '';
        $this->sickUsers = [];

        if (!$this->start_date || !$this->end_date) {
            $this->errorMsg = 'Both start date and end date are required.';
            return;
        }

        if ($this->start_date > $this->end_date) {
            $this->errorMsg = 'Start date cannot be greater than end date.';
            return;
        }

        $usersOnCapability = Capability::where('on_capability_procedure', 'yes')
            ->pluck('user_id');

        $query = Sickness::with('user')
            ->whereIn('user_id', $usersOnCapability)
            ->whereBetween('date_from', [$this->start_date, $this->end_date])
            ->get(); // ⬅️ no filter for 28 days

        if ($query->isEmpty()) {
            $this->errorMsg = 'No sickness records found in the selected date range.';
        } else {
            $this->sickUsers = $query;
            $this->successMsg = 'Records found: ' . $query->count();
        }

        $this->resetFilters();
    }

    public function resetFilters()
    {
        $this->start_date = '';
        $this->end_date = '';
    }

    public function render()
    {
        return view('livewire.full-sickness-capability');
    }
}
