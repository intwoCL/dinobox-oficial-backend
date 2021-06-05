<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth.usuario')->prefix('repartidor')->namespace('Web\Repartidor')->name('web.repartidor.')->group( function () {
  Route::get('home','RepartidorController@index')->name('home');

  Route::post('iniciar_recorrido','RepartidorController@iniciarRecorrido')->name('iniciarRecorrido');
  Route::post('terminar_recorrido','RepartidorController@terminarRecorrido')->name('terminarRecorrido');


  // [ ORDENES ]
  Route::get('ordenes','OrdenController@ordenes')->name('ordenes');
  Route::get('orden/{codigo}','OrdenController@orden')->name('ordenShow');
  // Route::put('orden/{codigo}','RepartidorController@ordenUpdate')->name('ordenUpdate');

  Route::get('orden/{codigo}/retiro','OrdenController@fomularioRetiro')->name('formulario.retiro');
  Route::post('orden/{codigo}/retiro','OrdenController@fomularioRetiroStore')->name('formulario.retiro');

  Route::get('orden/{codigo}/despacho','OrdenController@fomularioDespacho')->name('formulario.despacho');
  Route::post('orden/{codigo}/despacho','OrdenController@fomularioDespachoStore')->name('formulario.despacho');


  // { Modal }
  Route::put('orden/{codigo}/estado','OrdenController@updateEstado')->name('orden.estado');


  // [ PERFIL ]
  Route::get('yo','RepartidorController@me')->name('me');

  Route::get('perfil','RepartidorController@profile')->name('profile');
  Route::put('perfil','RepartidorController@profileUpdate')->name('profile.update');

  Route::get('perfil/password','RepartidorController@profilePassword')->name('profile.password');
  Route::put('perfil/password','RepartidorController@profilePasswordUpdate')->name('profile.password');

  Route::get('perfil/theme','RepartidorController@profileTheme')->name('profile.theme');
  Route::put('perfil/theme','RepartidorController@profileThemeUpdate')->name('profile.theme');
});
