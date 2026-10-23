<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ClienteController;
use App\Http\Controllers\Api\VehiculoController;
use App\Http\Controllers\Api\RepuestoController;
use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Rutas API del proyecto almacen_mecanica
Route::apiResource('clientes', ClienteController::class);
Route::apiResource('vehiculos', VehiculoController::class);
Route::apiResource('repuestos', RepuestoController::class);
Route::post('/login', [AuthController::class, 'login']);