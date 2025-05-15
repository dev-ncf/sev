<?php

use App\Http\Controllers\Estudante\EstudanteSolicitacaoController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard/estudante/solicitacoes')->middleware('auth')->group(function () {
    Route::get('/', [EstudanteSolicitacaoController::class, 'index'])->name('estudante.solicitacoes');
    Route::get('/add', [EstudanteSolicitacaoController::class, 'create'])->name('estudante.solicitacao.add');
    Route::get('/edit/{solicitacao}', [EstudanteSolicitacaoController::class, 'edit'])->name('estudante.solicitacao.edit');
    Route::get('/{solicitacao}', [EstudanteSolicitacaoController::class, 'show'])->name('estudante.solicitacao.show');
    Route::post('/', [EstudanteSolicitacaoController::class, 'store'])->name('estudante.solicitacao.store');
    Route::post('/documento.add', [EstudanteSolicitacaoController::class, 'adicionarDocumento'])->name('estudante.solicitacao.add.documento');
    Route::put('/{solicitacao}', [EstudanteSolicitacaoController::class, 'update'])->name('estudante.solicitacao.update');
    Route::delete('/{solicitacao}', [EstudanteSolicitacaoController::class, 'destroy'])->name('estudante.solicitacao.destroy');
});
