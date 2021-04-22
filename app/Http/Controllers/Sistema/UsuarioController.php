<?php

namespace App\Http\Controllers\Sistema;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Sistema\Usuario;

use App\Http\Requests\AuthUsuarioRequest as UsuarioRequest;
use App\Http\Requests\UsuarioCreateRequest as UserCreateRequest;
use App\Http\Requests\AuthUsuarioPasswordRequest as PasswordUserRequest;
use App\Services\ImportImage;

class UsuarioController extends Controller
{
  public function index(){
    $usuarios = Usuario::where('activo',true)->get();
    return view('admin.usuario.index', compact('usuarios'));
  }

  public function indexDelete(){
    $usuarios = Usuario::where('activo',false)->get();
    return view('admin.usuario.indexdelete', compact('usuarios'));
  }

  public function create(){
    $permiso_alumno = Usuario::PERMISO_ALUMNO;
    return view('admin.usuario.create',compact('permiso_alumno'));
  }

  public function store(UserCreateRequest $request){
    try {
      $user= new Usuario();
      $user->nombre =$request->input('nombre');
      $user->apellido = $request->input('apellido');
      $user->correo = $request->input('correo');
      $user->username = $request->input('username');
      $user->password = hash('sha256', $request->input('password'));

      if(!empty($request->file('image'))){
        $filename = time();
        $folder = 'public/photo_usuarios';
        $user->foto = ImportImage::save($request, 'image', $filename, $folder);
      }

      $user->save();
      return redirect()->route('admin.usuario.index')->with('success','Se ha creado correctamente.');
    } catch (\Throwable $th) {
      return back()->with('info','Error Intente nuevamente.');
    }
  }

  public function edit($id){
    try {
      $permiso_alumno = Usuario::PERMISO_ALUMNO;
      $u = Usuario::findOrFail($id);
      return view('admin.usuario.edit',compact('u','permiso_alumno'));
    } catch (\Throwable $th) {
      return back()->with('info','Error Intente nuevamente.');
    }
  }

  public function update(Request $request, $id){
    try {
      $user = Usuario::findOrFail($id);
      $user->nombre = $request->input('nombre');
      $user->apellido = $request->input('apellido');
      $user->correo = $request->input('correo');
      $user->username = $request->input('username');

      if(!empty($request->file('image'))){
        $filename = time();
        $folder = 'public/photo_usuarios';
        $user->foto = ImportImage::save($request, 'image', $filename, $folder);
      }

      $user->update();
      return back()->with('success','Se ha actualizado.');
    } catch (\Throwable $th) {
      return $th;
      return back()->with('info','Error Intente nuevamente.');
    }
  }

  public function password(Request $request, $id){
    try {
      $user = Usuario::findOrFail($id);
      $user->password = hash('sha256', $request->input('password_2'));
      $user->update();
      // TODO: Falta agregar envio de correo
      return back()->with('success','Se ha actualizado.');
    } catch (\Throwable $th) {
      return back()->with('info','Error Intente nuevamente.');
    }
  }

  // public function destroy(Request $request, $id){
  //   try {
  //     $user = Usuario::findOrFail($request->input('id_usuario'));

  //     if ($user->activo) {
  //       foreach ($user->departamentosUsuario as $du) {
  //         $du->activo = false;
  //         $du->update();
  //       }
  //     }

  //     $user->activo = !$user->activo;
  //     $user->update();

  //     // $autUser = new AuditUserDeleteReporte();
  //     // $autUser->id_usuario = $user->id;
  //     // $autUser->motivo = $user->activo ? 2 : 1;
  //     // $autUser->save();
  //     return back()->with('success','Se ha actualizado.');
  //   } catch (\Throwable $th) {
  //     return back()->with('info','Error Intente nuevamente.');
  //   }
  // }
}
