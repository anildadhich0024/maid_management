<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class feedback extends Mailable
{
    use Queueable, SerializesModels;
    public $email_data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email_data)
    {
       $this->email_data = $email_data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Maid Management - Feedback!') 
                    ->view('email_tamplates.feedback_email');
    }
}
