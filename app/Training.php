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
        'notes'
    ];


    // relationships one to many
    public function user()
    {
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }
    public function logs()
    {
        return $this->morphMany(Log::class, 'module');
    }
}
