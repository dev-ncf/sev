<?php

use App\Http\Controllers\Funcionario\MeFuncionarioController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard/me/funcionarios')->group(function () {
    Route::get('/', [MeFuncionarioController::class, 'index'])->name('funcionarios.index');
    Route::get('/edit/{funcionario}', [MeFuncionarioController::class, 'edit'])->name('funcionarios.edit');
    Route::post('/', [MeFuncionarioController::class, 'store'])->name('funcionario.store');
    Route::put('/{funcionario}', [MeFuncionarioController::class, 'update'])->name('funcionario.update');
    Route::delete('/{funcionario}', [MeFuncionarioController::class, 'destroy'])->name('funcionarios.destroy');
    Route::get('/create',[MeFuncionarioController::class,'create'])->name('funcionario.add');
    // Route::get('/add',function(){dd('ola');})->name('funcionario.adi');
});

