<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;

class EmergencyInfo extends Component
{
    public $successMsg = '';
    public $errorMsg = '';
    public $colleagues = [];
    public $employee_id; // Default colleague term
    public $employee; // Selected employee
    public function mount()
    {
        $this->employee_id = 'Select'; // Default employee ID
    }
    public function filterColleagues()
    {

        $this->successMsg = $this->errorMsg = '';
        $this->employee = null; // Reset employee to null

        if ($this->employee_id !== "Select") {
            $this->employee = User::find( $this->employee_id);
        } else {
            $this->error('Please select an employee.');
            $this->resetFilters();
            return;
        }

        if ($this->employee !== null) {
            $this->success();
        } else {
            $this->error('No data found. Please adjust your filters.');
        }

        $this->resetFilters();
    }
    public function success()
    {
        $this->successMsg = 'Emergency information successfully found of ' . $this->employee->first_name . ' ' . $this->employee->surname . '.';
    }
    public function error($message)
    {
        $this->errorMsg = $message;
    }
    public function resetFilters()
    {
        $this->employee_id = 'Select'; // Reset employee ID to default
    }
    public function render()
    {
        $this->colleagues = User::where('role', 'employee')
            ->where('status', 'active')
            ->latest()
            ->get();
        return view('livewire.emergency-info');
    }
}
