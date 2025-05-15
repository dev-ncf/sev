<?php

use App\Http\Controllers\FuncionarioController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard/funcionarios')->group(function () {
    Route::get('/', [FuncionarioController::class, 'index'])->name('admin.funcionarios.index');
    Route::get('/edit/{funcionario}', [FuncionarioController::class, 'edit'])->name('admin.funcionarios.edit');
    Route::post('/', [FuncionarioController::class, 'store'])->name('admin.funcionario.store');
    Route::put('/{funcionario}', [FuncionarioController::class, 'update'])->name('admin.funcionario.update');
    Route::delete('/{funcionario}', [FuncionarioController::class, 'destroy'])->name('admin.funcionarios.destroy');
    Route::get('/create',[FuncionarioController::class,'create'])->name('admin.funcionario.add');
    // Route::get('/add',function(){dd('ola');})->name('funcionario.adi');
});

