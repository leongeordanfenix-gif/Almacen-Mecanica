<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RepuestosController;
use App\Http\Controllers\UsuarioController;

// 1. Pantalla Principal / Inicio (usa el UsuarioController)
Route::get('/', [UsuarioController::class, 'index']);

// 2. Rutas del almacén y repuestos (Resource mapea index, create, store, show, edit, update, destroy)
Route::resource('repuestos', RepuestosController::class);

// Rutas de vistas específicas
Route::get('/almacen', function () {
    return view('almacen.index');
});

Route::get('/almacen/detalle', function () {
    return view('almacen.show');
});

Route::get('/almacen/nuevo', function () {
    return view('almacen.create');
});

Route::get('/taller', function () {
    return view('welcome');
});