<?php

use App\Http\Controllers\Funcionario\FuncionarioDespachoController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard/funcionario/despachos')->group(function () {
    Route::get('/', [FuncionarioDespachoController::class, 'index'])->name('funcionario.despachos.index');
    Route::get('/{despacho}', [FuncionarioDespachoController::class, 'show'])->name('funcionario.despacho.show');
    Route::get('/add/{solicitacao}', [FuncionarioDespachoController::class, 'create'])->name('funcionario.despacho.add');
    Route::post('/addAnexo', [FuncionarioDespachoController::class, 'addAnexo'])->name('funcionario.despacho.add.documento');
    Route::post('/', [FuncionarioDespachoController::class, 'store'])->name('funcionario.despacho.store');
    Route::put('/{id}', [FuncionarioDespachoController::class, 'update'])->name('funcionario.despacho.update');
    Route::delete('/{id}', [FuncionarioDespachoController::class, 'destroy'])->name('funcionario.despacho.destroy');
});
