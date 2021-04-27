<?php

namespace App\Models\Sistema;

use Illuminate\Database\Eloquent\Model;

use App\Models\Tutoria\TutorAlumno;
use App\Presenters\Sistema\SucursalUsuarioPresenter;

class SucursalUsuario extends Model
{
  protected $table = 's_sucursal_usuario';

  public function usuario(){
    return $this->belongsTo(Usuario::class,'id_usuario');
  }

  public function sucursal(){
    return $this->belongsTo(Sucursal::class,'id_sucursal');
  }
}
