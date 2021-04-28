<?php

namespace App\Models\Sistema;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Casts\Json;
use App\Lib\Permissions;

use App\Models\TomaHora\Especialidad;
use App\Presenters\Sistema\ClientePresenter;
use App\Services\ConvertDatetime;

class Cliente extends Authenticatable
{
  use Notifiable;

  protected $table = 's_cliente';

  protected $guard = 'cliente';

  protected $hidden = [
    'password',
  ];

  protected $casts = [
    'config' => Json::class,
    'permisos' => Json::class,
  ];

  public function present(){
    return new ClientePresenter($this);
  }

  public function scopefindByUsername($query, $username){
    return $query->where('username',$username)->where('activo',true);
  }

  public function getLastSession(){
    return new ConvertDatetime($this->last_session);
  }
}
