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

  public function present(){
    return new UsuarioPresenter($this);
  }

  // busca el rol
  public function sucursalUsuario(){
    return $this->hasOne(SucursalUsuario::class,'id_usuario');
  }

  // public function sucursalesUsuario(){
  //   return $this->hasMany(SucursalUsuario::class,'id_usuario')->with('sucursal');
  // }

  public function scopefindByUsername($query, $username){
    return $query->where('username',$username)->where('activo',true)->where('bloqueado',false);
  }

  public function getConfigDarkMode(){
    return $this->config['darkmode'] ?? false;
  }

  public function getLastSession(){
    return new ConvertDatetime($this->last_session);
  }

  public function is_gestor(){
    return $this->rol() === 1;
  }

  public function is_empleado(){
    return $this->rol() === 2;
  }

  public function is_repartidor(){
    return $this->rol() === 3;
  }

  public function rol() {
    return $this->sucursalUsuario->rol;
  }
}
