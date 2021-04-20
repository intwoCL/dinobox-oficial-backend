<?php

namespace App\Models\Sistema;

use Illuminate\Database\Eloquent\Model;

use App\Models\Tutoria\TutorAlumno;
use App\Presenters\Sistema\DepartamentoUsuarioPresenter;

class DepartamentoUsuario extends Model
{
  protected $table = 's_departamento_usuario';

  public function usuario(){
    return $this->belongsTo(Usuario::class,'id_usuario');
  }

  public function departamento(){
    return $this->belongsTo(Departamento::class,'id_departamento');
  }

  public function present(){
    return new DepartamentoUsuarioPresenter($this);
  }

  public function scopeFindUser($query, int $id){
    return $query->where('id_usuario',$id)->where('activo',true);
  }

  public function scopeFindDepartamento($query, int $id_departamento){
    return $query->where('id_departamento',$id_departamento)->with('departamento');
  }

  // TUTORIA

  public function alumnosAsignadosTutoria(){
    return $this->hasMany(TutorAlumno::class,'id_departamento_user')->with('alumno');
  }

  public function scopeAllTutoriaTutores($query){
    return $query->where('permiso_tutoria',1);
  }

  public function scopeAllowAtencion($query, $id_usuario, $permiso = 1){
    return $query->where('id_usuario',$id_usuario)
                ->where('permiso_toma_hora',$permiso)
                ->where('activo',true)
                ->with(['departamento'])
                ->get()
                ->where('departamento.plataforma_atencion',1)
                ->where('departamento.activo',true);
  }

  public function scopeFindDepartamentoUser($query, $id_departamento, $id_usuario){
    return $query->where('id_departamento',$id_departamento)
                ->where('id_usuario',$id_usuario)
                ->where('activo',true)
                ->with(['departamento']);
  }

  public function scopeAllowFormulario($query, $id_usuario){
    return $query->where('id_usuario',$id_usuario)
                // ->where('permiso_formulario',$permiso)
                ->where('permiso_formulario','<>',3)
                ->where('activo',true)
                ->with(['departamento'])
                ->get()
                ->where('departamento.plataforma_formulario',1)
                ->where('departamento.activo',true);
  }

  public function scopeAllowVotacion($query, $id_usuario){
    return $query->where('id_usuario',$id_usuario)
                ->where('permiso_votacion','<>',3)
                ->where('activo',true)
                ->with(['departamento'])
                ->get()
                ->where('departamento.plataforma_votacion',1)
                ->where('departamento.activo',true);
  }

  public function scopeAllowEvento($query, $id_usuario){
    return $query->where('id_usuario',$id_usuario)
                ->where('permiso_evento','<>',3)
                ->where('activo',true)
                ->with(['departamento'])
                ->get()
                ->where('departamento.plataforma_evento',1)
                ->where('departamento.activo',true);
  }

  // TUTORIA
  // 1 tutor , 2 coordinador
  public function scopeAllowTutoria($query, $id_usuario, $permiso = 1){
    return $query->where('id_usuario',$id_usuario)
                ->where('permiso_tutoria',$permiso)
                ->where('activo',true)
                ->with(['departamento'])
                ->get()
                ->where('departamento.plataforma_tutoria',1)
                ->where('departamento.activo',true);
  }

}
