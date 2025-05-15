<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Autenticado com sucesso

            if (is_null(Auth::user()->email_verified_at)) {
                // return redirect()->route('reenviar-email',Auth::user()->id);

            }
            // dd("OLA");
            if(Auth::user()->tipo=='estudante'){

                return redirect()->route('estudante.dashboard');
            }

            if(Auth::user()->tipo=='funcionario'){

                return redirect()->route('funcionario.dashboard');
            }

            if(Auth::user()->tipo=='admin'){

                return redirect()->route('user.dashboard');
            }


        } else {
            // Falha na autenticação
            return back()->withErrors(['error'=>'Credencias invalidas!']);
        }

    }
    public function logOut(Request $request)
{
    // Faz o logout
    Auth::logout();

    // Invalida a sessão
    $request->session()->invalidate();

    // Regenera o token CSRF
    $request->session()->regenerateToken();

    // Redireciona para a página de login ou onde quiser
    return redirect()->route('login')->with('status', 'Você saiu da sua conta.');
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
