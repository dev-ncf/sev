<?php

namespace App\Http\Controllers;

use App\Models\Despacho;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\error;

class DespachoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Despacho::all();
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
                'status' => 'required|in:Aprovado,Rejeitado',
                'descricao'=>'nullable|string'
            ]);



            DB::beginTransaction();
        try {
            //code...
            $anexo = (new AnexoController())->store($request);
            $anexoId =$anexo->id;
            $dadosValidados['anexo_id']=$anexoId;
            $dado = Despacho::create($dadosValidados);
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
    public function show(Despacho $despacho)
    {
        //
        return $despacho;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Despacho $despacho)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Despacho $despacho)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Despacho $despacho)
    {
        //
    }
}
