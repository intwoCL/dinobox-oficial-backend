
<?php

use App\Models\Sistema\Sistema;

/**
 * session user
 *
 * @return only true
 */
function current_user(){
  return auth('usuario')->user();
}

function is_admin(){
  return current_user()->admin;
}

function current_client(){
  return auth('cliente')->user();
}

function current_sistema(){
  $name = 'sistema_session';
  if (session()->has($name)) {
    return session()->get($name);
  }
  session([$name => Sistema::first()]);
  return session()->get($name);
}



function close_sessions(){
  if(Auth::guard('cliente')->check()){
    Auth::guard('cliente')->logout();
  }
  if(Auth::guard('usuario')->check()){
    Auth::guard('usuario')->logout();
  }


  // session()->flush();
  // session()->forget('permissions');
  session()->forget('modeMain');
  return true;
}

