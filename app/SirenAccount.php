<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SirenService extends Model
{
    protected $fillable = [
        'contact_id'
    ];

    public function contact()
    {
        return $this->belongsTo('App\Contact');
    }

    public function platform()
    {
        return $this->hasOne('App\SocialPlatform');
    }
}
