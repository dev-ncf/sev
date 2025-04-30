<?php

use App\Http\Controllers\TipoSolicitacaoController;
use Illuminate\Support\Facades\Route;

Route::prefix('tipoSolicitacoes')->group(function () {
    Route::get('/', [TipoSolicitacaoController::class, 'index'])->name('tipoSolicitacoes.index');
    Route::get('/{id}', [TipoSolicitacaoController::class, 'show'])->name('tipoSolicitacao.show');
    Route::post('/', [TipoSolicitacaoController::class, 'store'])->name('tipoSolicitacao.store');
    Route::put('/{id}', [TipoSolicitacaoController::class, 'update'])->name('tipoSolicitacao.update');
    Route::delete('/{id}', [TipoSolicitacaoController::class, 'destroy'])->name('tipoSolicitacao.destroy');
});
