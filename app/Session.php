<?php

namespace App;

use Carbon\Carbon;
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
        return $this->belongsToMany('App\Student')->using('App\SessionStudent')->withPivot(['amount', 'status', 'updated_at']);
    }

    public function getStartAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d', $value);
    }

    public function getEndAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d', $value);
    }
}
