
<?php

/**
 * session user
 *
 * @return only true
 */
function current_user(){
  return auth('usuario')->user();
}

function current_admin(){
  return auth('admin')->user();
}

function close_sessions(){
  if(Auth::guard('admin')->check()){
    Auth::guard('admin')->logout();
  }
  if(Auth::guard('usuario')->check()){
    Auth::guard('usuario')->logout();
  }


  // session()->flush();
  // session()->forget('permissions');
  session()->forget('modeMain');
  return true;
}

