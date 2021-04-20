<?php

namespace App\Services;
use Illuminate\Support\Facades\Storage;

class Imagen64
{
  private $img;

  function __construct($img) {
    $this->setImg($img);
  }

  public function call(){
    return $this->build();
  }

  // PRIVATE

  public function setImg($img){
    $img_new = $img;
    if (!filter_var($img, FILTER_VALIDATE_URL)) {
      $img_new = public_path() . $img;
    }
    $this->img = $img_new;
  }

  private function build(){
    $destination = "img123123";

    // return $this->img;
    // return $this->convertImgToBase64();
    return "data:image/png;base64,". base64_encode(file_get_contents($this->compressImage($this->img, $destination, 15)));
  }

  private function convertImgToBase64(){
    return "data:image/png;base64,". base64_encode(file_get_contents($this->img));
  }

  private function compressImage($source, $destination, $quality) {
    // Obtenemos la información de la imagen
    $imgInfo = getimagesize($source);
    $mime = $imgInfo['mime'];

    // Creamos una imagen
    switch($mime){
        case 'image/jpeg':
            $image = imagecreatefromjpeg($source);
            break;
        case 'image/png':
            $image = imagecreatefrompng($source);
            break;
        case 'image/gif':
            $image = imagecreatefromgif($source);
            break;
        default:
            $image = imagecreatefromjpeg($source);
    }

    // Guardamos la imagen
    imagejpeg($image, $destination, $quality);

    // Devolvemos la imagen comprimida
    return $destination;
}
}
