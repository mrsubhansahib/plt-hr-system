<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;

class DbsCheck extends Component
{
    public $successMsg;
    public $errorMsg;
    public $dbsCheck;
    public $colleagues = [];
    public function filterColleagues()
    {
        $this->successMsg = $this->errorMsg = '';
        $this->colleagues = []; // Reset colleagues collection
        $query = User::query();
        $fields = [
            'contracted_from_date',
            'termination_date',
            'reason_termination',
            'handbook_sent',
            'medical_form_returned',
            'new_entrant_form_returned',
            'confidentiality_statement_returned',
            'work_document_received',
            'qualifications_checked',
            'references_requested',
            'references_returned',
            'payroll_informed',
            'probation_complete',
            'equipment_required',
            'equipment_ordered',
            'casual_holiday_pay',
            'p45',
            'ihasco_training_sent',
            'ihasco_training_complete',
            'employee_pack_sent',
            'termination_form_to_payroll'
        ];

        if ($this->dbsCheck === "Outstanding") {
            foreach ($fields as $field) {
                $query->whereNotNull($field);
            }
        } elseif ($this->dbsCheck === "Missing") {
            $query->where(function ($q) use ($fields) {
                foreach ($fields as $field) {
                    $q->orWhereNull($field);
                }
            });
        } else {
            $this->error('Please select a DBS check type to filter.');
            return;
        }

        $query->where('role', 'employee');
        $this->colleagues = $query->where('status', 'active')->latest()->get();

        if ($this->colleagues->isEmpty()) {
            $this->error('No data found. Please adjust your filters.');
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
        $this->dbsCheck = 'Select'; // Reset DBS check to default
    }
    public function mount()
    {
        $this->dbsCheck = 'Select'; // Default DBS check
    }
    public function render()
    {
        return view('livewire.dbs-check');
    }
}
