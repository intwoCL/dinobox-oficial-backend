<?php

namespace App\Presenters\Sistema;
use App\Presenters\Presenter;
use App\Services\Imagen;

class UsuarioPresenter extends Presenter{
  

  const PROFILE = [
    1 => ['admin', 'user-shield', 'purple'],
    2 => ['empleado', 'id-card', 'primary'],
    3 => ['repartidor','truck', 'success'],
  ];

  private $folderImg = 'photo_usuarios';
  private $imgDefault = "/dist/img/img-default-user.jpg";

  public function getPhoto(){
    return (new Imagen($this->model->imagen, $this->folderImg, $this->imgDefault))->call();
  }

  public function nombre_completo(){
		return "{$this->model->nombre} {$this->model->apellido}";
  }

  public function getPerfil(){
    $perfil = self::PROFILE[$this->model->sucursalUsuario->rol];
    return "<i class=\"fas fa-$perfil[1] text-$perfil[2]\" title=\"$perfil[0]\"></i>";
  }
}
