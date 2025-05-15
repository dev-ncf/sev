<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DespachoController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard/despachos')->group(function () {
    Route::get('/', [DespachoController::class, 'index'])->name('despachos.index');
    Route::get('/{despacho}', [DespachoController::class, 'show'])->name('despacho.show');
    Route::get('/add/{solicitacao}', [DespachoController::class, 'create'])->name('despacho.add');
    Route::post('/addAnexo', [DespachoController::class, 'addAnexo'])->name('despacho.add.documento');
    Route::post('/', [DespachoController::class, 'store'])->name('despacho.store');
    Route::put('/{id}', [DespachoController::class, 'update'])->name('despacho.update');
    Route::delete('/{id}', [DespachoController::class, 'destroy'])->name('despacho.destroy');
});
