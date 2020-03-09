<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $fillable = [
        'student_id', 'session_id', 'amount'
    ];

    public function student()
    {
        return $this->belongsTo('App\Student');
    }

    public function session()
    {
        return $this->belongsTo('App\Session');
    }
}
