<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VotoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $correo;
    public $run;
    public $nombre;
    public $nombre_votacion;
    public $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($correo, $run, $nombre, $nombre_votacion, $url)
    {
        $this->correo = $correo;
        $this->run = $run;
        $this->nombre = $nombre;
        $this->nombre_votacion = $nombre_votacion;
        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Permiso de Votacion en Linea')->view('mail.votacion.solicitud');
    }
}
