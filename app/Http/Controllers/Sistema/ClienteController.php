<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sistema\Cliente;
use App\Services\ImportImage;

class ClienteController extends Controller
{
    public function index() {
      $clientes = Cliente::where('activo',true)->get();
      return view('admin.cliente.index', compact('clientes'));
    }

    public function indexDelete() {
      $clientes = Cliente::where('activo',false)->get();
      return view('admin.cliente.indexdelete', compact('clientes'));
    }

    public function create() {
      return view('admin.cliente.create');
    }

    public function store(Request $request) {
      try {
        $cliente = new Cliente();
        $cliente->run = $request->input('run');
        $cliente->nombre = $request->input('nombre');
        $cliente->apellido = $request->input('apellido');
        $cliente->correo = $request->input('correo');
        $cliente->password = hash('sha256', $request->input('password'));
        $cliente->telefono = $request->input('telefono');
        $cliente->id_usuario_creador = current_user()->id;
        $cliente->birthdate = $request->input('birthdate');

        if(!empty($request->file('image'))){
          $filename = time();
          $folder = 'public/photo_clientes';
          $cliente->imagen = ImportImage::save($request, 'image', $filename, $folder);
        }

        $cliente->save();

        return redirect()->route('admin.cliente.index')->with('success','Se ha creado correctamente.');
      } catch (\Throwable $th) {
        throw $th;
        return back()->with('info','Error Intente nuevamente.');
      }
    }

    public function edit($id) {
      try {
        $c = Cliente::findOrFail($id);
        return view('admin.cliente.edit',compact('c'));
      } catch (\Throwable $th) {
        return back()->with('info','Error Intente nuevamente.');
      }
    }

    public function update(Request $request, $id) {
      try {
        $cliente = Cliente::findOrFail($id);
        $cliente->nombre = $request->input('nombre');
        $cliente->apellido = $request->input('apellido');
        $cliente->correo = $request->input('correo');
        $cliente->telefono = $request->input('telefono');
        // $cliente->birthdate = $request->input('birthdate');

        if(!empty($request->file('image'))){
          $filename = time();
          $folder = 'public/photo_clientes';
          $cliente->imagen = ImportImage::save($request, 'image', $filename, $folder);
        }

        $cliente->update();
        return back()->with('success','Se ha actualizado.');
      } catch (\Throwable $th) {
        return $th;
        return back()->with('info','Error Intente nuevamente.');
      }
    }

    public function password(Request $request, $id) {
      try {
        $cliente = Cliente::findOrFail($id);
        $cliente->password = hash('sha256', $request->input('password_2'));
        $cliente->update();
        // TODO: Falta agregar envio de correo
        return back()->with('success','Se ha actualizado.');
      } catch (\Throwable $th) {
        return back()->with('info','Error Intente nuevamente.');
      }
    }

    public function destroy(Request $request, $id) {
      try {
        $cliente = Cliente::findOrFail($request->input('id_usuario'));
        $cliente->activo = !$cliente->activo;
        $cliente->update();
        return back()->with('success','Se ha actualizado.');
      } catch (\Throwable $th) {
        //throw $th;
        return back()->with('info','Error Intente nuevamente.');
      }
    }
}
