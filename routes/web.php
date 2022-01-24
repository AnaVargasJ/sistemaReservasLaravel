<?php

use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\SalaController;
 use App\Http\Controllers\SillaController;
 use App\Http\Controllers\ReservaController;

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
})->name('inicio');

// Route::resources('salas', SalaController::class);
Route::resource('salas', SalaController::class);
Route::resource('sillas', SillaController::class);
Route::resource('reservas',ReservaController::class);






















Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
