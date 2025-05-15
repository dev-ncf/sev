<?php
use App\Http\Controllers\DepartamentoController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard/departamentos')->group(function () {
    Route::get('/', [DepartamentoController::class, 'index'])->name('departamentos');
    Route::get('/create', [DepartamentoController::class, 'create'])->name('departamento.create');
    Route::get('/edit/{departamento}', [DepartamentoController::class, 'edit'])->name('departamento.edit');
    Route::get('/{departamento}', [DepartamentoController::class, 'show'])->name('departamento.show');
    Route::post('/store', [DepartamentoController::class, 'store'])->name('departamento.store');
    Route::put('/{departamento}', [DepartamentoController::class, 'update'])->name('departamento.update');
    Route::delete('/{departamento}', [DepartamentoController::class, 'destroy'])->name('departamento.destroy');
});
