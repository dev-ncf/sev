<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\error;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return csrf_token() ;

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

        $dadosValidados = $request->validate([
                'nome' => 'required|string|min:3|max:255',
                'email' => 'required|string|email|min:6|max:255|unique:users,email',
                'password' => 'required|string|min:8|confirmed',
                'departamento_id' => 'required|exists:departamentos,id',
                'cargo' => 'required|string'
            ]);

            // return 'OOla';

            DB::beginTransaction();
        try {
            //code...

            $user = (new UserController())->store($dadosValidados);
            $dadosValidados['id']=$user->id;
            DB::commit();
            return Funcionario::create($dadosValidados);
        } catch (\Throwable $th) {
            //throw $th;
            return error($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Funcionario $funcionario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Funcionario $funcionario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Funcionario $funcionario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Funcionario $funcionario)
    {
        //
    }
}
