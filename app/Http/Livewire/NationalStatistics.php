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

    public function filter()
    {
        $this->successMsg = $this->errorMsg = '';
        $this->resultCounts = [];

        if (!$this->date) {
            $this->errorMsg = 'Please select a date.';
            return;
        }

        $targetDate = Carbon::parse($this->date)->endOfDay();

        $users = Job::where('termination_TE', 'active')
            ->where('role', 'employee')
            ->whereDate('created_at', '<=', $targetDate)
            ->get();

        $data = [
            'male_gt_30' => 0,
            'male_lte_30' => 0,
            'female_gt_30' => 0,
            'female_lte_30' => 0,
            'other_gt_30' => 0,
            'other_lte_30' => 0,
        ];

        foreach ($users as $user) {
            // ✅ Get main job only
            $job = $user->jobs->firstWhere('main_job', 'yes');

            if (!$job) continue;
            $hours = $job->number_of_hours;



            $gender = $user->gender ?? '';

            if ($gender === 'male') {
                $data[$hours > 30 ? 'male_gt_30' : 'male_lte_30']++;
            } elseif ($gender === 'female') {
                $data[$hours > 30 ? 'female_gt_30' : 'female_lte_30']++;
            } else {
                $data[$hours > 30 ? 'other_gt_30' : 'other_lte_30']++;
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
