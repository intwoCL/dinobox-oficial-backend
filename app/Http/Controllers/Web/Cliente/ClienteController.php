<?php

namespace App\Http\Controllers\Web\Cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sistema\Cliente;
use App\Services\ImportImage;
use App\Http\Requests\ClienteCreateRequest as ClientCreateRequest;
use App\Http\Requests\ClienteLoginRequest;
use App\Http\Requests\PasswordClienteRequest;
use App\Models\Sistema\Region;
use App\Models\Sistema\Comuna;
use App\Models\Sistema\Direccion;
use App\Models\Sistema\Sistema;
use Auth;

class ClienteController extends Controller
{

    //Perfil Cliente
    public function cliente() {
      // $comunas = Comuna::orderBy('nombre')->get();
      // $regions = Region::get();
      $cliente = current_client();
      return view('web.cliente.home.cliente',compact('cliente'));
    }


    public function direcciones() {
      $comunas = Comuna::orderBy('nombre')->get();
      $regions = Region::get();
      $cliente = current_client();
      return view('web.cliente.home.direcciones',compact('cliente','comunas','regions'));
    }


    public function historial() {
      // $comunas = Comuna::orderBy('nombre')->get();
      // $regions = Region::get();
      $cliente = current_client();
      return view('web.cliente.home.historial',compact('cliente'));
    }


    //Actualizar Datos
    public function profileUpdate(Request $request) {
      try {
        $cliente = current_client();
        $cliente->nombre = $request->input('nombre');
        $cliente->apellido = $request->input('apellido');
        $cliente->correo = $request->input('correo');
        $cliente->telefono = $request->input('telefono');
        $cliente->birthdate = date_format(date_create($request->input('birthdate')),'Y-m-d');
        $cliente->sexo = $request->input('sexo');

        // if(!empty($request->file('image'))) {
        //   $filename = time();
        //   $folder = 'public/photo_clientes';
        //   $cliente->imagen = ImportImage::save($request, 'image', $filename, $folder);
        // }

        $cliente->update();

        return back()->with('success','Se ha actualizado');
      } catch (\Throwable $th) {
        // return $th;
        return back()->with('info','Error intente nuevamente');
      }
    }


    //Actualizar contraseña
    public function passwordIndex(){
      $cliente = current_client();
      return view('web.cliente.home.password', compact('cliente'));;
    }


    public function passwordUpdate(Request $request){
      try {
        $cliente = current_client();
        $actual_password = hash('sha256', $request->input('password_actual'));
        $new_password = hash('sha256', $request->input('password_nueva'));

        if($actual_password == $cliente->password) {
          if($cliente->password != $new_password) {
            $cliente->password = $new_password;
            $cliente->update();

            return back()->with('success', 'Contraseña actualizada');
          } else {
            return back()->with('info', 'Error las contraseñas son iguales');
          }
        } else {
          return back()->with('info', 'Error intente nuevamente');
        }
      } catch (\Throwable $th) {
        return $th;
      }
    }


    //Registro Usuario
    public function register() {
      $sistema = Sistema::first();
      return view('web.cliente.home.register',compact('sistema'));
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
        $cliente->birthdate = date_format(date_create($request->input('birthdate')),'Y-m-d');

        if(!empty($request->file('image'))){
          $filename = time();
          $folder = 'public/photo_clientes';
          $cliente->imagen = ImportImage::save($request, 'image', $filename, $folder);
        }

        $cliente->save();

        return redirect()->route('root')->with('success,','Se ha creado exitosamente');
      } catch (\Throwable $th) {
        // return $th;
        return back()->with('info','Error Intente nuevamente.');
      }
    }


    //Login Cliente
    public function auth() {
      close_sessions();

      $sistema = Sistema::first();
      return view('web.cliente.home.login',compact('sistema'));
    }


    //Iniciar Sesión
    public function login(ClienteLoginRequest $request) {
      try {
        $c = Cliente::findByCorreo($request->correo)->firstOrFail();
        $pass =  hash('sha256', $request->password);

        if($c->password == $pass) {
          Auth::guard('cliente')->loginUsingId($c->id);

          return redirect()->route('profile.cliente');

        } else {
          return back()->with('info','Error. Intente nuevamente.');
        }
      } catch (\Throwable $th) {
        return $th;
        return back()->with('info','Error. Intente nuevamente.');
      }
    }

    //Cerrar Sesión
    public function logout() {
      close_sessions();
      return redirect()->route('root');
    }

    //Direcciones
    public function direccionStore(Request $request){
      try {
        $cliente = current_client();
        $direccion = new Direccion();
        $direccion->id_cliente = $cliente->id;
        $direccion->calle = $request->input('calle');
        $direccion->numero = $request->input('numero');
        $direccion->id_comuna = $request->input('id_comuna');
        $direccion->dato_adicional = $request->input('dato_adicional');
        $direccion->telefono = $request->input('telefono');
        $direccion->favorito = $request->has('favorito');
        $direccion->save();

        return back()->with('success','Se ha agregado exitosamente.');
      } catch (\Throwable $th) {
        return $th;
        return back()->with('info','Error Intente nuevamente.');
      }
    }

    public function direccionUpdate(Request $request){
      try {
        $cliente = current_client();
        $direccion = new Direccion();
        $direccion->id_cliente = $cliente->id;
        $direccion->calle = $request->input('calle');
        $direccion->numero = $request->input('numero');
        $direccion->id_comuna = $request->input('id_comuna');
        $direccion->dato_adicional = $request->input('dato_adicional');
        $direccion->telefono = $request->input('telefono');
        $direccion->favorito = $request->has('favorito');
        $direccion->update();

        return back()->with('success','Se ha actualizado exitosamente.');
      } catch (\Throwable $th) {
        return $th;
        return back()->with('info','Error Intente nuevamente.');
      }
    }

}