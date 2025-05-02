<?php

use App\Http\Controllers\FuncionarioController;
use Illuminate\Support\Facades\Route;

Route::prefix('funcionarios')->group(function () {
    Route::get('/', [FuncionarioController::class, 'index'])->name('funcionarios.index');
    Route::get('/edit/{id}', [FuncionarioController::class, 'edit'])->name('funcionarios.edit');
    Route::post('/', [FuncionarioController::class, 'store'])->name('funcionario.store');
    Route::put('/{id}', [FuncionarioController::class, 'update'])->name('funcionario.update');
    Route::delete('/{id}', [FuncionarioController::class, 'destroy'])->name('funcionarios.destroy');
    Route::get('/create',[FuncionarioController::class,'create'])->name('funcionario.add');
    // Route::get('/add',function(){dd('ola');})->name('funcionario.adi');
});

