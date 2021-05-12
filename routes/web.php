<?php

use App\Services\Mailable;
use Illuminate\Support\Facades\Route;


Route::get('/','DashboardController@index')->name('root');

Route::get('/acceso','Auth\AuthUsuarioController@auth')->name('auth.usuario');
Route::post('/acceso','Auth\AuthUsuarioController@login')->name('auth.usuario');


Route::middleware('auth.usuario')->group( function () {
  Route::post('/user/logout','Auth\AuthUsuarioController@logout')->name('auth.user.logout');

  Route::get('home','DashboardController@home')->name('home');

  // REPARTIDOR
  Route::get('repartidor/home','DashboardController@repartidor')->name('repartidor.home');


  Route::resource('orden', 'Orden\OrdenController');
  Route::get('ordenes/pendientes', 'Orden\OrdenController@indexPendientes')->name('ordenes.index.pendientes');
  Route::get('ordenes/asignados/{fecha}', 'Orden\OrdenController@indexAsignados')->name('ordenes.index.asignados');

  //  {API}
  Route::post('api/v0/clientes', 'Api\V0\ClienteController@show')->name('api.v0.cliente.show');
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

 // Route::get('/debug-sentry', function () {
  //   throw new Exception('My first Sentry error!');
  // });
  // Route::get('cache',function(){
  //   Artisan::call('cache:clear');
  //   Artisan::call('config:clear');
  //   Artisan::call('config:cache');
  // });
