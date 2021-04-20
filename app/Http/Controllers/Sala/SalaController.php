<?php

namespace App\Http\Controllers\Sala;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Sala\Sala;
use App\Http\Requests\SalaCreateRequest as SalaRequest;

class SalaController extends Controller
{
  public function index(){
    $salas_extras = Sala::where('activo',true)->where('publico',true)->where('id_usuario','<>',current_user()->id)->get();
    $salas = Sala::where('activo',true)->where('id_usuario',current_user()->id)->get();
    return view('sala.index',compact('salas','salas_extras'));
  }

  public function store(SalaRequest $request){
    try {
      $sa = new Sala();
      $sa->nombre = $request->input('nombre_sala');
      $sa->codigo = $this->buscarCodigo();
      $sa->id_usuario = current_user()->id;
      $sa->descripcion = $request->input('comentario',null);


      if (!empty($request->input('password'))) {
        $sa->password = $request->input('password');
        $sa->require_password = true;
      }

      if (!empty($request->input('publico'))) {
        $sa->publico = $request->input('publico');
      }
      $sa->save();
      return redirect()->route('sala.index')->with('success','Se ha creado correctamente.');

    } catch (\Throwable $th) {
    return back()->with('danger','Error intente nuevamente.');
    }
  }

  public function show($codigo){

    $sala = Sala::findByCode($codigo)->firstOrFail();

    return view('sala.show',compact('sala'));
  }

  public function edit($codigo){
    $s = Sala::where('codigo',$codigo)->where('activo',true)->where('id_usuario',current_user()->id)->firstOrFail();
    return view('sala.edit',compact('s'));
  }

  public function update(Request $request, $id){
    try {
      $sa = Sala::where('codigo',$request->input('codigo'))->where('activo',true)->where('id_usuario',current_user()->id)->firstOrFail();

      $sa->nombre = $request->input('nombre_sala');
      $sa->descripcion = $request->input('comentario',null);

      if (!empty($request->input('password'))) {
        $sa->password = $request->input('password');
        $sa->require_password = true;
      }else{
        $sa->password = null;
        $sa->require_password = false;
      }

      if (!empty($request->input('publico'))) {
        $sa->publico = $request->input('publico');
      }else{
        $sa->publico = false;
      }

      $sa->update();
      return back()->with('success','Se ha creado correctamente.');
    } catch (\Throwable $th) {
    return back()->with('danger','Error intente nuevamente.');
    }
  }

  public function entrarCodigo(Request $request){
    try {
      $sala = Sala::where('codigo',$request->input('codigo_sala'))->where('activo',true)->firstOrFail();
      return view('sala.show',compact('sala'));
    } catch (\Throwable $th) {
      return back()->with('danger','Error intente nuevamente.');
    }

  }

  public function entrarPassword(Request $request){
    try {
      $id = $request->input('id_sala');
      $sala = Sala::where('activo',true)->findOrFail($id);

      if($sala->password == $request->input('sala_password')){
        return view('sala.show',compact('sala'));
      }else{
        return back()->with('info','Constraseña no válida.');
      }
    } catch (\Throwable $th) {
      return back()->with('danger','Error intente nuevamente.');
    }
  }

  // PRIVATE

  private function buscarCodigo(){
    try {
      $c = helper_random_string_number(6);
      $v = Sala::where('codigo',$c)->firstOrFail();
      return $this->buscarCodigo();
    } catch (\Throwable $th) {
      return $c;
    }
  }
}
