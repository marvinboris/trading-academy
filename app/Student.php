<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $fillable = [
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function sessions()
    {
        return $this->belongsToMany('App\Session')->using('App\SessionStudent')->withPivot(['amount', 'status', 'updated_at']);
    }
}
