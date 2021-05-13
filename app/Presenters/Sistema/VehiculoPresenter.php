<?php

namespace App\Presenters\Sistema;

use App\Models\Sistema\Vehiculo;
use App\Presenters\Presenter;
use App\Services\Imagen;

class VehiculoPresenter extends Presenter {

  CONST STATE = [
    1 => ['MOTOCICLETA','motorcycle',true],
    2 => ['AUTOMOVIL','car-side',true],
    3 => ['FURGONETA','truck',true],
  ];

  private $folderImg = 'photo_vehiculos';
  private $imgDefault = "/dist/img/img-default-user.jpg";

  public function getPhoto() {
    return (new Imagen($this->model->imagen, $this->folderImg, $this->imgDefault))->call();
  }

  public function tipo() {
    return self::STATE[$this->model->tipo][0];
  }

  public function getIcon() {
    $icon = self::STATE[$this->model->tipo];
    return "<i class=\"fas fa-$icon[1]\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"$icon[0]\"></i>";
  }
}
