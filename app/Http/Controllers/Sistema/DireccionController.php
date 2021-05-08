<?php

namespace App\Http\Controllers\Sistema;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sistema\Cliente;
use App\Models\Sistema\Comuna;
use App\Models\Sistema\Direccion;
use App\Models\Sistema\Region;

class DireccionController extends Controller
{
  public function index($id_cliente){
    $comunas = Comuna::get();
    $regions = Region::get();
    $c = Cliente::with('direcciones')->findOrFail($id_cliente);
    return view('admin.cliente.direccion',compact('c','comunas','regions'));
  }

  public function store(Request $request, $id){
    try {
      $cliente = Cliente::findOrFail($id);
      $direccion = new Direccion();
      $direccion->id_cliente = $cliente->id;
      $direccion->calle = $request->input('calle');
      $direccion->numero = $request->input('numero');
      $direccion->id_comuna = $request->input('id_comuna');
      $direccion->dato_adicional = $request->input('dato_adicional');
      $direccion->telefono = $request->input('telefono');
      $direccion->save();

      return back()->with('success','Se ha agregado exitosamente.');
    } catch (\Throwable $th) {
      return back()->with('info','Error Intente nuevamente.');
    }
  }
}
