<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth.cliente')->prefix('web/cliente')->namespace('Web\Cliente')->name('web.cliente.')->group( function () {
  //Perfil Cliente
  Route::get('/','ClienteController@home')->name('home');

  Route::get('perfil','ClienteController@cliente')->name('cliente');
  Route::put('perfil','ClienteController@profileUpdate')->name('cliente');

  //Contraseña
  Route::get('clave','ClienteController@passwordIndex')->name('password');
  Route::post('clave','ClienteController@passwordUpdate')->name('password.update');

  //Historial
  Route::get('historial','ClienteController@historial')->name('historial');

  //Seguimiento Privado
  Route::get('seguimiento/{codigo}','ClienteController@seguimientoOrden')->name('seguimiento');

  //Direcciones
  Route::get('direcciones','ClienteController@direcciones')->name('direcciones');
  Route::post('direcciones','ClienteController@direccionStore')->name('direcciones');
  Route::get('{id_direccion}/direccion','ClienteController@direccionesIndex')->name('direcciones.edit');
  Route::put('{id_direccion}/direccion','ClienteController@direccionUpdate')->name('direcciones.update');
});
