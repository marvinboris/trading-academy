<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    //
    protected $fillable = [
        'img', 'name', 'resume', 'links'
    ];

    public function getLinksAttribute($value)
    {
        return json_decode($value, true);
    }
}
