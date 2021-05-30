<?php

namespace App\Services\Policies\Auth;

use App\Services\Policies\PolicyModel;

class AuthAdminPolicy extends PolicyModel
{
  public function modeMainAdmin($u) {
    if ($u->admin_enabled() || $u->gestor()) {
      return true;
    }
    return $this->abort();
  }
}
