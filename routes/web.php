<?php

use Illuminate\Support\Facades\Route;

Route::get('/','Web\HomeController@www')->name('root');
//Seguimiento de la orden
Route::post('orden_seguimiento','Web\HomeController@buscarCodigo')->name('web.home.buscarCodigo');
Route::get('orden_seguimiento/{codigo}','Web\HomeController@ordenSeguimiento')->name('web.home.seguimiento');


//Accceso Administrador
Route::get('/acceso','Auth\AuthUsuarioController@auth')->name('auth.usuario');
Route::post('/acceso','Auth\AuthUsuarioController@login')->name('auth.usuario');

//Registro usuario
Route::get('/register','Auth\AuthClienteController@register')->name('cliente.register');
Route::post('/register','Auth\AuthClienteController@registerStore')->name('cliente.register.store');
Route::get('/aviso','Auth\AuthClienteController@avisoRegistro')->name('cliente.register.aviso');

//Login Cliente
Route::get('/login','Auth\AuthClienteController@auth')->name('cliente.login');
Route::post('/login','Auth\AuthClienteController@login')->name('cliente.login');
Route::post('/logout','Auth\AuthClienteController@logout')->name('cliente.logout');


Route::middleware('auth.usuario')->group( function () {
  Route::post('/user/logout','Auth\AuthUsuarioController@logout')->name('auth.user.logout');

  Route::get('home','Web\HomeController@home')->name('home');


  //  {API}
  Route::post('api/v0/clientes','Api\V0\ClienteController@show')->name('api.v0.cliente.show');
});
