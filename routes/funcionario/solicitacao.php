<?php

use App\Http\Controllers\Funcionario\FuncionarioSolicitacaoController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard/funcionario/solicitacoes')->middleware('auth')->group(function () {
    Route::get('/', [FuncionarioSolicitacaoController::class, 'index'])->name('funcionario.solicitacoes');
    Route::get('/add', [FuncionarioSolicitacaoController::class, 'create'])->name('funcionario.solicitacao.add');
    Route::get('/edit/{solicitacao}', [FuncionarioSolicitacaoController::class, 'edit'])->name('funcionario.solicitacao.edit');
    Route::get('/{solicitacao}', [FuncionarioSolicitacaoController::class, 'show'])->name('funcionario.solicitacao.show');
    Route::get('/encaminhamento/{encaminhamento}', [FuncionarioSolicitacaoController::class, 'encaminhamento'])->name('funcionario.encaminhamento.show');
    Route::post('/', [FuncionarioSolicitacaoController::class, 'store'])->name('funcionario.solicitacao.store');
    Route::post('/encaminhar', [FuncionarioSolicitacaoController::class, 'encaminhar'])->name('funcionario.solicitacao.encaminar');
    Route::post('/documento.add', [FuncionarioSolicitacaoController::class, 'adicionarDocumento'])->name('funcionario.solicitacao.add.documento');
    Route::put('/{solicitacao}', [FuncionarioSolicitacaoController::class, 'update'])->name('funcionario.solicitacao.update');
    Route::delete('/{solicitacao}', [FuncionarioSolicitacaoController::class, 'destroy'])->name('funcionario.solicitacao.destroy');
});
