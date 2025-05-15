<?php

use App\Http\Controllers\Funcionario\FuncionarioCursoController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard/funcionario/cursos')->group(function () {
    Route::get('/', [FuncionarioCursoController::class, 'index'])->name('funcionario.cursos.index');
    Route::get('/add', [FuncionarioCursoController::class, 'create'])->name('funcionario.curso.add');
    // Route::get('/{id}', [FuncionarioCursoController::class, 'show'])->name('funcionario.curso.show');
    Route::get('/edit/{curso}', [FuncionarioCursoController::class, 'edit'])->name('funcionario.curso.edit');
    Route::post('/', [FuncionarioCursoController::class, 'store'])->name('funcionario.curso.store');
    Route::put('/{curso}', [FuncionarioCursoController::class, 'update'])->name('funcionario.curso.update');
    Route::delete('/{curso}', [FuncionarioCursoController::class, 'destroy'])->name('funcionario.curso.destroy');
});
