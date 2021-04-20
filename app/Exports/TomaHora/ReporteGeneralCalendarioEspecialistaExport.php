<?php

namespace App\Exports\TomaHora;

use App\Models\TomaHora\Especialidad;
use Rap2hpoutre\FastExcel\FastExcel;

class ReporteGeneralCalendarioEspecialistaExport{
  private $codigo;
  private $name;

  private $export;
  // private $CSV = "csv";
  // private $xlxs = "xlxs";
  // private $xls = "xls";

  public function __construct(string $codigo, string $name = '', string $format = 'xlsx'){
    $this->codigo = $codigo;
    $this->name = $name;
    $this->setExport($format);
  }

  private function setExport(string $format){
    $this->export = 'listado-atencion-'.$this->name.'.'.$format;
  }

  public function download(){
    $e = Especialidad::findByCode($this->codigo)->firstOrFail();
    $agendas = $e->agendas;

    return (new FastExcel($agendas))->download($this->export, function ($agenda) {
      return [
        'Rut' => $agenda->run,
        'Nombre' => $agenda->nombre,
        'Carrera' => $agenda->id_alumno ? $agenda->alumno->carrera->getName() : '',
        'Escuela' => $agenda->id_alumno ? ($agenda->alumno->carrera->escuela->nombre ?? '') : '',
        'Correo' => $agenda->correo,
        'Telefono' => $agenda->id_alumno ? $agenda->alumno->telefono : ($agenda->telefono ?? ''),
        'Jornada' => $agenda->id_alumno ? $agenda->alumno->getJornada() : '',
        'Estado' => $agenda->present()->getStatus(),
        'Canal de entrada' => $agenda->getCanalEntrada(),
        'Canal de salida' => $agenda->getCanalSalida(),
        'Motivo' => $agenda->id_motivo ? $agenda->motivo->nombre : '',
        'Tipo usuario' => $agenda->tipoUsuario->nombre,
        'Fecha' => $agenda->getFechaEntrada()->getDatetime(),
        'Registrado por' => $agenda->usuario->present()->nombre_completo(),
        'Atendido por' => $agenda->id_usuario_finalizado ? $agenda->usuarioAtencion->present()->nombre_completo() : '',
      ];
    });
  }
}
