<?php

use Illuminate\Support\Facades\Route;

// 1. Pantalla Principal / Inicio
Route::get('/', function () {
    return view('welcome');
});

// 2. Pantalla de Listado (Inventario)
Route::get('/almacen', function () {
    return view('almacen.index');
});

// 3. Pantalla de Detalle
Route::get('/almacen/detalle', function () {
    return view('almacen.show');
});

// 4. Pantalla de Formulario (Nuevo Repuesto)
Route::get('/almacen/nuevo', function () {
    return view('almacen.create');
});

Route::get('/taller', function () {
    return view('welcome');
});
