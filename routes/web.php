<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\SalidaController;

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', [ProductoController::class, 'index'])->name('producto.index');    
    
    Route::resource('/producto', ProductoController::class);
    Route::resource('/entrada', EntradaController::class);
    Route::resource('/salida', SalidaController::class);
});

