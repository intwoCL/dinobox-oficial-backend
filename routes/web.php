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
Route::get('/register','Web\Cliente\ClienteController@register')->name('cliente.register');
Route::post('/register','Web\Cliente\ClienteController@registerStore')->name('cliente.register.store');
Route::get('/aviso','Web\Cliente\ClienteController@avisoRegistro')->name('cliente.register.aviso');
Route::get('/NoRegistrado','Web\Cliente\ClienteController@avisoNoRegistro')->name('cliente.register.noRegistro');

//Login Cliente
Route::get('/login','Web\Cliente\ClienteController@auth')->name('cliente.login');
Route::post('/login','Web\Cliente\ClienteController@login')->name('cliente.login');
Route::post('/logout','Web\Cliente\ClienteController@logout')->name('cliente.logout');


Route::middleware('auth.usuario')->group( function () {
  Route::post('/user/logout','Auth\AuthUsuarioController@logout')->name('auth.user.logout');

  Route::get('home','Web\HomeController@home')->name('home');


  //  {API}
  Route::post('api/v0/clientes','Api\V0\ClienteController@show')->name('api.v0.cliente.show');
});
