<?php

namespace App\Http\Controllers\Web\Repartidor;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Orden\OrdenRepartidor;

class RepartidorController extends Controller
{
  public function index() {
    $today = date('Y-m-d');
    // $ordenes = OrdenRepartidor::where('id_repartidor',current_user()->id)->with(['orden'])->get()->where('orden.fecha_entrega',$today);

    $ordenes = OrdenRepartidor::where('id_repartidor',current_user()->id)->with(['orden'])->get()->where('orden.fecha_entrega',$today);
    return view('web.repartidor.index',compact('ordenes'));
  }

  public function ordenShow($codigo) {
    $today = date('Y-m-d');
    $ordenRepartidor = OrdenRepartidor::where('id_repartidor',current_user()->id)->with(['orden'])->get()->where('orden.fecha_entrega',$today)->where('orden.codigo', $codigo)->first();
    $orden = $ordenRepartidor->orden;
    return view('web.repartidor.ordenes',compact('ordenRepartidor', 'orden'));
  }

  public function ordenUpdate($codigo) {
    $today = date('Y-m-d');
    $ordenRepartidor = OrdenRepartidor::where('id_repartidor',current_user()->id)->with(['orden'])->get()->where('orden.fecha_entrega',$today)->where('orden.codigo', $codigo)->first();

    $ordenRepartidor->orden->estado = 3 ;
    $ordenRepartidor->orden->update();

    return back()->with('success', 'Se ha cambiado');

  }

  public function me() {
    $u = current_user();
    return view('web.repartidor.me',compact('u'));
  }

  public function profile() {
    $u = current_user();
    return view('web.repartidor.profile',compact('u'));
  }

  public function profilePassword(Request $request) {
    // $u = current_user();
    // return view('web.repartidor.profile',compact('u'));
  }

  public function profilePasswordUpdate(Request $request) {
    // $u = current_user();
    // return view('web.repartidor.profile',compact('u'));
  }

  public function profileThemeUpdate(Request $request) {
    // $u = current_user();
    // return view('web.repartidor.profile',compact('u'));
  }
}
