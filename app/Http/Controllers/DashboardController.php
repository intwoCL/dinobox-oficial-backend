<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Sistema\DepartamentoUsuario;

class DashboardController extends Controller
{
  public function index(){
    return view('web.cliente.index');
  }

  public function home(){
    return view('dashboard.welcome');
  }

}
