<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'nickname',
        'formal_name',
        'brithday'
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

    public function socialAccounts()
    {
        return $this->hasMany(SocialAccount::class);
    }

    public function emailAccounts()
    {
        return $this->hasMany(EmailAccount::class);
    }

}
