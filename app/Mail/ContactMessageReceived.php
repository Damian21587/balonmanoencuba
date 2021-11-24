<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessageReceived extends Mailable
{
    use Queueable, SerializesModels;
    public $datos;

    /**
     * Create a new message instance.
     *
     * @param string $name
     * @param string $email
     * @param string $message
     */
    public function __construct($datos)
    {
        $this->name = $datos;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.contact_message');
    }
}
