<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard/funcionario/perfil')->group(function () {
    Route::get('/{user}', [UserController::class, 'editFuncionario'])->name('funcionario.definicoes');
});
