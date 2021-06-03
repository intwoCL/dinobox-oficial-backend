<?php

namespace App\Models\Orden;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Casts\Json;
use App\Services\ConvertDatetime;
use App\Services\Currency;
use App\Models\Sistema\Comuna;
use App\Models\Sistema\Usuario;
use App\Services\GoogleMaps;

class Orden extends Model
{
  use HasFactory;

  protected $table = 'or_orden';

  protected $casts = [
    'config' => Json::class,
  ];

  const ESTADO_GENERAL = [
    10 => ['Pendiente','check-circle'], //Orden aceptada
    20 => ['Asignado a retiro','user-check'],
    30 => ['En camino a retiro','truck'],
    40 => ['Recepcionado','box'],
    // 50 => 'Recepción de despacho','home'],
    60 => ['Asignado de despacho','user-check'],
    70 => ['En camino a despacho','truck'],
    80 => ['Entregado','check-square'],
    401 => ['Cancelado','home'],
    404 => ['Error','home'],
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

  public function ordenRepartidor(){
    return $this->hasOne(OrdenRepartidor::class,'id_orden')->where(function($query){
      $query->where('activo',true);
    });
  }

  public function getFechaEmision() {
    return new ConvertDatetime($this->created_at);
  }

  public function getGoogleMaps($direccion, $location = []) {
    return new GoogleMaps($direccion, $location);
  }

  public function getGoogleMapsRemitente() {
    $d = $this->remitente_direccion." ".$this->remitente_numero . ', ';
    $c = $this->remitenteComuna->nombre.", ".$this->remitenteComuna->region->nombre;
    $direccion = "$d, $c";
    return $this->getGoogleMaps($direccion)->search();
  }

  public function getEstado() {
    return self::ESTADO_GENERAL[$this->estado][0] ?? 'n/a';
  }

  public function getServicio() {
    return self::SERVICIOS[$this->servicio][0];
  }

  public function getCategoria() {
    return self::CATEGORIAS[$this->categoria][0];
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

  public function getEstados() {
    $estados = array();
    if ($this->categoria == 10) {
      // RETIRO
      $estados[10] = self::ESTADO_GENERAL[10];
      $estados[20] = self::ESTADO_GENERAL[20];
      $estados[30] = self::ESTADO_GENERAL[30];
      $estados[40] = self::ESTADO_GENERAL[40];
      $estados[70] = self::ESTADO_GENERAL[70];
      $estados[80] = self::ESTADO_GENERAL[80];
    }else{
      // LOCAL
      $estados[10] = self::ESTADO_GENERAL[10];
      $estados[60] = self::ESTADO_GENERAL[60];
      $estados[70] = self::ESTADO_GENERAL[70];
      $estados[80] = self::ESTADO_GENERAL[80];
    }
    return $estados;
  }

  public function getPorcentaje() {
    $estados = $this->getEstados();
    // $total = count($estados);
    $total = $this->categoria == 10 ? 6 : 4;
    $count = 0;
    foreach ($estados as $key => $value) {
      if ($key <= $this->estado) {
        $count++;
      }
    }
    $porcentaje = ($count * 100)/$total;

    return round($porcentaje);
  }
}
