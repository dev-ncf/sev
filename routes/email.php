<?php
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Route;

Route::prefix('email')->group(function () {
    Route::get('/{user}',[EmailController::class,'index'])->name('email-verify');
    Route::post('/{user}',[EmailController::class,'verifyEmail'])->name('email-verify');
    Route::get('/reenviar-email/{user}',[EmailController::class,'reenviar'])->name('reenviar-email');
});
