<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use App\Models\Sistema\Alumno;
use Illuminate\Http\Request;

use Rap2hpoutre\FastExcel\FastExcel;

class UtilsController extends Controller
{
  public function index(){
    return view('admin.utils.index');
  }


  public function importAlumnos(){
    $alumnosExcel = array();
    return view('admin.utils.import_alumno', compact('alumnosExcel'));
  }

  public function importAlumnosStore(Request $request){
    try {
      $documento = $request->file('document');
      // $delimitador = $request->input('delimitador');
      $type = $request->input('type','ADD');
      $format =  $request->input('format','EXCEL'); // excel o csv

      if ($format=="EXCEL") {
        $alumnosExcel = array();
        $array_run = array();
        $data = (new FastExcel)->import($documento);
        foreach ($data as $line) {
          $alumno = array(
            'run'      => $line['RUN'],
            'nombre'   => $line['NOMBRE'],
            'apellido' => $line['APELLIDO'] ?? '',
            'correo'   => $line['CORREO'] ?? '',
            'telefono' => $line['TELEFONO'] ?? null,
            'jornada'  => $line['JORNADA'],
            'id_sede'  => $line['SEDE'] ?? 1,
            'id_carrera' => $line['CARRERA'],
            'status'   => [
              "new" => true,
            ],
          );
          $alumnosExcel[$line['RUN']] = $alumno;
          array_push($array_run, $line['RUN']);
        }

        if ($type == 'ADD') {
          //Agregar
          $alumnosDB = Alumno::whereIn('run',$array_run)->get();

          foreach ($alumnosDB as $a) {
            $alumnosExcel[$a->run]['status']['new'] = false;
          }

          foreach ($alumnosExcel as $run => $alum) {
            if ($alum['status']['new']) {
              $alumnoNew = new Alumno();
              $alumnoNew->run = $alum['run'];
              $alumnoNew->nombre = $alum['nombre'];
              $alumnoNew->apellido = $alum['apellido'];
              $alumnoNew->correo = $alum['correo'];
              $alumnoNew->telefono = $alum['telefono'];
              $alumnoNew->jornada = $alum['jornada'];
              $alumnoNew->id_sede = $alum['id_sede'];
              $alumnoNew->id_carrera = $alum['id_carrera'];
              $alumnoNew->save();
            }
          }
        }

        return view('admin.utils.import_alumno', compact('alumnosExcel'));
      }
      // else{
        // return (new FastExcel)->configureCsv($delimitador, '#', '\n')->import($documento);
      // }
    } catch (\Throwable $th) {
      return $th;
      return back()->with('danger','Error!');
    }

  }
}
