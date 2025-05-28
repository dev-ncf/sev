<?php

use App\Http\Controllers\AnexoController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return  view('Auth.login');
})->name('login');
Route::get('/gerar-pdf/{estudante}/{tipo}', [PDFController::class, 'gerarPDF'])->name('gerar.pdf');

require_once __DIR__ . '/register.php';
require_once __DIR__ . '/login.php';

require_once __DIR__ . '/email.php';
Route::middleware('auth')->group(function () {


    Route::delete('anexo/{anexo}', [AnexoController::class, 'destroy'])->name('anexo.destroy');
    require_once __DIR__ . '/definicoes.php';


});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard/admin', [UserController::class, 'index'])->name('user.dashboard');
    require_once __DIR__ . '/admin/solicitacao.php';
    require_once __DIR__ . '/admin/despacho.php';
    require_once __DIR__ . '/admin/faculdade.php';
    require_once __DIR__ . '/admin/departamento.php';
    require_once __DIR__ . '/admin/tipoSolicitacao.php';
    require_once __DIR__ . '/admin/curso.php';
    require_once __DIR__ . '/admin/funcionario.php';
    require_once __DIR__ . '/admin/estudante.php';
    require_once __DIR__ . '/admin/usuario.php';
});

Route::middleware(['auth', 'estudante'])->group(function () {

    Route::get('/dashboard/estudante', [UserController::class, 'estudante'])->name('estudante.dashboard');
    require_once __DIR__ . '/estudante/solicitacao.php';
    require_once __DIR__ . '/estudante/despacho.php';
     require_once __DIR__ . '/estudante/definicoes.php';
});

Route::middleware(['auth', 'funcionario'])->group(function () {

    Route::get('/dashboard/funcionario', [UserController::class, 'funcionario'])->name('funcionario.dashboard');
    require_once __DIR__ . '/funcionario/solicitacao.php';
    require_once __DIR__ . '/funcionario/despacho.php';
    require_once __DIR__ . '/funcionario/curso.php';
    require_once __DIR__ . '/funcionario/tipoSolicitacao.php';
    require_once __DIR__ . '/funcionario/estudante.php';
    require_once __DIR__ . '/funcionario/funcionario.php';
    require_once __DIR__ . '/funcionario/definicoes.php';
});


