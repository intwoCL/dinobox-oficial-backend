<?php

namespace App\Presenters\Sistema;
use App\Presenters\Presenter;
use App\Services\Imagen;

class SistemaPresenter extends Presenter{

  private $folderImg = 'photo_sistema';
  private $imgFondo = "/dist/img/dinobox-fondo.png";
  private $imgLogo = "/dist/img/dinobox-icon1.png";

  public function getImagenFondo(){
    return (new Imagen($this->model->imagen_fondo, $this->folderImg, $this->imgFondo))->call();
  }

  public function getImagenLogo(){
    return (new Imagen($this->model->imagen_logo, $this->folderImg, $this->imgLogo))->call();
  }
}
