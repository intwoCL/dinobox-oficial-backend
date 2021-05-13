<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth.usuario')->group( function () {
  Route::resource('orden', 'Orden\OrdenController');
  Route::get('ordenes/pendientes', 'Orden\OrdenController@indexPendientes')->name('ordenes.index.pendientes');
  Route::get('ordenes/asignados/{fecha}', 'Orden\OrdenController@indexAsignados')->name('ordenes.index.asignados');


});
