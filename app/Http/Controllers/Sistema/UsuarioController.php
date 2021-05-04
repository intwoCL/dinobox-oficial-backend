<?php

namespace App\Http\Controllers\Sistema;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Sistema\Usuario;

use App\Http\Requests\UsuarioCreateRequest as UserCreateRequest;
use App\Http\Requests\UsuarioUpdateRequest as UserUpdateRequest;
use App\Lib\Permissions;
use App\Models\Sistema\SucursalUsuario;
use App\Models\Sistema\Vehiculo;
use App\Services\ImportImage;
use Intervention\Image\Facades\Image;

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
      $user->run = $request->input('run');
      $user->birthdate = date_format(date_create($request->input('birthdate')),'Y-m-d');

      // if(!empty($request->file('image'))){
      //   $filename = time();
      //   $folder = 'public/photo_usuarios';
      //   $user->imagen = ImportImage::save($request, 'image', $filename, $folder);
      // }
      if(!empty($request->file('image'))){

        $nombre_imagen = $request->file('image')->getClientOriginalName();
        $ruta = public_path() . '\storage\photo_usuarios/';
        // return $ruta;
        $image = Image::make($request->file('image'));
        $image->resize(300,300);
  
        for($i = 1; $i <=10;$i++) {
          $image->save($ruta . $nombre_imagen, $i*10, 'jpg');
        }
        $user->imagen = $nombre_imagen;
      }

      $user->save();

      //Agregar rol
      $su = new SucursalUsuario();
      $su->id_sucursal = 1;
      $su->id_usuario = $user->id;
      $su->rol = $request->input('rol');
      $su->save();

      return redirect()->route('admin.usuario.index')->with('success','Se ha creado correctamente.');
    } catch (\Throwable $th) {
      return $th;
      return back()->with('info','Error Intente nuevamente.');
    }
  }

  public function edit($id){
    try {
      $tipos = Vehiculo::STATE;
      $roles = Permissions::ROLES;
      $u = Usuario::findOrFail($id);
      return view('admin.usuario.edit',compact('u','roles','tipos'));
    } catch (\Throwable $th) {
      return back()->with('info','Error Intente nuevamente.');
    }
  }

  public function update(UserUpdateRequest $request, $id){
    try {
      $user = Usuario::findOrFail($id);
      $user->nombre = $request->input('nombre');
      $user->apellido = $request->input('apellido');
      $user->correo = $request->input('correo');
      $user->username = $request->input('username');
      $user->birthdate = date_format(date_create($request->input('birthdate')),'Y-m-d');

      // if(!empty($request->file('image'))){
      //   $filename = time();
      //   $folder = 'public/photo_usuarios';
      //   $user->imagen = ImportImage::save($request, 'image', $filename, $folder);
      // }
      if(!empty($request->file('image'))){

        $nombre_imagen = $request->file('image')->getClientOriginalName();
        $ruta = public_path() . '\storage\photo_usuarios/';
        // return $ruta;
        $image = Image::make($request->file('image'));
        $image->resize(300,300);
  
        for($i = 1; $i <=10;$i++) {
          $image->save($ruta . $nombre_imagen, $i*10, 'jpg');
        }
        $user->imagen = $nombre_imagen;
      }

      //Actualizar el rol
      $rol = $user->sucursalUsuario;
      $rol->rol = $request->input('rol');
      $rol->update();

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


  public function vehiculoStore(Request $request, $id){
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
      //throw $th;
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
