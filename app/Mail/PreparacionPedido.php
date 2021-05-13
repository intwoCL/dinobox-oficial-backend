<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PreparacionPedido extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre;
    public $apellido;
    public $idOrden;
    public $direccion;
    public $tipoEnvio;
    public $precio;
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
      $this->idOrden = $data['idOrden'];
      $this->direccion = $data['direccion'];
      $this->tipoEnvio = $data['tipoEnvio'];
      $this->precio = $data['precio'];
      $this->email = $data['email'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Tu pedido está en preparación')->view('mail.delivery_preparacionPedido');
    }
}
