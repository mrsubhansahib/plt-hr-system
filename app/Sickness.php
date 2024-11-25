<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sickness extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'date_from',
        'date_to',
        'total_hours',
        'certification_form_received',
        'fit_note_received',
        'notes'
    ];

    // relationships one to many
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
