<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Lib\IconRender;
use App\Lib\Icons;
use App\Models\Sistema\DepartamentoUsuario;
use App\Models\Sistema\Sistema;

class DashboardController extends Controller
{
  public function index(){
    return view('web.cliente.index');
  }

  public function home(){
    $sistema = Sistema::first();
    $icon = (new IconRender('undraw_team_page',$sistema->getSistemaColor()))->getIMGBase64();

    // $icon = (new IconRender('undraw_workers','rgb(131,58,180)'))->getIMGBase64();

    return view('dashboard.welcome',compact('icon'));
  }

  public function repartidor(){
    return view('web.repartidor.index');
  }
}
