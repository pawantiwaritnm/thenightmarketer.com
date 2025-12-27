<?php

namespace App\Mail;

use App\Models\DemoRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DemoRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $demoRequest;

    /**
     * Create a new message instance.
     */
    public function __construct(DemoRequest $demoRequest)
    {
        $this->demoRequest = $demoRequest;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('New Demo Request Received')
                    ->view('emails.demo_request');
    }
}
