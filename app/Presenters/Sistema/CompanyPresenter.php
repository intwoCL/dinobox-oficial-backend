<?php

namespace App\Presenters\Sistema;
use App\Presenters\Presenter;
use App\Services\Imagen;

class CompanyPresenter extends Presenter {
  private $folderImg = 'photo_company';
  private $imgDefault = "/dist/img/img-default-user.jpg";

  public function getPhoto() {
    return (new Imagen($this->model->imagen, $this->folderImg, $this->imgDefault))->call();
  }
}
