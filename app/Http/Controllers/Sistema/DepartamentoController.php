<?php

namespace App\Http\Controllers\Sistema;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Sistema\Departamento;

use App\Http\Requests\DepartamentoCreateRequest as DepCreateRequest;
use App\Services\ImportImage;

class DepartamentoController extends Controller
{
  // public function index(){
  //   $departamentos = Departamento::where('activo',true)->with('usuarios')->get();
  //   return view('admin.departamento.index',compact('departamentos'));
  // }
  // public function indexDelete(){
  //   $departamentos = Departamento::where('activo',false)->with('usuarios')->get();
  //   return view('admin.departamento.indexdelete',compact('departamentos'));
  // }

  // public function create(){
  //   $state = Departamento::STATE;
  //   return view('admin.departamento.create',compact('state'));
  // }

  // public function store(DepCreateRequest $request){
  //   try {
  //     $d = new Departamento();
  //     $d->nombre = $request->input('nombre');
  //     $d->descripcion = $request->input('descripcion');
  //     $d->plataforma_evento = $request->input('plataforma_evento');
  //     $d->plataforma_votacion = $request->input('plataforma_votacion');
  //     $d->plataforma_bicicleta = $request->input('plataforma_bicicleta');
  //     $d->plataforma_tutoria = $request->input('plataforma_tutoria');
  //     $d->plataforma_atencion = $request->input('plataforma_atencion');
  //     $d->plataforma_formulario = $request->input('plataforma_formulario');
  //     // $d->plataforma_chat = $request->input('plataforma_chat');

  //     if(!empty($request->file('image'))){
  //       $filename = time();
  //       $folder = 'public/photo_departamentos';
  //       $d->foto = ImportImage::save($request, 'image', $filename, $folder);
  //     }

  //     $d->save();
  //     return redirect()->route('admin.departamento.index')->with('success','Se ha creado correctamente.');
  //   } catch (\Throwable $th) {
  //   return back()->with('info','Error Intente nuevamente.');
  //   }
  // }

  // public function show($id){
  //   try {
  //     $d = Departamento::findOrFail($id);
  //     $dusuarios = $d->usuarios->where('activo',true);
  //     return view('admin.departamento.show',compact('d','dusuarios'));
  //   } catch (\Throwable $th) {
  //     return redirect()->route('departamento.index')->with('danger','Acceso Dengado');
  //   }
  // }

  // public function edit($id){
  //   try {
  //     $state = Departamento::STATE;
  //     $d = Departamento::findOrFail($id);
  //     return view('admin.departamento.edit',compact('d','state'));
  //   } catch (\Throwable $th) {
  //     return redirect()->route('admin.home')->with('danger','No tienes acceso.');
  //   }
  // }

  // public function update(Request $request, $id){
  //   try {
  //     $d = Departamento::findOrFail($id);
  //     $d->nombre = $request->input('nombre');
  //     $d->descripcion = $request->input('descripcion');
  //     $d->plataforma_evento = $request->input('plataforma_evento');
  //     $d->plataforma_votacion = $request->input('plataforma_votacion');
  //     $d->plataforma_bicicleta = $request->input('plataforma_bicicleta');
  //     $d->plataforma_tutoria = $request->input('plataforma_tutoria');
  //     $d->plataforma_atencion = $request->input('plataforma_atencion');
  //     $d->plataforma_formulario = $request->input('plataforma_formulario');
  //     // $d->plataforma_chat = $request->input('plataforma_chat');

  //     if(!empty($request->file('image'))){
  //       $filename = time();
  //       $folder = 'public/photo_departamentos';
  //       $d->foto = ImportImage::save($request, 'image', $filename, $folder);
  //     }

  //     $d->update();
  //     return back()->with('success','Se ha actualizado.');
  //   } catch (\Throwable $th) {
  //     return back()->with('info','Error Intente nuevamente.');
  //   }
  // }

  // public function destroy(Request $request, $id){
  //   try {
  //     $d = Departamento::findOrFail($request->input('id_departamento'));
  //     $d->activo = !$d->activo;
  //     $d->update();
  //     return back()->with('success','Se ha actualizado.');
  //   } catch (\Throwable $th) {
  //     return back()->with('info','Error Intente nuevamente.');
  //   }
  // }
}
