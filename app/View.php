<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    //
    protected $fillable = [
        'course_id', 'mark', 'body', 'user_id'
    ];

    public function course() {
        return $this->belongsTo('App\Course');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
