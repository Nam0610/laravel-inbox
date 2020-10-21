<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;
    protected $user;

    /**
     * Create a new message instance.
     *
     * @param $user
     */

    public function __construct($user)
    {
        $this->user=$user;
    }

    /**
     * Build the message.
     *
     * @param $user
     * @return $this
     */
    public function build()
    {
        return $this->view('email.mail');
    }
}
