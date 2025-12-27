<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CompanyProfileDownloadMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject('📄 Company Profile Download Request')
            ->from(config('mail.from.address'), config('mail.from.name'))
            ->view('emails.company_profile_download')
            ->with(['data' => $this->data]);
    }
}
