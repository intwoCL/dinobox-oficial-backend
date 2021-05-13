<?php

namespace App\Models\Orden;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Casts\Json;
use App\Services\ConvertDatetime;
use App\Services\Currency;
use App\Models\Sistema\Comuna;

class Orden extends Model
{
  use HasFactory;

  protected $table = 'or_orden';

  protected $casts = [
    'config' => Json::class,
  ];

  const ESTADO_GENERAL = [
    1 => 'Pendiente',
    2 => 'Asignación de retiro',
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

  public function getFechaEmision(){
    return new ConvertDatetime($this->created_at);
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

  public function getPrecio(){
    return (new Currency($this->precio))->money();
  }

  public function remitenteComuna(){
    return $this->belongsTo(Comuna::class,'remitente_id_comuna');
  }

  public function destinatarioComuna(){
    return $this->belongsTo(Comuna::class,'destinatario_id_comuna');
  }

}