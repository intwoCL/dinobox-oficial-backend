<?php

namespace App\Services\Policies\Sistema;

use App\Services\Policies\PolicyModel;

class UsuarioGeneralPolicy extends PolicyModel
{
  // [PERMISO]
  // [1] Gestor
  // [2] Visita
  // [3] Oculto

  public function index() {
    if (current_admin()) {
      return true;
    } elseif (current_user()) {
      if (current_user()->getPermisoUsuarioGeneral() != $this->allowUser['oculto']) {
        return true;
      }
    }
    return $this->abort();
  }

  public function indexDelete() {
    return $this->index();
  }

  // si no existe, muestra el crear
  public function create() {
    return $this->can() ? true : $this->abort();
  }

  public function store() {
    return $this->create();
  }

  public function edit() {
    return $this->create();
  }

  public function update() {
    return $this->create();
  }

  public function destroy() {
    return $this->create();
  }

  public function can(){
    if (current_admin()) {
      return true;
    } elseif (current_user()) {
      if (current_user()->getPermisoUsuarioGeneral() == $this->allowUser['gestor']){
        return true;
      }
    }
    return false;
  }
}
