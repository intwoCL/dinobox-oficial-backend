<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;

use App\Models\Sistema\Usuario;

use App\Http\Requests\AuthLoginRequest as AuthRequest;
use App\Models\Sistema\Sistema;
use App\Services\UserSession;

class AuthUsuarioController extends Controller
{

  public function auth() {
    close_sessions();

    $sistema = Sistema::first();
    return view('auth.usuario',compact('sistema'));
  }

  public function login(AuthRequest $request) {
    try {
      $u = Usuario::findByUsername($request->username)->firstOrFail();
      $pass =  hash('sha256', $request->password);
      // return $u;
      if ($u->password == $pass) {
        Auth::guard('usuario')->loginUsingId($u->id);

        // UserSession::getInstance();
        return redirect()->route('home');
      } else {
        return back()->with('info','Error. Intente nuevamente.');
      }
    } catch (\Throwable $th) {
      return back()->with('info','Error. Intente nuevamente.');
    }
  }

  public function logout() {
    close_sessions();
    return redirect()->route('root');
  }
}