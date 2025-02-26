<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;

use function Laravel\Prompts\error;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

         $dadosValidados = $request->validate(
            [
                'nome'=>'required|string|min_digits:3|max_digits:255',
                'email'=>'required|string|min_digits:6|max_digits:255|unique:users,email',
                'password'=>'required|string|min_digits:8|password',
                'confir_pasword'=>'required|string|min_digits:8|same:password',
                'departamento_id'=>'required|string|exists:departamentos,id',
                'cargo'
            ]
        );

        try {
            //code...
            $user = (new UserController)->store($dadosValidados);
            $dadosValidados['id']=$user->id;
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
