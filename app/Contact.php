<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'email',
    ];


    public function socialAccount()
    {
        return $this->hasMany('App\SocialAccount');
    }

}
