<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistrationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $ownerName;
    public $ownerEmail;

    public function __construct($ownerName)
    {
        $this->ownerName = $ownerName;
    }

    public function build()
    {
        return $this->subject('Your SOC Courier Service Merchant Registration is Complete')
            ->view('emails.registration');
    }
}
