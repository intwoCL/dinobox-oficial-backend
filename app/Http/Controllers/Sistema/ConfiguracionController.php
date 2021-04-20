<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\AuthUsuarioPasswordRequest as PasswordUserRequest;
use App\Services\ImportImage;
use App\Services\Settings;

class ConfiguracionController extends Controller
{
  public function profile(){
    $u = current_user();
    $themes = Settings::THEMES;
    return view('config.perfil',compact('u','themes'));
  }

  public function profileStore(Request $request){
    try {
      $user = current_user();
      $user->nombre = $request->input('nombre');
      $user->apellido = $request->input('apellido');

      if($user->correo != $request->input('correo')){
        $request->validate([
          'correo' => 'required|min:4|max:100|email|unique:s_usuario,correo',
        ]);
        $user->correo = $request->input('correo');
      }

      if(!empty($request->file('image'))){
        $filename = time();
        $folder = 'public/photo_usuarios';
        $user->foto = ImportImage::save($request, 'image', $filename, $folder);
      }

      $user->update();
      return back()->with('success','Se ha actualizado.')->with('tabs','user');
    } catch (\Throwable $th) {
      return back()->with('info','Error Intente nuevamente.')->with('tabs','user');
      return $th;
    }
  }

  public function password(PasswordUserRequest $request){
    $user = current_user();
    $actual_password = hash('sha256', $request->input('password_actual'));
    $new_password = hash('sha256', $request->input('password_nueva'));
    if($actual_password==$user->password){
      if($user->password != $new_password){
        $user->password = $new_password;
        $user->update();

        return back()->with('success','Se ha actualizado.')->with('tabs','password');
      }else{
        return back()->with('info','Error Las Contraseñas son iguales.')->with('tabs','password');
      }
    }else{
      return back()->with('info','Error Intente nuevamente.')->with('tabs','password');
    }
  }

  public function theme(Request $request){
    try {
      $user = current_user();
      $user->config_theme = $request->input('theme');

      $data = [ 'darkmode' => false ];
      if ($request->input('checkDarkMode')) {
        $data = [ 'darkmode' => true ];
      }
      $user->config = $data;

      $user->update();
      return back()->with('success','Se ha actualizado.')->with('tabs','theme');
    } catch (\Throwable $th) {
      return back()->with('info','Error Intente nuevamente.')->with('tabs','theme');
    }
  }
}
