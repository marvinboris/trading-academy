<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $fillable = [
        'teacher_id', 'title', 'subtitle', 'description', 'course_content', 'requirements', 'what_you_will_learn', 'includes', 'price', 'duration', 'level_rank', 'level_name'
    ];

    public function teacher()
    {
        return $this->belongsTo('App\Teacher');
    }

    public function documents()
    {
        return $this->belongsToMany('App\Document');
    }

    public function sessions()
    {
        return $this->hasMany('App\Session');
    }
}
