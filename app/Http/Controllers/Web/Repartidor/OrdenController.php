<?php

namespace App\Http\Controllers\Web\Repartidor;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Orden\OrdenRepartidor;

class OrdenController extends Controller
{
  public function updateEstado(Request $request, $codigo) {
    return $request;
  }
}
