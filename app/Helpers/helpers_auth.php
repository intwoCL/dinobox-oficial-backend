
<?php

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

