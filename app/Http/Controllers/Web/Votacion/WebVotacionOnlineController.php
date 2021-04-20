<?php

namespace App\Http\Controllers\Web\Votacion;

use App\Http\Controllers\Controller;
use App\Models\Sistema\Alumno;
use App\Models\Votacion\AlumnoOnline;
use App\Models\Votacion\Candidato;
use App\Models\Votacion\GrupoCarrera;
use App\Models\Votacion\Votacion;
use App\Models\Votacion\RegistroVoto;
use App\Models\Votacion\Voto;
use App\Services\Mailable;
use App\Services\Votacion\VerifiedVoteUser;
use Illuminate\Http\Request;
use Auth;

class WebVotacionOnlineController extends Controller
{
  public function index(){
    close_sessions();
    return view('web.votacionOnline.login');
  }

  public function codigo(Request $request){
    return redirect()->route('web.votacionOnline.submit',$request->input('code'));
  }

  public function submit($codigo){
    try {
      $v = Votacion::where('shared_code',$codigo)
                    ->where('shared_online',true)
                    ->where('estado',2)
                    ->where('activo',true)
                    ->firstOrFail();

      return view('web.votacionOnline.submit',compact('v'));
    } catch (\Throwable $th) {
      return redirect()->route('web.votacionOnline.index')->with('info','error intente nuevamente.');
    }
  }

  public function solicitudVoto(Request $request, $codigo){
    try {
      $v = Votacion::where('shared_code',$codigo)
                    ->where('shared_online',true)
                    ->where('estado',2)
                    ->where('activo',true)
                    ->firstOrFail();

      $run = $request->input('run');
      $a = Alumno::where('run',$run)->firstOrFail();

      // if (!$this->isVote($a->run,$v->id)){
      if(!VerifiedVoteUser::check($a->run, $v->id)){

        $alumnoOnline = AlumnoOnline::where('run',$run)->where('id_votacion',$v->id)->first();

        if (empty($alumnoOnline)) {
          $ao = new AlumnoOnline();
          $ao->run = $run;
          $ao->correo = $a->correo;
          $ao->secret_token = $this->buscarCodigo();
          $ao->id_votacion = $v->id;
          $ao->save();

          Mailable::voteOuting($ao->correo ,$run, $a->present()->nombre_completo(), $ao->secret_token, $a->id, $v->nombre);

          return back()->with('success',"Se ha enviado al correo $ao->correo.");
        }else{
          return back()->with('warning','Ya fue enviado.');
        }
      }
      return back()->with('warning','Ya ha votado.');
    } catch (\Throwable $th) {
      return back()->with('info','Error Intente Nuevamente.');
    }
  }


  public function login($token, $id_alumno){
    try {
      $alumno = Alumno::findOrFail($id_alumno);
      $alumnoOnline = AlumnoOnline::FindStudent($token,$alumno->run)->firstOrFail();
      Auth::guard('votacionOnline')->loginUsingId($alumnoOnline->id);
      return redirect()->route('web.votacionOnline.registro');
    } catch (\Throwable $th) {
      return redirect()->route('web.votacionOnline.index')->with('info','Pagina no encontrada');
    }
  }


  public function registro(){
    return view('web.votacionOnline.registro');
  }

  public function apiCandidatos(){
    $grupoCarrera = GrupoCarrera::join('vo_grupo','vo_grupo_carrera.id_grupo','=','vo_grupo.id')
                                ->where('id_votacion',current_votacion_online()->id_votacion)
                                ->where('id_carrera',current_votacion_online()->alumno->id_carrera)->first();
    return $grupoCarrera->grupo->candidatos_info();
  }

  public function apiSufragar(Request $request){
    try {
      $response = collect([
        'vote' => false,
        'error' => null
      ]);

      $candidato = $request->input("candidato");
      $ca = Candidato::findOrFail($candidato['id_candidato']);

      $a = current_votacion_online()->alumno;

      if (!VerifiedVoteUser::check($a->run, current_votacion_online()->id_votacion)) {
        $voto = new Voto();
        $voto->id_candidato = $ca->id;
        $voto->save();

        $rg = new RegistroVoto();
        $rg->id_alumno = $a->id;
        $rg->run = $a->run;
        $rg->id_votacion = current_votacion_online()->id_votacion;
        $rg->save();


        $online = AlumnoOnline::find(current_votacion_online()->id);
        $online->permiso_votar = false;
        $online->update();

        $response->put('vote',true);

      }else{
        $response->put('error','ya has votado');
      }
      return $response->all();
    } catch (\Throwable $th) {
      $response->put('error','Alumno no encontrado');
      return $response->all();
    }
  }


  // PRIVATE

  private function buscarCodigo(){
    try {
      $c = helper_random_string_number(30);
      $v = AlumnoOnline::where('secret_token',$c)->firstOrFail();
      return $this->buscarCodigo();
    } catch (\Throwable $th) {
      return $c;
    }
  }
}