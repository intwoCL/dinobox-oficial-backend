<?php
namespace App\Lib;

class Permissions {

  CONST NAME = "permissions";

  CONST ALLOWS_SUCURSAL = [
    1 => 'ENABLED',
    2 => 'DISABLED'
  ];

  CONST ROLES = array(
    1 => 'GESTOR',
    2 => 'EMPLEADO',
    3 => 'REPARTIDOR',
  );

  private function reverse($allows) {
    return array_flip($allows);
  }

  public function getSurcursal() {
    return $this->reverse(self::ALLOWS_SUCURSAL);
  }

  public function getRoles() {
    return $this->reverse(self::ROLES);
  }
}