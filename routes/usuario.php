<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard/usuarios')->group(function () {
    Route::get('/', [UserController::class, 'listaUsuarios'])->name('usuarios.index');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('usuario.edit');
    Route::get('/add', [UserController::class, 'add'])->name('usuario.add');
    Route::post('/', [UserController::class, 'store'])->name('usuario.store');
    Route::put('/{id}', [UserController::class, 'update'])->name('usuario.update');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('usuario.destroy');
});
