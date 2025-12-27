<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GraphicDesignAssignmentMail extends Mailable
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
        return $this->subject('Graphic Design Assignment – The Night Marketer')
                    ->view('emails.graphic_design_assignment')
                    ->with([
                        'applicantName' => $this->applicantName,
                        'applicantEmail' => $this->applicantEmail,
                    ]);
    }
}
