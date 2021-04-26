<?php

use Illuminate\Support\Facades\Route;

//  - ADMIN
//  prefix /admin
// auth.admin.user
 // - {ALUMNO}
Route::middleware('auth.usuario')->prefix('admin')->namespace('Sistema')->name('admin.')->group( function () {

  Route::resource('alumno','AlumnoController',['except'=>['create','edit']]);

  Route::get('alumno/{rut}/create','AlumnoController@create')->name('alumno.create');
  Route::get('alumno/{rut}/edit/{id}','AlumnoController@edit')->name('alumno.edit');
  Route::post('alumno/run','AlumnoController@run')->name('alumno.run');
  Route::put('alumno/{rut}/activar','AlumnoController@activar')->name('alumno.activar');

  // - {USUARIO_GENERAL}
  Route::resource('usuarioGeneral','UsuarioGeneralController',['except'=>['show']]);
  Route::get('usuarioGeneral/eliminados','UsuarioGeneralController@indexDelete')->name('usuarioGeneral.indexDelete');
  Route::put('usuarioGeneral/password/{id}','UsuarioGeneralController@password')->name('usuarioGeneral.password');
});

Route::middleware('auth.usuario')->namespace('Sistema')->group( function () {

  Route::get('settings/profile','ConfiguracionController@profile')->name('settings.profile');
  Route::post('settings/profile','ConfiguracionController@profileStore')->name('settings.profile');

  Route::post('settings/profile/password','ConfiguracionController@password')->name('settings.profile.password');
  Route::post('settings/profile/theme','ConfiguracionController@theme')->name('settings.profile.theme');

});

Route::middleware('auth.usuario')->prefix('admin')->namespace('Sistema')->name('admin.')->group( function () {
  Route::get('home','DashboardController@index')->name('home');

  // - {USUARIO}
  Route::resource('usuario','UsuarioController',['except'=>['show']]);
  Route::get('usuario/eliminados','UsuarioController@indexDelete')->name('usuario.indexDelete');
  Route::put('usuario/password/{id}','UsuarioController@password')->name('usuario.password');

  // - {DEPARTAMENTO}
  Route::resource('departamento','DepartamentoController');
  Route::get('departamentos/eliminados','DepartamentoController@indexDelete')->name('departamento.indexDelete');

  Route::prefix('departamento')->group( function () {
    Route::get('{id}/create','DepartamentoUsuarioController@create')->name('departamentousuario.create');
    Route::get('{id}/assign/{id_usuario}','DepartamentoUsuarioController@assign')->name('departamentousuario.assign');
    Route::get('{id}/eliminados','DepartamentoUsuarioController@usersDelete')->name('departamentousuario.usersDelete');

    Route::post('departamento-usuario','DepartamentoUsuarioController@store')->name('departamentousuario.store');
    Route::get('departamento-usuario/{id}/edit','DepartamentoUsuarioController@edit')->name('departamentousuario.edit');
    Route::put('departamento-usuario/{id}','DepartamentoUsuarioController@update')->name('departamentousuario.update');
    Route::delete('departamento-usuario/{id}','DepartamentoUsuarioController@destroy')->name('departamentousuario.destroy');
  });

  // - {Reportes}
  Route::prefix('reportes')->group( function () {
    Route::get('consulta','ConsultasController@index')->name('reportes.consulta.index');
    Route::post('consulta','ConsultasController@store')->name('reportes.consulta.store');
    Route::get('consulta/{id}','ConsultasController@show')->name('reportes.consulta.show');
    Route::put('consulta/{id}','ConsultasController@update')->name('reportes.consulta.update');
  });

  Route::get('sistema','SistemaController@index')->name('sistema');
  Route::put('sistema','SistemaController@update')->name('sistema');

  // Utils
  Route::get('utils','UtilsController@index')->name('utils.index');
  Route::get('utils/import/alumnos','UtilsController@importAlumnos')->name('utils.import.alumnos');
  Route::post('utils/import/alumnos','UtilsController@importAlumnosStore')->name('utils.import.alumnos');
});


//  API
Route::middleware('auth.usuario')->group( function () {
  Route::post('api/v1/consultas/query', 'Api\v1\ApiQueryController@query')->name('api.v1.consultas.query');
});


// MODE MAIN
Route::middleware('auth.usuario')->group( function () {
  Route::post('/admin/modeMain/admin','Auth\AuthAdminController@modeMainAdmin')->name('auth.modeMain.admin');
});
Route::middleware('auth.usuario')->group( function () {
  Route::post('/admin/modeMain/user','Auth\AuthAdminController@modeMainUser')->name('auth.modeMain.user');
});
