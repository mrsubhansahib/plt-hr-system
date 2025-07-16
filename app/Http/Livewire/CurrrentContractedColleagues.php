<?php

namespace App\Http\Livewire;

use App\Job;
use Livewire\Component;

class CurrrentContractedColleagues extends Component
{
    public $successMsg;
    public $errorMsg;
    public $colleagues = [];
    public function filterColleagues() {}
    public function success($number)
    {
        $this->successMsg = 'We found ' . $number . ' casual colleagues.';
    }
    public function error($message)
    {
        $this->errorMsg = $message;
    }

    public function render()
    {
        $this->successMsg = $this->errorMsg = '';
        $this->colleagues = []; // Reset colleagues collection
        $jobs = Job::whereHas('user',function($query){
            $query->where('status', 'active');
        })->whereIn('contract_type', ['Permanent', 'Fixed Term', 'Temporary', 'Permanent Variable'])->where('status', 'active')->latest()->get();
        // dd($jobs);
        $this->colleagues = $jobs->map->user->filter()->unique('id')->values();

        if ($this->colleagues->isEmpty()) {
            $this->error('No data found. Please adjust your filters.');
        } else {
            $this->success($this->colleagues->count());
        }
        return view('livewire.currrent-contracted-colleagues');
    }
}
