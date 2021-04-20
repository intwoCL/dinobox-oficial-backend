<?php

namespace App\Presenters\Sistema;
use App\Presenters\Presenter;
use App\Services\Imagen;

class UsuarioPresenter extends Presenter
{
  private $folderImg = 'photo_usuarios';
  private $imgDefault = "/dist/img/img-default-user.jpg";

  public function getPhoto(){
    return (new Imagen($this->model->foto, $this->folderImg, $this->imgDefault))->call();
  }

  public function nombre_completo(){
		return "{$this->model->nombre} {$this->model->apellido}";
  }

  public function getPermisoStatusHTML(){
    return $this->getStatusHTML($this->model->getPermisoAlumno());
  }

  public function getPermisoUsuarioStatusHTML(){
    return $this->getStatusHTML($this->model->getPermisoUsuarioGeneral());
  }

  private function getStatusHTML($i){
    switch ($i) {
      case '1':
        return "<i class=\"fas fa-check-circle text-success\" title=\"Gestor: Creador de contenido\"></i>";
      case '2':
        return "<i class=\"fas fa-eye text-info\" title=\"Visita solo ve\"></i>";
      case '3':
        return "<i class=\"fas fa-eye-slash text-danger\" title=\"Ocultado\"></i>";
      default:
        return "<i class=\"fas fa-eye-slash text-danger\" title=\"Ocultado\"></i>";
    }
  }
}
