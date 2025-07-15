<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;

class OutstandingNewStarterDocs extends Component
{
    public $successMsg;
    public $errorMsg;
    public $colleagues = [];

    public function render()
    {
        $this->colleagues = User::where('status', 'active')->where('role','employee')->where(function($query){
            $query->orWhereNull('contracted_from_date')->orWhereNull('termination_date')->orWhereNull('reason_termination')->orWhereNull('handbook_sent')->orWhereNull('medical_form_returned')->orWhereNull('new_entrant_form_returned')->orWhereNull('confidentiality_statement_returned')->orWhereNull('work_document_received')->orWhereNull('qualifications_checked')->orWhereNull('references_requested')->orWhereNull('references_returned')->orWhereNull('payroll_informed')->orWhereNull('probation_complete')->orWhereNull('equipment_required')->orWhereNull('equipment_ordered')->orWhereNull('casual_holiday_pay')->orWhereNull('p45')->orWhereNull('employee_pack_sent')->orWhereNull('termination_form_to_payroll')->orWhereNull('ihasco_training_sent')->orWhereNull('ihasco_training_complete');
        })->latest()->get();
        if ($this->colleagues->isEmpty()) {
            $this->errorMsg = 'No data found.';
        } else {
            $this->successMsg = 'There are ' . $this->colleagues->count() . ' colleagues with Outstanding New Starter Docs.';
        }

        return view('livewire.outstanding-new-starter-docs');
    }
}
