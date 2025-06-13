<?php

namespace App\Http\Livewire;

use App\Job;
use Livewire\Component;

class HoursBySite extends Component
{
    public $successMsg;
    public $errorMsg;
    public $facility;
    public $total_hours = 0;
    public $colleagues = [];
    public $nowFacility; // Default facility selection
    public function filterColleagues()
    {
        $this->nowFacility = $this->successMsg = $this->errorMsg = '';
        $this->colleagues = []; // Reset colleagues collection
        $query = Job::query();

        if ($this->facility !== "Select") {
            $this->nowFacility = $this->facility; // Store the selected facility
            $query->where('facility', $this->facility)->where('status', 'active')->latest();
        } else {
            $this->error('Please select a facility to filter by.');
            return; // Exit if no facility is selected
        }

        $jobs = $query->with('user')->get();
        $this->colleagues = $jobs->map->user->filter()->unique('id')->values();
        if ($this->colleagues->isEmpty()) {
            $this->error('No data found. Please adjust your filters.');
        } else {
            $this->total_hours = 0;

            foreach ($this->colleagues as $colleague) {
                foreach ($colleague->jobs as $job) {
                    if ($job->facility === $this->nowFacility && $job->status === 'active') {
                        // Only count hours for jobs at the selected facility and with active status
                        $this->total_hours += $job->number_of_hours;
                    }
                }
            }
            $this->success();
        }

        $this->resetFilters();
    }
    public function success()
    {
        $this->successMsg = 'There are ' . number_format($this->total_hours, 2) . ' total hours at ' . $this->nowFacility . '.';    
    }
    public function error($message)
    {
        $this->errorMsg = $message;
    }
    public function resetFilters()
    {
        $this->facility = 'Select'; // Reset facility term to default
    }
    public function mount()
    {
        $this->facility = 'Select'; // Default facility term
    }
    public function render()
    {
        return view('livewire.hours-by-site');
    }
}
