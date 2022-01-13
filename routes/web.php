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
    return view('layout.principal');
});

//salas
Route::resource('salas', App\Http\Controllers\SalasController::class);
Route::get('reservar_sala', [App\Http\Controllers\SalasController::class, 'reservar_sala']);
Route::get('guardar_reserva/{hora_inicio}/{hora_fin}/{id}',[App\Http\Controllers\SalasController::class, 'guardar_reserva']);
