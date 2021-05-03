<?php

namespace App\Presenters\Sistema;
use App\Presenters\Presenter;
use App\Services\Imagen;
use App\Services\Imagen64;

class SucursalPresenter extends Presenter{
  
  private $folderImg = 'photo_sucursal';
  private $imgDefault = "/dist/img/bag.jpg";

  public function getPhoto(){
    return (new Imagen($this->model->imagen, $this->folderImg, $this->imgDefault))->call();
  }
}
