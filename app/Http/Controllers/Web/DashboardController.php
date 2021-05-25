<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Orden\Orden;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function index(){
    return view('web.cliente.index');
  }


  public function buscarCodigo(Request $request) {
    // return $request->input('codigo');
    return redirect()->route('dashboard.orden.seguimiento',$request->input('codigo'));
  }

  public function ordenSeguimiento($codigo) {
    try {
      $orden = Orden::where('codigo',$codigo)->where('activo',true)->firstOrFail();
      $repartidor = $orden->ordenRepartidor->repartidor ?? null;
      return view('web.cliente.orden_seguimiento',compact('codigo','orden','repartidor'));
    } catch (\Throwable $th) {
      return "Error no ha visto";
    }
  }
}