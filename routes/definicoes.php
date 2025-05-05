<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard/perfil')->group(function () {
    Route::get('/{user}', [UserController::class, 'edit'])->name('definicoes');
    Route::put('/{user}', [UserController::class, 'update'])->name('user.update');
});
