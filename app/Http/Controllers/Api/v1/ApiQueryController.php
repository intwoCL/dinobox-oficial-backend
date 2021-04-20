<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;


use App\Models\Consulta\Consulta;

class ApiQueryController extends Controller
{
  public function query(Request $request){
    try {
      $query = DB::select($request->input('query'));
      $column = array();
      $rows = array('data' => $query );

      foreach ($query as $q) {
        foreach ($q as $key => $value) {
          $d = array('data' => $key, 'title' => $key , 'name' => $key );
          array_push($column,$d);
        }
        break;
      }

      $result = array(
        'columns' => $column,
        'rows' => $rows,
      );
      return $result;
    } catch (\Throwable $th) {
      return $th;
    }
  }
}
