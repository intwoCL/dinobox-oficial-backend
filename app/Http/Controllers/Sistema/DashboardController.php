<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use App\Imports\AlumnoImport;
use App\Models\Sistema\Alumno;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Rap2hpoutre\FastExcel\FastExcel;

class DashboardController extends Controller
{
  public function index(){
    return view('dashboard.index');
  }

  // public function excel(Request $request){
  //   $collection = (new FastExcel())->import($request->file('archivo'));
  //   return $collection;
  //   // return view('dashboard.index');
  // }
}
