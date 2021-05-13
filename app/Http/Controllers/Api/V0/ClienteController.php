<?php

namespace App\Http\Controllers\Api\v0;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sistema\Cliente;

class ClienteController extends Controller
{
  public function show(Request $request) {
    try {
      $option = $request->input('option');
      $value = $request->input($option);
      $response = Array();

      $clientes = Cliente::likeColumn($option, $value);
      $response = Array(
        'status' => 402,
        'clientes' => []
      );

      foreach ($clientes as $c) {
        $response['status'] = 200;
        array_push($response['clientes'],$c->raw_info());
      }

      return $response;
    } catch (\Throwable $th) {
      return response()->json(["message"=>"error"],402);
    }
  }

}
