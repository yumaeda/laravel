<?php

namespace App\Mail;

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
            ->subject('Payment has been processed!')
            ->priority(1)
            ->view('emails.payment');
    }
}
