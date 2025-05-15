<?php

namespace App\Http\Controllers\Estudante;

use App\Http\Controllers\Controller;
use App\Mail\EnviarEmail;
use App\Models\Anexo;
use App\Models\Departamento;
use App\Models\Despacho;
use App\Models\Encaminhamento;
use App\Models\Estudante;
use App\Models\Solicitacao;
use App\Models\TipoSolicitacao;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Throwable;

class EstudanteSolicitacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
       $search = session('search') ? session('search') : $request->search;

        $query = Solicitacao::query();
        $query1 = Encaminhamento::query();
        $query2 = TipoSolicitacao::query();
        if ($search) {
            // Buscar os usuários que correspondem à pesquisa
            $users = User::where('nome', 'like', '%' . $search . '%')->pluck('id'); // pegando apenas os IDs

            if ($users->count() > 0) {
                // Filtra as solicitações que pertencem a esses usuários
                $query->whereIn('user_id', $users);
            } else {
                // Nenhum usuário encontrado, retornar vazio
                $query->whereRaw('1 = 0'); // truque para não retornar nada
            }
        }

        if(Auth::user()->tipo=='estudante'){
            $query->where('user_id','=',Auth::id());
            // dd('ola');
        }

        if(Auth::user()->tipo=='funcionario'){
            $query->where('departamento_id','=',Auth::user()->funcionario->departamento_id);
            $query1->where('departamento_id','=',Auth::user()->funcionario->departamento_id);
        }

        $solicitacoes = $query->get();
        $encaminhamentos=$query1->get();
        $tipos=$query2->get();


        return view('Estudante.Solicitacoes.index',compact(['solicitacoes','search','encaminhamentos','tipos']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $tipos = TipoSolicitacao::all();

        return view('Estudante.Solicitacoes.add',compact(['tipos']));
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
            // dd($estudante);

            $departamento = Departamento::find($estudante->departmento_id);

            $dadosValidados['user_id']=$user_id;
            $dadosValidados['departamento_id']=$estudante->departamento_id;
            $dadosValidados['status']='pendente';
            $dadosValidados['data_criacao']=Carbon::now();



            $dado = Solicitacao::create($dadosValidados);
            foreach ($request->file('files') as $arquivo) {
                $nomeArquivo = $arquivo->getClientOriginalName(); // pega o nome original
                $caminho = $arquivo->storeAs('documentos', $nomeArquivo);
                Anexo::create([
                    'solicitacao_id' => $dado->id,
                    'arquivo' => $caminho
                ]);
            }
            DB::commit();

            // dd($request->all());

            return redirect()->route('estudante.solicitacoes')->with(['success'=>'Solicitacao registada com sucesso!','search'=>$dado->user->nome]);
        } catch (Throwable $th) {
            //throw $th;
            return back()->withErrors(['error'=>$th->getMessage()]);
        }
    }
    public function adicionarDocumento(Request $request)
    {
         $dadosValidados = $request->validate([
            'solicitacao_id' => 'required|exists:solicitacoes,id',
            'files' => 'required|array|min:1|max:5',
            'files.*' => 'file|mimes:jpeg,png,pdf|max:2048', // 2MB por arquivo
        ], [

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

            // dd($estudante);



            // $dado = Solicitacao::create($dadosValidados);
            foreach ($request->file('files') as $arquivo) {
                $nomeArquivo = $arquivo->getClientOriginalName(); // pega o nome original
                $caminho = $arquivo->storeAs('documentos', $nomeArquivo);
                Anexo::create([
                    'solicitacao_id' => $dadosValidados['solicitacao_id'],
                    'arquivo' => $caminho
                ]);
            }
            DB::commit();

            // dd($request->all());

            return redirect()->back()->with(['success'=>'Documento registado com sucesso!']);
        } catch (Throwable $th) {
            //throw $th;
            return back()->withErrors(['error'=>$th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Solicitacao $solicitacao)
    {
        $encaminhamento = Encaminhamento::where('solicitacao_id','=',$solicitacao->id)->first();

        $departamentos = Departamento::all();
        if(Auth::user()->tipo=='funcionario'){

            $solicitacao->update(['lida'=>'1']);
            if($encaminhamento){

                $encaminhamento->update(['lida'=>'1']);
            }
        }
        if(Auth::user()->tipo=='estudante'){

            $despacho = Despacho::where('solicitacao_id','=',$solicitacao->id)->first();
            if($despacho){

                $despacho->update(['lida'=>'1']);
            }
        }
        return view('Estudante.Solicitacoes.show',compact(['solicitacao','departamentos','encaminhamento']));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Solicitacao $solicitacao)
    {
        //

        $tipos = TipoSolicitacao::all();
        return view('Estudante.Solicitacoes.edit',compact(['solicitacao','tipos']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Solicitacao $solicitacao)
    {
        //
         $dadosValidados = $request->validate([

            'funcionario_id' => 'nullable|exists:funcionarios,id', // Verifica se o funcionário existe
            'tipo_id' => 'required|exists:tipos_solicitacao,id', // Verifica se o tipo existe
            'status' => 'nullable', // Verifica se o tipo existe
            'prioridade' => 'required|in:baixa,normal,alta', // Exemplo de prioridade válida
            'descricao' => 'nullable|string|max:1000', // Texto opcional com limite de caracteres
            'files' => 'nullable|array', // Deve ser um array de arquivos
            'files.*' => 'file|mimes:jpg,png,pdf|max:2048' // Valida cada arquivo individualmente
        ]);




            DB::beginTransaction();
        try {
            //code...

            $status = $solicitacao->status;

            $solicitacao->update($dadosValidados);
            if($request->hasFile('files')){

                foreach ($request->file('files') as $arquivo) {
                  $nomeArquivo = $arquivo->getClientOriginalName(); // pega o nome original
                  $caminho = $arquivo->storeAs('documentos', $nomeArquivo);
                  Anexo::create([
                      'solicitacao_id' => $solicitacao->id,
                      'arquivo' => $caminho
                  ]);
              }
            }
            //  dd('ola');
            // dd($dadosValidados['status']);
            if ($status!=$solicitacao->status) {

                # code...
                Mail::to($solicitacao->user->email)->send(new EnviarEmail('','A sua solicitacao mudou de status para: '.$solicitacao->status));
                // $status!=$solicitacao->status?dd(true):dd(false);

            }
            DB::commit();
            return back()->with(['success'=>'Actualizacao feita com sucesso!']);
        } catch (\Throwable $th) {
            return back()->withErrors(['error'=>$th->getMessage()]);

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
