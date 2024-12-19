<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lateness extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'lateness_triggered',
        'lateness_stage',
        'warning_level',
        'outcome',
        'review_date',
        'notes'
    ];

    // relationships one to many
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function logs()
    {
        return $this->morphMany(Log::class, 'module');
    }
}
