<?php

namespace App\Models\Sistema;

use App\Models\Evento\Evento;
use App\Models\Tutoria\TutorAlumno;
use Illuminate\Database\Eloquent\Model;
use App\Presenters\Sistema\SucursalPresenter;

class Sucursal extends Model
{
  protected $table = 's_sucursal';

  const AVAILABLE = 1;
  const NOT_AVAILABLE = 2;

  CONST STATE = [
    1 => 'DISPONIBLE',
    2 => 'NO DISPONIBLE'
  ];

  public function sucursal(){
    return $this->hasOne(Sucursal::class,'id_sucursal');
  }

  public function present(){
    return new SucursalPresenter($this);
  }
}
