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

// Registering Many Resource Controller At once. Remember to give as an associative array.
Route::resources([
    'many1'=> \App\Http\Controllers\manyResource1::class,
    'many2'=> \App\Http\Controllers\manyResource2::class
]);

// Partial resource route Using except or only
Route::resource('part-of-resource', \App\Http\Controllers\PartialResource::class)->except('store');
Route::resource('part-of-resource2', \App\Http\Controllers\PartialResource2::class)->only('store');
