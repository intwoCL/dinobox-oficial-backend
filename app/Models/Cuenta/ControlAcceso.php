<?php

namespace App\Models\Cuenta;

use App\Models\Sistema\Usuario;
use App\Models\Sistema\Vehiculo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Reloj control acceso asistencia personal

// Repartidores: Controla cual es el vehiculo que estan usando,
              // sin esto ellos no pueden realizar el recorrido
// Usuario:      Control de acceso
class ControlAcceso extends Model
{
  use HasFactory;

  protected $table = 'cu_control_acceso';

  const ESTADO_GENERAL = [
    10 => ['ENTRADA','check-circle'],
    20 => ['SALIDA','user-check'],
  ];

  public function usuario() {
    return $this->belongsTo(Usuario::class,'id_usuario');
  }

  public function vehiculo() {
    return $this->belongsTo(Vehiculo::class,'id_vehiculo');
  }

  public function getEstado() {
    return self::ESTADO_GENERAL[$this->estado][0];
  }
}
