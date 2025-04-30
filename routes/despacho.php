<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DespachoController;
use Illuminate\Support\Facades\Route;

Route::prefix('despachos')->group(function () {
    Route::get('/', [DespachoController::class, 'index'])->name('despachos.index');
    Route::get('/{id}', [DespachoController::class, 'show'])->name('despacho.show');
    Route::post('/', [DespachoController::class, 'store'])->name('despacho.store');
    Route::put('/{id}', [DespachoController::class, 'update'])->name('despacho.update');
    Route::delete('/{id}', [DespachoController::class, 'destroy'])->name('despacho.destroy');
});
