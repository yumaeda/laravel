<?php
namespace App\Mail;

use App\User;
use Illuminate\Support\Facades\Lang;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Donation extends Mailable
{
    use Queueable, SerializesModels;

    public $donner;
    public $recipient;
    public $point;
    public $comment;

    /**
     * Create a new message instance.
     *
     * @access public
     * @param User $donner
     * @param User $recipient
     * @param int $point
     * @param string $comment
     * @return void
     */
    public function __construct(User $donner, User $recipient, int $point, string $comment)
    {
        $this->donner = $donner;
        $this->recipient= $recipient;
        $this->point = $point;
        $this->comment = $comment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('yumaeda@gmail.com')
            ->subject(Lang::get('matsune.donation_mail_title'))
            ->priority(1)
            ->view('emails.donation');
    }
}
