<?php

namespace App\Models\Sistema;


use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
	protected $table = 's_tipo_usuario';

  // 1 Alumno // no se debe
  // 2 Funcionario Duoc
  // 3 Docente Duoc
  // 4 Director Duoc
  // 5 Estudiante de Enseñanza Media
  // 6 Docente de Eneseñanza Media
  // 7 Director de Enseñanza Media
  // 8 Funcionario Externo
  // 9 Titulado
  // 98 Visita || es es un usuario especial en atencion
  // 99 Otros
}
