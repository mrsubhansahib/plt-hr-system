<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_training extends Model
{
    use HasFactory;
    protected $fillable = [
        'training_title',
        'course_date',
        'renewal_date',
        'ihasco_training_sent',
        'ihasco_training_complete',
        'notes'
    ];


    // relationships one to many
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
