<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BicicletaFinishedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre;
    public $fecha_entrada;
    public $fecha_salida;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
      $this->nombre = $data['nombre'];
      $this->fecha_entrada = $data['fecha_entrada'];
      $this->fecha_salida = $data['fecha_salida'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->subject('Notificación tiempo de permanencia')->view('mail.bicicleta.reporte');
    }
}
