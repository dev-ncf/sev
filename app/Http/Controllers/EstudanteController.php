<?php

namespace App\Http\Controllers;

use App\Models\Estudante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\error;

class EstudanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Estudante::all();
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
                'matricula' => 'required|string|min:3|max:16',
                'email' => 'required|string|email|min:6|max:255|unique:users,email',
                'password' => 'required|string|min:8|confirmed',
                'curso_id' => 'required|exists:cursos,id',
            ]);



            DB::beginTransaction();
        try {
            //code...
            $user = (new UserController())->store($dadosValidados);
            $dadosValidados['id']=$user->id;
            $dado = Estudante::create($dadosValidados);
             DB::commit();
             return $dado;
        } catch (\Throwable $th) {
            //throw $th;
            return error($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Estudante $estudante)
    {
        //
        return $estudante;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estudante $estudante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Estudante $estudante)
    {
        //
        $dadosValidados = $request->validate([

                'nome' => 'required|string|min:3|max:255',
                'matricula' => 'required|string|min:3|max:16',
                'email' => 'required|string|email|min:6|max:255|unique:users,email',
                'password' => 'required|string|min:8|confirmed',
                'curso_id' => 'required|exists:cursos,id',
            ]);



            DB::beginTransaction();
        try {
            //code...

            $dado = $estudante->update($dadosValidados);
             DB::commit();
             return $dado;
        } catch (\Throwable $th) {
            //throw $th;
            return error($th->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estudante $estudante)
    {
        //



            DB::beginTransaction();
        try {
            //code...
           $dado = $estudante->delete();
             DB::commit();
             return $dado;
        } catch (\Throwable $th) {
            //throw $th;
            return error($th->getMessage());
        }
    }
}
