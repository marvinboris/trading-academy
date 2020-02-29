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

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
        return $this->morphMany('App\Post', 'postable');
    }

    public function abbreviation()
    {
        $names = explode(' ', $this->name);
        $string = '';

        foreach ($names as $name) {
            $string .= strtoupper($name[0]);
        }

        return $string;
    }
}
