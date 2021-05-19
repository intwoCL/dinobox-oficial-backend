<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use App\Models\Sistema\Sistema;
use App\Services\ImportImage;
use Illuminate\Http\Request;

class SistemaController extends Controller
{
  public function index(){
    return view('admin.sistema.index');
  }

  public function show() {
    $sistema = Sistema::first();
    return view('admin.sistema.edit',compact('sistema'));
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

    $config = $sistema->config;
    $config['sistema_color'] = $request->input('sistema_color',Sistema::COLOR_BASE);

    $sistema->config = $config;

    $sistema->update();
    return back()->with('success','Se ha actualizado.');
  }

  public function updateLogin(Request $request) {
    $sistema = Sistema::first();
    $config = $sistema->config;

    $config['primary_color'] = $request->input('primary_color',Sistema::COLOR_BASE);
    $config['primary_color_text'] = $request->input('primary_color_text',Sistema::COLOR_TEXT_BASE);
    $config['login_oscuro'] = $request->input('login_oscuro',false);

    $sistema->config = $config;
    $sistema->update();
    return back()->with('success','Se ha actualizado.');
  }
}
