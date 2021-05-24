<?php

namespace App\Http\Controllers\Orden;

use App\Http\Controllers\Controller;
use App\Models\Orden\Orden;
use App\Models\Sistema\Cliente;
use App\Models\Sistema\Usuario;
use Illuminate\Http\Request;
use App\Models\Sistema\Region;
use App\Models\Sistema\Comuna;
use App\Http\Requests\OrdenCreateRequest;
use App\Lib\IconRender;
use App\Models\Sistema\Sistema;
use App\Services\IconServices;

class OrdenController extends Controller
{
  public function indexPendientes() {
    $ordenes = Orden::getPendientes();
    $repartidores = Usuario::getAllRepartidores();

    $icon = (new IconRender('delivery_app', Sistema::first()->getSistemaColor()))->getIMGBase64();
    return view('orden.index', compact('ordenes','repartidores','icon'));
  }

  public function indexAsignados($fecha) {
    try {
      $ordenes = Orden::getAsignados($fecha);
      return view('orden.index_asignados', compact('ordenes'));
    } catch (\Throwable $th) {
      return back()->with('danger','error intente nuevamente');
    }
  }

  public function getDateFecha(Request $request) {
    try {
      $fecha = date_format(date_create($request->input('fecha')),'Y-m-d');
      return redirect()->route('ordenes.index.asignados',$fecha);
    } catch (\Throwable $th) {
      return back()->with('danger','error intente nuevamente');
    }
  }

  public function create() {
    $comunas = Comuna::orderBy('nombre')->get();
    $servicios = Orden::SERVICIOS;
    $categorias = Orden::CATEGORIAS;
    // $regions = Region::orderBy('nombre')->get();

    // $icon = (new IconRender('undraw_drone_delivery', Sistema::first()->getSistemaColor()))->getIMGBase64();
    $icon = (new IconServices())->getImagen();
    $regions = Region::get();
    return view('orden.create', compact('comunas','regions','icon','categorias','servicios'));
  }


  // public function store(Request $request) {
  public function store(OrdenCreateRequest $request) {
    try {
      $orden = new Orden();
      $orden->codigo = $this->findCode();
      $orden->id_usuario = current_user()->id;
      $orden->id_sucursal = 1;
      $orden->id_cliente = $request->input('id_cliente_rawr',null);
      $orden->id_direccion = $request->input('id_direccion_rawr',null);
      $orden->fecha_entrega = date_format(date_create($request->input('fecha_entrega')),'Y-m-d');

      // Datos Remitente
      // $orden->remitente_rut = $request->input('remitente_rut');
      $orden->remitente_nombre = $request->input('remitente_nombre');
      $orden->remitente_direccion = $request->input('remitente_direccion');
      $orden->remitente_numero = $request->input('remitente_numero');
      $orden->remitente_correo = $request->input('remitente_correo');
      $orden->remitente_telefono = $request->input('remitente_telefono');
      $orden->remitente_id_comuna = $request->input('remitente_id_comuna');

      // Datos Destinatario
      $orden->destinatario_nombre = $request->input('destinatario_nombre');
      $orden->destinatario_direccion = $request->input('destinatario_direccion');
      $orden->destinatario_numero = $request->input('destinatario_numero');
      $orden->destinatario_correo = $request->input('destinatario_correo');
      $orden->destinatario_telefono = $request->input('destinatario_telefono');
      $orden->destinatario_id_comuna = $request->input('destinatario_id_comuna');

      // DATOS
      $orden->servicio = $request->input('servicio');
      $orden->categoria = $request->input('categoria');
      $orden->mensaje = $request->input('mensaje',null);
      $orden->precio = $request->input('precio');

      $orden->save();
      return redirect()->route('ordenes.index.pendientes')
                      ->with('success','Se ha creado correctamente')
                      ->with('codigo',$orden->codigo);
    } catch (\Throwable $th) {
      // return $th;
      return back()->with('info','Error intente nuevamente');
    }
  }

  public function show($codigo) {
    $orden = Orden::where('codigo',$codigo)->where('activo',true)->firstOrFail();
    // return $orden;
    return view('orden.show', compact('orden'));
  }


  // PRIVATE
  private function findCode() {
    try {
      $code = helper_random_integer(12); //123456789012
      Orden::where('codigo',$code)->firstOrFail();
      return $this->findCode();
    } catch (\Throwable $th) {
      return $code;
    }
  }
}
