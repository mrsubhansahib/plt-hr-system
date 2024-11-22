<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplinary extends Model
{
    use HasFactory;
    protected $fillable = [
        'reason_for_disciplinary',
        'hearing_date',
        'outcome',
        'suspended',
        'date_suspended',
        'notes'
    ];


    public function user()
    {
        return $this->hasOne(User::class,'user_id','id');
    }
}
