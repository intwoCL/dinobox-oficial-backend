<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth.cliente')->namespace('Web\Cliente')->group( function () {
  //Perfil Cliente
  Route::get('/profile/cliente', 'ClienteController@cliente')->name('profile.cliente');
  Route::put('/profile/cliente', 'ClienteController@profileUpdate')->name('profile.cliente');

  //Contraseña
  Route::get('/profile/password', 'ClienteController@passwordIndex')->name('profile.password');
  Route::post('/profile/password', 'ClienteController@passwordUpdate')->name('profile.password.update');

  //Historial
  Route::get('/profile/historial', 'ClienteController@historial')->name('profile.historial');

  //Seguimiento Privado
  Route::get('/profile/seguimiento/{codigo}', 'ClienteController@seguimientoOrden')->name('profile.seguimiento');

  //Direcciones
  Route::get('/profile/direcciones', 'ClienteController@direcciones')->name('profile.direcciones');
  Route::get('/profile/direcciones/{id}', 'ClienteController@direccionesIndex')->name('profile.direcciones.edit');
  Route::put('/profile/direcciones/{id}', 'ClienteController@direccionUpdate')->name('profile.direcciones.update');
  Route::post('/profile/direcciones', 'ClienteController@direccionStore')->name('profile.direcciones');
});
