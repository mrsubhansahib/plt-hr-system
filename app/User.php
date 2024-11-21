<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                'status',
                'first_name',
                'middle_name',
                'surname',
                'preferred_name',
                'email',
                'password',
                'address1',
                'address2',
                'address3',
                'town',
                'Postcode',
                'mobile_tel',
                'home_tel',
                'dob',
                'age',
                'gender',
                'ethnicity',
                'disability',
                'ni_number',
                'employment_date',
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
                'default_cost_centre',
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
                'notes'
    ];

    // relationships one to one 
    public function user_job()
    {
        return $this->hasMany(user_job::class,'user_id','id');
    }  

    // relationships one to one
    public function user_disclosure()
    {
        return $this->hasOne(user_disclosure::class,'user_id','id');
    }

    // relationships one to one
    public function user_sicknesse()
    {
        return $this->hasMany(user_sicknesse::class,'user_id','id');
    }

    // relationships one to one
    public function user_capabilitie()
    {
        return $this->hasMany(user_capabilitie::class,'user_id','id');
    }

// relationships one to one
    public function user_disciplinary()
    {
        return $this->hasMany(user_disciplinary::class,'user_id','id');
    }

    // relationships one to one
    public function user_latenes()
    {
        return $this->hasMany(user_latenes::class,'user_id','id');
    }

    // relationships one to one
    public function user_training()
    {
        return $this->hasMany(user_training::class,'user_id','id');
    }
    

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
