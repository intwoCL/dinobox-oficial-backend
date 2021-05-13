<?php

namespace App\Services;

use App\Mail\RecepcionPedido;
use App\Mail\UsuarioAgregado;
use App\Mail\UsuarioRecuperacion;
use App\Mail\AsignacionPedido;
use App\Mail\PreparacionPedido;
use App\Mail\TransitoPedido;
use App\Mail\EntregaPedido;
use Illuminate\Support\Facades\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class Mailable
{
  // Envio de correo, con copia masiva
  // Mail::to($email)->cc($email)->bcc($email)->queue($mail);
  // Mail::to($email)->cc([$email,$email])->bcc($email)->queue($mail);
  // Mail::to($email)->queue($mail);

  public static function RecepcionPedido($correo, $data = []){
    try {
      $mail = new RecepcionPedido($data);
   
      return $mail; 

    } catch (\Throwable $th) {
      return $th; 
    }
  }

  public static function UsuarioAgregado($correo, $data = []){
    try {
      $mail = new UsuarioAgregado($data);

      return $mail; 

    } catch (\Throwable $th) {
      return $th; 
    }

  }

  public static function UsuarioRecuperacion($correo, $data = []){
    try {
      $mail = new UsuarioRecuperacion($data);

      return $mail; 

    } catch (\Throwable $th) {
      return $th; 
    }

  }

  public static function AsignacionPedido($correo, $data = []){
    try {
      $mail = new AsignacionPedido($data);

      return $mail; 

    } catch (\Throwable $th) {
      return $th; 
    }

  }

  public static function PreparacionPedido($correo, $data = []){
    try {
      $mail = new PreparacionPedido($data);

      return $mail; 

    } catch (\Throwable $th) {
      return $th; 
    }

  }

  public static function TransitoPedido($correo, $data = []){
    try {
      $mail = new TransitoPedido($data);

      return $mail; 

    } catch (\Throwable $th) {
      return $th; 
    }

  }

  public static function EntregaPedido($correo, $data = []){
    try {
      $mail = new EntregaPedido($data);

      return $mail; 

    } catch (\Throwable $th) {
      return $th; 
    }

  }

}