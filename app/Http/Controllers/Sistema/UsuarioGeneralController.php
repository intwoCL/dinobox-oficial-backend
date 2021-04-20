<?php

namespace App\Http\Controllers\Sistema;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sistema\TipoUsuario;

use App\Models\Sistema\UsuarioGeneral;
use App\Services\ImportImage;
use App\Services\Policies\Sistema\UsuarioGeneralPolicy;

class UsuarioGeneralController extends Controller
{
  private $policy;

  public function __construct() {
    $this->policy = new UsuarioGeneralPolicy();
  }

  public function index(){
    $this->policy->index();
    $permiso_editar = $this->policy->can();

    $usuarios = UsuarioGeneral::where('activo',true)->get();
    return view('admin.usuario_general.index', compact('usuarios','permiso_editar'));
  }

  public function indexDelete(){
    $this->policy->indexDelete();

    $usuarios = UsuarioGeneral::where('activo',false)->get();
    return view('admin.usuario_general.indexdelete', compact('usuarios'));
  }

  public function create(){
    $this->policy->create();

    $tipos = TipoUsuario::get();
    return view('admin.usuario_general.create',compact('tipos'));
  }

  public function store(Request $request){
    $this->policy->store();

    try {
      $user = UsuarioGeneral::where('run',$request->input('run'))->first();

      if(empty($user)) {
        $user = new UsuarioGeneral();
        $user->run = $request->input('run');
        $user->nombre =$request->input('nombre');
        $user->apellido = $request->input('apellido',null);
        $user->correo = $request->input('correo',null);
        $user->telefono = $request->input('telefono',null);
        $user->id_tipo_usuario = $request->input('id_tipo_usuario');

        if(!empty($request->file('image'))){
          $filename = time();
          $folder = 'public/photo_usuarios_general';
          $user->foto = ImportImage::save($request, 'image', $filename, $folder);
        }

        $user->save();
        return redirect()->route('admin.usuarioGeneral.index')->with('success','Se ha creado correctamente.');
      }

      return back()->with('info','Usuario ya existe.');
    } catch (\Throwable $th) {
      return back()->with('info','Error Intente nuevamente.');
    }
  }

  public function edit($id){
    $this->policy->edit();
    try {
      $tipos = TipoUsuario::get();
      $u = UsuarioGeneral::findOrFail($id);
      return view('admin.usuario_general.edit',compact('u','tipos'));
    } catch (\Throwable $th) {
      return back()->with('info','Error Intente nuevamente.');
    }
  }

  public function update(Request $request, $id){
    return $this->policy->update();
    try {
      $id = $request->input('id');
      $run = $request->input('run');

      $user = UsuarioGeneral::where('run',$run)->findOrFail($id);
      // $user->run = $request->input('run');
      $user->nombre = $request->input('nombre');
      $user->apellido = $request->input('apellido',null);
      $user->correo = $request->input('correo',null);
      $user->telefono = $request->input('telefono',null);
      $user->id_tipo_usuario = $request->input('id_tipo_usuario');

      if(!empty($request->file('image'))){
        $filename = time();
        $folder = 'public/photo_usuarios_general';
        $user->foto = ImportImage::save($request, 'image', $filename, $folder);
      }

      $user->update();
      return back()->with('success','Se ha actualizado.');
    } catch (\Throwable $th) {
      return back()->with('info','Error Intente nuevamente.');
    }
  }


  public function destroy(Request $request, $id){
    try {
      $user = UsuarioGeneral::findOrFail($request->input('id_usuario'));
      $user->activo = !$user->activo;
      $user->update();
      return back()->with('success','Se ha actualizado.');
    } catch (\Throwable $th) {
      return back()->with('info','Error Intente nuevamente.');
    }
  }
}
