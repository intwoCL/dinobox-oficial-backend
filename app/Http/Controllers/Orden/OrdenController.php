<?php

namespace App\Http\Controllers\Orden;

use App\Http\Controllers\Controller;
use App\Models\Orden\Orden;
use Illuminate\Http\Request;
use App\Models\Sistema\Region;
use App\Models\Sistema\Comuna;

class OrdenController extends Controller
{
  public function index() {
    $ordenes = Orden::get();
    return view('orden.index', compact('ordenes'));
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
      return $this->findCode();
    } catch (\Throwable $th) {
      //throw $th;
      return $code;
    }
  }

  public function store(Request $request) {
    try {
      $ordenes = new Orden();
      //Nombre usuairo
      $ordenes->id_usuario = current_user()->id;
      //Remitente
      $ordenes->fecha_emision = date_format(date_create($request->input('fecha_emision')),'Y-m-d');
      $ordenes->rut_remitente = $request->input('rut_remitente');
      $ordenes->nombre_remitente = $request->input('nombre_remitente') . ' ' . $request->input('apellido_remitente');
      $ordenes->email_remitente = $request->input('email_remitente');
      $ordenes->telefono_remitente = $request->input('telefono_remitente');
      $ordenes->direccion_remitente = $request->input('calle_remitente') . ' ' . $request->input('numero_remitente');
      $ordenes->nombre_destinatario = $request->input('nombre_destinatario') . ' ' . $request->input('apellido_destinatario');
      $ordenes->direccion_destinatario = $request->input('calle_destinatario') . ' ' . $request->input('numero_destinatario');
      $ordenes->fecha_entrega = date_format(date_create($request->input('fecha_entrega')),'Y-m-d');
      $ordenes->mensaje = $request->input('mensaje');
      $ordenes->precio_envio = $request->input('precio_envio');

      $ordenes->save();

      return redirect()->route('ordenes.index')->with('success','Se ha creado correctamente.');
    } catch (\Throwable $th) {
      // return $th;
      return back()->with('info','Error Intente nuevamente.');
    }
  }
}
