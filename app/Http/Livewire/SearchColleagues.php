<?php

namespace App\Http\Livewire;

use App\User;
use Illuminate\Contracts\Session\Session;
use Livewire\Component;

class SearchColleagues extends Component
{
    public $status;
    public $start_date = '';
    public $end_date = '';
    public $colleagues = [];
    public function filterColleagues()
    {
        if ($this->status !== "Select" && $this->start_date !== "" && $this->end_date !== "") {
            if ($this->start_date > $this->end_date) {
                $this->error('Start date cannot be greater than end date.');
            } else {
                if ($this->status === "active") {
                    $this->colleagues = User::where('role', 'employee')->where('status', 'active')
                        ->whereBetween('created_at', [$this->start_date, $this->end_date . ' 23:59:59'])
                        ->get();
                        $this->success(count($this->colleagues));
                } elseif ($this->status === "terminated") {
                    $this->colleagues = User::where('role', 'employee')->where('status', 'terminated')
                        ->whereBetween('created_at', [$this->start_date, $this->end_date . ' 23:59:59'])
                        ->get();
                        $this->success(count($this->colleagues));
                } else {
                    $this->error('Status error with start date and end date.');
                }
            }
        } elseif ($this->start_date !== "" && $this->end_date !== "" && $this->status === "Select") {
            if ($this->start_date > $this->end_date) {
                $this->error('Start date cannot be greater than end date.');
            } else {
                $this->colleagues = User::where('role', 'employee')->whereBetween('created_at', [$this->start_date, $this->end_date . ' 23:59:59'])
                    ->get();
                $this->success(count($this->colleagues));
            }
        } elseif ($this->start_date !== "" && $this->end_date === "" && $this->status !== "Select") {
            if ($this->status === "active") {
                $this->colleagues = User::where('role', 'employee')->where('status', 'active')
                    ->where('created_at', '>=', $this->start_date)
                    ->get();
                $this->success(count($this->colleagues));
            } elseif ($this->status === "terminated") {
                $this->colleagues = User::where('role', 'employee')->where('status', 'terminated')
                    ->where('created_at', '>=', $this->start_date)
                    ->get();
                $this->success(count($this->colleagues));
            } else {
                $this->error('Status error with start date only.');
            }
        } elseif ($this->start_date === "" && $this->end_date !== "" && $this->status !== "Select") {
            if ($this->status === "active") {
                $this->colleagues = User::where('role', 'employee')->where('status', 'active')
                    ->where('created_at', '<=', $this->end_date . ' 23:59:59')
                    ->get();
                $this->success(count($this->colleagues));
            } elseif ($this->status === "terminated") {
                $this->colleagues = User::where('role', 'employee')->where('status', 'terminated')
                    ->where('created_at', '<=', $this->end_date . ' 23:59:59')
                    ->get();
                $this->success(count($this->colleagues));
            } else {
                $this->error('Status error with end date only.');
            }
        } elseif ($this->start_date === "" && $this->end_date === "" && $this->status !== "Select") {
            if ($this->status === "active") {
                $this->colleagues = User::where('role', 'employee')->where('status', 'active')
                    ->get();
                $this->success(count($this->colleagues));
            } elseif ($this->status === "terminated") {
                $this->colleagues = User::where('role', 'employee')->where('status', 'terminated')
                    ->get();
                $this->success(count($this->colleagues));
            } else {
                $this->error('Status error with no dates.');
            }
        } elseif ($this->start_date === "" && $this->end_date !== "" && $this->status === "Select") {
            $this->colleagues = User::where('role', 'employee')->whereIn('status',  ['active', 'terminated'])
                ->where('created_at', '<=', $this->end_date . ' 23:59:59')
                ->get();
            $this->success(count($this->colleagues));
        } elseif ($this->start_date !== "" && $this->end_date === "" && $this->status === "Select") {
            $this->colleagues = User::where('role', 'employee')->whereIn('status',  ['active', 'terminated'])
                ->where('created_at', '>=', $this->start_date)
                ->get();
            $this->success(count($this->colleagues));
        } else {
            $this->error('No data found. Please adjust your filters.');
            $this->colleagues = []; // Reset colleagues if no filters are applied
        }
        // dd($this->colleagues);

        $this->resetFilters();
    }
    public function success($number)
    {
        session()->flash('success', 'Colleagues filtered successfully. We found ' . $number . ' colleagues.');
    }
    public function error($message)
    {
        session()->flash('error', $message);
    }
    public function resetFilters()
    {
        $this->status = 'Select'; // Reset status to default
        $this->start_date = ''; // Reset start date
        $this->end_date = ''; // Reset end date
    }
    public function mount()
    {
        // Initialize default values for the properties
        $this->status = 'Select'; // Default status
        // $this->start_date = now()->subMonth()->toDateString(); // Default start date (1 month ago)
        // $this->end_date = now()->toDateString(); // Default end date (today)
    }
    public function render()
    {
        return view('livewire.search-colleagues');
    }
}
