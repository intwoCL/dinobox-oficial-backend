<?php

namespace App\Http\Controllers\Orden;

use App\Http\Controllers\Controller;
use App\Models\Orden\Orden;
use App\Models\Sistema\Cliente;
use App\Models\Sistema\Usuario;
use Illuminate\Http\Request;

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
    return view('orden.create');
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
      $orden->remitente_nombre = $request->input('nombre_remitente') . ' ' . $request->input('apellido_remitente');
      $orden->remitente_direccion = $request->input('calle_remitente') . ' ' . $request->input('numero_remitente');
      $orden->email_remitente = $request->input('email_remitente');
      $orden->telefono_remitente = $request->input('telefono_remitente');
      $orden->destinatario_nombre = $request->input('nombre_destinatario') . ' ' . $request->input('apellido_destinatario');
      $orden->destinatario_direccion = $request->input('calle_destinatario') . ' ' . $request->input('numero_destinatario');
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
