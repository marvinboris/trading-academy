<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    //
    protected $fillable = [
        'user_id', 'amount', 'session_id', 'referral'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function session()
    {
        return $this->belongsTo('App\Session');
    }
}
