<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return  view('Auth.login');
})->name('login');

Route::get('/register',)->name('register');
Route::get('/dashboard',[UserController::class,'index'])->name('user.dashboard')->middleware('auth');
require_once __DIR__ . '/solicitacao.php';
require_once __DIR__ . '/faculdade.php';
require_once __DIR__ . '/departamento.php';
require_once __DIR__ . '/register.php';
require_once __DIR__ . '/login.php';
require_once __DIR__ . '/email.php';
require_once __DIR__ . '/tipoSolicitacao.php';
require_once __DIR__ . '/curso.php';
require_once __DIR__ . '/funcionario.php';
