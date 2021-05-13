<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use File;

class SaveImage {
  public static function save(Request $request, $inputName = 'image', $name= '', $folderSave='trash', $ext='jpg') {

    try {
      $folder = '/' . date('Y') . '/' . date('m') . '/';
      $ruta = storage_path() . '\app\public/' . $folderSave .  $folder;

      if (!File::exists($ruta)) {
        File::makeDirectory($ruta, 0775, true, true);
      }

      $file = $request->file($inputName);
      $filename = $name. '.' . $ext;

      //Guardar en la carpeta storage
      $image = Image::make($file);
      $image->resize(600,900);

      $image->save($ruta . $filename,30,'jpg');
      $filename = $folder . $name. '.' . $ext;
      
      return $filename;
    } catch (\Throwable $th) {
      return $th;
    }
  }

}




