<?php

namespace App\Http\Controllers;

use App\Mail\EnviarEmail;
use App\Models\Anexo;
use App\Models\Despacho;
use App\Models\DespachoAnexo;
use App\Models\Solicitacao;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use function Laravel\Prompts\error;

class DespachoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
         $despachos = Despacho::paginate(7);
        // $departamento_id = Auth::user()->funcionario->departamento_id;
        // dd($departamento_id);





        return view('Admin.Despachos.index',compact(['despachos']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Solicitacao $solicitacao)
    {
        //
        return view('Admin.Despachos.add',compact(['solicitacao']));

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
                'status' => 'required|in:Aprovada,Rejeitada,Devolvida',
                'descricao'=>'nullable|string'
            ]);



            DB::beginTransaction();
        try {
            //code...

            $anexo_id = null;
            if($request->hasFile('files')){

                foreach ($request->file('files') as $arquivo) {

                    $nomeArquivo = $arquivo->getClientOriginalName(); // pega o nome original
                    $caminho = $arquivo->storeAs('documentos', $nomeArquivo);
                    $anexo = Anexo::create([
                        'solicitacao_id' => $dadosValidados['solicitacao_id'],
                        'arquivo' => $caminho
                    ]);
                    $anexo_id=$anexo->id;
                }
            }
            $dadosValidados['anexo_id']=$anexo_id;
            $solicitacao = Solicitacao::find($dadosValidados['solicitacao_id']);
            $dado = Despacho::create($dadosValidados);
            if($dadosValidados['status']=='Aprovada' || $dadosValidados['status']=='Rejeitada'){


                $solicitacao->update(['data_conclusao'=>Carbon::now()]);
            }else{
                $solicitacao->update(['data_conclusao'=>null]);

            }

            if($dadosValidados['status']=='Aprovada' ){

                $solicitacao->update( ['status'=>'concluida']);
            }
            if($dadosValidados['status']=='Rejeitada' ){

                $solicitacao->update( ['status'=>'rejeitada']);
            }
            if($dadosValidados['status']=='Devolvida' ){

                $solicitacao->update( ['status'=>'em andamento']);
            }


            // dd('ol');
            Mail::to($solicitacao->user->email)->send(new EnviarEmail('','A sua solicitação teve um novo despacho!'));
             DB::commit();
             return redirect()->route('solicitacao.show',$dadosValidados['solicitacao_id'])->with(['success'=>"Despacho registado com sucesso!"]);
        } catch (\Throwable $th) {
            //throw $th;
            return back()->withErrors(['error'=>$th->getMessage()]);
        }
    }
    public function addAnexo(Request $request)
    {
        //

         $dadosValidados = $request->validate([

                'solicitacao_id' => 'required|exists:solicitacoes,id',
                'despacho_id' => 'required|exists:despachos,id',
                'files' => 'required|array', // precisa ser array
                'files.*' => 'file|mimes:pdf,jpg,png|max:2048' // cada arquivo precisa ser um arquivo válido, tipos permitidos e até 2MB
            ],[
                'files.required' => 'É necessário enviar pelo menos um arquivo.',
                'files.*.file' => 'Cada item deve ser um arquivo válido.',
                'files.*.mimes' => 'Os arquivos devem ser PDF, JPG ou PNG.',
                'files.*.max' => 'Cada arquivo pode ter no máximo 2MB.',
            ]
        );



            DB::beginTransaction();
        try {
            //code...

            $anexo_id = null;
            if($request->hasFile('files')){

                foreach ($request->file('files') as $arquivo) {

                    $nomeArquivo = $arquivo->getClientOriginalName(); // pega o nome original
                    $caminho = $arquivo->storeAs('documentos', $nomeArquivo);
                    $anexo = DespachoAnexo::create([
                        'despacho_id' => $dadosValidados['despacho_id'],
                        'arquivo' => $caminho
                    ]);
                    $anexo_id=$anexo->id;
                }
            }




            $despacho = Despacho::find($dadosValidados['despacho_id']);
            $despacho->update(['anexo_id'=>$anexo_id]);
            // dd('ol');
             DB::commit();
             return redirect()->back()->with(['success'=>"Anexo adicionado com sucesso!"]);
        } catch (\Throwable $th) {
            //throw $th;
            return back()->withErrors(['error'=>$th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Despacho $despacho)
    {
        //
        // dd($despacho->funcionario_id);
        return view('Admin.Despachos.show',compact(['despacho']));
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
