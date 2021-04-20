<?php

namespace App\Models\Auditoria;

use App\Models\Sistema\DepartamentoUsuario;
use App\Models\Sistema\Usuario;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditUserDeleteReporte extends Model
{
  use HasFactory;

  protected $table = 'audit_user_delete_reporte';

  CONST MOTIVOS = [
    1 => 'ELiminado',
    2 => 'Reactivado',
    99 => 'Otros'
  ];

  public function usuario(){
    return $this->belongsTo(Usuario::class,'id_usuario');
  }

  public function departamentoUsuario(){
    return $this->belongsTo(DepartamentoUsuario::class,'id_departamento_usuario');
  }

  public function getMotivo(){
    return self::MOTIVOS($this->motivo);
  }
}
