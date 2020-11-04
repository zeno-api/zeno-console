<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/', 'Controllers\\DashboardController@index')->name('dashboard');
    Route::resource('user', 'Controllers\\UserController');

    Route::resource('service', 'Controllers\\ServiceController');
    Route::patch('/service/{service}/update-options', 'Controllers\\ServiceController@updateOptions')->name('service.update-options');

    Route::resource('auth', 'Controllers\\AuthController');

    Route::resource('route', 'Controllers\\RouteController');
});
