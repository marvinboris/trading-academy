<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    //
    protected $fillable = [
        'course_id', 'mark', 'body', 'author', 'email', 'photo'
    ];

    public function course() {
        return $this->belongsTo('App\Course');
    }
}
