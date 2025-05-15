<?php

use App\Http\Controllers\Funcionario\FuuncionarioEstudanteController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard/funcionario/estudantes')->group(function () {
    Route::get('/', [FuuncionarioEstudanteController::class, 'index'])->name('funcionario.estudantes.index');
    Route::get('/edit/{estudante}', [FuuncionarioEstudanteController::class, 'edit'])->name('funcionario.estudante.edit');
    Route::get('/add', [FuuncionarioEstudanteController::class, 'add'])->name('funcionario.estudante.add');
    Route::post('/', [FuuncionarioEstudanteController::class, 'store'])->name('funcionario.estudante.store');
    Route::put('/{estudante}', [FuuncionarioEstudanteController::class, 'update'])->name('funcionario.estudante.update');
    Route::delete('/{estudante}', [FuuncionarioEstudanteController::class, 'destroy'])->name('funcionario.estudante.destroy');
});
