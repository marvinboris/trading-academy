<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    //
    protected $fillable = [
        'user_id', 'amount'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}