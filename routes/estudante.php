<?php

use App\Http\Controllers\EstudanteController;
use Illuminate\Support\Facades\Route;

Route::prefix('estudantes')->group(function () {
    Route::get('/', [EstudanteController::class, 'index'])->name('estudantes.index');
    Route::get('/{id}', [EstudanteController::class, 'show'])->name('estudante.show');
    Route::post('/', [EstudanteController::class, 'store'])->name('estudante.store');
    Route::put('/{id}', [EstudanteController::class, 'update'])->name('estudante.update');
    Route::delete('/{id}', [EstudanteController::class, 'destroy'])->name('estudante.destroy');
});
