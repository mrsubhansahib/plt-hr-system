<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'admin_id',
        'module_name',
        'module_id',  
        'notes',      
    ];

    /**
     * Relationship: The user whose notes are recorded.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Relationship: The admin who added the notes.
     */
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id', 'id');
    }
}
