<?php
namespace App\Lib;

class Permissions {

  CONST NAME = "permissions";

  CONST ALLOWS_DEPARTAMENT = [
    1 => 'ENABLED',
    2 => 'DISABLED'
  ];

  CONST ALLOWS = [
    1 => 'GESTOR',
    2 => 'VISITA',
    3 => 'OCULTO'
  ];

  CONST ALLOWS_TUTORIA = [
    1 => 'TUTOR',
    2 => 'COORDINADOR',
    3 => 'OCULTO'
  ];

  CONST ALLOWS_BICICLETA = [
    1 => 'GESTOR',
    2 => 'VISITA',
    3 => 'OCULTO',
    4 => 'ADMIN',
  ];

  CONST ALLOWS_ATENCION = [
    1 => 'GESTOR',
    2 => 'ADMIN',
    3 => 'OCULTO',
  ];

  CONST ALLOWS_FORMULARIO = [
    1 => 'GESTOR',
    2 => 'ADMIN',
    3 => 'OCULTO',
  ];


  private function reverse($allows) {
    return array_flip($allows);
  }

  public function getDepartament() {
    return $this->reverse(self::ALLOWS_DEPARTAMENT);
  }

  public function getAllows() {
    return $this->reverse(self::ALLOWS);
  }

  public function getTutoria() {
    return $this->reverse(self::ALLOWS_TUTORIA);
  }

  public function getBicicleta() {
    return $this->reverse(self::ALLOWS_BICICLETA);
  }

  public function getAtencion() {
    return $this->reverse(self::ALLOWS_ATENCION);
  }

  public function getFormulario() {
    return $this->reverse(self::ALLOWS_FORMULARIO);
  }

}