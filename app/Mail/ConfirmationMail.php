<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details; // Esto define la propiedad que vamos a usar en la vista del correo

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details) // Asegúrate de que esto esté aquí
    {
        $this->details = $details; // Esto asigna el parámetro del constructor a la propiedad de la clase
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('issaequipoimagen@gmail.com')
                    ->subject('Confirmación de recepción de mensaje')
                    ->view('emails.confirmation');
    }
}
