<?php
use App\Http\Controllers\SolicitacaoController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard/solicitacoes')->middleware('auth')->group(function () {
    Route::get('/', [SolicitacaoController::class, 'index'])->name('solicitacoes');
    Route::get('/add', [SolicitacaoController::class, 'create'])->name('solicitacao.add');
    Route::get('/edit/{solicitacao}', [SolicitacaoController::class, 'edit'])->name('solicitacao.edit');
    Route::get('/{solicitacao}', [SolicitacaoController::class, 'show'])->name('solicitacao.show');
    Route::post('/', [SolicitacaoController::class, 'store'])->name('solicitacao.store');
    Route::post('/encaminhar', [SolicitacaoController::class, 'encaminhar'])->name('solicitacao.encaminar');
    Route::post('/documento.add', [SolicitacaoController::class, 'adicionarDocumento'])->name('solicitacao.add.documento');
    Route::put('/{solicitacao}', [SolicitacaoController::class, 'update'])->name('solicitacao.update');
    Route::delete('/{solicitacao}', [SolicitacaoController::class, 'destroy'])->name('solicitacao.destroy');
});
