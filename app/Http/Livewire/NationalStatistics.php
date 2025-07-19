<?php

namespace App\Http\Livewire;

use App\Job;
use Livewire\Component;
use App\User;
use Carbon\Carbon;

class NationalStatistics extends Component
{
    public $date = '';
    public $successMsg = '';
    public $errorMsg = '';
    public $resultCounts = [];
    public $user = [];


    public function filter()
    {
        $this->successMsg = $this->errorMsg = '';
        $this->resultCounts = [];

        if (!$this->date) {
            $this->errorMsg = 'Please select a date.';
            return;
        }

        $targetDate = Carbon::parse($this->date)->format('Y-m-d');

        // 1. Get all jobs based on the logic
        $jobs = Job::with('user')
            ->whereHas('user', function ($q) {
                $q->where('status', 'active');
            })
            ->where(function ($query) use ($targetDate) {
                $query->where(function ($q) use ($targetDate) {
                    $q->where('termination_date', '>=', $targetDate)
                        ->where('start_date', '<=', $targetDate);
                })
                    ->orWhere(function ($q) use ($targetDate) {
                        $q->whereNull('termination_date')
                            ->where('start_date', '<=', $targetDate);
                    });
            })
            ->get();

        if ($jobs->isEmpty()) {
            $this->errorMsg = 'No jobs found for the selected date.';
            return;
        }

        // 2. Group jobs by user_id
        $groupedJobs = $jobs->groupBy('user_id');

        // 3. Prepare data buckets
        $data = [
            'male_gt_30' => 0,
            'male_lte_30' => 0,
            'female_gt_30' => 0,
            'female_lte_30' => 0,
            'other_gt_30' => 0,
            'other_lte_30' => 0,
        ];

        // 4. Process each user
        foreach ($groupedJobs as $userId => $userJobs) {
            $user = $userJobs->first()->user;
            $totalHours = $userJobs->sum('number_of_hours');

            $gender = strtolower($user->gender ?? 'other'); // Default to 'other' if gender is null

            if ($gender === 'male') {
                $data[$totalHours <= 30 ? 'male_lte_30' : 'male_gt_30']++;
            } elseif ($gender === 'female') {
                $data[$totalHours <= 30 ? 'female_lte_30' : 'female_gt_30']++;
            } else {
                $data[$totalHours <= 30 ? 'other_lte_30' : 'other_gt_30']++;
            }
        }

        $this->resultCounts = $data;
        $this->successMsg = 'Data retrieved successfully for ' . Carbon::parse($this->date)->format('d-m-Y');
        $this->resetFilters();
    }

    public function resetFilters()
    {
        $this->date = '';
    }

    public function render()
    {
        return view('livewire.national-statistics');
    }
}
