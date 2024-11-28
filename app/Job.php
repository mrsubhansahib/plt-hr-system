<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'main_job',
        'user_id',
        'facility',
        'cost_center',
        'start_date',
        'rate_of_pay',
        'number_of_hours',
        'contract_type',
        'termination_date',
        'contract_returned',
        'jd_returned',
        'dbs_required',
        'notes'
    ];

    // relationships one to many
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
