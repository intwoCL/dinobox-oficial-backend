<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth.usuario')->namespace('Sistema')->group( function () {
  Route::get('settings/profile','ConfiguracionController@profile')->name('settings.profile');
  Route::post('settings/profile','ConfiguracionController@profileStore')->name('settings.profile');
  Route::post('settings/profile/password','ConfiguracionController@password')->name('settings.profile.password');
  Route::post('settings/profile/theme','ConfiguracionController@theme')->name('settings.profile.theme');
  //Perfil Cliente
  Route::get('profile/cliente', 'ClienteController@profile')->name('profile.cliente');
  Route::put('profile/cliente', 'ClienteController@updateProfile')->name('profile.cliente');
  Route::post('profile/cliente/password'. 'ClienteController@passwordProfile')->name('profile.cliente.password');
});

Route::middleware('auth.usuario')->prefix('admin')->namespace('Sistema')->name('admin.')->group( function () {
  // - {USUARIO}
  Route::resource('usuario','UsuarioController',['except'=>['show']]);
  Route::get('usuario/eliminados','UsuarioController@indexDelete')->name('usuario.indexDelete');
  Route::put('usuario/{id}/password','UsuarioController@password')->name('usuario.password');
  Route::get('usuario/{id}/vehiculo','VehiculoController@index')->name('vehiculo.index');
  Route::post('usuario/{id}/vehiculo','VehiculoController@store')->name('vehiculo.store');
  Route::get('repartidores','UsuarioController@indexRepartidor')->name('repartidor.index');

  // - {CLIENTE}
  Route::resource('cliente','ClienteController',['except'=>['show']]);
  Route::get('clientes/eliminados','ClienteController@indexDelete')->name('cliente.indexDelete');
  Route::put('cliente/{id}/password','ClienteController@password')->name('cliente.password');
  Route::get('cliente/{id}/direccion','DireccionController@index')->name('cliente.direccion.index');
  Route::post('cliente/{id}/direccion','DireccionController@store')->name('cliente.direccion.store');
  Route::get('cliente/{id}/direccion/create','DireccionController@create')->name('cliente.direccion.create');
  Route::get('direccion/{id}','DireccionController@edit')->name('cliente.direccion.edit');


  // - {REPORTES}
  Route::prefix('reportes')->group( function () {
    Route::get('consulta','ConsultasController@index')->name('reportes.consulta.index');
    Route::post('consulta','ConsultasController@store')->name('reportes.consulta.store');
    Route::get('consulta/{id}','ConsultasController@show')->name('reportes.consulta.show');
    Route::put('consulta/{id}','ConsultasController@update')->name('reportes.consulta.update');
  });

  // - {SISTEMA}
  Route::get('sistema','SistemaController@index')->name('sistema.index');
  Route::get('sistema/edit','SistemaController@show')->name('sistema.show');
  Route::put('sistema/edit','SistemaController@update')->name('sistema.update');
  Route::put('sistema/updateLogin','SistemaController@updateLogin')->name('sistema.updateLogin');

});




// MODE MAIN
Route::middleware('auth.usuario')->group( function () {
  Route::post('/admin/modeMain/admin','Auth\AuthAdminController@modeMainAdmin')->name('auth.modeMain.admin');
  Route::post('/admin/modeMain/user','Auth\AuthAdminController@modeMainUser')->name('auth.modeMain.user');
});

