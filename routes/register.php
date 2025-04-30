<?php

use App\Http\Controllers\EstudanteController;
use Illuminate\Support\Facades\Route;

Route::prefix('register')->group(function () {
    Route::get('/', [EstudanteController::class, 'create'])->name('registrar-se');
    Route::post('/', [EstudanteController::class, 'store'])->name('registrar-se');
});
