<?php

namespace App\Http\Controllers;

use App\Models\Anexo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use function Laravel\Prompts\error;

class AnexoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Anexo::all();
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
                'arquivo' => 'required|file|mimes:pdf,doc,docx,jpg,png|max:2048',
            ]);

            // return 'OOla';

            DB::beginTransaction();
        try {
            //code...
            $arquivo = $request->file('arquivo')->store('documentos');
            $dadosValidados['arquivo']=$arquivo;
            $anexo = Anexo::create($dadosValidados);
             DB::commit();
             return $anexo;
        } catch (\Throwable $th) {
            //throw $th;
            return error($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Anexo $anexo)
    {
        //
        return $anexo;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anexo $anexo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Anexo $anexo)
    {
        //
         $dadosValidados = $request->validate([

                'solicitacao_id' => 'required|exists:solicitacoes,id',
                'arquivo' => 'required|file|mimes:pdf,doc,docx,jpg,png|max:2048',
            ]);

            // return 'OOla';

            DB::beginTransaction();
        try {
            //code...
            Storage::delete($anexo->arquivo);
            $arquivo = $request->file('arquivo')->store('documentos');
            $dadosValidados['arquivo']=$arquivo;

            $anexo = $anexo->update($dadosValidados);
             DB::commit();
             return $anexo;
        } catch (\Throwable $th) {
            //throw $th;
            return error($th->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anexo $anexo)
    {
        //
           DB::beginTransaction();
        try {
            //code...
            Storage::delete($anexo->arquivo);
            $anexo = $anexo->delete();
             DB::commit();
             return back()->with(['success'=>'Documento excluido com sucesso']);
        } catch (\Throwable $th) {
            //throw $th;
            return back()->withErrors(['error'=>$th->getMessage()]);
        }
    }
}
