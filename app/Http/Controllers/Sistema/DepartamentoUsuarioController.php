<?php

namespace App\Http\Controllers\Sistema;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lib\Permissions;
use App\Models\Auditoria\AuditUserDeleteReporte;
use App\Models\Sistema\Usuario;
use App\Models\Sistema\Departamento;
use App\Models\Sistema\DepartamentoUsuario;

class DepartamentoUsuarioController extends Controller
{
  public function create($id){
    try {
      $d = Departamento::findOrFail($id);
      $usuarios = Usuario::whereNotIn('id',$d->usuarios->pluck('id_usuario'))->where('activo',true)->get();
      return view('admin.departamento.panel.create',compact('d','usuarios'));
    } catch (\Throwable $th) {
      return redirect()->route('departamento.index')->with('danger','Acceso Dengado');
    }
  }

  public function assign($id,$id_usuario){
    try {
      $d = Departamento::findOrFail($id);
      $u = Usuario::where('activo',true)->findOrFail($id_usuario);

      $permisos = Permissions::ALLOWS;
      $permisosTutorias = Permissions::ALLOWS_TUTORIA;
      $permisosBicicletas = Permissions::ALLOWS_BICICLETA;
      $permisosAtencion = Permissions::ALLOWS_ATENCION;
      $permisosFormulario = Permissions::ALLOWS_FORMULARIO;

      return view('admin.departamento.panel.add',compact('d','u','permisos','permisosTutorias','permisosBicicletas','permisosAtencion','permisosFormulario'));
    } catch (\Throwable $th) {
      return back()->with('info','Error Intente nuevamente.');
    }
  }

  public function store(Request $request){
    try {
      $du = new DepartamentoUsuario();
      $du->id_usuario = $request->input('id_usuario');
      $du->id_departamento = $request->input('id_departamento');

      if(!empty($request->input('plataforma_evento'))){
        $du->permiso_evento = $request->input('plataforma_evento');
      }
      if(!empty($request->input('plataforma_votacion'))){
        $du->permiso_votacion = $request->input('plataforma_votacion');
      }
      if(!empty($request->input('plataforma_bicicleta'))){
        $du->permiso_bicicleta = $request->input('plataforma_bicicleta');
      }
      if(!empty($request->input('plataforma_formulario'))){
        $du->permiso_formulario = $request->input('plataforma_formulario');
      }
      if(!empty($request->input('plataforma_tutoria'))){
        $du->permiso_tutoria = $request->input('plataforma_tutoria');
      }
      if(!empty($request->input('plataforma_alumno'))){
        $du->permiso_alumno = $request->input('plataforma_alumno');
      }
      if(!empty($request->input('plataforma_servicio'))){
        $du->permiso_servicio = $request->input('plataforma_servicio');
      }
      if(!empty($request->input('plataforma_sala_video'))){
        $du->permiso_sala_video = $request->input('plataforma_sala_video');
      }
      if(!empty($request->input('plataforma_toma_hora'))){
        $du->permiso_toma_hora = $request->input('plataforma_toma_hora');
      }
      $du->save();
      return redirect()->route('admin.departamento.show',$du->id_departamento)->with('success','Se ha creado correctamente.');
    } catch (\Throwable $th) {
      return back()->with('info','Error Intente nuevamente.');
    }
  }

  public function edit($id){
    try {
      $du = DepartamentoUsuario::findOrFail($id);
      $d = $du->departamento;
      $u = $du->usuario;

      $permisos = Permissions::ALLOWS;
      $permisosTutorias = Permissions::ALLOWS_TUTORIA;
      $permisosBicicletas = Permissions::ALLOWS_BICICLETA;
      $permisosAtencion = Permissions::ALLOWS_ATENCION;
      $permisosFormulario = Permissions::ALLOWS_FORMULARIO;

      return view('admin.departamento.panel.edit',compact('d','u','permisos','du','permisosTutorias','permisosBicicletas','permisosAtencion','permisosFormulario'));
    } catch (\Throwable $th) {
      return back()->with('info','Error Intente nuevamente.');
    }
  }

  public function update(Request $request, $id){
    try {
      $du = DepartamentoUsuario::findOrFail($id);
      if(!empty($request->input('plataforma_evento'))){
        $du->permiso_evento = $request->input('plataforma_evento');
      }
      if(!empty($request->input('plataforma_votacion'))){
        $du->permiso_votacion = $request->input('plataforma_votacion');
      }
      if(!empty($request->input('plataforma_bicicleta'))){
        $du->permiso_bicicleta = $request->input('plataforma_bicicleta');
      }
      if(!empty($request->input('plataforma_formulario'))){
        $du->permiso_formulario = $request->input('plataforma_formulario');
      }
      if(!empty($request->input('plataforma_tutoria'))){
        $du->permiso_tutoria = $request->input('plataforma_tutoria');
      }
      if(!empty($request->input('plataforma_alumno'))){
        $du->permiso_alumno = $request->input('plataforma_alumno');
      }
      if(!empty($request->input('plataforma_servicio'))){
        $du->permiso_servicio = $request->input('plataforma_servicio');
      }
      if(!empty($request->input('plataforma_sala_video'))){
        $du->permiso_sala_video = $request->input('plataforma_sala_video');
      }
      if(!empty($request->input('plataforma_toma_hora'))){
        $du->permiso_toma_hora = $request->input('plataforma_toma_hora');
      }
      // if(!empty($request->input('administrador_dep'))){
      //     $du->administrador_dep = $request->input('administrador_dep');
      // }
      $du->update();
      return back()->with('success','Se ha actualizado.');
    } catch (\Throwable $th) {
      return back()->with('info','Error Intente nuevamente.');
    }
  }

  public function usersDelete($id){
    try {
      $d = Departamento::findOrFail($id);
      $dusuarios = $d->usuarios->where('activo',false);
      return view('admin.departamento.delete',compact('d','dusuarios'));
    } catch (\Throwable $th) {
      return redirect()->route('departamento.index')->with('danger','Acceso Dengado');
    }
  }

  public function destroy(Request $request, $id){
    try {
      $du = DepartamentoUsuario::findOrFail($request->input('id_departamento_usuario'));
      $du->activo = !$du->activo;
      $du->update();

      $autUser = new AuditUserDeleteReporte();
      $autUser->id_usuario = $du->usuario->id;
      $autUser->id_departamento_usuario = $du->id;
      $autUser->motivo = $du->activo ? 2 : 1;
      $autUser->save();
      return back()->with('success','Se ha actualizado.');
    } catch (\Throwable $th) {
      return back()->with('info','Error Intente nuevamente.');
    }
  }
}
