<?php

namespace App\Models\Sistema;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Casts\Json;
use App\Models\Orden\OrdenRepartidor;
use App\Presenters\Sistema\UsuarioPresenter;
use App\Services\ConvertDatetime;

//ESTE USUARIO SE CONSIDERA UN COLABORADOR DENTRO DEL SISTEMA
class Usuario extends Authenticatable
{
  use Notifiable;

  protected $table = 's_usuario';

  protected $guard = 'usuario';

  const SEXO_OPTIONS = [
    1 => 'Hombre',
    2 => 'Mujer',
  ];

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

  public function OrdenesRepartidor(){
    return $this->hasMany(OrdenRepartidor::class,'id_repartidor');
  }

  public function vehiculos(){
    return $this->hasMany(Vehiculo::class,'id_usuario');
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

  public function gestor(){
    return $this->rol() === 1;
  }

  public function empleado(){
    return $this->rol() === 2;
  }

  public function repartidor(){
    return $this->rol() === 3;
  }

  public function is_admin(){
    return $this->admin;
  }

  public function rol() {
    return $this->sucursalUsuario->rol;
  }

  public function getFechaNacimiento(){
    $date = $this->birthdate ? $this->birthdate : date('d-m-Y');
    return new ConvertDatetime($date);
  }

  public function isHappy(){
    return $this->birthdate ? (new ConvertDatetime($this->birthdate))->isToday() : false;
  }

  public function scopeGetAllRol($query,$rol){
    return $query->where('activo',true)
                ->where('bloqueado',false)
                ->with('sucursalUsuario')
                ->get()
                ->where('sucursalUsuario.rol',$rol);
  }

  public function scopeGetAllRolDistinc($query,$rol){
    return $query->where('activo',true)
                ->where('bloqueado',false)
                ->with('sucursalUsuario')
                ->get()
                ->where('sucursalUsuario.rol','<>',$rol);
  }

  public function scopeGetAllGestor(){
    return $this->getAllRol(1);
  }

  public function scopeGetAllEmpleados(){
    return $this->getAllRolDistinc(3);
  }

  public function scopeGetAllRepartidores(){
    return $this->getAllRol(3);
  }
}
