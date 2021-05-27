<?php

use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Row;

Route::get('/','DashboardController@www')->name('root');
Route::get('/hola','DashboardController@index')->name('rootI');
//Accceso Administrador
Route::get('/acceso','Auth\AuthUsuarioController@auth')->name('auth.usuario');
Route::post('/acceso','Auth\AuthUsuarioController@login')->name('auth.usuario');

//Registro usuario
Route::get('/register', 'Web\Cliente\ClienteController@register')->name('cliente.register');
Route::post('/register', 'Web\Cliente\ClienteController@registerStore')->name('cliente.register.store');
Route::get('/aviso', 'Web\Cliente\ClienteController@avisoRegistro')->name('cliente.register.aviso');
Route::get('/NoRegistrado', 'Web\Cliente\ClienteController@avisoNoRegistro')->name('cliente.register.noRegistro');

//Login Cliente
Route::get('/login', 'Web\Cliente\ClienteController@auth')->name('cliente.login');
Route::post('/login', 'Web\Cliente\ClienteController@login')->name('cliente.login');
Route::post('/logout','Web\Cliente\ClienteController@logout')->name('cliente.logout');

//Seguimiento de la orden
Route::post('orden_seguimiento', 'Web\DashboardController@buscarCodigo')->name('dashboard.orden.buscarCodigo');
Route::get('orden_seguimiento/{codigo}', 'Web\DashboardController@ordenSeguimiento')->name('dashboard.orden.seguimiento');



Route::middleware('auth.usuario')->group( function () {
  Route::post('/user/logout','Auth\AuthUsuarioController@logout')->name('auth.user.logout');

  Route::get('home','DashboardController@home')->name('home');


  //  {API}
  Route::post('api/v0/clientes', 'Api\V0\ClienteController@show')->name('api.v0.cliente.show');
});
