<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name'
    ];

    public function getDisplayName()
    {
        return ($this->name ?: $this->emailAccounts->first()->email_address);
    }

    public function socialAccounts()
    {
        return $this->hasMany(SocialAccount::class);
    }

    public function emailAccounts()
    {
        return $this->hasMany(EmailAccount::class);
    }

}
