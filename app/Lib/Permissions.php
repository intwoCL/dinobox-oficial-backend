<?php
namespace App\Lib;

class Permissions {

  CONST NAME = "permissions";

  CONST ALLOWS_SUCURSAL = [
    1 => 'ENABLED',
    2 => 'DISABLED'
  ];

  CONST ALLOWS = [
    1 => 'GESTOR',
    2 => 'VISITA',
    3 => 'OCULTO'
  ];

  private function reverse($allows) {
    return array_flip($allows);
  }

  public function getSurcursal() {
    return $this->reverse(self::ALLOWS_SUCURSAL);
  }

  public function getAllows() {
    return $this->reverse(self::ALLOWS);
  }
}