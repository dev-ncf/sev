<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class FuncionarioMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

         if (Auth::check() && Auth::user()->tipo === 'funcionario') {
        return $next($request);
     }

    // Caso não seja admin, retorna erro 403
    return redirect()->route('login')->with('error', 'Acesso negado!');
    }
}
