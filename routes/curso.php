<?php

use App\Http\Controllers\CursoController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard/cursos')->group(function () {
    Route::get('/', [CursoController::class, 'index'])->name('cursos.index');
    Route::get('/add', [CursoController::class, 'create'])->name('curso.add');
    Route::get('/{id}', [CursoController::class, 'show'])->name('curso.show');
    Route::get('/edit/{id}', [CursoController::class, 'edit'])->name('curso.edit');
    Route::post('/', [CursoController::class, 'store'])->name('curso.store');
    Route::put('/{id}', [CursoController::class, 'update'])->name('curso.update');
    Route::delete('/{id}', [CursoController::class, 'destroy'])->name('curso.destroy');
});
