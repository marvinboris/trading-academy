<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Method extends Model
{
    //
    protected $fillable = [
        'name'
    ];

    public function deposits()
    {
        return $this->hasMany('App\Deposit');
    }
}
