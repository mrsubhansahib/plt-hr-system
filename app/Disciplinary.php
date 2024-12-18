<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplinary extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'reason_for_disciplinary',
        'hearing_date',
        'outcome',
        'suspended',
        'date_suspended',
        'notes'
    ];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function logs()
    {
        return $this->morphMany(Log::class, 'module');
    }
}
