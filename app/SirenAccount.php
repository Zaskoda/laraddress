<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SirenAccount extends Model
{
    protected $fillable = [
        'account_name',
        'contact_id',
        'platform_id',
        'profile_url',
    ];

    public function contact()
    {
        return $this->belongsTo('App\Contact');
    }

    public function platform()
    {
        return $this->belongsTo('App\SirenPlatform');
    }
}
