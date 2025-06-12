<?php

namespace App\Http\Livewire;

use App\User;
use Illuminate\Contracts\Session\Session;
use Livewire\Component;

class SearchColleagues extends Component
{
    public $successMsg;
    public $errorMsg;
    public $status;
    public $start_date = '';
    public $end_date = '';
    public $colleagues = [];
    public function filterColleagues()
    {
        $this->successMsg = $this->errorMsg = '';
        $this->colleagues = []; // Reset colleagues collection

        // Validate date range
        if ($this->start_date && $this->end_date && $this->start_date > $this->end_date) {
            $this->errorMsg = 'Start date cannot be greater than end date.';
            return;
        }

        $query = User::query()->where('role', 'employee');
        // dd($query->toSql());
        // Status filter
        if ($this->status !== "Select") {
            if ($this->status === "active") {
                $query->where('status', 'active');
            } elseif ($this->status === "terminated") {
                $query->where('status', 'terminated');
            }
        } else {
            $query->whereIn('status', ['active', 'terminated']);
        }

        // Date filters
        if ($this->start_date && $this->end_date) {
            if ($this->status === "Select") {
                $query->whereBetween('joined_date', [
                    $this->start_date,
                    $this->end_date . ' 23:59:59'
                ])->orWhereBetween('left_date', [
                    $this->start_date,
                    $this->end_date . ' 23:59:59'
                ]);
            } elseif ($this->status === "active") {
                $query->whereBetween('joined_date', [
                    $this->start_date,
                    $this->end_date . ' 23:59:59'
                ])->where('left_date', '>=', $this->end_date . ' 23:59:59');
            } elseif ($this->status === "terminated") {
                $query->whereBetween('left_date', [
                    $this->start_date,
                    $this->end_date . ' 23:59:59'
                ])->where('joined_date', '<=', $this->start_date);
            }
        } elseif ($this->start_date) {
            if($this->status === "Select") {
                $query->where('joined_date', '>=', $this->start_date)->orWhere('left_date', '>=', $this->start_date);
            } elseif ($this->status === "active") {
                $query->where('joined_date', '>=', $this->start_date);
            } elseif ($this->status === "terminated") {
                $query->where('left_date', '>=', $this->start_date);
            }
        } elseif ($this->end_date) {
            $query->where('left_date', '<=', $this->end_date . ' 23:59:59')->orWhere('joined_date', '<=', $this->end_date );
        }

        $this->colleagues = $query->latest()->get();

        if ($this->colleagues->isEmpty()) {
            $this->errorMsg = 'No data found. Please adjust your filters.';
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
