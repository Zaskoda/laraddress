<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SirenService extends Model
{
    protected $fillable = [
        'service_name',
        'url'
    ];

    public function contact()
    {
        return $this->belongsTo(App\SirenAccount::class);
    }
}