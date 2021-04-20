<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Sistema\DepartamentoUsuario;

class DashboardController extends Controller
{
  public function index(){
    return view('dashboard.welcome');
  }

  public function evento(){
    try {
      $departamentosUsuario = DepartamentoUsuario::allowEvento(current_user()->id);
      return view('dashboard.evento',compact('departamentosUsuario'));
    } catch (\Throwable $th) {
      return redirect()->route('home')->with('danger','No tienes acceso.');
    }
  }

  public function votacion(){
    try {
      $departamentos = DepartamentoUsuario::allowVotacion(current_user()->id);
      return view('dashboard.votacion',compact('departamentos'));
    } catch (\Throwable $th) {
      return redirect()->route('home')->with('danger','No tienes acceso.');
    }
  }

  // FORMULARIO

  // gestor /panel/formulario
  public function formulario(){
    try {
      $departamentosUsuario = DepartamentoUsuario::allowFormulario(current_user()->id);
      return view('dashboard.formulario',compact('departamentosUsuario'));
    } catch (\Throwable $th) {
      return redirect()->route('home')->with('danger','No tienes acceso.');
    }
  }

  // ATENCION

  // gestor /panel/atencion
  public function tomadehora(){
    try {
      $departamentosUsuario = DepartamentoUsuario::allowAtencion(current_user()->id);
      return view('dashboard.tomadehora',compact('departamentosUsuario'));
    } catch (\Throwable $th) {
      return back()->with('warning','Error intente nuevamente.');
    }
  }

  // admin /panel
  public function admintomadehora(){
    try {
      $departamentosUsuario = DepartamentoUsuario::allowAtencion(current_user()->id,2);
      return view('dashboard.admintomadehora',compact('departamentosUsuario'));
    } catch (\Throwable $th) {
      return back()->with('warning','Error intente nuevamente.');
    }
  }

  // TUTORIA

  public function coordinadorTutoria(){
    try {
      $departamentosUsuario = DepartamentoUsuario::allowTutoria(current_user()->id, 2);
      return view('dashboard.tutoria.coordinador',compact('departamentosUsuario'));
    } catch (\Throwable $th) {
      return redirect()->route('home')->with('danger','No tienes acceso.');
    }
  }

  public function reporteTutoria(){
    try {
      $departamentosUsuario = DepartamentoUsuario::allowTutoria(current_user()->id, 2);
      return view('dashboard.tutoria.reporte',compact('departamentosUsuario'));
    } catch (\Throwable $th) {
      return redirect()->route('home')->with('danger','No tienes acceso.');
    }
  }



  // public function adminImagen(){
  //   $u = Usuario::first();
  //   $themes = Settings::THEMES;
  //   return view('admin.imagen',compact('u','themes'));
  // }


  // public function uploadImagen(Request $request, $accion){
  //   // return $request;

  //   $image = $request->input('foto');
  //   $imageOriginal = $request->input('fotoOriginal');

  //   $this->imagenUpdate($imageOriginal,'original');
  //   $this->imagenUpdate($image,'final');
  //   return "true";
  // }

  // private function imagenUpdate($image_64, $name){
  //   $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];   // .jpg .png .pdf
  //   $replace = substr($image_64, 0, strpos($image_64, ',')+1);
  //   $image = str_replace($replace, '', $image_64);
  //   $image = str_replace(' ', '+', $image);
  //   $imageName = $name  .'.'.$extension;
  //   Storage::disk('public')->put('photos_nuevas/'.$imageName, base64_decode($image));
  // }



  // COMMANDOS

  // public function servidor($code){
  //   if($code == "update"){
  //     $agendas = Agenda::get();

  //     foreach ($agendas as $a) {
  //       if($a->id_alumno){
  //         $a->tipo_usuario = 1;
  //       }else{
  //         if(empty($a->id_usuario_general)){
  //           $a->tipo_usuario = 98;
  //         }
  //       }
  //       $a->update();
  //     }
  //     return "Actualizado versión 0.4.0";
  //   }
  //   return "No actualizado";
  // }
}
