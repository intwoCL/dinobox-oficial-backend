<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UsuarioAgregado extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre;
    public $apellido;
    public $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
      $this->nombre = $data['nombre'];
      $this->apellido = $data['apellido'];
      $this->email = $data['email'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('BIENVENIDO A BISCAR')->view('mail.delivery_usuarioAgregado');
    }
}
