<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;

// Ruta principal del administrador: http://127.0.0.1:8000/admin
Route::get('/', function () {
    return view('admin.dashboard');
})->name('dashboard');

// Gestión de Roles
Route::resource('roles', RoleController::class)->names('roles');

// Gestión de Usuarios
Route::resource('users', UserController::class)->names('users');
