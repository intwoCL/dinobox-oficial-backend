<?php

namespace App\Http\Controllers\Sistema;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Sistema\Usuario;

use App\Http\Requests\UsuarioCreateRequest as UserCreateRequest;
use App\Lib\Permissions;
use App\Models\Sistema\SucursalUsuario;
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
    $roles = Permissions::ROLES;
    return view('admin.usuario.create',compact('roles'));
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
        $user->imagen = ImportImage::save($request, 'image', $filename, $folder);
      }

      $user->save();

      //Agregar rol
      $su = new SucursalUsuario();
      $su->id_sucursal = 1;
      $su->id_usuario = $user->id;
      $su->rol = $request->input('rol');
      $su->save();

      return redirect()->route('admin.index')->with('success','Se ha creado correctamente.');
    } catch (\Throwable $th) {
      return $th;
      return back()->with('info','Error Intente nuevamente.');
    }
  }

  public function edit($id){
    try {
      $roles = Permissions::ROLES;
      $u = Usuario::findOrFail($id);
      return view('admin.usuario.edit',compact('u','roles'));
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
        $user->imagen = ImportImage::save($request, 'image', $filename, $folder);
      }

      //Actualizar el rol



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

  public function destroy(Request $request, $id){
    try {
      $user = Usuario::findOrFail($request->input('id_usuario'));
      $user->activo = !$user->activo;
      $user->update();
      return back()->with('success','Se ha actualizado.');
    } catch (\Throwable $th) {
      return back()->with('info','Error Intente nuevamente.');
    }
  }
}
