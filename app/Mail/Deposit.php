<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Deposit extends Mailable
{
    use Queueable, SerializesModels;

    public $donner;
    public $point;

    /**
     * Create a new message instance.
     *
     * @access public
     * @param \App\User $donner
     * @param int $point
     * @return void
     */
    public function __construct($donner, $point)
    {
        $this->donner = $donner;
        $this->point = $point;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('yumaeda@gmail.com')
            ->subject('You\'ve Got Points')
            ->priority(1)
            ->view('emails.deposit');
    }
}
