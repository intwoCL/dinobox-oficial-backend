<?php

namespace App\Services;

use App\Mail\BicicletaFinishedMail;
use App\Mail\BicicletaVerifiedMail;
use App\Mail\VotoImg;
use App\Mail\VotoMail;
use App\Models\Sistema\Alumno;
use App\Models\Sistema\Departamento;
use Illuminate\Support\Facades\Mail;

class Mailable
{
  // Envio de correo, con copia masiva
  // Mail::to($email)->cc($email)->bcc($email)->queue($mail);
  // Mail::to($email)->cc([$email,$email])->bcc($email)->queue($mail);
  // Mail::to($email)->queue($mail);

  public static function bikeOuting($email, $data = [], $verified = false){
    try {

      $data['route'] = $verified ? route('bicicleta.receive.token',[$data['token'],$data['id']]) : null;

      $mail = $verified ? new BicicletaVerifiedMail($data) : new BicicletaFinishedMail($data);

      Mail::to($email)->queue($mail);
      return true;
    } catch (\Throwable $th) {
      return false;
    }
  }
}