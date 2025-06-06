<?php

namespace App\Http\Controllers;

use App\Models\TipoSolicitacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\error;

class TipoSolicitacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $search = session('search')? session('search'): $request->search;
        $query = TipoSolicitacao::query();
        if($search){
            $query->where('nome','like','%'.$search.'%');
        }

        $tipos = $query->paginate(5);
        return view('Admin.Tipos.index',compact(['tipos','search']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Admin.Tipos.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         $dadosValidados = $request->validate([
            'nome' => 'required|string', // Exemplo de prioridade válida
            'descricao' => 'nullable|string|max:1000',
            'file' => 'nullable|mimes:jpeg,png,pdf|max:2048', // Texto opcional com limite de caracteres
            'responsavel' => 'required', // Texto opcional com limite de caracteres
        ]);




            DB::beginTransaction();
        try {
            //code...

            if ($request->hasFile('file')) {
                $arquivo = $request->File('file');
                $nomeArquivo = $arquivo->getClientOriginalName(); // pega o nome original
                $caminho = $arquivo->storeAs('documentos', $nomeArquivo);
                $dadosValidados['arquivo']=$caminho;
            }

            $dado = TipoSolicitacao::create($dadosValidados);
            DB::commit();
         return redirect()->route('tipoSolicitacoes.index')->with(['success'=>'Tipo registado com sucesso!','search'=>$dado->nome]);
        } catch (\Throwable $th) {
            //throw $th;
            return back()->withErrors(['error'=>$th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoSolicitacao $tipoSolicitacao)
    {
        //
        return $tipoSolicitacao;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoSolicitacao $tipoSolicitacao)
    {
        //
        $tipo = $tipoSolicitacao;
        return view('Admin.Tipos.edit',compact(['tipo']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipoSolicitacao $tipoSolicitacao)
    {
        //
         $dadosValidados = $request->validate([
            'nome' => 'required|string', // Exemplo de prioridade válida
            'descricao' => 'nullable|string|max:1000',
            'responsavel' => 'required', // Texto opcional com limite de caracteres
        ]);




            DB::beginTransaction();
        try {
            //code...


            $dado = $tipoSolicitacao->update($dadosValidados);
            DB::commit();
            return back()->with(['success'=>'Actualizacao feita com sucesso!']);
        } catch (\Throwable $th) {
            //throw $th;
            return back()->withErrors(['error'=>$th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoSolicitacao $tipoSolicitacao)
    {
        //

         DB::beginTransaction();
        try {
            //code...


            $dado = $tipoSolicitacao->delete();
            DB::commit();
            return $dado;
        } catch (\Throwable $th) {
            //throw $th;
            return error($th->getMessage());
        }
    }
}
