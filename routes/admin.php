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

// Gestión de Impresiones
use App\Http\Controllers\Admin\PrintingController;
Route::resource('printing', PrintingController::class)->names('printing');
Route::post('printing/{printing}/finish', [PrintingController::class, 'finish'])->name('printing.finish');

// Gestión de Envíos
use App\Http\Controllers\Admin\DeliveryController;
Route::resource('delivery', DeliveryController::class)->names('delivery')->except(['create', 'store']);
Route::post('delivery/{delivery}/finish', [DeliveryController::class, 'finish'])->name('delivery.finish');

// Gestión de Inventario
use App\Http\Controllers\Admin\InventoryController;
use App\Http\Controllers\Admin\PrinterController;
use App\Http\Controllers\Admin\MaterialController;
Route::get('inventory', [InventoryController::class, 'index'])->name('inventory.index');
Route::resource('printers', PrinterController::class)->names('printers')->except(['index']);
Route::resource('materials', MaterialController::class)->names('materials')->except(['index']);
