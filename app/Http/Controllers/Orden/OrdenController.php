<?php

namespace App\Http\Controllers\Orden;

use App\Http\Controllers\Controller;
use App\Models\Orden\Orden;
use App\Models\Sistema\Cliente;
use App\Models\Sistema\Usuario;

class OrdenController extends Controller
{
  public function indexPendientes() {
    $ordenes = Orden::getPendientes();
    $repartidores = Usuario::getAllRepartidor();
    return view('orden.index', compact('ordenes','repartidores'));
  }

  public function indexAsignados($fecha) {
    try {
      $ordenes = Orden::getAsignados($fecha);
      return view('orden.index', compact('ordenes'));
    } catch (\Throwable $th) {
      return back()->with('danger','error intente nuevamente');
    }
  }

  public function create() {

    // return $clientes;
    return view('orden.create');
  }
}
