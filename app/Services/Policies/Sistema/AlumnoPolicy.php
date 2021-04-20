<?php

namespace App\Services\Policies\Sistema;

use App\Services\Policies\PolicyModel;

class AlumnoPolicy extends PolicyModel
{
  // [PERMISO]
  // [1] Gestor
  // [2] Visita
  // [3] Oculto

  public function index() {
    if (current_admin()) {
      return true;
    } elseif (current_user()) {
      if (current_user()->getPermisoAlumno() != $this->allowUser['oculto']) {
        return true;
      }
    }
    return $this->abort();
  }

  public function store() {
    return $this->index();
  }

  public function show() {
    return $this->index();
  }

  // si no existe, muestra el crear
  public function create() {
    if (current_admin()) {
      return true;
    } elseif (current_user()) {
      if (current_user()->getPermisoAlumno() == $this->allowUser['gestor']) {
        return true;
      }
    }
    return false;
  }

  public function edit() {
    if (current_admin()) {
      return true;
    } elseif (current_user()) {
      if (current_user()->getPermisoAlumno() == $this->allowUser['gestor']) {
        return true;
      }
    }
    return $this->abort();
  }

  public function update() {
    return $this->edit();
  }

  public function destroy() {
    return $this->edit();
  }

  public function activar() {
    return $this->edit();
  }
}
