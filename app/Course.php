<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Course extends Model
{
    //
    use Sluggable;

    protected $fillable = [
        'teacher_id', 'title', 'subtitle', 'description', 'course_content', 'requirements', 'what_you_will_learn', 'includes', 'price', 'duration', 'level_rank', 'level_name', 'slug'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }

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

    public function views()
    {
        return $this->hasMany('App\View');
    }

    public function mark()
    {
        $views = $this->views;
        $mark = 0;
        foreach ($views as $view) {
            $mark += $view->mark;
        }
        return count($views) ? $mark / count($views) : 0;
    }

    public function getCourseContentAttribute($value)
    {
        return json_decode($value);
    }

    public function getRequirementsAttribute($value)
    {
        return json_decode($value);
    }

    public function getWhatYouWillLearnAttribute($value)
    {
        return json_decode($value);
    }

    public function getIncludesAttribute($value)
    {
        return json_decode($value);
    }
}
