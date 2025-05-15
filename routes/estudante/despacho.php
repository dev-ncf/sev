<?php

use App\Http\Controllers\Estudante\EstudanteDespachoController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard/estudante/despachos')->group(function () {
    Route::get('/', [EstudanteDespachoController::class, 'index'])->name('estudante.despachos.index');
    Route::get('/{despacho}', [EstudanteDespachoController::class, 'show'])->name('estudante.despacho.show');
    Route::get('/add/{solicitacao}', [EstudanteDespachoController::class, 'create'])->name('estudante.despacho.add');
    Route::post('/addAnexo', [EstudanteDespachoController::class, 'addAnexo'])->name('estudante.despacho.add.documento');
    Route::post('/', [EstudanteDespachoController::class, 'store'])->name('estudante.despacho.store');
    Route::put('/{id}', [EstudanteDespachoController::class, 'update'])->name('estudante.despacho.update');
    Route::delete('/{id}', [EstudanteDespachoController::class, 'destroy'])->name('estudante.despacho.destroy');
});
