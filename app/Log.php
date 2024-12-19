<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = [
        'admin_id',
        'module_id',
        'module_type',
        'action',
        'user_id',
    ];

    public function module()
    {
        return $this->morphTo();
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'admin_id' , 'id');
    }
    public function employee()
    {
        return $this->belongsTo(User::class, 'user_id' , 'id');
    }
}