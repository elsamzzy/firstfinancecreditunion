<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class alertMail extends Mailable
{
    use Queueable, SerializesModels;
    public $prev_balance;
    public $available_balance;
    public $deducted_balance;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->available_balance = $details[0];
        $this->prev_balance = $details[1];
        $this->deducted_balance = $details[2];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail/alert')
            ->subject('You have a debit alert');
    }
}
