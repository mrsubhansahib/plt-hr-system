<?php

namespace App\Http\Livewire;

use App\Job;
use App\User;
use Livewire\Component;

class ColleagueTerms extends Component
{
    public $successMsg;
    public $errorMsg;
    public $colleagueTerm;
    public $colleagues = [];
    public function filterColleagues()
    {
        $this->successMsg = $this->errorMsg = '';
        $this->colleagues = []; // Reset colleagues collection
        $query = Job::query();

        if ($this->colleagueTerm !== "Select") {
            $query->where('contract_type', $this->colleagueTerm);
        } else {
            $query->whereIn('contract_type', ['Temporary', 'Fixed Term','Permanent','Permanent Variable','Casual']);
        }
        
        $query->where('status', 'active')->latest();
        // Get users related to jobs
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
        $this->colleagueTerm = 'Select'; // Reset colleague term to default
    }
    public function mount()
    {
        $this->colleagueTerm = 'Select'; // Default colleague term
    }
    public function render()
    {
        return view('livewire.colleague-terms');
    }
}
