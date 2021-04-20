<?php

namespace App\Http\Controllers\Web\Evento;

use Auth;
use App\Http\Controllers\Controller;
use App\Models\Evento\TipoVisita;
use Illuminate\Http\Request;

use App\Models\Evento\Evento;
use App\Models\Evento\Inscripcion;
use App\Models\Evento\InscripcionVisita;
use App\Models\Evento\Stand;
use App\Models\Sistema\Alumno;
use App\Models\Sistema\Carrera;
use App\Models\Sistema\Sede;
use App\Services\Sistema\SearchAlumno;
/**
 * Web - Evento - WebEventoController
 * Gestiona los eventos entrante de Stand
 * Se ingresa con código y se verfican si esta disponible y habilitado
 * Se crea una sesion de stand para registrar a los usuarios
 *
 */

class WebEventoController extends Controller
{
  public function evento(){
    close_sessions();
    return view('web.evento.login');
  }

  public function login(Request $request){
    try {
      $stand = Stand::avalibleCode($request->input('code'))->firstOrFail();
      if($stand->evento->estado == 2){ //habilitado
        Auth::guard('stand')->loginUsingId($stand->id);
        return redirect()->route('web.evento.registro');
      }else{
        return back()->with('info','Evento no disponible');
      }
    } catch (\Throwable $th) {
      return back()->with('danger','Código no existe');
      // return $th;
    }
  }

  public function signOut(){
    close_sessions();
    return redirect('/evento');
  }

  public function registro(){
    return view('web.evento.registro');
  }

  public function reporte(){
    if(current_stand()->view_reportes){
      $alumnos_stand = Inscripcion::findByStandAsistio(current_stand()->id)->get();
      $visitas_stand = InscripcionVisita::where('id_stand',current_stand()->id)->where('asistio',true)->get();
      return view('web.evento.reporte',compact('alumnos_stand','visitas_stand'));
    }
  }

  public function visitas(){
    $visitas_stand = InscripcionVisita::where('id_stand',current_stand()->id)->where('asistio',true)->get();
    return view('web.evento.visitas',compact('visitas_stand'));
  }

  public function visita(){
    $tipos = TipoVisita::get();
    $sedes = Sede::get();
    $carreras = Carrera::get();
    return view('web.evento.visita',compact('tipos','sedes','carreras'));
  }

  public function visitaStore(Request $request){
    try {
      $stand = current_stand();
      $rut_visita  = $request->input('inputRutVisita');

      $ViIn = InscripcionVisita::where('run',$rut_visita)->where('id_stand',$stand->id)->first();
      if (empty($ViIn)) {
        $vi = new InscripcionVisita();
        $vi->id_stand = $stand->id;
        $vi->run = $rut_visita;
        $vi->nombre = $request->input('inputNombre');

        if (!empty( $request->input('inputComentario'))) {
          $vi->comentario = $request->input('inputComentario');
        }

        if(!empty($request->input('inputCorreo'))){
          $vi->correo = $request->input('inputCorreo');
        }

        $vi->asistio = true;
        $vi->contador = 1;
        $vi->id_tipo_visita = $request->input('selectTipoVisita');

        if ($vi->id_tipo_visita == '1') { //Alumno Duoc
          $vi->id_sede = $request->input('selectSede');
          $vi->id_carrera = $request->input('selectCarrera');
        }else if($vi->id_tipo_visita == '5' || $vi->id_tipo_visita == '7' || $vi->id_tipo_visita == '8' || $vi->id_tipo_visita == '9'){ //Estuadiante Media, Docente de Media, Director de Media y Funcioario Externo.
          $vi->institucion = $request->input('inputInstitucion');
        }else if ($vi->id_tipo_visita == '2' ||$vi->id_tipo_visita == '3' || $vi->id_tipo_visita == '4') { //Funcionario, Director y Docente Duoc
          $vi->id_sede = $request->input('selectSede');
        }else if($vi->id_tipo_visita == '99'){//Otros
          if (!empty($request->input('inputInstitucion'))) {
            $vi->institucion = $request->input('inputInstitucion');
          }
        }
        $vi->save();
        return back()->with('success','Se ha inscrito correctamente');
      }else{
        return back()->with('warning','Usuario ya inscrito');
      }
    } catch (\Throwable $th) {
      return back()->with('danger','Error intente nuevamente');
    }
  }

  public function visitasRegister(Request $request){
    try {
      $invi = InscripcionVisita::where('id_stand',current_stand()->id)->findOrFail($request->input('id'));
      $invi->contador++;
      $invi->asistio = true;
      $invi->update();
      return back()->with('success','Se ha registrado correctamente');
    } catch (\Throwable $th) {
      return back()->with('danger','Error intente nuevamente');
    }
  }

  // API

  public function apiSearch(Request $request){
    try {
      $run = $request->input('run');

      $inscripcion = $this->findRegister($run);
      $count = $inscripcion == null ? 0 : $inscripcion->contador;

      $response = collect([
        'count' => $count,
        'register' => false,
        'alumnos' => null
      ]);

      if($count >= current_stand()->cantidad ){
        //ya esta registrado
        $response->put('register',true);
      }else {
        // aun no esta registrado
        $alumnos = new SearchAlumno($run);
        $response->put('alumnos',$alumnos->raw_info());
      }

      return $response->all();
    } catch (\Throwable $th) {
      return $response;
    }
  }

  public function apiRegisterAlumno(Request $request){
    try {
      $format = $request->input('format');
      $run = $request->input('rut');
      $id = $request->input('id');

      $response = collect([
        'result' => false
      ]);

      if(current_stand()->isOpen()){
        $alumno = Alumno::findByRun($run)->findOrFail($id);
        $inscripcion = $this->findRegister($run);

        if($inscripcion == null){
          //primera vez

          $ins = new Inscripcion();
          $ins->id_stand = current_stand()->id;
          $ins->id_alumno = $alumno->id;
          $ins->run = $alumno->run;
          $ins->asistio = true;
          $ins->contador = 1;
          $ins->save();
        }else{
          // ya registrado
          $inscripcion->contador++;
          $inscripcion->asistio = true;
          $inscripcion->update();
        }

        $response->put('result',true);

        if ($format == 'html') {
          return redirect()->route('web.evento.registro')->with('success','Se ha registrado correctamente');
        }
      }

      return $response;
    } catch (\Throwable $th) {
      if ($format == 'html') {
        return redirect()->route('web.evento.registro')->with("danger");
      }
      return $response;
    }
  }

  private function findRegister($run){
    try {
      return Inscripcion::where('run',$run)->where('id_stand',current_stand()->id)->firstOrFail();
    } catch (\Throwable $th) {
      return null;
    }
  }
}
