<?php

namespace App\Models\Sistema;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Casts\Json;

use App\Presenters\Sistema\ClientePresenter;
use App\Services\ConvertDatetime;

class Cliente extends Authenticatable
{
  use Notifiable;

  protected $table = 's_cliente';

  protected $guard = 'cliente';

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

  public function direcciones(){
    return $this->hasMany(Direccion::class,'id_cliente');
  }

  public function scopeLikeColumn($query, $column, $value) {
    return $query->where($column, 'LIKE', "%$value%")->where('activo',true)->get();
  }

  public function present(){
    return new ClientePresenter($this);
  }

  public function scopefindByUsername($query, $username){
    return $query->where('username',$username)->where('activo',true);
  }

  public function getLastSession(){
    return new ConvertDatetime($this->last_session);
  }

  public function getFechaNacimiento(){
    $date = $this->birthdate ? $this->birthdate : date('d-m-Y');
    return new ConvertDatetime($date);
  }

  public function isHappy(){
    return $this->birthdate ? (new ConvertDatetime($this->birthdate))->isToday() : false;
  }

  public function raw_direcciones(){
    $raw = array();
    foreach ($this->direcciones as $d) {
      array_push($raw, $d->raw_info());
    }
    return $raw;
  }

  public function raw_info(){
    return [
      'id' => $this->id,
      'rut' => $this->run,
      'nombres' => $this->present()->nombre_completo(),
      'correo' => $this->correo,
      'foto' => $this->present()->getPhoto(),
      'direcciones' => $this->raw_direcciones(),
    ];
  }
}
