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
  // protected $user;
  // use UserP;

  public function index() {
    if (current_user()->admin_enabled() || current_user()->gestor() || current_user()->empleado()) {
      return true;
    }
    return $this->abort();
  }

  public function indexRepartidores(){
    return $this->index();
  }
}
