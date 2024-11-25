<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
        'facility',
        'job_start_date',
        'rate_of_pay',
        'number_of_hours',
        'contrac_type',
        'termination_date',
        'contract_returned',
        'jd_returned',
        'notes'
    ];

    // relationships one to many
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
