<?php

namespace App\Http\Controllers;

use App\Models\Encaminhamento;
use App\Models\Solicitacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\error;

class EncaminhamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Encaminhamento::all();
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

                'solicitacao_id' => 'required|exists:solicitacoes,id',
                'funcionario_id' => 'required|exists:funcionarios,id',
                'departamento_id' => 'required|exists:departamentos,id',
            ]);



            DB::beginTransaction();
        try {
            //code...
            $dado = Encaminhamento::create($dadosValidados);
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
    public function show(Encaminhamento $encaminhamento)
    {
        //
        return $encaminhamento;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Encaminhamento $encaminhamento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Encaminhamento $encaminhamento)
    {
        //
         $dadosValidados = $request->validate([

                'solicitacao_id' => 'required|exists:solicitacoes,id',
                'funcionario_id' => 'required|exists:funcionarios,id',
                'departamento_id' => 'required|exists:departamentos,id',
            ]);



            DB::beginTransaction();
        try {
            //code...
            $dado = $encaminhamento->update($dadosValidados);
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
    public function destroy(Encaminhamento $encaminhamento)
    {
        //

            DB::beginTransaction();
        try {
            //code...
            $dado = $encaminhamento->delete();
             DB::commit();
             return $dado;
        } catch (\Throwable $th) {
            //throw $th;
            return error($th->getMessage());
        }
    }
}
