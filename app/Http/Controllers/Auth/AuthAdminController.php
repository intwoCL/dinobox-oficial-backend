<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

use App\Models\Sistema\Admin;
use App\Http\Requests\AuthLoginRequest as AuthRequest;
use App\Services\UserSession;
use Symfony\Component\VarDumper\Cloner\Data;

class AuthAdminController extends Controller
{
  public function auth(){
    close_sessions();
    return view('auth.admin');
  }

  public function login(AuthRequest $request){
  try {
      $a = Admin::where('username',$request->username)->firstOrFail();
      $pass = hash('sha256', $request->password);
      if($a->password==$pass){
        Auth::guard('admin')->loginUsingId($a->id);
        return redirect()->route('admin.home');
      }else{
        return back()->with('info','Error. Intente nuevamente.');
      }
    } catch (\Throwable $th) {
      return back()->with('info','Error. Intente nuevamente.');
    }
  }

  public function logout(){
    close_sessions();
    return redirect()->route('root');
  }


  public function modeMainAdmin(Request $request){
    try {
      $data = array(
        'uid' => current_admin()->id,
        'modeMain' => true
      );

      if(Auth::guard('admin')->check()){
        Auth::guard('admin')->logout();
      }

      $id = $request->input('id_usuario');
      Auth::guard('usuario')->loginUsingId($id);
      UserSession::getInstance();

      session(['modeMain' => $data]);

      // Redirecciona al home
      return redirect()->route('home')->with('success','SE HA ACTIVADO MODO MAIN');
    } catch (\Throwable $th) {
      return back()->with('info','Error. Intente nuevamente.');
    }
  }

  public function modeMainUser(Request $request){
    try {
      $data = session()->get('modeMain');
      close_sessions();
      Auth::guard('admin')->loginUsingId($data['uid']);
      return redirect()->route('admin.home')->with('success','HAS SALIDO DEL MODO MAIN');;
    } catch (\Throwable $th) {
      return back()->with('info','Error. Intente nuevamente.');
    }
  }
}
