<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    //
    protected $fillable = [
        'user_id', 'method_id', 'amount', 'comments', 'status'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function method()
    {
        return $this->belongsTo('App\Method');
    }
}
