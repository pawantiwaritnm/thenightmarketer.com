<?php
namespace App\Http\Controllers;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    // Constructor to accept data
    public function __construct($data)
    {
        $this->data = $data;
    }


    public function build()
    {
        return $this->view('emails.test')
                    ->subject('Test Email');
    }
}
?>