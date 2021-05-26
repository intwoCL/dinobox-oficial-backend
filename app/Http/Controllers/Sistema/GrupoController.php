<?php

namespace App\Http\Controllers\Sistema;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Sistema\Grupo;
use App\Services\ImportImage;

class GrupoController extends Controller
{
  public function index() {
    $grupos = Grupo::get();

    return view('admin.grupo.index', compact('grupos'));
  }

  public function store(Request $request){
    try {
      $grupo = new Grupo();
      $grupo->id_sucursal = 1;
      $grupo->nombre = $request->input('nombre');
     
      if(!empty($request->file('image'))){
        $filename = time();
        $folder = 'public/photo_grupo';
        $grupo->imagen = ImportImage::save($request, 'image', $filename, $folder);
      }

      $grupo->save();

      return back()->with('success','Se ha creado correctamente.');
    } catch (\Throwable $th) {
      return $th;
      return back()->with('info','Error Intente nuevamente.');
    }
  }
}
