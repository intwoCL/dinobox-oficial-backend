<?php

namespace App\Presenters\Sistema;
use App\Presenters\Presenter;
use App\Services\Imagen;
use App\Services\Imagen64;

class DepartamentoPresenter extends Presenter
{
  private $folderImg = 'photo_departamentos';
  private $imgDefault = "/dist/img/bag.jpg";

  public function getPhoto(){
    return (new Imagen($this->model->foto, $this->folderImg, $this->imgDefault))->call();
  }

  // public function getPhoto64(){
  //   return (new Imagen64($this->getPhoto()))->call();
  // }

  public function getEventoStatusHTML(){
    return $this->getStatusHTML($this->model->plataforma_evento);
  }

  public function getVotacionStatusHTML(){
    return $this->getStatusHTML($this->model->plataforma_votacion);
  }

  public function getBicicletaStatusHTML(){
    return $this->getStatusHTML($this->model->plataforma_bicicleta);
  }

  public function getTutoriaStatusHTML(){
    return $this->getStatusHTML($this->model->plataforma_tutoria);
  }

  public function getAtencionStatusHTML(){
    return $this->getStatusHTML($this->model->plataforma_atencion);
  }

  public function getFormularioStatusHTML(){
    return $this->getStatusHTML($this->model->plataforma_formulario);
  }

  private function getStatusHTML($i){
    if ($i == 1) {
      return "<i class=\"fas fa-check-circle text-success\" title=\"Activado\"></i>";
    } else {
      return "<i class=\"fas fa-times-circle text-danger\" title=\"No Disponible\"></i>";
    }
  }
}
