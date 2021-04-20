<?php

namespace App\Services\Policies;

use App\Models\Sistema\Departamento;
use App\Models\Sistema\DepartamentoUsuario;
use App\Models\Sistema\Usuario;

class PolicyModel
{

  public $allowUser = [
    'gestor' => 1,
    'visita' => 2,
    'oculto' => 3
  ];

  public function abort(){
    return abort('403');
  }



  // DEPARTAMENTO
  // - Verfica si un departamento esta habilitado
  // REGLAS
  // - Departamento => plataforma_xxxxx = 1 [1 Habilitado, 2 No habilitado]
  // - Departamento => activo = true

  public function depFormulario(Departamento $d){
    if ($d->plataforma_formulario == 1 && $d->activo) {
      return true;
    }
    return false;
  }

  // public function depEvento(Departamento $d){
  //   if ($d->plaforma_evento == 1 && $d->activo) {
  //     return true;
  //   }
  //   return false;
  // }

  // public function depBicicleta(Departamento $d){
  //   if ($d->plaforma_bicicleta == 1 && $d->activo) {
  //     return true;
  //   }
  //   return false;
  // }

  // public function depVotacion(Departamento $d){
  //   if ($d->plaforma_votacion == 1 && $d->activo) {
  //     return true;
  //   }
  //   return false;
  // }

  // public function depTutoria(Departamento $d){
  //   if ($d->plaforma_votacion == 1 && $d->activo) {
  //     return true;
  //   }
  //   return false;
  // }

  public function depAtencion(Departamento $d){
    if ($d->plaforma_atencion == 1 && $d->activo) {
      return true;
    }
    return false;
  }




  // DEPARTAMENTO_USUARIO
  // - Verfica si un usuarioDepartamento esta habilitado

  // MODULO FORMULARIO
  // - DepartamentoUsuario => permiso_formulario = 1
  // - DepartamentoUsuario => activo = true
  public function depUserFormulario(Departamento $d, Usuario $u){
    if ($this->depFormulario($d)) {
      $du = DepartamentoUsuario::findDepartamentoUser($d->id,$u->id)->where('permiso_formulario','<>',3)->first();
      if ($du) {
        return true;
      }
    }
    return false;
  }

  // MODULO ATENCION | TOMA DE HORA
  // - DepartamentoUsuario => permiso_toma_hora = 1
  // - DepartamentoUsuario => activo = true
  public function depUserAtencion(Departamento $d, Usuario $u){
    if ($this->depAtencion($d)) {
      $du = DepartamentoUsuario::findDepartamentoUser($d->id,$u->id)->where('permiso_toma_hora','<>',3)->first();
      if ($du) {
        return true;
      }
    }
    return false;
  }
}
