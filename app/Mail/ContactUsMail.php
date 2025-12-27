<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUsMail extends Mailable
{
    use SerializesModels;

    public $contact;

    /**
     * Create a new message instance.
     *
     * @param $contact
     */
    public function __construct($contact)
    {
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return \Illuminate\Mail\Mailable
     */
    public function build()
    {
        return $this->subject('New Contact Us Submission')
                    ->view('emails.contact_us')  // We will create this view
                    ->with('contact', $this->contact);
    }
}
