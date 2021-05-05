<?php

namespace App\Services\Policies;

use App\Lib\Permissions;
use App\Models\Sistema\Departamento;
use App\Models\Sistema\DepartamentoUsuario;
use App\Models\Sistema\Usuario;

class PolicyModel {

  protected $user;
  protected $u = 123123;

  public function __construct(){
    $this->user = current_user();
  }

  public function abort(){
    return abort('403');
  }

  public function admin(){
    return $this->user->is_admin();
  }

  // Identifica permiso
  public function gestor(){
    return $this->user->is_gestor();
  }

  public function empleado(){
    return $this->user->is_empleado();
  }

  public function repartidor(){
    return $this->user->is_repartidor();
  }
}
