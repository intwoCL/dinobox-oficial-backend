<?php

namespace App\Http\Controllers\Web\Repartidor;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Orden\Historial;
use App\Models\Orden\Orden;
use App\Models\Orden\OrdenRepartidor;

class OrdenController extends Controller
{
  public function ordenes() {
    $today = date('Y-m-d');
    // $ordenes = OrdenRepartidor::where('id_repartidor',current_user()->id)->with(['orden'])->get()->where('orden.fecha_entrega',$today);

    $ordenes = OrdenRepartidor::where('id_repartidor',current_user()->id)->with(['orden'])->get()->where('orden.fecha_entrega',$today);
    return view('web.repartidor.ordenes',compact('ordenes'));
  }

  public function orden($codigo) {
    $today = date('Y-m-d');
    $ordenRepartidor = OrdenRepartidor::where('id_repartidor',current_user()->id)->with(['orden'])->get()->where('orden.fecha_entrega',$today)->where('orden.codigo', $codigo)->first();
    $orden = $ordenRepartidor->orden;
    return view('web.repartidor.orden',compact('ordenRepartidor', 'orden'));
  }

  public function fomularioRetiro($codigo) {
    $today = date('Y-m-d');
    $ordenRepartidor = OrdenRepartidor::where('id_repartidor',current_user()->id)->with(['orden'])->get()->where('orden.fecha_entrega',$today)->where('orden.codigo', $codigo)->first();
    $orden = $ordenRepartidor->orden;
    return view('web.repartidor.formulario.retiro',compact('ordenRepartidor', 'orden'));
  }

  public function fomularioRetiroStore(Request $request, $codigo) {
    $ordenRepartidor = OrdenRepartidor::findOrFail($request->input('or'));
    $orden = Orden::where('codigo',$codigo)->firstOrFail();

    $nuevoEstado = $request->input('estado_orden');
    if ($nuevoEstado > $orden->estado) {
      $orden->estado = $nuevoEstado;
      $orden->update();

      $historial = new Historial();
      $historial->id_orden = $orden->id;
      $historial->id_repartidor = current_user()->id;
      $historial->estado_orden = $nuevoEstado;
      $historial->save();

      //TODO: CORREO ELECTRONICO
    }
  }


  // [ MODAL]

  public function updateEstado(Request $request, $codigo) {
    $ordenRepartidor = OrdenRepartidor::findOrFail($request->input('or'));
    $orden = Orden::where('codigo',$codigo)->firstOrFail();

    $nuevoEstado = $request->input('estado_orden');
    if ($nuevoEstado > $orden->estado) {
      $orden->estado = $nuevoEstado;
      $orden->update();

      $historial = new Historial();
      $historial->id_orden = $orden->id;
      $historial->id_repartidor = current_user()->id;
      $historial->estado_orden = $nuevoEstado;
      $historial->save();

      //TODO: CORREO ELECTRONICO
    }
    return back()->with('success','actualizado correctamente.');
  }
}
