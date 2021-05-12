<?php

namespace App\Models\Orden;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Casts\Json;
use App\Services\ConvertDatetime;

class Orden extends Model
{
  use HasFactory;

  protected $table = 'or_orden';

  protected $casts = [
    'config' => Json::class,
  ];

  const ESTADO_GENERAL = [
    1 => 'Pendiente',
    2 => 'Asginación de retiro',
    3 => 'En transito a retiro',
    4 => 'Recepcionado',
    5 => 'Recepción de despacho',
    6 => 'Asignación de despacho',
    7 => 'En camino a despacho',
    8 => 'Entregado',
    100 => 'Error',
  ];

  public function getFecha(){
    return new ConvertDatetime($this->fecha_entrega);
  }

  public function getEstado(){
    return self::ESTADO_GENERAL($this->estado);
  }

  public function scopeGetPendientes($query){
    return $query->where('activo',1)->where('estado',1)->get();
  }

  public function scopeGetAsignados($query, $fecha){
    return $query->where('activo',1)->where('estado','<>',1)->where('fecha_entrega',$fecha)->get();
  }
}