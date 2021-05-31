<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth.cliente')->prefix('web/cliente')->namespace('Web\Cliente')->name('web.cliente.')->group( function () {
  //Perfil Cliente
  Route::get('/','ClienteController@home')->name('home');

  Route::get('perfil','ClienteController@perfil')->name('perfil');
  Route::put('perfil','ClienteController@profileUpdate')->name('perfil.update');

  //Contraseña
  Route::get('clave','ClienteController@passwordIndex')->name('password');
  Route::post('clave','ClienteController@passwordUpdate')->name('password.update');

  //Historial
  Route::get('historial','ClienteController@historial')->name('historial');

  //Seguimiento Privado
  Route::get('seguimiento/{codigo}','ClienteController@seguimiento')->name('seguimiento');

  //Direcciones
  Route::get('direcciones','ClienteController@direcciones')->name('direcciones');
  Route::post('direcciones','ClienteController@direccionStore')->name('direcciones');
  Route::get('{id_direccion}/direccion','ClienteController@direccionesIndex')->name('direccion.show');
  Route::put('{id_direccion}/direccion','ClienteController@direccionUpdate')->name('direccion.update');
  Route::put('{id_direccion}/direccion/favorito','ClienteController@direccionFavorito')->name('direccion.favorito');
});
