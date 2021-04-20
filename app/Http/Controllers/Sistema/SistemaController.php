<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use App\Models\Sistema\Sistema;
use App\Services\ImportImage;
use Illuminate\Http\Request;

class SistemaController extends Controller
{
  public function index() {
    $sistema = Sistema::first();
    return view('admin.sistema.index',compact('sistema'));
  }

  public function update(Request $request) {
    $sistema = Sistema::first();
    $sistema->titulo = $request->input('titulo');
    $folder = 'public/photo_sistema';

    if (!empty($request->file('image'))) {
      $filename = time();
      $sistema->imagen_fondo = ImportImage::save($request, 'image', $filename, $folder);
    }

    if (!empty($request->file('image2'))) {
      $filename = time();
      $sistema->imagen_logo = ImportImage::save($request, 'image2', $filename, $folder);
    }
    $sistema->update();
    return back()->with('success','Se ha actualizado.');
  }
}
