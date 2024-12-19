<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disclosure extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'dbs_level',
        'date_requested',
        'date_on_certificate',
        'certificate_no',
        'paid_liberata',
        'reimbursed_candidate',
        'invoice_sent',
        'contract_type',
        'notes'
    ];

    // relationships one to one
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function logs()
    {
        return $this->morphMany(Log::class, 'module');
    }
}
