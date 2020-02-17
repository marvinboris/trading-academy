<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [
        'post_id', 'body', 'is_active', 'commentable_id', 'commentable_type'
    ];

    public function commentable() {
        return $this->morphTo();
    }

    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function replies()
    {
        return $this->hasMany('App\CommentReply');
    }
}
