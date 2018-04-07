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

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($donner)
    {
        $this->donner = $donner;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@matsune-bank.com')
            ->subject('Payment has been processed!')
            ->priority(1)
            ->view('emails.payment');
    }
}
