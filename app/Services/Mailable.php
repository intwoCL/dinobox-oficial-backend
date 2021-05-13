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

  public static function RecepcionPedido($email, $data = []){
    try {
      $mail = new RecepcionPedido($data);
      Mail::to($email)->queue($mail);
      return $mail;

    } catch (\Throwable $th) {
      return $th;
    }
  }

  public static function UsuarioAgregado($email, $data = []){
    try {
      $mail = new UsuarioAgregado($data);
      Mail::to($email)->queue($mail);
      return $mail;

    } catch (\Throwable $th) {
      return $th;
    }

  }

  public static function UsuarioRecuperacion($email, $data = []){
    try {
      $mail = new UsuarioRecuperacion($data);
      Mail::to($email)->queue($mail);
      return $mail;

    } catch (\Throwable $th) {
      return $th;
    }

  }

  public static function AsignacionPedido($email, $data = []){
    try {
      $mail = new AsignacionPedido($data);
      Mail::to($email)->queue($mail);
      return $mail;

    } catch (\Throwable $th) {
      return $th;
    }

  }

  public static function PreparacionPedido($email, $data = []){
    try {
      $mail = new PreparacionPedido($data);
      Mail::to($email)->queue($mail);
      return $mail;

    } catch (\Throwable $th) {
      return $th;
    }

  }

  public static function TransitoPedido($email, $data = []){
    try {
      $mail = new TransitoPedido($data);
      Mail::to($email)->queue($mail);
      return $mail;

    } catch (\Throwable $th) {
      return $th;
    }

  }

  public static function EntregaPedido($email, $data = []){
    try {
      $mail = new EntregaPedido($data);
      Mail::to($email)->queue($mail);
      return $mail;

    } catch (\Throwable $th) {
      return $th;
    }

  }

}