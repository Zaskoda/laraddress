<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'nickname',
        'formal_name',
        'birthday'
    ];

    public function getDisplayName()
    {
        return ($this->nickname ?: ($this->formal_name ?: $this->firstEmail()));
    }

    public function firstEmail()
    {
        $account = $this->emailAccounts->first();
        if ($account) {
            return $account->email_address;
        }
    }

    public function getAge()
    {
        return Carbon::parse($this->birthday)->age;
    }

    public function phoneNumbers()
    {
        return $this->hasMany(PhoneNumber::class);
    }

    public function postalAddresses()
    {
        return $this->hasMany(PostalAddress::class);
    }

    public function socialPostalAddresses()
    {
        return $this->hasMany(SocialAccount::class);
    }

    public function sirenAccounts()
    {
        return $this->hasMany(SirenAccount::class);
    }

    public function emailAccounts()
    {
        return $this->hasMany(EmailAccount::class);
    }

}
