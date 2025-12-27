<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendJobTask extends Mailable
{
    use Queueable, SerializesModels;

    public $subjectText;
    public $bodyHtml;
    public $replyToEmail;

    public function __construct($subjectText, $bodyHtml, $replyToEmail)
    {
        $this->subjectText = $subjectText;
        $this->bodyHtml = $bodyHtml;
        $this->replyToEmail = $replyToEmail;
    }

    public function build()
    {
        return $this->subject($this->subjectText)
                    ->replyTo($this->replyToEmail)
                    ->html($this->bodyHtml);
    }
}
