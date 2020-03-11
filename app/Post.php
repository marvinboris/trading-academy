<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    //
    use Sluggable;

    protected $fillable = [
        'photo_id', 'title', 'body', 'author_id', 'slug'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function author()
    {
        return $this->belongsTo('App\Author');
    }

    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
