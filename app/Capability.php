<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capability extends Model
{
    use HasFactory;
    protected $fillable = [
        'capability_rocedure',
        'capability_stage',
        'date',
        'outcome',
        'warning_issued_type',
        'review_date',
        'notes'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}