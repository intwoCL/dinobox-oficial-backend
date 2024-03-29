<?php

use App\Services\Mailable;
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



  Route::get('deliveryRecepcionPedido',function(){
    $email = 'benja.mora.torres@gmail.com';

    $data = [
      'nombre' => 'Patricia',
      'apellido' => 'Campos',
      'idOrden' => '001',
      'direccion' => 'Pasaje lagar 865',
      'tipoEnvio' => 'Envio especial',
      'precio' => '6.000'
    ];

    return Mailable::RecepcionPedido($email, $data);
  });

  Route::get('deliveryUsuarioAgregado',function(){
    $email = 'benja.mora.torres@gmail.com';

    $data = [
      'nombre' => 'Patricia',
      'apellido' => 'Campos',
      'email' => 'pcamposgarate@gmail.com'
    ];

    return Mailable::UsuarioAgregado($email, $data);
  });

  Route::get('deliveryUsuarioRecuperacion',function(){
    $email = 'benja.mora.torres@gmail.com';

    $data = [
      'nombre' => 'Patricia',
      'apellido' => 'Campos',
      'email' => 'pcamposgarate@gmail.com'
    ];

    return Mailable::UsuarioRecuperacion($email, $data);
  });

  Route::get('deliveryAsignacionPedido',function(){
    $email = 'benja.mora.torres@gmail.com';

    $data = [
      'nombre' => 'Patricia',
      'apellido' => 'Campos',
      'idOrden' => '001',
      'direccion' => 'Pasaje lagar 865',
      'tipoEnvio' => 'Envio especial',
      'precio' => '6.000',
      'email' => 'pcamposgarate@gmail.com'
    ];

    return Mailable::AsignacionPedido($email, $data);
  });

  Route::get('deliveryPreparacionPedido',function(){
    $email = 'benja.mora.torres@gmail.com';

    $data = [
      'nombre' => 'Patricia',
      'apellido' => 'Campos',
      'idOrden' => '001',
      'direccion' => 'Pasaje lagar 865',
      'tipoEnvio' => 'Envio especial',
      'precio' => '6.000',
      'email' => 'pcamposgarate@gmail.com'
    ];

    return Mailable::PreparacionPedido($email, $data);
  });

  Route::get('deliveryTransitoPedido',function(){
    $email = 'benja.mora.torres@gmail.com';

    $data = [
      'nombre' => 'Patricia',
      'apellido' => 'Campos',
      'idOrden' => '001',
      'direccion' => 'Pasaje lagar 865',
      'tipoEnvio' => 'Envio especial',
      'precio' => '6.000',
      'email' => 'pcamposgarate@gmail.com'
    ];

    return Mailable::TransitoPedido($email, $data);
  });

  Route::get('deliveryEntregaPedido',function(){
    $email = 'benja.mora.torres@gmail.com';

    $data = [
      'nombre' => 'Patricia',
      'apellido' => 'Campos',
      'idOrden' => '001',
      'direccion' => 'Pasaje lagar 865',
      'tipoEnvio' => 'Envio especial',
      'precio' => '6.000',
      'email' => 'pcamposgarate@gmail.com'
    ];

    return Mailable::EntregaPedido($email, $data);
  });