<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SirenPlatform extends Model
{
    protected $fillable = [
        'platform_name',
        'icon',
        'url'
    ];
}
