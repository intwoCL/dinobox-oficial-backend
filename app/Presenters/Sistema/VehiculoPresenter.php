<?php

namespace App\Presenters\Sistema;

use App\Models\Sistema\Vehiculo;
use App\Presenters\Presenter;
use App\Services\Imagen;

class VehiculoPresenter extends Presenter{

  private $folderImg = 'photo_vehiculos';
  private $imgDefault = "/dist/img/img-default-user.jpg";

  public function getPhoto(){
    return (new Imagen($this->model->imagen, $this->folderImg, $this->imgDefault))->call();
  }
  
  public function status()
  {
    return Vehiculo::STATE[$this->model->status];
  }
}
