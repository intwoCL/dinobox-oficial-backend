<?php

namespace App\Http\Controllers\Web\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Sistema\Comuna;
use App\Models\Sistema\Region;

class ClienteController extends Controller
{

  //Perfil Cliente
  public function cliente() {
    // $comunas = Comuna::orderBy('nombre')->get();
    // $regions = Region::get();
    $cliente = current_client();
    return view('web.cliente.home.cliente',compact('cliente'));
  }

  public function direcciones() {
    // $comunas = Comuna::orderBy('nombre')->get();
    // $regions = Region::get();
    $cliente = current_client();
    return view('web.cliente.home.direcciones',compact('cliente'));
  }


}