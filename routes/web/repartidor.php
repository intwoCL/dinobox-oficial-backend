<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth.usuario')->group( function () {
  Route::get('repartidor/home','Web\Repartidor\RepartidorController@index')->name('repartidor.home');
  Route::get('repartidor/orden/{codigo}','Web\Repartidor\RepartidorController@ordenShow')->name('repartidor.ordenShow');
  Route::put('repartidor/orden/{codigo}','Web\Repartidor\RepartidorController@ordenUpdate')->name('repartidor.ordenUpdate');



});
