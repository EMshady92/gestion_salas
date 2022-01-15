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
Route::resource('salas', App\Http\Controllers\SalasController::class); //salas ruta resource lo uso para altas, bajas, cambios... CRUD
Route::get('reservar_sala', [App\Http\Controllers\SalasController::class, 'reservar_sala']); //ruta para reservar una sala
Route::get('checa_sala/{id}',[App\Http\Controllers\SalasController::class, 'checa_sala']); //ruta para checar si la sala esta reservada
Route::get('guardar_reserva/{hora_inicio}/{hora_fin}/{id}',[App\Http\Controllers\SalasController::class, 'guardar_reserva']); //ruta guarda reserva
Route::get('valida_sala/{id}',[App\Http\Controllers\SalasController::class, 'valida_sala']); // ruta de validacion si la hora de la reserva ya paso
Route::get('liberar_sala/{id}',[App\Http\Controllers\SalasController::class, 'liberar_sala']); //ruta liberar sala manual
