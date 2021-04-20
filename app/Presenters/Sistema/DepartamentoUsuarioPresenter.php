<?php

namespace App\Presenters\Sistema;

use App\Lib\Permissions;
use App\Presenters\Presenter;
use Storage;

class DepartamentoUsuarioPresenter extends Presenter
{
  public function getVotacionStatusHTML(){
    return $this->getStatusHTML($this->model->permiso_votacion);
  }

  public function getEventoStatusHTML(){
    return $this->getStatusHTML($this->model->permiso_evento);
  }

  public function getBicicletaStatusHTML(){
    return $this->getBicicletaStatus($this->model->permiso_bicicleta);
  }

  public function getTutoriasSelected(){
    return Permissions::ALLOWS_TUTORIA[$this->model->permiso_tutoria];
  }

  public function getServicioStatusHTML(){
    return $this->getStatusHTML($this->model->permiso_servicio);
  }

  public function getFormularioStatusHTML(){
    return $this->getStatusHTML($this->model->permiso_formulario);
  }

  public function getSalaVideoStatusHTML(){
    return $this->getStatusHTML($this->model->permiso_sala_video);
  }

  public function getTomaHoraStatusHTML(){
    return $this->getTomaStatusHTML($this->model->permiso_toma_hora);
  }

  public function getAlumnoStatusHTML(){
    return $this->getStatusHTML($this->model->permiso_alumno);
  }

  public function getTutoriaStatusHTML(){
    switch ($this->model->permiso_tutoria) {
      case 1:
        return "<i class=\"fas fa-graduation-cap text-purple\" title=\"Tutor: Gestiona las tutorias\"></i>";
      case 2:
        return "<i class=\"fas fa-check-circle text-success\" title=\"Coordinador: supervisa lo funcional\"></i>";
      case 3:
        return "<i class=\"fas fa-eye-slash text-danger\" title=\"Ocultado\"></i>";
      default:
        return "<i class=\"fas fa-eye-slash text-danger\" title=\"Ocultado\"></i>";
    }
  }

  private function getStatusHTML($i){
    switch ($i) {
      case 1:
        return "<i class=\"fas fa-check-circle text-success\" title=\"Gestor: Creador de contenido\"></i>";
      case 2:
        return "<i class=\"fas fa-eye text-info\" title=\"Visita solo ve\"></i>";
      case 3:
        return "<i class=\"fas fa-eye-slash text-danger\" title=\"Ocultado\"></i>";
      default:
        return "<i class=\"fas fa-eye-slash text-danger\" title=\"Ocultado\"></i>";
    }
  }

  private function getTomaStatusHTML($i){
    switch ($i) {
      case 1:
        return "<i class=\"fas fa-check-circle text-success\" title=\"Gestor: Creador de contenido\"></i>";
      case 2:
        return "<i class=\"fas fa-user-shield text-dark\" title=\"Administrador de atenciones\"></i>";
      case 3:
        return "<i class=\"fas fa-eye-slash text-danger\" title=\"Ocultado\"></i>";
      default:
        return "<i class=\"fas fa-eye-slash text-danger\" title=\"Ocultado\"></i>";
    }
  }

  private function getBicicletaStatus($i){
    switch ($i) {
      case 4:
        return "<i class=\"fas fa-check-circle text-success\" title=\"Administrador: Gestiona\"></i>";
      case 1:
        return "<i class=\"fas fa-shield-alt text-primary\" title=\"Gestor: Entrada de usuario\"></i>";
      case 2:
        return "<i class=\"fas fa-eye text-info\" title=\"Visita solo ve\"></i>";
      case 4:
        return "<i class=\"fas fa-eye-slash text-danger\" title=\"Ocultado\"></i>";
      default:
        return "<i class=\"fas fa-eye-slash text-danger\" title=\"Ocultado\"></i>";
    }
  }

  public function getActive(){
    $title = "Habilitado";
    $color = "success";
    $icon = "check-circle";
    if(!$this->model->activo){
      $title = "Inactivo";
      $color = "danger";
      $icon = "times-circle";
    }
    return "<i class=\"fas fa-$icon text-$color\" title=\"$title\"></i>";
  }
}
