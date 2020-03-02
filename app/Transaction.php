<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $fillable = [
        'address', 'user_id', 'amount', 'currency', 'tx_id', 'tx_hash', 'vendor', 'method', 'type', 'status', 'deposit_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
