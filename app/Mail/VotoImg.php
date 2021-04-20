<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VotoImg extends Mailable
{
    use Queueable, SerializesModels;

    public $img;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($img)
    {
        $this->img = $img;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Permiso de Votacion en Linea')->view('mail.test.img');
    }
}
