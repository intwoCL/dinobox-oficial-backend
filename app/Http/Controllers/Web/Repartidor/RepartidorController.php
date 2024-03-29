<?php

namespace App\Http\Controllers\Web\Repartidor;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Lib\IconRender;
use App\Models\Cuenta\ControlAcceso;
use App\Models\Orden\OrdenRepartidor;
use App\Models\Sistema\Region;
use App\Models\Sistema\Sistema;
use App\Models\Sistema\Vehiculo;
use App\Services\IconServices;

class RepartidorController extends Controller
{
  public function index() {
    $icon = (new IconServices())->getImagen();
    $ca = ControlAcceso::where('id_usuario',current_user()->id)->where('estado',true)->first() ?? null;
    // $sistema = Sistema::first();
    // $icon = (new IconRender('delivery_app',$sistema->getSistemaColor()))->getIMGBase64();
    return view('web.repartidor.index',compact('icon','ca'));
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

  public function iniciarRecorrido(Request $request) {
    try {
      $id_vehiculo =  $request->input('id_vehiculo');
      $v = Vehiculo::where('id_usuario',current_user()->id)->findOrFail($id_vehiculo);

      $ca = new ControlAcceso();
      $ca->id_usuario = current_user()->id;
      $ca->id_vehiculo = $id_vehiculo;
      $ca->fecha_registro = date("Y-m-d H:i:s");
      $ca->save();
      return back()->with('success','Ha iniciado el recorrido ', $v->patente);
    } catch (\Throwable $th) {
      return $th;
      return back()->with('danger','Error. no existe vehiculo');
    }
  }

  public function terminarRecorrido(Request $request) {
    try {
      $ca = ControlAcceso::where('id_usuario',current_user()->id)->where('estado',true)->first();
      $ca->estado = false;
      $ca->fecha_salida = date("Y-m-d H:i:s");
      $ca->update();
      return back()->with('success','Gracias');
    } catch (\Throwable $th) {
      return back()->with('danger','Error. no existe vehiculo');
    }
  }
}
