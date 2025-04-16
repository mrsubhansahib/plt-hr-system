<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content'];
    public function documents()
    {
        return $this->hasMany(Document::class);
    }
    
}
