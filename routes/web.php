<?php

use Illuminate\Support\Facades\Route;

Route::get('/','DashboardController@index')->name('root');

Route::get('/acceso','Auth\AuthUsuarioController@auth')->name('auth.usuario');
Route::post('/acceso','Auth\AuthUsuarioController@login')->name('auth.usuario');
//Registro usuario
Route::get('/register', 'Sistema\ClienteController@register')->name('cliente.register');
Route::post('/register', 'Sistema\ClienteController@registerStore')->name('cliente.register.store');
//Perfil Cliente
Route::get('/profile/cliente', 'Sistema\ClienteController@profile')->name('profile.cliente');
Route::put('/profile/cliente', 'Sistema\ClienteController@profileUpdate')->name('profile.cliente');
Route::put('/profile/cliente/password', 'Sistema\ClienteController@passwordUpdate')->name('profile.cliente.password');
//Login Cliente
Route::get('/login', 'Sistema\ClienteController@auth')->name('cliente.login');
Route::post('/login', 'Sistema\ClienteController@login')->name('cliente.login');
Route::post('/cliente/logout','Sistema\ClienteController@logout')->name('cliente.logout');


Route::middleware('auth.usuario')->group( function () {
  Route::post('/user/logout','Auth\AuthUsuarioController@logout')->name('auth.user.logout');

  Route::get('home','DashboardController@home')->name('home');


  //  {API}
  Route::post('api/v0/clientes', 'Api\V0\ClienteController@show')->name('api.v0.cliente.show');
});
