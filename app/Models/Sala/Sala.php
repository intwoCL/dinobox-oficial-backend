<?php

namespace App\Models\Sala;

use App\Models\Sistema\Usuario;
use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
  protected $table = 'sa_sala';

	public function usuario(){
    return $this->belongsTo(Usuario::class,'id_usuario');
  }

  public function name_room(){
    return trim(strtolower($this->nombre . $this->codigo . $this->id));
	}

  public function scopeFindByCode($query, $codigo){
    return $query->where('codigo',$codigo)->where('activo',true);
  }
}
