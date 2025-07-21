<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content','personal_info','job_info','disclosure_info','sickness_info','capability_info','disciplinary_info','lateness_info','training_info',];
   
    
}
