<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;

class FullTimeEquivalent extends Component
{
    public $successMsg;
    public $errorMsg;
    public $total_hours = 0;
    public $colleagues = [];

    public function success()
    {
        $this->successMsg = 'Total number of working hours are ' . $this->total_hours . '. And based on 37 hours per week, we have ' . number_format($this->total_hours / 37, 2) . ' full time equivalent employees.';
    }

    public function error($message)
    {
        $this->errorMsg = $message;
    }

    public function render()
    {
        $this->successMsg = '';
        $this->errorMsg = '';
        $this->total_hours = 0;

        // Only users with active status AND at least one active job
        $this->colleagues = User::where('role', 'employee')
            ->where('status', 'active')
            ->where('commencement_date', '<=', now())
            ->whereHas('jobs', function ($query) {
                $query->where('status', 'active');
            })
            ->latest()
            ->get();
            if ($this->colleagues->isEmpty()) {
                $this->error('No active employees with active jobs found.');
            } else {
                foreach ($this->colleagues as $colleague) {
                    foreach ($colleague->jobs as $job) {
                        if ($job->status === 'active') {
                            // Only count hours for active jobs
                            $this->total_hours += $job->number_of_hours;
                        }
                    }
                }
                $this->success();
        }

        return view('livewire.full-time-equivalent');
    }
}
