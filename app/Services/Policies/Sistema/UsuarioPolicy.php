<?php

namespace App\Services\Policies\Sistema;

use App\Services\Policies\PolicyModel;

class UsuarioPolicy extends PolicyModel
{
  // [PERMISO]
  // usuario->admin
  // 1 => 'GESTOR',
  // 2 => 'EMPLEADO',
  // 3 => 'REPARTIDOR',

  public function index() {
    if ($this->admin() || $this->gestor() || $this->empleado()) {
      return true;
    }
    return $this->abort();
  }
}
