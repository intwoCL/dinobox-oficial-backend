<?php

namespace App\Http\Controllers\Sistema;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Sistema\Usuario;
use App\Models\Sistema\Vehiculo;
use App\Presenters\Sistema\VehiculoPresenter;
use App\Services\ImportImage;

class VehiculoController extends Controller
{
  public function index($id_usuario){
    $tipos = VehiculoPresenter::STATE;
    $u = Usuario::with('vehiculos')->findOrFail($id_usuario);
    return view('admin.usuario.vehiculo',compact('u','tipos'));
  }

  public function store(Request $request, $id){
    try {
      $user = Usuario::findOrFail($id);
      $vehiculo = new Vehiculo();
      $vehiculo->id_usuario = $user->id;
      $vehiculo->patente = $request->input('patente');
      $vehiculo->modelo = $request->input('modelo');
      $vehiculo->marca = $request->input('marca');
      $vehiculo->tipo = $request->input('tipo');

      if(!empty($request->file('image'))){
        $filename = time();
        $folder = 'public/photo_vehiculos';
        $vehiculo->imagen = ImportImage::save($request, 'image', $filename, $folder);
      }

      $vehiculo->save();
      return back()->with('success','Se ha agregado exitosamente.');
    } catch (\Throwable $th) {
      return back()->with('info','Error Intente nuevamente.');
    }
  }
}
