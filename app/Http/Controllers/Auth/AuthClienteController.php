<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClienteLoginRequest;
use Illuminate\Http\Request;
use App\Models\Sistema\Cliente;
use App\Models\Sistema\Sistema;

use Auth;

class AuthClienteController extends Controller
{
  public function auth() {
    close_sessions();

    $sistema = Sistema::first();
    return view('auth.cliente',compact('sistema'));
  }

  //Iniciar Sesión
  public function login(ClienteLoginRequest $request) {
    try {
      $c = Cliente::findByCorreo($request->correo)->firstOrFail();
      $pass =  hash('sha256', $request->password);
      if($c->password == $pass) {
        Auth::guard('cliente')->loginUsingId($c->id);

        return redirect()->route('web.cliente.home');
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

  public function register() {
    $sistema = Sistema::first();
    return view('auth.cliente.register',compact('sistema'));
    // return view('web.cliente.home.register',compact('sistema'));
  }

  public function registerStore(Request $request) {
    try {
      $cliente = new Cliente();
      $cliente->run = $request->input('run');
      $cliente->nombre = $request->input('nombre');
      $cliente->apellido = $request->input('apellido');
      $cliente->correo = $request->input('correo');
      $cliente->password = hash('sha256', $request->input('password'));
      $cliente->telefono = $request->input('telefono');

      $cliente->save();

      return redirect()->route('cliente.register.aviso')->with('success,','Se ha creado exitosamente');
    } catch (\Throwable $th) {
      return back()->with('info','Error Intente nuevamente.');
    }
  }
}
