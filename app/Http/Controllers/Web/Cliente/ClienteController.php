<?php

namespace App\Http\Controllers\Web\Cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sistema\Cliente;
use App\Http\Requests\ClienteCreateRequest as ClientCreateRequest;
use App\Http\Requests\ClienteLoginRequest;
use App\Http\Requests\PasswordClienteRequest;
use App\Models\Orden\Orden;
use App\Models\Sistema\Region;
use App\Models\Sistema\Comuna;
use App\Models\Sistema\Direccion;
use App\Models\Sistema\Sistema;
use App\Services\Policies\Web\Cliente\ClientePolicy;
use Auth;

class ClienteController extends Controller {

  private $policy;

  public function __construct() {
    $this->policy = new ClientePolicy();
  }

  public function home() {
    $cliente = current_client();
    return view('web.cliente.home.index',compact('cliente'));
  }

  //Perfil Cliente
  //Index Perfil
  public function perfil() {
    $sistema = current_sistema();
    $cliente = current_client();
    return view('web.cliente.home.perfil',compact('cliente'));
  }

  //Actualizar Datos
  public function profileUpdate(Request $request) {
    try {
      $cliente = Cliente::find(current_client()->id);
      $cliente->nombre = $request->input('nombre');
      $cliente->apellido = $request->input('apellido');
      // $cliente->correo = $request->input('correo');
      $cliente->telefono = $request->input('telefono');
      // $cliente->birthdate = date_format(date_create($request->input('birthdate')),'Y-m-d');
      // $cliente->sexo = $request->input('sexo');
      $cliente->update();

      return back()->with('success','Se ha actualizado');
    } catch (\Throwable $th) {
      return back()->with('info','Error intente nuevamente');
    }
  }

  //Contraseña
  //Index Contraseña
  public function passwordIndex(){
    $cliente = current_client();
    return view('web.cliente.home.password', compact('cliente'));;
  }

  //Actualizar Contraseña
  public function passwordUpdate(PasswordClienteRequest $request){
    try {
      $cliente = Cliente::find(current_client()->id);
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

  //Direcciones
  //Index
  public function direcciones() {
    $comunas = Comuna::orderBy('nombre')->get();
    $regions = Region::get();
    $cliente = current_client();
    return view('web.cliente.home.direcciones',compact('cliente','comunas','regions'));
  }

  //Crear dirección
  public function direccionStore(Request $request){
    try {
      $direccion = new Direccion();
      $direccion->id_cliente = current_client()->id;
      $direccion->calle = $request->input('calle');
      $direccion->numero = $request->input('numero');
      $direccion->id_comuna = $request->input('id_comuna');
      $direccion->dato_adicional = $request->input('dato_adicional');
      $direccion->telefono = $request->input('telefono');
      $direccion->favorito = $request->has('favorito');
      $direccion->save();

      return back()->with('success','Se ha agregado exitosamente.');
    } catch (\Throwable $th) {
      return back()->with('info','Error Intente nuevamente.');
    }
  }

  //Vista edit
  public function direccionesIndex($id){
    $cliente = current_client();
    $d = Direccion::where('id_cliente',$cliente->id)->findOrFail($id);
    $this->policy->direccionesIndex($d,$cliente);
    $comunas = Comuna::orderBy('nombre')->get();
    $regions = Region::get();
    return view('web.cliente.home.direccion_edit',compact('cliente','comunas','regions','d'));
  }

  //Actualizar dirección
  public function direccionUpdate(Request $request, $id){
    try {
      $cliente = current_client();
      $direccion = Direccion::where('id_cliente',$cliente->id)->findOrFail($id);
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

  //Historial de movimientos
  //Index
  public function historial() {
    $cliente = current_client();
    $data=Orden::where('id_cliente',$cliente->id)->paginate(6);
    return view('web.cliente.home.historial',compact('cliente'), ['ordenes'=>$data]);
  }

  //Seguimiento privado
  public function seguimiento($codigo) {
    $cliente = current_client();
    $orden = Orden::where('codigo',$codigo)->where('activo',true)->where('id_cliente',$cliente->id)->firstOrFail();
    $repartidor = $orden->ordenRepartidor->repartidor ?? null;
    return view('web.cliente.home.seguimiento',compact('cliente','orden','repartidor','codigo'));
  }

}