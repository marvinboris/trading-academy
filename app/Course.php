<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $fillable = [
        'title', 'description', 'path', 'price', 'duration', 'level_rank', 'level_name'
    ];

    public function documents() {
        return $this->belongsToMany('App\Document');
    }
    
    public function sessions()
    {
        return $this->hasMany('App\Session');
    }
}
