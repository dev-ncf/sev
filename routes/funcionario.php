<?php

use App\Http\Controllers\FuncionarioController;
use Illuminate\Support\Facades\Route;

Route::prefix('funcionarios')->group(function () {
    Route::get('/', [FuncionarioController::class, 'index'])->name('funcionarios.index');
    Route::get('/{id}', [FuncionarioController::class, 'show'])->name('funcionarios.show');
    Route::post('/', [FuncionarioController::class, 'store'])->name('funcionarios.store');
    Route::put('/{id}', [FuncionarioController::class, 'update'])->name('funcionarios.update');
    Route::delete('/{id}', [FuncionarioController::class, 'destroy'])->name('funcionarios.destroy');
});

