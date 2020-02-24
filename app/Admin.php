<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    //
    protected $fillable = [
        'name', 'email', 'password', 'is_active', 'phone', 'lang'
    ];

    public function posts()
    {
        return $this->morphMany('App\Post', 'postable');
    }
}
