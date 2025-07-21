<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $fillable = ['template_title', 'user_id', 'title', 'content'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
