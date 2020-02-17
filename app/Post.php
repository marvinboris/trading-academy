<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Post extends Model
{
    //
    use Sluggable;
    use SluggableScopeHelpers;

    protected $fillable = [
        'photo_id', 'title', 'body', 'postable_id', 'postable_type', 'slug'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    
    public function postable() {
        return $this->morphTo();
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
