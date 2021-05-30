<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Lib\IconRender;
use App\Lib\Icons;
use App\Models\Orden\Orden;
use App\Models\Sistema\DepartamentoUsuario;
use App\Models\Sistema\Sistema;
use Illuminate\Http\Request;


class HomeController extends Controller
{
  public function www(){
    return view('web.home.index');
  }

  public function ordenSeguimiento($codigo) {
    try {
      $orden = Orden::where('codigo',$codigo)->where('activo',true)->firstOrFail();
      $repartidor = $orden->ordenRepartidor->repartidor ?? null;
      return view('web.home.orden_seguimiento',compact('codigo','orden','repartidor'));
    } catch (\Throwable $th) {
      return redirect()->route('root')
                      ->with('danger','No se ha encontrado')
                      ->with('codigo',$codigo);
    }
  }

  public function home(){
    $sistema = Sistema::first();
    $icon = (new IconRender('delivery_app',$sistema->getSistemaColor()))->getIMGBase64();
    // $icon = (new IconRender('undraw_workers','rgb(131,58,180)'))->getIMGBase64();

    return view('dashboard.welcome',compact('icon'));
  }

  public function repartidor(){
    return view('web.repartidor.index');
  }

  public function buscarCodigo(Request $request) {
    // return $request->input('codigo');
    return redirect()->route('web.home.seguimiento',$request->input('codigo'));
  }



}
