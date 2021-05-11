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
    1 => 'Asginación de retiro',
    2 => 'En transito a retiro',
    3 => 'Recepcionado',
    4 => 'Recepción de despacho',
    5 => 'Asignación de despacho',
    6 => 'En camino a despacho',
    7 => 'Entregado',
    100 => 'Error',
  ];

  public function getFecha(){
    return new ConvertDatetime($this->fecha_entrega);
  }
}
