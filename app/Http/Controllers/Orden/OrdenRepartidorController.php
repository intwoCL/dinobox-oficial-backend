<?php

namespace App\Http\Controllers\Orden;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orden\Orden;
use App\Models\Orden\OrdenRepartidor;
use App\Models\Sistema\Cliente;
use App\Models\Sistema\Usuario;

class OrdenRepartidorController extends Controller
{
  public function store(Request $request) {
    // return $request;

    $repartidor = Usuario::findOrFail($request->input('repartidor_modal'));
    $orden = Orden::where('codigo',$request->input('codigo_modal'))->where('activo',true)->firstOrFail();

    $ordenRepartidor = new OrdenRepartidor();
    $ordenRepartidor->id_orden = $orden->id;
    $ordenRepartidor->id_usuario = current_user()->id;
    $ordenRepartidor->id_repartidor = $repartidor->id;
    $ordenRepartidor->save();

    $orden->estado = 20;
    $orden->update();

    return back()->with('success','Se ha registrado correctamente. código: '.$orden->codigo);

    // $ordenes = Orden::getPendientes();
    // $repartidores = Usuario::getAllRepartidores();

    // $icon = (new IconRender('delivery_app', Sistema::first()->getSistemaColor()))->getIMGBase64();
    // return view('orden.index', compact('ordenes','repartidores','icon'));
  }
}
