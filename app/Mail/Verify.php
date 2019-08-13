<?php

namespace App\Mail;

use App\EmailAccount;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Verify extends Mailable
{
    use Queueable, SerializesModels;

    public $tokenlink = 'no token link created';

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->tokenlink = url('/').'/verify/'.$token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.verify')
            ->subject('email verification request from ' . config('app.admin_name' .''))
            ->with(['tokenlink' => $this->tokenlink]);
    }
}
