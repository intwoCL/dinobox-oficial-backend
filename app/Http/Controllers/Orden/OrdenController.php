<?php

namespace App\Http\Controllers\Orden;

use App\Http\Controllers\Controller;
use App\Models\Orden\Orden;
use App\Models\Sistema\Cliente;
use App\Models\Sistema\Usuario;
use Illuminate\Http\Request;
use App\Models\Sistema\Region;
use App\Models\Sistema\Comuna;

class OrdenController extends Controller
{
  public function indexPendientes() {
    $ordenes = Orden::getPendientes();
    $repartidores = Usuario::getAllRepartidor();
    return view('orden.index', compact('ordenes','repartidores'));
  }

  public function indexAsignados($fecha) {
    try {
      $ordenes = Orden::getAsignados($fecha);
      return view('orden.index', compact('ordenes'));
    } catch (\Throwable $th) {
      return back()->with('danger','error intente nuevamente');
    }
  }

  public function create() {

    // return $clientes;
    $comunas = Comuna::get();
    $regions = Region::get();
    return view('orden.create', compact('comunas','regions'));
  }

  private function findCode() {
    try {
      $code = helper_random_integer(12);
      Orden::where('codigo',$code)->firstOrFail();
      return $this->code();
    } catch (\Throwable $th) {
      return $code;
    }
  }

  public function store(Request $request) {
    try {
      $orden = new Orden();
      $orden->codigo = $this->findCode();
      $orden->id_usuario = current_user()->id;
      $orden->fecha_entrega = date_format(date_create($request->input('fecha_entrega')),'Y-m-d');

      //Datos Remitente
      $orden->remitente_nombre = $request->input('remitente_nombre');
      $orden->remitente_direccion = $request->input('remitente_direccion');
      $orden->remitente_email = $request->input('remitente_email');
      $orden->remitente_telefono = $request->input('remitente_telefono');
      $orden->remitente_id_comuna = $request->input('remitente_id_comuna');

      //Datos Destinatario
      $orden->destinatario_nombre = $request->input('destinatario_nombre');
      $orden->destinatario_direccion = $request->input('destinatario_direccion');
      $orden->destinatario_email = $request->input('destinatario_email');
      $orden->destinatario_telefono = $request->input('destinatario_telefono');
      $orden->destinatario_id_comuna = $request->input('destinatario_id_comuna');

      $orden->mensaje = $request->input('mensaje');
      $orden->precio = $request->input('precio');
  
      $orden->save();

      return redirect()->route('ordenes.index.pendientes')->with('success','Se ha creado correctamente');
    } catch (\Throwable $th) {
      //throw $th;
      return back()->with('info','Error intente nuevamente');
    }
  }
}
