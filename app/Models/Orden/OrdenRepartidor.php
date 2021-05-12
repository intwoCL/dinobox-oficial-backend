<?php

namespace App\Models\Orden;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sistema\Usuario;


class OrdenRepartidor extends Model
{
  use HasFactory;

	protected $table = 'or_orden_repartidor';

	public function usuario(){
    return $this->belongsTo(Usuario::class,'id_usuario');
  }

	public function repartidor(){
    return $this->belongsTo(Usuario::class,'id_repartidor');
  }

	public function orden(){
    return $this->belongsTo(Orden::class,'id_orden');
  }
}
