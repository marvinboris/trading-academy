<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //
    protected $fillable = [
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function courses()
    {
        return $this->hasMany('App\Course');
    }

    public function sessions()
    {
        return $this->belongsToMany('App\Session');
    }
}
