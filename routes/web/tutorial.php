<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth.admin.user')->group( function () {

  Route::get('web/tutorial', 'TutorialController@index')->name('tutorial.index');

});
