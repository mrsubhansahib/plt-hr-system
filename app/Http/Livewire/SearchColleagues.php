<?php

namespace App\Http\Livewire;

use App\User;
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
                dd('start date is greater than end date');
            } else {
                if ($this->status === "active") {
                    $this->colleagues = User::where('role', 'employee')->where('status', 'active')
                        ->whereBetween('created_at', [$this->start_date, $this->end_date. ' 23:59:59'])
                        ->get();

                    // dd('active status with date');
                } elseif ($this->status === "terminated") {
                    $this->colleagues = User::where('role', 'employee')->where('status', 'terminated')
                        ->whereBetween('created_at', [$this->start_date, $this->end_date. ' 23:59:59'])
                        ->get();
                    // dd('terminated status with date');
                } else {
                    dd('status error with start date and end date');
                }
            }
            // dd('have data');
        } elseif ($this->start_date !== "" && $this->end_date !== "" && $this->status === "Select") {
            if ($this->start_date > $this->end_date) {
                dd('start date is greater than end date');
            } else {
                $this->colleagues = User::where('role', 'employee')->whereBetween('created_at', [$this->start_date, $this->end_date. ' 23:59:59'])
                    ->get();
                // dd('have dates but no status');
            }
        } elseif ($this->start_date !== "" && $this->end_date === "" && $this->status !== "Select") {
            if ($this->status === "active") {
                $this->colleagues = User::where('role', 'employee')->where('status', 'active')
                    ->where('created_at', '>=', $this->start_date)
                    ->get();
                // dd('active status with start date only');
            } elseif ($this->status === "terminated") {
                $this->colleagues = User::where('role', 'employee')->where('status', 'terminated')
                    ->where('created_at', '>=', $this->start_date)
                    ->get();
                // dd('terminated status with start date only');
            } else {
                dd('status error with start date only');
            }
        } elseif ($this->start_date === "" && $this->end_date !== "" && $this->status !== "Select") {
            if ($this->status === "active") {
                $this->colleagues = User::where('role', 'employee')->where('status', 'active')
                    ->where('created_at', '<=', $this->end_date. ' 23:59:59')
                    ->get();
                // dd('active status with end date only');
            } elseif ($this->status === "terminated") {
                $this->colleagues = User::where('role', 'employee')->where('status', 'terminated')
                    ->where('created_at', '<=', $this->end_date. ' 23:59:59')
                    ->get();
                // dd('terminated status with end date only');
            } else {
                dd('status error with end date only');
            }
        } elseif ($this->start_date === "" && $this->end_date === "" && $this->status !== "Select") {
            if ($this->status === "active") {
                $this->colleagues = User::where('role', 'employee')->where('status', 'active')
                    ->get();
                // dd('active status with no dates');
            } elseif ($this->status === "terminated") {
                $this->colleagues = User::where('role', 'employee')->where('status', 'terminated')
                    ->get();
                // dd('terminated status with no dates');
            } else {
                dd('status error with no dates');
            }
        } elseif ($this->start_date === "" && $this->end_date !== "" && $this->status === "Select") {
            $this->colleagues = User::where('role', 'employee')->whereIn('status',  ['active', 'terminated'])
                ->where('created_at', '<=', $this->end_date. ' 23:59:59')
                ->get();
            // dd('end date only with no status');
        } elseif ($this->start_date !== "" && $this->end_date === "" && $this->status === "Select") {
            $this->colleagues = User::where('role', 'employee')->whereIn('status',  ['active', 'terminated'])
                ->where('created_at', '>=', $this->start_date)
                ->get();
            // dd('start date only with no status');
        } else {
            dd('no data');
        }
        // dd($this->colleagues);

        $this->resetFilters();
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
