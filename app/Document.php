<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    //
    protected $directory = "/documents/";

    protected $fillable = [
        'name', 'path'
    ];

    public function courses()
    {
        return $this->belongsToMany('App\Course');
    }

    public function getPathAttribute($value)
    {
        return $this->directory . $value;
    }
}
