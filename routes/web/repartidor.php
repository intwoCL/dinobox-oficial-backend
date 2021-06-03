<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth.usuario')->prefix('repartidor')->namespace('Web\Repartidor')->name('web.repartidor.')->group( function () {
  Route::get('home','RepartidorController@index')->name('home');

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
  Route::get('me','RepartidorController@me')->name('me');
  Route::get('profile','RepartidorController@profile')->name('profile');
  Route::put('profile','RepartidorController@profileUpdate')->name('profile.update');
  Route::put('profile/password','RepartidorController@profilePasswordUpdate')->name('profile.password');
  Route::put('profile/theme','RepartidorController@profileThemeUpdate')->name('profile.theme');

});
