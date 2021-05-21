<?php

use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Row;

Route::get('/','DashboardController@index')->name('root');

Route::get('/acceso','Auth\AuthUsuarioController@auth')->name('auth.usuario');
Route::post('/acceso','Auth\AuthUsuarioController@login')->name('auth.usuario');

//Registro usuario
Route::get('/register', 'Web\Cliente\ClienteController@register')->name('cliente.register');
Route::post('/register', 'Web\Cliente\ClienteController@registerStore')->name('cliente.register.store');

//Perfil Cliente
Route::get('/profile/cliente', 'Web\Cliente\ClienteController@cliente')->name('profile.cliente');
Route::put('/profile/cliente', 'Web\Cliente\ClienteController@profileUpdate')->name('profile.cliente');

//Direcciones
Route::get('/profile/direcciones', 'Web\Cliente\ClienteController@direcciones')->name('profile.direcciones');
Route::get('/profile/direcciones/{id}', 'Web\Cliente\ClienteController@direccionesIndex')->name('profile.direcciones.edit');
Route::put('/profile/direcciones/{id}', 'Web\Cliente\ClienteController@direccionUpdate')->name('profile.direcciones.update');

Route::post('/profile/direcciones', 'Web\Cliente\ClienteController@direccionStore')->name('profile.direcciones');

//Historial
Route::get('/profile/historial', 'Web\Cliente\ClienteController@historial')->name('profile.historial');

Route::get('/profile/password', 'Web\Cliente\ClienteController@passwordIndex')->name('profile.password');
Route::post('/profile/password', 'Web\Cliente\ClienteController@passwordUpdate')->name('profile.password.update');

//Login Cliente
Route::get('/login', 'Web\Cliente\ClienteController@auth')->name('cliente.login');
Route::post('/login', 'Web\Cliente\ClienteController@login')->name('cliente.login');
Route::post('/logout','Web\Cliente\ClienteController@logout')->name('cliente.logout');


Route::middleware('auth.usuario')->group( function () {
  Route::post('/user/logout','Auth\AuthUsuarioController@logout')->name('auth.user.logout');

  Route::get('home','DashboardController@home')->name('home');


  //  {API}
  Route::post('api/v0/clientes', 'Api\V0\ClienteController@show')->name('api.v0.cliente.show');
});
