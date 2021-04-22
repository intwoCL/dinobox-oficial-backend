<?php

namespace App\Models\Sistema;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Casts\Json;
use App\Lib\Permissions;

use App\Models\TomaHora\Especialidad;
use App\Presenters\Sistema\UsuarioPresenter;
use App\Services\ConvertDatetime;

//ESTE USUARIO SE CONSIDERA UN COLABORADOR DENTRO DEL SISTEMA
class Usuario extends Authenticatable
{
  use Notifiable;

  protected $table = 's_usuario';

  protected $guard = 'usuario';

  protected $hidden = [
    'password',
  ];

  protected $casts = [
    'config' => Json::class,
    'permisos' => Json::class,
  ];

  CONST PERMISO_ALUMNO = [
    1 => 'GESTOR',
    2 => 'VISITA',
    3 => 'OCULTO'
  ];

  public function present(){
    return new UsuarioPresenter($this);
  }

  public function sucursalesUsuario(){
    return $this->hasMany(Sucursal::class,'id_usuario')->with('sucursal');
  }

  // public function myEspecialidad(){
  //   return $this->hasOne(Especialidad::class,'id_usuario');
  // }

  public function scopefindByUsername($query, $username){
    return $query->where('username',$username)->where('activo',true)->where('bloqueado',false);
  }

  public function getConfigDarkMode(){
    return $this->config['darkmode'] ?? false;
  }

  // public function getPermisoAlumno(){
  //   return $this->permisos['alumno'] ?? 3;
  // }

  // public function getPermisoUsuarioGeneral(){
  //   return $this->permisos['usuario_general'] ?? 3;
  // }

  // public function isPolicy(){
  //   return $this->config['policy'] ?? false;
  // }

  // public function me(){
  //   return session()->get(Permissions::NAME);
  // }

  // public function getPerfilBicicleta(){
  //   return $this->me()['bicicleta'];
  // }

  public function getLastSession(){
    return new ConvertDatetime($this->last_session);
  }
}
