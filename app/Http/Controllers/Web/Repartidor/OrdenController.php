<?php

namespace App\Http\Controllers\Web\Repartidor;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Orden\Historial;
use App\Models\Orden\Orden;
use App\Models\Orden\OrdenRepartidor;
use App\Services\ImportImage;
use App\Services\SaveImage;

class OrdenController extends Controller
{
  public function ordenes() {
    $today = date('Y-m-d');
    // $ordenes = OrdenRepartidor::where('id_repartidor',current_user()->id)->with(['orden'])->get()->where('orden.fecha_entrega',$today);

    $ordenes = OrdenRepartidor::where('id_repartidor',current_user()->id)->with(['orden','orden.remitenteComuna','orden.destinatarioComuna'])->get()->where('orden.fecha_entrega',$today);
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
    // return $request;
    $orden = Orden::where('codigo',$codigo)->firstOrFail();
    $ordenRepartidor = OrdenRepartidor::where('id_orden',$orden->id)->findOrFail($request->input('or'));

    if ($orden->estado == 30 ) {
      $checkUser = $request->input('checkbox_user',false);
      if ($checkUser) {
        $orden->receptor_remitente = true;
      } else {
        $orden->recepcion_remitente_run = $request->input('run');
        $orden->recepcion_remitente_nombre = $request->input('nombre');
      }

      if(!empty($request->file('image'))){
        $filename = time();
        $folder = 'ordenes';

        $imagen = SaveImage::save($request, 'image', $filename, $folder);

        if($imagen != 400) {
          $orden->files = [ 'imagen_remitente_1' => $imagen ];
        } else {
          return back()->with('warning','Error. Imagen');
        }

        // $orden->recepcion_remitente_imagen = [
          // 'image1' => ImportImage::save($request, 'image', $filename, $folder)
        // ];
      }

      $orden->receptor_remitente_fecha = date("Y-m-d H:i:s");
      $orden->estado = 40;
      $orden->update();

      $historial = new Historial();
      $historial->id_orden = $orden->id;
      $historial->id_repartidor = current_user()->id;
      $historial->estado_orden = 40;
      $historial->save();
      return back()->with('success','Orden de retiro lista');
    } else {
      if ($orden->estado == 70) {

        $checkUser = $request->input('checkbox_user',false);
        if ($checkUser) {
          $orden->receptor_destinatario = true;
        } else {
          $orden->recepcion_destinatario_run = $request->input('run');
          $orden->recepcion_destinatario_nombre = $request->input('nombre');
        }

          if(!empty($request->file('image'))){
            $filename = time();
            $folder = 'ordenes';

            $imagen = SaveImage::save($request, 'image', $filename, $folder);

            if($imagen != 400) {
              $files = $orden->files;
              $files['imagen_destinatario_1'] = $imagen;
              $orden->files = $files;
            } else {
              return back()->with('warning','Error. Imagen');
            }
          // $orden->recepcion_remitente_imagen = [
            // 'image1' => ImportImage::save($request, 'image', $filename, $folder)
          // ];
          }
          $orden->receptor_destinatario_fecha = date("Y-m-d H:i:s");
          $orden->estado = 80;
          $orden->update();

          $historial = new Historial();
          $historial->id_orden = $orden->id;
          $historial->id_repartidor = current_user()->id;
          $historial->estado_orden = 80;
          $historial->save();
          return back()->with('success','Orden de retiro lista');
      }
    }

    return back()->with('danger','Error. Intente Nuevamente');
  }

  public function fomularioDespacho($codigo) {
    $today = date('Y-m-d');
    $ordenRepartidor = OrdenRepartidor::where('id_repartidor',current_user()->id)->with(['orden'])->get()->where('orden.fecha_entrega',$today)->where('orden.codigo', $codigo)->first();
    $orden = $ordenRepartidor->orden;
    return view('web.repartidor.formulario.despacho',compact('ordenRepartidor', 'orden'));
  }

  // [ MODAL]

  public function updateEstado(Request $request, $codigo) {
    $ordenRepartidor = OrdenRepartidor::findOrFail($request->input('or'));
    $orden = Orden::where('codigo',$codigo)->firstOrFail();

    $newEstado = 0;
    switch ($orden->estado) {
      case 20:
        $newEstado = 30;
        break;
      case 30:
        $newEstado = 30;
        break;
      case 40:
        $newEstado = 70;
        break;
      case 60:
        $newEstado = 70;
        break;
      case 70:
        $newEstado = 80;
        break;
    }

    if ($newEstado != 0) {
      $orden->estado = $newEstado;
      $orden->update();

      $historial = new Historial();
      $historial->id_orden = $orden->id;
      $historial->id_repartidor = current_user()->id;
      $historial->estado_orden = $newEstado;
      $historial->save();

      //TODO: CORREO ELECTRONICO
      return back()->with('success','actualizado correctamente.');
    }
    return back()->with('danger','Error. Intente nuevamente.');
  }
}
