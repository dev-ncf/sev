<?php

use App\Http\Controllers\TipoSolicitacaoController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard/tipoSolicitacoes')->group(function () {
    Route::get('/', [TipoSolicitacaoController::class, 'index'])->name('tipoSolicitacoes.index');
    Route::get('/add', [TipoSolicitacaoController::class, 'create'])->name('tipoSolicitacao.add');
    Route::get('/{id}', [TipoSolicitacaoController::class, 'show'])->name('tipoSolicitacao.show');
    Route::get('/edit/{tipoSolicitacao}', [TipoSolicitacaoController::class, 'edit'])->name('tipoSolicitacao.edit');
    Route::post('/', [TipoSolicitacaoController::class, 'store'])->name('tipoSolicitacao.store');
    Route::put('/{tipoSolicitacao}', [TipoSolicitacaoController::class, 'update'])->name('tipoSolicitacao.update');
    Route::delete('/{id}', [TipoSolicitacaoController::class, 'destroy'])->name('tipoSolicitacao.destroy');
});
