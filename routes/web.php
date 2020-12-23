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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', \App\Http\Controllers\SingleActionController::class); // Single Access Controller

Route::get('/needs-to-login', [\App\Http\Controllers\ControllerWithMiddlewire::class, 'middlewareFromRoute'])
    ->middleware('auth');
Route::get('/needs-to-login2', [\App\Http\Controllers\ControllerWithMiddlewire::class, 'middlewareFromConstructor']);
Route::get('/needs-to-login3', [\App\Http\Controllers\ControllerWithMiddlewire::class, 'noMiddleware']);
