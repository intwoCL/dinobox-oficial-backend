<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth.usuario')->group( function () {


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