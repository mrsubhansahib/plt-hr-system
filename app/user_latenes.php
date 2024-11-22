<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_latenes extends Model
{
    use HasFactory;
    protected $fillable = [
        'lateness_triggered',
        'lateness_stage',
        'warning_level',
        'notes'
    ];

    // relationships one to many
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
