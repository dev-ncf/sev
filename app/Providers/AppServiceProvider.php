<?php

namespace App\Providers;

use App\Models\Despacho;
use App\Models\Encaminhamento;
use App\Models\Solicitacao;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $novaSolicitacoes = Solicitacao::where('lida','=', '0')->get();
                $novoDespachos = Despacho::where('lida','=','0')->get();
                $novoEncaminhamento = null;
                if(Auth::user()->tipo=='funcionario'){
                    $novoEncaminhamento=Encaminhamento::where('lida','=','0')->where('departamento_id','=',Auth::user()->funcionario->departamento_id)->get();
                }
                if(Auth::user()->tipo=='estudante'){
                    $novaSolicitacoes=Solicitacao::where('lida','=','0')->where('user_id','=',Auth::id())->get();
                }
                $view->with(
                    ['novaSolicitacoes'=> $novaSolicitacoes,
                    'novoDespachos'=>$novoDespachos,
                    'novoEncaminhamento'=>$novoEncaminhamento
                ]);
            }
        });
    }
}
