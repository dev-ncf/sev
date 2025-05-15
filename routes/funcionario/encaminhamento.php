<?php

use App\Http\Controllers\EncaminhamentoController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard/funcionario/encaminhamentos')->group(function () {
    Route::get('/', [EncaminhamentoController::class, 'index'])->name('funcionario.encaminhamentos.index');
    Route::get('/{id}', [EncaminhamentoController::class, 'show'])->name('funcionario.encaminhamento.show');
    Route::post('/', [EncaminhamentoController::class, 'store'])->name('funcionario.encaminhamento.store');
    Route::put('/{id}', [EncaminhamentoController::class, 'update'])->name('funcionario.encaminhamento.update');
    Route::delete('/{id}', [EncaminhamentoController::class, 'destroy'])->name('funcionario.encaminhamento.destroy');
});
