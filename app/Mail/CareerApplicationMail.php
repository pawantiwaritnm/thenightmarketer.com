<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CareerApplicationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $careerDetails;

    public function __construct($careerDetails)
    {
        $this->careerDetails = $careerDetails;
    }

    public function build()
    {
        return $this->subject('New Career Application Received')
                    ->view('emails.career_application')
                    ->attach(storage_path('app/public/' . $this->careerDetails['resume_path']));
    }
}
