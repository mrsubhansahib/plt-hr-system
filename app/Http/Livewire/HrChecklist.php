<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;

class HrChecklist extends Component
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
            $this->employee = User::find($this->employee_id);
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
        $this->successMsg = 'HR checklist information successfully found of ' . $this->employee->first_name . ' ' . $this->employee->surname . '.';
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
            ->where(function ($q) {
                $q->whereNull('contracted_from_date')
                    ->orWhereNull('termination_date')
                    ->orWhereNull('reason_termination')
                    ->orWhereNull('handbook_sent')
                    ->orWhereNull('medical_form_returned')
                    ->orWhereNull('new_entrant_form_returned')
                    ->orWhereNull('confidentiality_statement_returned')
                    ->orWhereNull('work_document_received')
                    ->orWhereNull('qualifications_checked')
                    ->orWhereNull('references_requested')
                    ->orWhereNull('references_returned')
                    ->orWhereNull('payroll_informed')
                    ->orWhereNull('probation_complete')
                    ->orWhereNull('equipment_required')
                    ->orWhereNull('equipment_ordered')
                    ->orWhereNull('p45')
                    ->orWhereNull('employee_pack_sent')
                    ->orWhereNull('termination_form_to_payroll')
                    ->orWhereNull('ihasco_training_sent')
                    ->orWhereNull('ihasco_training_complete')
                    ->orWhereNull('casual_holiday_pay');
            })
            ->latest()
            ->get();
        return view('livewire.hr-checklist');
    }
}
