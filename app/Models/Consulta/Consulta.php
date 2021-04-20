<?php

namespace App\Models\Consulta;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
  protected $table = 'co_consulta';

  public function tags(){
		return $this->hasMany(ConsultaTag::class, 'id_consulta');
	}
}
