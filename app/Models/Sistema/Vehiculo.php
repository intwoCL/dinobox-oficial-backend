<?php

namespace App\Models\Sistema;

use App\Presenters\Sistema\VehiculoPresenter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
  use HasFactory;

  protected $table = 's_vehiculo';

  public function usuario(){
    return $this->belongsTo(User::class,'id_usuario');
  }

  public function present(){
    return new VehiculoPresenter($this);
  }
}
