<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth.usuario')->namespace('Sistema')->group( function () {
  Route::get('settings/profile','ConfiguracionController@profile')->name('settings.profile');
  Route::post('settings/profile','ConfiguracionController@profileStore')->name('settings.profile');
  Route::post('settings/profile/password','ConfiguracionController@password')->name('settings.profile.password');
  Route::post('settings/profile/theme','ConfiguracionController@theme')->name('settings.profile.theme');
});

Route::middleware('auth.usuario')->prefix('admin')->namespace('Sistema')->name('admin.')->group( function () {
  // - {USUARIO}
  Route::resource('usuario','UsuarioController',['except'=>['show']]);
  Route::get('usuario/eliminados','UsuarioController@indexDelete')->name('usuario.indexDelete');
  Route::put('usuario/password/{id}','UsuarioController@password')->name('usuario.password');

  // - {CLIENTE}
  Route::resource('cliente','ClienteController',['except'=>['show']]);
  Route::get('cliente/eliminados','ClienteController@indexDelete')->name('cliente.indexDelete');
  Route::put('cliente/password/{id}','ClienteController@password')->name('cliente.password');

  // - {Reportes}
  Route::prefix('reportes')->group( function () {
    Route::get('consulta','ConsultasController@index')->name('reportes.consulta.index');
    Route::post('consulta','ConsultasController@store')->name('reportes.consulta.store');
    Route::get('consulta/{id}','ConsultasController@show')->name('reportes.consulta.show');
    Route::put('consulta/{id}','ConsultasController@update')->name('reportes.consulta.update');
  });


  // Utils
  Route::get('utils','UtilsController@index')->name('utils.index');
  Route::get('utils/import/alumnos','UtilsController@importAlumnos')->name('utils.import.alumnos');
  Route::post('utils/import/alumnos','UtilsController@importAlumnosStore')->name('utils.import.alumnos');
  Route::get('utils/sistema','SistemaController@index')->name('sistema');
  Route::put('utils/sistema','SistemaController@update')->name('sistema');
});


//  API
// Route::middleware('auth.usuario')->group( function () {
//   Route::post('api/v1/consultas/query', 'Api\v1\ApiQueryController@query')->name('api.v1.consultas.query');
// });


// MODE MAIN
Route::middleware('auth.usuario')->group( function () {
  Route::post('/admin/modeMain/admin','Auth\AuthAdminController@modeMainAdmin')->name('auth.modeMain.admin');
  Route::post('/admin/modeMain/user','Auth\AuthAdminController@modeMainUser')->name('auth.modeMain.user');
});

