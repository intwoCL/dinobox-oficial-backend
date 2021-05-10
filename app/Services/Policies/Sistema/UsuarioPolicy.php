<?php

namespace App\Services\Policies\Sistema;

use App\Services\Policies\PolicyModel;
use App\Services\Policies\UserP;

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
    if (current_user()->admin || current_user()->gestor() || current_user()->empleado()) {
      return true;
    }
    return $this->abort();
  }

  public function indexRepartidor(){
    return $this->index();
  }
}
