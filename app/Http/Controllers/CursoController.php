<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\error;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Curso::all();
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

                'departamento_id' => 'required|exists:departamentos,id',
                'nome' => 'required|string'
            ]);
           DB::beginTransaction();
        try {
            //code...

            $curso = Curso::create($dadosValidados);
             DB::commit();
             return $curso;
        } catch (\Throwable $th) {
            //throw $th;
            return error($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Curso $curso)
    {
        //
        return $curso;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Curso $curso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Curso $curso)
    {
        //
         $dadosValidados = $request->validate([

                'departamento_id' => 'required|exists:departamentos,id',
                'nome' => 'required|string'
            ]);
           DB::beginTransaction();
        try {
            //code...

            $curso = $curso->update($dadosValidados);
             DB::commit();
             return $curso;
        } catch (\Throwable $th) {
            //throw $th;
            return error($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curso $curso)
    {
        //
           DB::beginTransaction();
        try {
            //code...

            $curso = $curso->delete();
             DB::commit();
             return $curso;
        } catch (\Throwable $th) {
            //throw $th;
            return error($th->getMessage());
        }
    }
}
