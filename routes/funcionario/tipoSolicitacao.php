<?php

use App\Http\Controllers\Funcionario\FuncionarioTipoSolicitacaoController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard/funcionario/tipoSolicitacoes')->group(function () {
    Route::get('/', [FuncionarioTipoSolicitacaoController::class, 'index'])->name('funcionario.tipoSolicitacoes.index');
    Route::get('/add', [FuncionarioTipoSolicitacaoController::class, 'create'])->name('funcionario.tipoSolicitacao.add');
    Route::get('/{id}', [FuncionarioTipoSolicitacaoController::class, 'show'])->name('funcionario.tipoSolicitacao.show');
    Route::get('/edit/{tipoSolicitacao}', [FuncionarioTipoSolicitacaoController::class, 'edit'])->name('funcionario.tipoSolicitacao.edit');
    Route::post('/', [FuncionarioTipoSolicitacaoController::class, 'store'])->name('funcionario.tipoSolicitacao.store');
    Route::put('/{tipoSolicitacao}', [FuncionarioTipoSolicitacaoController::class, 'update'])->name('funcionario.tipoSolicitacao.update');
    Route::delete('/{tipoSolicitacao}', [FuncionarioTipoSolicitacaoController::class, 'destroy'])->name('funcionario.tipoSolicitacao.destroy');
});
