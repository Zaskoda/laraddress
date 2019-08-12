<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class EmailAccount extends Model
{
    protected $fillable = [
        'email_address',
        'contact_id'
    ];

    public function refreshToken()
    {
        $this->verification_token = Str::random(100);
        $this->save();
    }

    public function contact()
    {
        return $this->belongsTo('App\Contact');
    }
}
