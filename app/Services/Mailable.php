<?php

namespace App\Services;

use App\Mail\DeliveryMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class Mailable
{
  // Envio de correo, con copia masiva
  // Mail::to($email)->cc($email)->bcc($email)->queue($mail);
  // Mail::to($email)->cc([$email,$email])->bcc($email)->queue($mail);
  // Mail::to($email)->queue($mail);

  public static function DeliveryMail($correo, $data = []){
    try {
      $mail = new DeliveryMail($data);
   
      Mail::to($correo)->queue($mail);

      return $mail; 

    } catch (\Throwable $th) {
      return $th;
    }
  }
}
