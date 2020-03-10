<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'role_id', 'is_active', 'is_verified', 'photo_id', 'phone', 'lang', 'ref', 'country', 'sponsor', 'balance'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }

    public function commissions()
    {
        return $this->hasMany('App\Commission');
    }

    public function deposits()
    {
        return $this->hasMany('App\Deposit');
    }

    public static function generateNewRef()
    {
        $letters = range('A', 'Z');
        $numbers = range(0, 9);
        $chars = array_merge($letters, $numbers);
        $length = count($chars);

        $code = '';

        for ($i = 0; $i < 6; $i++) {
            $index = rand(0, $length - 1);
            $code .= $chars[$index];
        }

        return $code;
    }

    public static function ref()
    {
        $ref = self::generateNewRef();
        $user = self::where('ref', $ref)->first();
        while ($user) {
            $ref = self::generateNewRef();
            $user = self::where('ref', $ref)->first();
        }

        return $ref;
    }

    public function abbreviation()
    {
        $names = explode(' ', $this->name());
        $string = '';

        foreach ($names as $name) {
            $string .= strtoupper($name[0]);
        }

        return $string;
    }

    public function referrals($latest = false, $limit = 0)
    {
        $referrals = self::where('sponsor', $this->ref);
        if ($latest) $referrals = $referrals->latest();
        if ($limit > 0) $referrals = $referrals->limit($limit);
        return $referrals->get();
    }

    public function name()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function sponsor()
    {
        return self::where('ref', $this->sponsor)->first();
    }

    public function transfers($latest = false, $show = null)
    {
        $return = Transfer::where('sender', $this->ref)->orWhere('receiver', $this->ref);

        if ($latest) $return = $return->latest();

        if ($show) $return = $return->paginate($show);
        else $return = $return->get();

        return $return;
    }

    public function verification()
    {
        return Verification::where('user_id', $this->id)->first();
    }
}
