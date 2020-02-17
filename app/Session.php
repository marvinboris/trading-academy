<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    //
    protected $fillable = [
        'course_id', 'start', 'end', 'places'
    ];

    public function course() {
        return $this->belongsTo('App\Course');
    }

    public function teachers() {
        return $this->belongsToMany('App\Teacher');
    }

    public function students() {
        return $this->belongsToMany('App\Student');
    }
}
