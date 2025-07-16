<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capability extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'on_capability_procedure',
        'capability_procedure_date',
        'stage',
        'date',
        'outcome',
        'warning_issued_type',
        'review_date',
        'notes'
    ];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id' );
    }
    public function logs()
    {
        return $this->morphMany(Log::class, 'module');
    }
}
