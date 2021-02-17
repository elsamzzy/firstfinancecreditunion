<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class creditAlertMail extends Mailable
{
    use Queueable, SerializesModels;
    public $prev_balance;
    public $new_balance;
    public $credited_balance;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->new_balance = $details[0];
        $this->prev_balance = $details[1];
        $this->credited_balance = $details[2];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail/creditalert')
            ->subject('You have a credit alert');
    }
}
