<?php

namespace App\Services\Policies;

use App\Lib\Permissions;
use App\Models\Sistema\Departamento;
use App\Models\Sistema\DepartamentoUsuario;
use App\Models\Sistema\Usuario;

class PolicyModel {

  public function abort(){
    return abort('403');
  }
}
