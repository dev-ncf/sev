<?php

use App\Http\Controllers\EstudanteController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard/estudantes')->group(function () {
    Route::get('/', [EstudanteController::class, 'index'])->name('estudantes.index');
    Route::get('/edit/{id}', [EstudanteController::class, 'edit'])->name('estudante.edit');
    Route::get('/add', [EstudanteController::class, 'add'])->name('estudante.add');
    Route::post('/', [EstudanteController::class, 'store'])->name('estudante.store');
    Route::put('/{id}', [EstudanteController::class, 'update'])->name('estudante.update');
    Route::delete('/{id}', [EstudanteController::class, 'destroy'])->name('estudante.destroy');
});
