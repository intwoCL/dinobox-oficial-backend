<?php

use App\Services\Mailable;
use Illuminate\Support\Facades\Route;


Route::get('/','DashboardController@index')->name('root');

Route::get('/acceso','Auth\AuthUsuarioController@auth')->name('auth.usuario');
Route::post('/acceso','Auth\AuthUsuarioController@login')->name('auth.usuario');

Route::resource('admin', 'Sistema\UsuarioController');
Route::resource('cliente', 'Web\ClienteController');


Route::middleware('auth.usuario')->group( function () {
  Route::post('/user/logout','Auth\AuthUsuarioController@logout')->name('auth.user.logout');

  Route::get('home','DashboardController@home')->name('home');



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

  Route::get('deliveryRecepcionPedido',function(){
   $correo = 'pcamposgarate@gmail.com';

   $data = [
     'nombre' => 'Patricia',
     'apellido' => 'Campos',
     'idOrden' => '001',
     'direccion' => 'Pasaje lagar 865',
     'tipoEnvio' => 'Envio especial',
     'precio' => '6.000'
   ];

   return Mailable::RecepcionPedido($correo, $data);
 });

 Route::get('deliveryUsuarioAgregado',function(){
  $correo = 'pcamposgarate@gmail.com';

  $data = [
    'nombre' => 'Patricia',
    'apellido' => 'Campos',
    'email' => 'pcamposgarate@gmail.com'
  ];

  return Mailable::UsuarioAgregado($correo, $data);
});

Route::get('deliveryUsuarioRecuperacion',function(){
  $correo = 'pcamposgarate@gmail.com';

  $data = [
    'nombre' => 'Patricia',
    'apellido' => 'Campos',
    'email' => 'pcamposgarate@gmail.com'
  ];

  return Mailable::UsuarioRecuperacion($correo, $data);
});

Route::get('deliveryAsignacionPedido',function(){
  $correo = 'pcamposgarate@gmail.com';

  $data = [
    'nombre' => 'Patricia',
    'apellido' => 'Campos',
    'idOrden' => '001',
    'direccion' => 'Pasaje lagar 865',
    'tipoEnvio' => 'Envio especial',
    'precio' => '6.000',
    'email' => 'pcamposgarate@gmail.com'
  ];

  return Mailable::AsignacionPedido($correo, $data);
});

Route::get('deliveryPreparacionPedido',function(){
  $correo = 'pcamposgarate@gmail.com';

  $data = [
    'nombre' => 'Patricia',
    'apellido' => 'Campos',
    'idOrden' => '001',
    'direccion' => 'Pasaje lagar 865',
    'tipoEnvio' => 'Envio especial',
    'precio' => '6.000',
    'email' => 'pcamposgarate@gmail.com'
  ];

  return Mailable::PreparacionPedido($correo, $data);
});

Route::get('deliveryTransitoPedido',function(){
  $correo = 'pcamposgarate@gmail.com';

  $data = [
    'nombre' => 'Patricia',
    'apellido' => 'Campos',
    'idOrden' => '001',
    'direccion' => 'Pasaje lagar 865',
    'tipoEnvio' => 'Envio especial',
    'precio' => '6.000',
    'email' => 'pcamposgarate@gmail.com'
  ];

  return Mailable::TransitoPedido($correo, $data);
});

Route::get('deliveryEntregaPedido',function(){
  $correo = 'pcamposgarate@gmail.com';

  $data = [
    'nombre' => 'Patricia',
    'apellido' => 'Campos',
    'idOrden' => '001',
    'direccion' => 'Pasaje lagar 865',
    'tipoEnvio' => 'Envio especial',
    'precio' => '6.000',
    'email' => 'pcamposgarate@gmail.com'
  ];

  return Mailable::EntregaPedido($correo, $data);
});