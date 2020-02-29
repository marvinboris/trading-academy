<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    //
    protected $fillable = [
        'sender', 'receiver', 'amount', 'fees', 'comments'
    ];
}
