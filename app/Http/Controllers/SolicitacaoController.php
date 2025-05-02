<?php

namespace App\Http\Controllers;

use App\Models\Anexo;
use App\Models\Curso;
use App\Models\Departamento;
use App\Models\Estudante;
use App\Models\Solicitacao;
use App\Models\TipoSolicitacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\error;

class SolicitacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $query = Solicitacao::query();

        $solicitacoes = $query->get();

        return view('Admin.Solicitacoes.index',compact(['solicitacoes']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $tipos = TipoSolicitacao::all();

        return view('Admin.Solicitacoes.add',compact(['tipos']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $dadosValidados = $request->validate([
            'tipo_id' => 'required|exists:tipos_solicitacao,id',
            'descricao' => 'nullable|string|max:500',
            'files' => 'required|array|min:1|max:5',
            'files.*' => 'file|mimes:jpeg,png,pdf|max:2048', // 2MB por arquivo
        ], [
            'tipo_id.required' => 'O tipo de solicitação é obrigatório.',
            'tipo_id' => 'O tipo de solicitação selecionado é inválido.',
            'descricao.max' => 'A descrição não pode exceder 500 caracteres.',
            'files.required' => 'É necessário anexar pelo menos um documento.',
            'files.array' => 'Os arquivos devem ser enviados como um array.',
            'files.min' => 'É necessário anexar pelo menos um documento.',
            'files.max' => 'Você só pode enviar no máximo 5 arquivos.',
            'files.*.file' => 'Cada anexo deve ser um arquivo válido.',
            'files.*.mimes' => 'Os anexos devem ser arquivos PDF, JPEG ou PNG.',
            'files.*.max' => 'Cada anexo não pode ultrapassar 2MB.',

        ]);



        DB::beginTransaction();
        // dd($user_id);
        try {
            //code...
            $user_id = Auth::id();
            $estudante = Estudante::where('user_id','=',$user_id)->first();
            
            $departamento = Curso::find($estudante->departmento_id);

            $dado = Solicitacao::create($dadosValidados);
            foreach ($request->file('files') as $arquivo) {
                $caminho = $arquivo->store('documentos'); // Salvar no diretório `
                Anexo::create([
                    'solicitacao_id' => $dado->id,
                    'arquivo' => $caminho
                ]);
            }
            // DB::commit();

            dd('Ola');
            return back()->with(['success'=>'Solicitacao registada com sucesso!']);
        } catch (\Throwable $th) {
            //throw $th;
            // return back()->withErrors(['error'=>$th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Solicitacao $solicitacao)
    {
        //
        return $solicitacao;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Solicitacao $solicitacao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Solicitacao $solicitacao)
    {
        //
         $dadosValidados = $request->validate([
            'user_id' => 'required|exists:users,id', // Verifica se o usuário existe na tabela users
            'funcionario_id' => 'required|exists:funcionarios,id', // Verifica se o funcionário existe
            'tipo_id' => 'required|exists:tipos,id', // Verifica se o tipo existe
            'departamento_id' => 'required|exists:departamentos,id', // Verifica se o departamento existe
            'data_criacao' => 'required|date', // Deve ser uma data válida
            'data_conclusao' => 'nullable|date|after_or_equal:data_criacao', // Data de conclusão opcional e deve ser após a criação
            'prioridade' => 'required|in:baixa,média,alta', // Exemplo de prioridade válida
            'descricao' => 'nullable|string|max:1000', // Texto opcional com limite de caracteres
            'arquivos' => 'nullable|array', // Deve ser um array de arquivos
            'arquivos.*' => 'file|mimes:jpg,png,pdf|max:2048' // Valida cada arquivo individualmente
        ]);




            DB::beginTransaction();
        try {
            //code...


            $dado = Solicitacao::create($dadosValidados);
              foreach ($request->file('anexos') as $arquivo) {
                $caminho = $arquivo->store('documentos'); // Salvar no diretório `
                Anexo::create([
                    'solicitacao_id' => $dado->id,
                    'arquivo' => $caminho
                ]);
            }
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
    public function destroy(Solicitacao $solicitacao)
    {
        //
    }
}
