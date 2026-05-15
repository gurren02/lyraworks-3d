<?php

use Illuminate\Support\Facades\Route;

// Ruta principal del administrador: http://127.0.0.1:8000/admin
Route::get('/', function () {
    return view('admin.dashboard');
})->name('dashboard');
