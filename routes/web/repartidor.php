<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth.usuario')->group( function () {
  Route::get('repartidor/home','Web\Repartidor\RepartidorController@index')->name('repartidor.home');
  Route::get('repartidor/ordenes','Web\Repartidor\RepartidorController@ordenes')->name('repartidor.ordenes');
  Route::get('repartidor/orden/{codigo}','Web\Repartidor\RepartidorController@orden')->name('repartidor.ordenShow');
  Route::put('repartidor/orden/{codigo}','Web\Repartidor\RepartidorController@ordenUpdate')->name('repartidor.ordenUpdate');

  // Modal
  Route::put('repartidor/orden/{codigo}/estado','Web\Repartidor\OrdenController@updateEstado')->name('repartidor.orden.estado');



  Route::get('repartidor/me','Web\Repartidor\RepartidorController@me')->name('repartidor.me');
  Route::get('repartidor/profile','Web\Repartidor\RepartidorController@profile')->name('repartidor.profile');
  Route::put('repartidor/profile','Web\Repartidor\RepartidorController@profileUpdate')->name('repartidor.profile.update');
  Route::put('repartidor/profile/password','Web\Repartidor\RepartidorController@profilePasswordUpdate')->name('repartidor.profile.password');
  Route::put('repartidor/profile/theme','Web\Repartidor\RepartidorController@profileThemeUpdate')->name('repartidor.profile.theme');



});
