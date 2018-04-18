<?php

namespace App\Mail;

use Illuminate\Support\Facades\Lang;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Payment extends Mailable
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
            ->subject(Lang::get('matsune.payment_mail_title'))
            ->priority(1)
            ->view('emails.payment');
    }
}
