<?php
namespace App\Services;

use Illuminate\Support\Facades\Mail;
use App\Mail\Verify;

class EmailService
{

    public function sendVerification($email)
    {
        Mail::to($email)->send(new Verify());
        return true;
    }

}
