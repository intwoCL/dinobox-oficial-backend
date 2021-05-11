<?php

namespace App\Http\Controllers\Orden;

use App\Http\Controllers\Controller;
use App\Models\Orden\Orden;
use App\Models\Sistema\Cliente;

class OrdenController extends Controller
{
  public function index() {
    $ordenes = Orden::get();
    return view('orden.index', compact('ordenes'));
  }

  public function create() {

    // return $clientes;
    return view('orden.create');
  }
}
