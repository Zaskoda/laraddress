<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostalAddress extends Model
{
    protected $fillable = [
        'contact_id',
        'label',
        'line_1',
        'line_2',
        'city',
        'state',
        'country',
        'zip',
        'primary',
    ];
}
