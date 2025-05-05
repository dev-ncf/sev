<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return  view('Auth.login');
})->name('login');

require_once __DIR__ . '/register.php';
require_once __DIR__ . '/login.php';

require_once __DIR__ . '/email.php';
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard');

    require_once __DIR__ . '/solicitacao.php';
    require_once __DIR__ . '/despacho.php';
    require_once __DIR__ . '/faculdade.php';
    require_once __DIR__ . '/departamento.php';
    require_once __DIR__ . '/tipoSolicitacao.php';
    require_once __DIR__ . '/curso.php';
    require_once __DIR__ . '/funcionario.php';
    require_once __DIR__ . '/estudante.php';
    require_once __DIR__ . '/usuario.php';
    require_once __DIR__ . '/definicoes.php';
});


