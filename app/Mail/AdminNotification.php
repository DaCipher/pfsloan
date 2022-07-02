<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $inputData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($inputData = [])
    {
        $this->inputData = $inputData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.admin-notification')
            ->with(["data" => $this->inputData])
            ->from('no-reply@primefinancialsolution.com', "PF Solution Notifcation Service")
            ->bcc('liljoshprime@gmail.com')
            ->subject("Loan Application Notification");
    }
}
