<?php

namespace App\Models\Sistema;

use App\Models\Evento\Evento;
use App\Models\Tutoria\TutorAlumno;
use Illuminate\Database\Eloquent\Model;
use App\Presenters\Sistema\SucursalPresenter;

class Sucursal extends Model
{
  protected $table = 's_sucursal';

  public function present(){
    return new SucursalPresenter($this);
  }
}
