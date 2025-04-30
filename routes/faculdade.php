<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FaculdadeController;
use Illuminate\Support\Facades\Route;

Route::prefix('faculdades')->group(function () {
    Route::get('/', [FaculdadeController::class, 'index'])->name('faculdades');
    Route::get('/add', [FaculdadeController::class, 'create'])->name('faculdade.add');
    Route::get('/edit/{faculdade}', [FaculdadeController::class, 'edit'])->name('faculdade.edit');
    Route::get('/{faculdade}', [FaculdadeController::class, 'show'])->name('faculdade.show');
    Route::post('/', [FaculdadeController::class, 'store'])->name('faculdade.store');
    Route::put('/{faculdade}', [FaculdadeController::class, 'update'])->name('faculdade.update');
    Route::delete('/{faculdade}', [FaculdadeController::class, 'destroy'])->name('faculdade.destroy');
});
