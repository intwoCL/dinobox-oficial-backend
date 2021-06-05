<?php

namespace App\Presenters\Orden;
use App\Presenters\Presenter;
use App\Services\Imagen;

class OrdenPresenter extends Presenter{

  private $folderImg = 'ordenes';
  private $imgDefault = "/dist/img/img-default-user.jpg";


  public function getImagenRemitente() {
    $img = $this->model->files['imagen_remitente_1'] ?? null;
    return $this->getImagen($img);
  }

  public function getImagenDestinatario() {
    $img = $this->model->files['imagen_destinatario_1'] ?? null;
    return $this->getImagen($img);
  }

  public function getImagen($imagen){
    return (new Imagen($imagen, $this->folderImg, $this->imgDefault))->call();
  }
}
