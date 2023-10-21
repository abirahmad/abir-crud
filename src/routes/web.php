<?php

use Abir\Crud\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;

Route::group(['namespace', 'Abir\Crud\Http\Controllers'], function () {
    Route::group(['middleware' => ['web']], function () {
        Route::resource('users',CrudController::class);
    });
});
