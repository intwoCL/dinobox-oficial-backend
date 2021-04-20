<?php

namespace App\Http\Controllers\Sistema;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Consulta\Tag;
use App\Models\Consulta\Consulta;
use App\Models\Consulta\ConsultaTag;


class ConsultasController extends Controller
{
  public function index(){
    $consultas = Consulta::get();
    $tags = Tag::get();
    return view('admin.reporte.consulta.index',compact('consultas','tags'));
  }

  public function store(Request $request){
    try {
      $c = new Consulta();
      $c->nombre = $request->input('nombre_consulta');
      $c->descripcion = $request->input('descripcion');
      $c->id_admin_creador = current_admin()->id;
      $c->save();

      $tags = $request->input('tags');
      $tags = explode(',',$tags);

      foreach ($tags as $t) {
        $tag = $this->buscarTag($t);
        if(empty($tag)){
          $tag2 = new Tag();
          $tag2->nombre = $t;
          $tag2->save();

          $ct = new ConsultaTag();
          $ct->id_tags = $tag2->id;
          $ct->id_consulta = $c->id;
          $ct->save();

        }else{
          $ct = new ConsultaTag();
          $ct->id_tags = $tag->id;
          $ct->id_consulta = $c->id;
          $ct->save();
        }
      }
      return back()->with('success','Se ha registrado correctamente.');

    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function buscarTag($nombre){
    try {
      $t = Tag::where('nombre',$nombre)->firstOrFail();
      return $t;
    } catch (\Throwable $th) {
      return null;
    }
  }

  public function show($id){
    $c = Consulta::find($id);
    return view('admin.reporte.consulta.show',compact('c'));
  }

  public function update(Request $request, $id){
    try {
      $c = Consulta::find($id);
      $c->contenido = $request->input('code');
      $c->update();
      return back()->with('success','Se ha actualizado.');
    } catch (\Throwable $th) {
      return back()->with('danger','Error Intente nuevamente.');
    }
  }
}
