<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    protected $fillable = [
        'name', 'email', 'password', 'is_active', 'phone', 'lang'
    ];

    public function posts()
    {
        return $this->morphMany('App\Post', 'postable');
    }
}
