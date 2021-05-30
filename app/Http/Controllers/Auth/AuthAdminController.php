<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\Policies\Auth\AuthAdminPolicy;
use Illuminate\Http\Request;
use Auth;

class AuthAdminController extends Controller
{
  private $policy;

  public function __construct() {
    $this->policy = new AuthAdminPolicy();
  }

  public function modeMainAdmin(Request $request) {
    $this->policy->modeMainAdmin(current_user());
    try {
      $data = array(
        'uid' => current_user()->id,
        'modeMain' => true
      );

      $id = $request->input('id');
      $type = $request->input('type');


      if(Auth::guard('usuario')->check()){
        Auth::guard('usuario')->logout();
      }

      session(['modeMain' => $data]);

      if ($type == 'user') {
        Auth::guard('usuario')->loginUsingId($id);

        if (current_user()->repartidor()) {
          return redirect()->route('repartidor.home');
        }
        return redirect()->route('home');
      } else {
        if ($type == 'client') {
          Auth::guard('cliente')->loginUsingId($id);
          return redirect()->route('web.cliente.home');
        }
      }

      return back()->with('info','Error. Intente nuevamente.');
    } catch (\Throwable $th) {
      return back()->with('info','Error. Intente nuevamente.');
    }
  }

  public function modeMainUser(Request $request){
    try {
      $data = session()->get('modeMain');
      close_sessions();
      Auth::guard('usuario')->loginUsingId($data['uid']);
      return redirect()->route('home')->with('success','HAS SALIDO DEL MODO MAIN');;
    } catch (\Throwable $th) {
      return back()->with('info','Error. Intente nuevamente.');
    }
  }
}
