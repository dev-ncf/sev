<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::prefix('login')->group(function () {
    Route::post('/', [LoginController::class, 'index'])->name('log.in');
    Route::post('/out', [LoginController::class, 'store'])->name('log.out');
});
