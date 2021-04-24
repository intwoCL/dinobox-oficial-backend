<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Sistema\DepartamentoUsuario;

class DashboardController extends Controller
{
  public function admin(){
    return view('dashboard.welcome');
  }

  public function usuario(){
    return view('dashboard.welcome');
  }

  // public function usuario(){
  //   return view('dashboard.welcome');
  // }
}
