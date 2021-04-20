<?php

namespace App\Models\Sistema;

use App\Casts\Json;
use App\Presenters\Sistema\UsuarioGeneralPresenter;
use Illuminate\Database\Eloquent\Model;

class UsuarioGeneral extends Model
{
	protected $table = 's_usuario_general';

  protected $casts = [
    'config' => Json::class,
  ];

	public function tipo() {
    return $this->belongsTo(TipoUsuario::class,'id_tipo_usuario');
	}

  public function present(){
    return new UsuarioGeneralPresenter($this);
  }

  public function scopeLikeColumn($query, $column, $value) {
    return $query->where($column, 'LIKE', "%$value%")->where('activo',true)->with('tipo')->get();
  }

  public function raw_info() {
    return collect([
      'id'      => $this->id,
      'nombres' => $this->present()->nombre_completo(),
      'rut'     => $this->run,
      'foto'    => $this->present()->getPhoto(),
      'telefono'=> $this->telefono,
      'correo'  => $this->correo,
      'tipo'    => $this->tipo->nombre,
      'id_tipo' => $this->id_tipo_usuario,
    ]);
  }
}
