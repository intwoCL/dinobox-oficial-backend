<?php

namespace App\Http\Controllers\Web\Repartidor;

use App\Http\Controllers\Controller;
use App\Models\Orden\OrdenRepartidor;

class RepartidorController extends Controller
{
  public function index(){

    $today = date('Y-m-d');
    // $ordenes = OrdenRepartidor::where('id_repartidor',current_user()->id)->with(['orden'])->get()->where('orden.fecha_entrega',$today);

    $ordenes = OrdenRepartidor::where('id_repartidor',current_user()->id)->with(['orden'])->get()->where('orden.fecha_entrega',$today);

    // return $ordenes;
    return view('web.repartidor.index',compact('ordenes'));
  }
}