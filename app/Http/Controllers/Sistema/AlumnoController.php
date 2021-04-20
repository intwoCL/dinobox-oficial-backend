<?php

namespace App\Http\Controllers\Sistema;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Sistema\Sede;
use App\Models\Sistema\Alumno;
use App\Models\Sistema\Carrera;
use App\Models\Auditoria\AuditAlumnoReporte;

use App\Http\Requests\RunValidateRequest as RunRequest;
use App\Http\Requests\AlumnoCreateRequest as StudentRequest;

use App\Services\ImportImage;
use App\Services\Policies\Sistema\AlumnoPolicy;

class AlumnoController extends Controller
{
  private $policy;

  public function __construct() {
    $this->policy = new AlumnoPolicy();
  }

  public function index() {
    $this->policy->index();

    return view('admin.alumno.index');
  }

  public function store(StudentRequest $request) {
    $this->policy->store();

    try {
      $alu = new Alumno();
      $alu->run = $request->input('run');
      $alu->nombre =$request->input('nombre');
      $alu->apellido = $request->input('apellido');
      $alu->correo = $request->input('correo');
      $alu->id_sede = $request->input('id_sede');
      $alu->id_carrera = $request->input('id_carrera');
      $alu->telefono = $request->input('telefono',null);
      $alu->jornada = $request->input('jornada');

      if (!empty($request->file('image'))) {
        $filename = $alu->run .'-'. time();
        $folder = 'public/photo_alumnos';
        $alu->foto = ImportImage::save($request, 'image', $filename, $folder);
      }

      $alu->save();
      return redirect()->route('admin.alumno.index')->with('success','Se ha creado correctamente.');
    } catch(\Throwable $th) {
      return back()->with('info','Error Intente nuevamente.');
    }
  }

  public function show($run){
    $this->policy->show();

    $alumnos = Alumno::findByRun($run)->get();

    if(count($alumnos)==0){
      return redirect()->route('admin.alumno.create',$run)->with('info','No existe.');
    }else{
      $permiso_editar = $this->policy->create();
      $auditAlumno = AuditAlumnoReporte::MOTIVOS;
      return view('admin.alumno.show',compact('alumnos','auditAlumno','permiso_editar'));
    }
  }

  public function create($run) {
    if ($this->policy->create()) {

      $a = Alumno::findByRun($run)->first();
      if (empty($a)) {
        $sedes = Sede::get();
        $carreras = Carrera::get();
        $jornadas = Alumno::JORNADA;
        return view('admin.alumno.create',compact('run','sedes','carreras','jornadas'));
      } else {
        return redirect()->route('admin.alumno.index')->with('warning','Ya existe.');
      }
    }

    return redirect()->route('admin.alumno.index')->with('warning','No se ha encontrado.');
  }

  public function run(RunRequest $request) {
    return redirect()->route('admin.alumno.show',$request->input('run'));
  }

  public function edit($run,$id) {
    $this->policy->edit();

    $a = Alumno::findByRunActive($run)->findOrFail($id);
    $sedes = Sede::get();
    $carreras = Carrera::get();
    $jornadas = Alumno::JORNADA;
    return view('admin.alumno.edit',compact('a','sedes','carreras','jornadas'));
  }

  public function update(Request $request, $id){
    $this->policy->update();

    try {
      $alu= Alumno::findByRun($request->input('run'))->findOrFail($id);
      $alu->nombre = $request->input('nombre');
      $alu->apellido = $request->input('apellido');
      $alu->correo = $request->input('correo');
      $alu->id_sede = $request->input('id_sede');
      $alu->id_carrera = $request->input('id_carrera');
      $alu->telefono = $request->input('telefono',null);
      $alu->jornada = $request->input('jornada');

      if(!empty($request->file('image'))){
        $filename = $alu->run .'-'. time();
        $folder = 'public/photo_alumnos';
        $alu->foto = ImportImage::save($request, 'image', $filename, $folder);
      }

      $alu->update();
      return back()->with('success','Se ha actualizado.');
    } catch (\Throwable $th) {
      return back()->with('info','Error Intente nuevamente.');
    }
  }

  public function destroy(Request $request, $run){
    $this->policy->destroy();

    try {
      $a = Alumno::findByRun($request->input('run'))->findOrFail($request->input('id'));
      $a->activo = false;
      $a->update();

      $auditAlumno = new AuditAlumnoReporte();
      $auditAlumno->id_usuario = current_user() ? current_user()->id : 1 ;
      $auditAlumno->id_alumno = $a->id;
      $auditAlumno->comentario = $request->input('comentario');
      $auditAlumno->motivo = $request->input('motivo');
      $auditAlumno->save();
      return back()->with('success','se ha desactivado el alumno');
    } catch (\Throwable $th) {
      return back()->with('info','Error Intente nuevamente.');
    }
  }

  public function activar(Request $request, $run){
    $this->policy->activar();

    try {
      $a = Alumno::findByRun($request->input('run'))->findOrFail($request->input('id'));
      $a->activo = true;
      $a->update();

      $auditAlumno = new AuditAlumnoReporte();
      $auditAlumno->id_usuario = current_user() ? current_user()->id : 1 ;
      $auditAlumno->id_alumno = $a->id;
      $auditAlumno->comentario = $request->input('comentario');
      $auditAlumno->motivo = 1;
      $auditAlumno->save();
      return back()->with('success','se ha activado el alumno');
    } catch (\Throwable $th) {
      return back()->with('info','Error Intente nuevamente.');
    }
  }
}
