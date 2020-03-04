<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
    //
    protected $directory = '/images/verifications/';
    
    protected $fillable = [
        'user_id', 'admin_id', 'first_name', 'last_name', 'nid', 'expiry_date', 'doc_1', 'doc_2', 'doc_3', 'gender', 'type', 'status', 'comment'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }

    public function getDoc1Attribute($value)
    {
        return $this->directory . $value;
    }

    public function getDoc2Attribute($value)
    {
        return $this->directory . $value;
    }

    public function getDoc3Attribute($value)
    {
        return $this->directory . $value;
    }
}
