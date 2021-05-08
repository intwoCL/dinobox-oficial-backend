<?php
namespace App\Services\Policies;

trait UserP
{
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