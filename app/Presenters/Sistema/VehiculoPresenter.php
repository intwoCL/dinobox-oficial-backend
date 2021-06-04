<?php

namespace App\Presenters\Sistema;

use App\Models\Sistema\Vehiculo;
use App\Presenters\Presenter;
use App\Services\Imagen;

class VehiculoPresenter extends Presenter {

  CONST STATE = [
    1 => ['MOTOCICLETA','motorcycle',true,'/dist/img/default/pexels-sourav-mishra-3660527.jpg'],
    2 => ['AUTOMOVIL','car-side',true,'/dist/img/default/pexels-photo-1149831.jpeg'],
    3 => ['FURGONETA','truck',true,'/dist/img/default/pexels-norma-mortenson-4391470.jpg'],
  ];

  private $folderImg = 'photo_vehiculos';

  public function getPhoto() {
    return (new Imagen($this->model->imagen, $this->folderImg, $this->getImageDefault()))->call();
  }

  public function getImageDefault() {
    return self::STATE[$this->model->tipo][3];
  }

  public function tipo() {
    return self::STATE[$this->model->tipo][0];
  }

  public function getIcon() {
    $icon = self::STATE[$this->model->tipo];
    return "<i class=\"fas fa-$icon[1]\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"$icon[0]\"></i>";
  }
}
