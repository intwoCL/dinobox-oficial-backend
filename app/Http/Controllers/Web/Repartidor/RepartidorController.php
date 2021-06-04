<?php

namespace App\Http\Controllers\Web\Repartidor;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Lib\IconRender;
use App\Models\Orden\OrdenRepartidor;
use App\Models\Sistema\Sistema;
use App\Services\IconServices;

class RepartidorController extends Controller
{
  public function index() {
    $icon = (new IconServices())->getImagen();

    // $sistema = Sistema::first();
    // $icon = (new IconRender('delivery_app',$sistema->getSistemaColor()))->getIMGBase64();
    return view('web.repartidor.index',compact('icon'));
  }


  // public function ordenUpdate($codigo) {
  //   $today = date('Y-m-d');
  //   $ordenRepartidor = OrdenRepartidor::where('id_repartidor',current_user()->id)->with(['orden'])->get()->where('orden.fecha_entrega',$today)->where('orden.codigo', $codigo)->first();

  //   $ordenRepartidor->orden->estado = 3 ;
  //   $ordenRepartidor->orden->update();

  //   return back()->with('success', 'Se ha cambiado');

  // }

  public function me() {
    $u = current_user();
    return view('web.repartidor.perfil.index',compact('u'));
  }

  public function profile() {
    $u = current_user();
    return view('web.repartidor.perfil.edit',compact('u'));
  }

  public function profilePassword(Request $request) {
    $u = current_user();
    return view('web.repartidor.perfil.password',compact('u'));
  }

  public function profilePasswordUpdate(Request $request) {
    // $u = current_user();
    // return view('web.repartidor.profile',compact('u'));
  }

  public function profileThemeUpdate(Request $request) {
    $u = current_user();
    return view('web.repartidor.perfil.theme',compact('u'));
  }
}
