<?php

namespace App\Models\Orden;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Casts\Json;
use App\Services\ConvertDatetime;
use App\Services\Currency;
use App\Models\Sistema\Comuna;
use App\Models\Sistema\Usuario;

class Orden extends Model
{
  use HasFactory;

  protected $table = 'or_orden';

  protected $casts = [
    'config' => Json::class,
  ];

  const ESTADO_GENERAL = [
    10 => 'Pendiente',
    20 => 'Asignación de retiro',
    30 => 'En transito a retiro',
    40 => 'Recepcionado',
    // 50 => 'Recepción de despacho',
    60 => 'Asignación de despacho',
    70 => 'En camino a despacho',
    80 => 'Entregado',
    401 => 'Cancelado',
    404 => 'Error',
  ];

  const SERVICIOS = [
    10 => ['Envios Express','',true],
    20 => ['Envíos Tradicionales','',true],
    30 => ['Envíos Especiales','',true],
  ];

  const CATEGORIAS = [
    10 => ['Retiro',true],
    20 => ['Local',true],
  ];

  public function getFecha() {
    return new ConvertDatetime($this->fecha_entrega);
  }

  public function cliente() {
    return $this->belongsTo(Usuario::class,'id_cliente');
  }

  public function usuario() {
    return $this->belongsTo(Usuario::class,'id_usuario');
  }

  public function repartidores(){
    return $this->hasMany(OrdenRepartidor::class,'id_orden');
  }

  public function getFechaEmision() {
    return new ConvertDatetime($this->created_at);
  }

  public function getEstado() {
    return self::ESTADO_GENERAL[$this->estado];
  }

  public function scopeGetPendientes($query) {
    return $query->where('activo',true)->where('estado',10)->with(['remitenteComuna','destinatarioComuna'])->get();
  }

  public function scopeGetAsignados($query, $fecha) {
    return $query->where('activo',true)->where('estado','<>',10)->where('fecha_entrega',$fecha)->get();
  }

  public function getPrecio() {
    return (new Currency($this->precio))->money();
  }

  public function remitenteComuna() {
    return $this->belongsTo(Comuna::class,'remitente_id_comuna');
  }

  public function destinatarioComuna() {
    return $this->belongsTo(Comuna::class,'destinatario_id_comuna');
  }

  public function getRemitenteDireccion() {
    return $this->remitente_direccion . " " . $this->remitente_numero;
  }

  public function getDestinatarioDireccion() {
    return $this->destinatario_direccion . " " . $this->destinatario_numero;
  }
}
