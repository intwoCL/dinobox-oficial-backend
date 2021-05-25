<?php

namespace App\Services;

use App\Lib\Permissions;
use Illuminate\Support\Facades\Session;

class UserSession extends Permissions
{
  public $UserSession;
  private static $instance;

  function __construct() {
    $this->UserSession = $this->invoke();
  }

  public static function getInstance() {
    if (UserSession::$instance === null){
      UserSession::$instance = new UserSession();
    }
    return self::$instance;
  }

  // PRIVATE

  private function invoke() {
    if (session()->has(self::NAME)) {
      return session()->get(self::NAME);
    }
    $this->handle();
    return $this->invoke();
  }

  private function handle() {
    $permisos = array(
      'admin' => false,
      'id_admin' => null,
      // 'rol'   => [], //gestor, empleado, admin
    );



    // current_user()->last_session = (new \DateTime())->format("Y-m-d H:i:s");
    // current_user()->update();


    // $permisos['admin'] = current_user()->admin;
    // $permisos['rol'] = array(true, true, true);





    session([self::NAME => $permisos]);
  }
}
