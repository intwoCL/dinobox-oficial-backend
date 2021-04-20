<?php

namespace App\Models\Sistema;

use App\Models\Evento\Evento;
use App\Models\Tutoria\TutorAlumno;
use Illuminate\Database\Eloquent\Model;
use App\Presenters\Sistema\DepartamentoPresenter;

class Departamento extends Model
{
  protected $table = 's_departamento';

  const AVAILABLE = 1;
  const NOT_AVAILABLE = 2;

  CONST STATE = [
    1 => 'DISPONIBLE',
    2 => 'NO DISPONIBLE'
  ];

  public function usuarios(){
    return $this->hasMany(DepartamentoUsuario::class,'id_departamento')->with('usuario');
  }

  public function getTotalUsuarios(){
    return count($this->usuarios);
  }

  public function eventos(){
    return $this->hasMany(Evento::class,'id_departamento')->with('usuario');
  }

  public function tutoresAlumnos(){
    return $this->hasMany(TutorAlumno::class,'id_departamento')->with(['tutor','alumno']);
  }

  public function present(){
    return new DepartamentoPresenter($this);
  }
}
