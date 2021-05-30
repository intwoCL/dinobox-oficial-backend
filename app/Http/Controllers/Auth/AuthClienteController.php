<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClienteLoginRequest;
use Illuminate\Http\Request;
use App\Models\Sistema\Cliente;
use App\Models\Sistema\Sistema;

// use Auth;

// use App\Models\Sistema\Usuario;

// use App\Http\Requests\AuthLoginRequest as AuthRequest;
// use App\Models\Sistema\Sistema;
// use App\Services\UserSession;

class AuthClienteController extends Controller
{

  //Login Cliente
  public function auth() {
    close_sessions();

    $sistema = Sistema::first();
    return view('auth.cliente.login',compact('sistema'));
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
      return redirect()->route('cliente.register.noRegistro');
    }
  }

  //Cerrar Sesión
  public function logout() {
    close_sessions();
    return redirect()->route('root');
  }

  //Registrado
  public function avisoRegistro() {
    return view('web.cliente.home.avisoRegistro');
  }

   //Registro Usuario
  //Index
  public function register() {
    $sistema = Sistema::first();
    return view('auth.cliente.register',compact('sistema'));
    // return view('web.cliente.home.register',compact('sistema'));
  }

  //Viste Create
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

  // public function auth() {
  //   close_sessions();

  //   $sistema = Sistema::first();
  //   return view('auth.usuario',compact('sistema'));
  // }

  // public function login(AuthRequest $request) {
  //   try {
  //     $u = Usuario::findByUsername($request->username)->firstOrFail();
  //     $pass =  hash('sha256', $request->password);
  //     // return $u;
  //     if ($u->password == $pass) {
  //       Auth::guard('usuario')->loginUsingId($u->id);

  //       if ($u->repartidor()) {
  //         return redirect()->route('repartidor.home');
  //       }

  //       return redirect()->route('home');
  //     } else {
  //       return back()->with('info','Error. Intente nuevamente.');
  //     }
  //   } catch (\Throwable $th) {
  //     return back()->with('info','Error. Intente nuevamente.');
  //   }
  // }

  // public function logout() {
  //   close_sessions();
  //   return redirect()->route('root');
  // }
}