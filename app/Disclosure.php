<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disclosure extends Model
{
    use HasFactory;
    protected $fillable = [
        'dbs_evel',
        'date_equested',
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
        return $this->hasOne(User::class,'user_id','id');
    }


}
