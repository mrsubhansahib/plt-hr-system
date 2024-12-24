<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dropdown extends Model
{
    use HasFactory;

    protected $fillable = [
        'module_type',
        'name',
        'value', 
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}