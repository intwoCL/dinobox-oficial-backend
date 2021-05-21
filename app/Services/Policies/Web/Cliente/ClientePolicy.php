<?php

namespace App\Services\Policies\Web\Cliente;

use App\Services\Policies\PolicyModel;
use App\Services\Policies\UserP;

class ClientePolicy extends PolicyModel {
  public function index() {
    if (current_client()) {
      return true;
    }
    return $this->abort();
  }

  public function direccionesIndex($direccion, $cliente) {
    if($direccion->id_cliente == $cliente->id){
      return true;
    }
    return $this->abort();
  }

}
