<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;

class FullSicknessCapability extends Component
{
    public $successMsg = '';
    public $errorMsg = '';
    public $colleagues = [];
    public $employee_id;
    public $employee;

    public function mount()
    {
        $this->employee_id = 'Select';
    }

    public function filterColleagues()
    {
        $this->successMsg = $this->errorMsg = '';
        $this->employee = null;

        if ($this->employee_id !== "Select") {
            $user = User::with(['jobs', 'capabilities', 'sicknesses'])->find($this->employee_id);

            $onCapability = $user?->capabilities?->first()?->on_capability_procedure;

            if ($user && $onCapability === 'yes') {
                $this->employee = $user;
                $this->successMsg = 'Capability and sickness data loaded for ' . $user->first_name . ' ' . $user->surname;
            } else {
                $this->errorMsg = 'This employee is not on a capability procedure.';
            }
        } else {
            $this->errorMsg = 'Please select an employee.';
        }

        $this->resetFilters();
    }

    public function resetFilters()
    {
        $this->employee_id = 'Select';
    }

    public function render()
    {
        $this->colleagues = User::where('role', 'employee')
            ->where('status', 'active')
            ->latest()
            ->whereHas('capabilities', function ($query) {
                $query->where('on_capability_procedure', 'yes');
            })->latest()

            ->get();

        return view('livewire.full-sickness-capability');
    }
}
