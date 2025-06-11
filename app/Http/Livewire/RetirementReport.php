<?php

namespace App\Http\Livewire;

use App\User;
use Carbon\Carbon;
use Livewire\Component;

class RetirementReport extends Component
{
    public $successMsg;
    public $errorMsg;
    public $colleagues = [];

    public function render()
    {
        // Targeting users aged between 66 years 11 months and 67 years
        $minDob = Carbon::now()->subYears(67)->startOfDay();              // 1958-06-10
        $maxDob = Carbon::now()->subYears(66)->subMonths(11)->endOfDay(); // 1958-07-10

        $colleagues = User::whereBetween('dob', [$minDob, $maxDob])
            ->where('role', 'employee')
            ->where('status', 'active')
            ->latest()
            ->get();

        if ($colleagues->isEmpty()) {
            $this->errorMsg = 'No colleagues found who are eligible for retirement.';
        } else {
            $this->successMsg = 'Found ' . $colleagues->count() . ' colleagues eligible for retirement.';
        }

        $this->colleagues = $colleagues;

        return view('livewire.retirement-report', compact('colleagues'));
    }
}
