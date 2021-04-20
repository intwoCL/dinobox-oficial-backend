<?php

namespace App\Http\Controllers\Web\Votacion;

use App\Http\Controllers\Controller;
use App\Models\Sistema\Alumno;
use Illuminate\Http\Request;
use Auth;

use App\Models\Votacion\Votacion;
use App\Models\Votacion\AlumnoOnline;
use App\Models\Votacion\Candidato;
use App\Models\Votacion\Grupo;
use App\Models\Votacion\GrupoCarrera;
use App\Models\Votacion\RegistroVoto;
use App\Models\Votacion\Voto;
use App\Services\Sistema\SearchAlumno;
use App\Services\Votacion\VerifiedVoteUser;

class WebVotacionController extends Controller
{
  public function index(){
    close_sessions();
    return view('web.votacion.login');
  }

  public function login(Request $request){
    try {
      $votacion = Votacion::avalibleCode($request->input('code'))->firstOrFail();
      Auth::guard('votacion')->loginUsingId($votacion->id);
      return redirect()->route('web.votacion.registro');
    } catch (\Throwable $th) {
      return back()->with('info','Votación no disponible');
    }
  }

  public function registro(){
    return view('web.votacion.registro');
  }

  public function apiSearch(Request $request){
    $run = $request->input('run');
    $response = collect([
      'status' => false,
      'alumnos' => null
    ]);

    if(!VerifiedVoteUser::check($run, current_votacion()->id)){
      $alumnos = new SearchAlumno($run);
      $response->put('alumnos',$alumnos->raw_info());
    } else {
      $response->put('status',true);
    }
    return $response->all();
  }

  /**
   * Buscar los alumnos del grupo a partir de mi carrera
   *
   * @return \Illuminate\Http\Response
   */
  public function apiCandidatos(Request $request){
    try {
      $response = collect([
        'status' => false,
        'candidatos' => null,
        'error' => null
      ]);
      $alumno = Alumno::where('run',$request->input('rut'))->findOrFail($request->input('id'));
      // if (!$this->isVote($alumno->run)) {
      if(!VerifiedVoteUser::check($alumno->run, current_votacion()->id)){
        $grupoCarrera = GrupoCarrera::join('vo_grupo','vo_grupo_carrera.id_grupo','=','vo_grupo.id')
                            ->where('id_votacion',current_votacion()->id)
                            ->where('id_carrera',$alumno->id_carrera)->first();
        $candidatos = $grupoCarrera->grupo->candidatos_info();

        $response->put('candidatos',$candidatos);
      }else{
        $response->put('status',true);
        $response->put('error','voto');
      }
      return $response->all();
    } catch (\Throwable $th) {
      $response->put('status',true);
      $response->put('error','candidato');
      return $response->all();
    }
  }

  public function apiSufragar(Request $request){
    try {
      $response = collect([
        'vote' => false,
        'error' => null
      ]);
      $alumno = $request->input("alumno");
      $a = Alumno::where('run', $alumno['rut'])->findOrFail($alumno['id']);

      $candidato = $request->input("candidato");
      $ca = Candidato::findOrFail($candidato['id_candidato']);

      // if (!$this->isVote($a->run)) {
      if (!VerifiedVoteUser::check($a->run, current_votacion()->id)) {
        $voto = new Voto();
        $voto->id_candidato = $ca->id;
        $voto->save();

        $rg = new RegistroVoto();
        $rg->id_alumno = $a->id;
        $rg->run = $a->run;
        $rg->id_votacion = current_votacion()->id;
        $rg->save();

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

  private function isValidateCarrera($id_carrera){
    // validad si la carrera del estudiante esta dentro de los grupo a votar
    return true;
  }
}
