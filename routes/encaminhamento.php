<?php

use App\Http\Controllers\EncaminhamentoController;
use Illuminate\Support\Facades\Route;

Route::prefix('encaminhamentos')->group(function () {
    Route::get('/', [EncaminhamentoController::class, 'index'])->name('encaminhamentos.index');
    Route::get('/{id}', [EncaminhamentoController::class, 'show'])->name('encaminhamento.show');
    Route::post('/', [EncaminhamentoController::class, 'store'])->name('encaminhamento.store');
    Route::put('/{id}', [EncaminhamentoController::class, 'update'])->name('encaminhamento.update');
    Route::delete('/{id}', [EncaminhamentoController::class, 'destroy'])->name('encaminhamento.destroy');
});
