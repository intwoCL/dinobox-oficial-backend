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

  private function allow($p, $g = 'ALLOWS') {
    switch ($g) {
      case 'DEPARTAMENT':
        return $this->getDepartament()[$p];
        break;
      case 'TUTORIA':
        return $this->getTutoria()[$p];
        break;
      case 'BICICLETA':
        return $this->getBicicleta()[$p];
        break;
      case 'ATENCION':
        return $this->getAtencion()[$p];
        break;
      case 'FORMULARIO':
        return $this->getFormulario()[$p];
        break;
      default:
        return ($this->getAllows())[$p];
        break;
    }
  }

  private function handle() {
    $permisos = array(
      'evento'    => false,
      'votacion'  => false,
      'bicicleta' => [false, 0, 'VISITA'], //habilitado, rol_id, rol_name
      'tutoria'   => [false, false, false],//habilidado, isTuto, isCoodinador
      'formulario'=> false,
      'servicio'  => false,
      'chat'      => false,
      'atencion'  => [false, false, false], //habilidado, isGestor, isAdmin
      'alumno'    => false, //Habilitado y tiene un rol interno
      'usuario'    => false, //Habilitado y tiene un rol interno
    );

    current_user()->last_session = (new \DateTime())->format("Y-m-d H:i:s");
    current_user()->update();

    if (current_user()->getPermisoAlumno() != $this->allow('OCULTO')) {
      $permisos['alumno'] = true;
    }

    if (current_user()->getPermisoUsuarioGeneral() != $this->allow('OCULTO')) {
      $permisos['usuario'] = true;
    }

    foreach (current_user()->departamentosUsuario as $du) {

      if (!$du->departamento->activo || !$du->activo) {
        continue;
      }

      $d = $du->departamento;

      if ($d->plataforma_evento == $this->allow('ENABLED','DEPARTAMENT')) {
        if ($du->permiso_evento != $this->allow('OCULTO')) {
          $permisos['evento'] = true;
        }
      }

      if ($d->plataforma_votacion == $this->allow('ENABLED','DEPARTAMENT')) {
        if ($du->permiso_votacion != $this->allow('OCULTO')) {
          $permisos['votacion'] = true;
        }
      }

      if(!$permisos['bicicleta'][0]){
        if ($d->plataforma_bicicleta == $this->allow('ENABLED','DEPARTAMENT')) {
          if ($du->permiso_bicicleta != $this->allow('OCULTO','BICICLETA')) {
            $permisos['bicicleta'][0] = true;
            $permisos['bicicleta'][1] = $du->permiso_bicicleta;
            $permisos['bicicleta'][2] = Permissions::ALLOWS_BICICLETA[$du->permiso_bicicleta];
          }
        }
      }

      if ($d->plataforma_tutoria == $this->allow('ENABLED','DEPARTAMENT')) {
        if ($du->permiso_tutoria != $this->allow('OCULTO','TUTORIA')) {
          $permisos['tutoria'][0] = true;
          if($du->permiso_tutoria == $this->allow('TUTOR','TUTORIA')){
            $permisos['tutoria'][1] = true;
          }
          if($du->permiso_tutoria == $this->allow('COORDINADOR','TUTORIA')){
            $permisos['tutoria'][2] = true;
          }
        }
      }

      if ($d->plataforma_formulario == $this->allow('ENABLED','DEPARTAMENT')) {
        if ($du->permiso_formulario != $this->allow('OCULTO','FORMULARIO')) {
          $permisos['formulario'] = true;
        }
      }

      if ($d->plataforma_atencion == $this->allow('ENABLED','DEPARTAMENT')) {
        if ($du->permiso_toma_hora != $this->allow('OCULTO','ATENCION')) {
          $permisos['atencion'][0] = true;
          if($du->permiso_toma_hora == $this->allow('GESTOR','ATENCION')){
            $permisos['atencion'][1] = true;
          }
          if($du->permiso_toma_hora == $this->allow('ADMIN','ATENCION')){
            $permisos['atencion'][2] = true;
          }
        }
      }
    }

    session([self::NAME => $permisos]);
  }
}
