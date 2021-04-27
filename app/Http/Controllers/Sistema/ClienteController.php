<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sistema\Cliente;
use App\Services\ImportImage;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $clientes = Cliente::where('activo',true)->get();
      return view('admin.cliente.index', compact('clientes'));
    }

    public function indexDelete(){
      $clientes = Cliente::where('activo',false)->get();
      return view('admin.cliente.indexdelete', compact('clientes'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      try {
        $cliente = new Cliente();
        $cliente->run = $request->input('run');
        $cliente->nombre = $request->input('nombre');
        $cliente->apellido = $request->input('apellido');
        $cliente->correo = $request->input('correo');
        $cliente->password = hash('sha256', $request->input('password'));
        $cliente->telefono = $request->input('telefono');

        if(!empty($request->file('image'))){
          $filename = time();
          $folder = 'public/photo_usuarios';
          $cliente->imagen = ImportImage::save($request, 'image', $filename, $folder);
        }

        $cliente->save();

        return redirect()->route('cliente.index')->with('success','Se ha creado correctamente.');
      } catch (\Throwable $th) {
        throw $th;
        return back()->with('info','Error Intente nuevamente.');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      try {
        $c = Cliente::findOrFail($id);
        return view('admin.cliente.edit',compact('c'));
      } catch (\Throwable $th) {
        return back()->with('info','Error Intente nuevamente.');
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      try {
        $cliente = Cliente::findOrFail($id);
        $cliente->nombre = $request->input('nombre');
        $cliente->apellido = $request->input('apellido');
        $cliente->correo = $request->input('correo');
        $cliente->telefono = $request->input('telefono');

        if(!empty($request->file('image'))){
          $filename = time();
          $folder = 'public/photo_usuarios';
          $cliente->imagen = ImportImage::save($request, 'image', $filename, $folder);
        }

        $cliente->update();
        return back()->with('success','Se ha actualizado.');
      } catch (\Throwable $th) {
        return $th;
        return back()->with('info','Error Intente nuevamente.');
      }
    }

    public function password(Request $request, $id){
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
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
