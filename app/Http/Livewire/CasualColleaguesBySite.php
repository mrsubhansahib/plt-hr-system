<?php

namespace App\Http\Livewire;

use App\Job;
use Livewire\Component;

class CasualColleaguesBySite extends Component
{
    public $successMsg;
    public $errorMsg;
    public $facility;
    public $colleagues = [];
    public $nowFacility; // Default facility selection
    public function filterColleagues()
    {
        $this->nowFacility = $this->successMsg = $this->errorMsg = '';
        $this->colleagues = []; // Reset colleagues collection
        $query = Job::query();

        if ($this->facility !== "Select") {
            $this->nowFacility = $this->facility; // Store the selected facility
            $query->where('facility', $this->facility)->where('contract_type', 'casual')->where('status', 'active')->latest();
        } else {
            $this->error('Please select a facility to filter by.');
            return; // Exit if no facility is selected
        }

        $jobs = $query->with('user')->get();
        $this->colleagues = $jobs->map->user->filter()->unique('id')->values();

        if ($this->colleagues->isEmpty()) {
            $this->error('No data found. Please adjust your filters.');
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
        $this->facility = 'Select'; // Reset colleague term to default
    }
    public function mount()
    {
        $this->facility = 'Select'; // Default colleague term
    }
    public function render()
    {
        return view('livewire.casual-colleagues-by-site');
    }
}
