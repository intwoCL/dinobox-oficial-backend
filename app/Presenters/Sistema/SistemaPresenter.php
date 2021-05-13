<?php

namespace App\Presenters\Sistema;
use App\Presenters\Presenter;
use App\Services\Imagen;

class SistemaPresenter extends Presenter{
  
  private $folderImg = 'photo_sistema';
  private $imgFondo = "/dist/img/checkmate.jpg";
  private $imgLogo = "/dist/img/img-default-user.jpg";

  public function getImagenFondo(){
    return (new Imagen($this->model->imagen_fondo, $this->folderImg, $this->imgFondo))->call();
  }

  public function getImagenLogo(){
    return (new Imagen($this->model->imagen_logo, $this->folderImg, $this->imgLogo))->call();
  }
}
