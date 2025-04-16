<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'status',
        'first_name',
        'middle_name',
        'surname',
        'preferred_name',
        'role',
        'email',
        'password',
        'address1',
        'address2',
        'address3',
        'town',
        'post_code',
        'mobile_tel',
        'home_tel',
        'dob',
        'age',
        'gender',
        'ethnicity',
        'disability',
        'ni_number',
        'commencement_date',
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
        'default_cost_center',
        'salaried',
        'casual_holiday_pay',
        'p45',
        'employee_pack_sent',
        'emergency_1_name',
        'emergency_1_ph_no',
        'emergency_1_home_ph',
        'emergency_1_relation',
        'emergency_2_name',
        'emergency_2_ph_no',
        'emergency_2_home_ph',
        'emergency_2_relation',
        'termination_form_to_payroll',
        'notes',
        // training fields
        'ihasco_training_sent',
        'ihasco_training_complete',
    ];

    // relationships one to one 
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    // relationships one to one
    public function disclosures()
    {
        return $this->hasMany(Disclosure::class);
    }

    // relationships one to one
    public function sicknesses()
    {
        return $this->hasMany(Sickness::class);
    }

    // relationships one to one
    public function capabilities()
    {
        return $this->hasMany(Capability::class);
    }

    // relationships one to one
    public function disciplinaries()
    {
        return $this->hasMany(Disciplinary::class);
    }

    // relationships one to one
    public function latenesses()
    {
        return $this->hasMany(Lateness::class);
    }

    // relationships one to one
    public function trainings()
    {
        return $this->hasMany(Training::class);
    }
    public function logs()
    {
        return $this->morphMany(Log::class, 'module');
    }
    public function all_notes()
    {
        return $this->hasMany(Note::class);
    }
    public function documents()
    {
        return $this->hasMany(Document::class);
    }


    protected $hidden = [
        'password',
        'remember_token',
    ];

    

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}
