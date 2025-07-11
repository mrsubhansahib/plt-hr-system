<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Job;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class TempFixColleagues extends Component
{
    public string $successMsg = '';
    public string $errorMsg = '';
    public EloquentCollection $colleagues;

    public function mount()
    {
        $this->colleagues = new EloquentCollection();
    }

    public function render()
    {
        $this->successMsg = $this->errorMsg = '';
        $this->colleagues = new EloquentCollection();

        $now = Carbon::now();
        $cutoff = $now->copy()->addDays(60);
        // Get all matching jobs with their user
        $jobs = Job::with('user')
            ->where('status', 'active')
            ->whereIn('contract_type', ['Temporary', 'Fixed Term'])
            ->whereDate('termination_date', '<=', $cutoff)
            ->whereDate('termination_date', '>=', $now)
            ->latest()
            ->get();

        // Filter out any null users and remove duplicate users by ID
        $this->colleagues = $jobs
            ->filter(fn ($job) => $job->user !== null)
            ->values();

        if ($this->colleagues->isEmpty()) {
            $this->errorMsg = 'No temporary/fixed term colleagues expiring within 60 days.';
        } else {
            $this->successMsg = 'Colleagues loaded successfully. We found ' . $this->colleagues->count() . ' expiring colleagues.';
        }

        return view('livewire.temp-fix-colleagues');
    }
}
