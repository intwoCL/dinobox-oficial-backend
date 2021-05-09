<?php

namespace App\Http\Controllers\Orden;

use App\Http\Controllers\Controller;
use App\Models\Sistema\Cliente;

class OrdenController extends Controller
{
  public function index() {
    return view('orden.index');
  }

  public function create() {

    // return $clientes;
    return view('orden.create');
  }
}
