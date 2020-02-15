<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    //
    protected $fillable = [
        'name'
    ];

    public function messages() {
        return $this->belongsToMany('App\Message');
    }
}
