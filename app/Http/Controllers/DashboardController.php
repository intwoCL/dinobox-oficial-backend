<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Lib\IconRender;
use App\Lib\Icons;
use App\Models\Sistema\DepartamentoUsuario;

class DashboardController extends Controller
{
  public function index(){
    return view('web.cliente.index');
  }

  public function home(){
    $icon = (new IconRender('encomienda_3','rgb(131,58,180)'))->getIMGBase64();

    return view('dashboard.welcome',compact('icon'));
  }

  public function repartidor(){
    return view('web.repartidor.index');
  }
}
