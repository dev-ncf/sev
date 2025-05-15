<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard/estudante/perfil')->group(function () {
    Route::get('/{user}', [UserController::class, 'editEstudante'])->name('estudante.definicoes');
});
