<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth.usuario')->group( function () {
  Route::resource('orden', 'Orden\OrdenController');
  Route::get('ordenes/pendientes', 'Orden\OrdenController@indexPendientes')->name('ordenes.index.pendientes');
  Route::get('ordenes/asignados/{fecha}', 'Orden\OrdenController@indexAsignados')->name('ordenes.index.asignados');
  Route::post('ordenes/asignados', 'Orden\OrdenController@getDateFecha')->name('ordenes.getDateFecha');


  Route::post('orden_repartidor', 'Orden\OrdenRepartidorController@store')->name('orden.repartidor.store');
  Route::post('orden/{codigo}', 'Orden\OrdenController@show')->name('orden.show');
  Route::get('orden/{codigo}/seguimiento', 'Orden\OrdenController@seguimiento')->name('orden.seguimiento');
});
