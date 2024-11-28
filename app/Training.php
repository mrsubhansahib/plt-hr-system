<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
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
        return $this->belongsTo(User::class);
    }
}
