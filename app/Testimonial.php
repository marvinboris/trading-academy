<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    //
    protected $fillable = [
        'name', 'img', 'title', 'postTitle', 'links', 'text'
    ];

    public function getLinksAttribute($value)
    {
        return json_decode($value, true);
    }
}
