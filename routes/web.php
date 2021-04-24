<?php

use App\Services\Mailable;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return redirect()->route('auth.usuario'); })->name('root');

// Route::get('/admin','Auth\AuthAdminController@auth')->name('auth.admin');
// Route::post('/admin','Auth\AuthAdminController@login')->name('auth.admin');

Route::get('/acceso','Auth\AuthUsuarioController@auth')->name('auth.usuario');
Route::post('/acceso','Auth\AuthUsuarioController@login')->name('auth.usuario');

// ADMIN -> /admin | /web/admin.php
Route::post('/admin/logout','Auth\AuthAdminController@logout')->name('auth.logout');

Route::middleware('auth.usuario')->group( function () {

  Route::get('home','DashboardController@index')->name('home');
  Route::post('/user/logout','Auth\AuthUsuarioController@logout')->name('auth.user.logout');

});

// Route::get('routes', function () {
//   $routeCollection = Route::getRoutes();
//   return view('route', compact('routeCollection'));
// });


// Route::get('email1',function(){
//   $correo = "benja.mora.torres@gmail.com";

//   $data = [
//     'nombre' => "benjamin",
//     'fecha_entrada' => "12/12/12 12:12AM",
//     'fecha_salida' => "12/12/12 12:12PM",
//     'token' => '123123',
//     'id' => 12
//   ];

//   return Mailable::bikeOuting($correo, $data, true);
// });



Route::get('web','Web\DashboardController@index')->name('home');