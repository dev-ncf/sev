<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\error;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Departamento::all();
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

                'faculdade_id' => 'required|exists:faculdades,id',
                'nome' => 'required|string',
            ]);



            DB::beginTransaction();
        try {
            //code...
            $dado = Departamento::create($dadosValidados);
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
    public function show(Departamento $departamento)
    {
        //
        return $departamento;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Departamento $departamento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Departamento $departamento)
    {
        //
         $dadosValidados = $request->validate([

                'faculdade_id' => 'required|exists:faculdades,id',
                'nome' => 'required|string',
            ]);



            DB::beginTransaction();
        try {
            //code...
            $dado = $departamento->update($dadosValidados);
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
    public function destroy(Departamento $departamento)
    {
        //


            DB::beginTransaction();
        try {
            //code...
            $dado = $departamento->delete();
             DB::commit();
             return $dado;
        } catch (\Throwable $th) {
            //throw $th;
            return error($th->getMessage());
        }
    }
}
