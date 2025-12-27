<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FrontendAssignmentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $applicantName;
    public $applicantEmail;

    public function __construct($applicantName, $applicantEmail)
    {
        $this->applicantName = $applicantName;
        $this->applicantEmail = $applicantEmail;
    }

    public function build()
    {
        return $this->subject('Frontend Development Task – The Night Marketer')
                    ->view('emails.frontend_assignment')
                    ->with([
                        'applicantName' => $this->applicantName,
                        'applicantEmail' => $this->applicantEmail,
                    ]);
    }
}
