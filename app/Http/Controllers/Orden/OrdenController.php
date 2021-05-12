<?php

namespace App\Http\Controllers\Orden;

use App\Http\Controllers\Controller;
use App\Models\Orden\Orden;
use App\Models\Sistema\Cliente;

class OrdenController extends Controller
{
  public function indexPendientes() {
    $ordenes = Orden::getPendientes();
    return view('orden.index', compact('ordenes'));
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
