<?php

namespace App\Http\Controllers;

use App\Mail\EnviarEmail;
use App\Models\Despacho;
use App\Models\EmailCode;
use App\Models\Encaminhamento;
use App\Models\Estudante;
use App\Models\Solicitacao;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

use function Laravel\Prompts\error;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $solicitacoesPorMes = [];
        $despachosPorMes = [];
         if(Auth::user()->tipo=='admin'){
            for ($i = 1; $i <= 12; $i++) {
                $solicitacoesPorMes[] = Solicitacao::whereMonth('created_at', $i)->count();
                $despachosPorMes[] = Despacho::whereMonth('created_at', $i)->count();
            }
        }


                $despachos = Despacho::all();

                $solicitacoes = Solicitacao::all();
               $solicitacoesRecentes = Solicitacao::orderBy('id', 'desc')->paginate(3);
                $encaminhadas = Encaminhamento::all();
                $estudantes = Estudante::all();

        if(!Auth::user()->email_verified_at){
           return redirect()->route('reenviar-email',Auth::user()->id);
        }else{
            if(Auth::user()->tipo=='funcionario'){
                $departamentoId = Auth::user()->funcionario->departamento_id;

                $despachos = Despacho::whereHas('solicitacao', function ($query) use ($departamentoId) {
                    $query->where('departamento_id', $departamentoId);
                })->with('solicitacao')->get();

                $solicitacoes = Solicitacao::where('departamento_id','=',Auth::user()->funcionario->departamento_id)->get();
                $solicitacoesRecentes = Solicitacao::where('departamento_id','=',Auth::user()->funcionario->departamento_id)->orderBy('id', 'desc')->paginate(3);
                $encaminhadas = Encaminhamento::where('departamento_id','=',Auth::user()->funcionario->departamento_id)->get();
                $estudantes = Estudante::where('departamento_id','=',Auth::user()->funcionario->departamento_id)->get();
                for ($i = 1; $i <= 12; $i++) {
                $solicitacoesPorMes[] = Solicitacao::whereMonth('created_at', $i)->count();
                $despachosPorMes[] = Despacho::whereMonth('created_at', $i)->count();
            }
            }else{
                if(Auth::user()->tipo=='estudante'){
                $user_id = Auth::id();

                $despachos = Despacho::whereHas('solicitacao', function ($query) use ($user_id) {
                    $query->where('user_id', $user_id);
                })->with('solicitacao')->get();

                $solicitacoes = Solicitacao::where('user_id','=',Auth::id())->get();
                $encaminhadas = Encaminhamento::whereHas('solicitacao', function ($query) use ($user_id) {
                    $query->where('user_id', Auth::id());
                })->with('solicitacao')->get();
                $estudantes = Estudante::where('departamento_id','=',Auth::user()->estudante->departamento_id)->get();
                $solicitacoesRecentes = Solicitacao::where('user_id','=',Auth::id())->orderBy('id', 'desc')->paginate(3);
                for ($i = 1; $i <= 12; $i++) {
                $solicitacoesPorMes[] = Solicitacao::where('user_id','=',Auth::id())->whereMonth('created_at', $i)->count();
                $despachosPorMes[] = Despacho::whereHas('solicitacao', function ($query) use ($user_id) {
                    $query->where('user_id', $user_id);
                })->with('solicitacao')->whereMonth('created_at', $i)->count();
            }
            }

            }


            return view('Admin.index',compact(['despachos','solicitacoes','encaminhadas','estudantes','solicitacoesPorMes', 'despachosPorMes','solicitacoesRecentes']));
        }
    }
    public function estudante()
    {
        //
        $solicitacoesPorMes = [];
        $despachosPorMes = [];



                $despachos = Despacho::all();

                $solicitacoes = Solicitacao::all();
               $solicitacoesRecentes = Solicitacao::orderBy('id', 'desc')->paginate(3);
                $encaminhadas = Encaminhamento::all();
                $estudantes = Estudante::all();

        if(!Auth::user()->email_verified_at){
           return redirect()->route('reenviar-email',Auth::user()->id);
        }else{

                if(Auth::user()->tipo=='estudante'){
                $user_id = Auth::id();

                $despachos = Despacho::whereHas('solicitacao', function ($query) use ($user_id) {
                    $query->where('user_id', $user_id);
                })->with('solicitacao')->get();

                $solicitacoes = Solicitacao::where('user_id','=',Auth::id())->get();
                $encaminhadas = Encaminhamento::whereHas('solicitacao', function ($query) use ($user_id) {
                    $query->where('user_id', Auth::id());
                })->with('solicitacao')->get();
                $estudantes = Estudante::where('departamento_id','=',Auth::user()->estudante->departamento_id)->get();
                $solicitacoesRecentes = Solicitacao::where('user_id','=',Auth::id())->orderBy('id', 'desc')->paginate(3);
                for ($i = 1; $i <= 12; $i++) {
                $solicitacoesPorMes[] = Solicitacao::where('user_id','=',Auth::id())->whereMonth('created_at', $i)->count();
                $despachosPorMes[] = Despacho::whereHas('solicitacao', function ($query) use ($user_id) {
                    $query->where('user_id', $user_id);
                })->with('solicitacao')->whereMonth('created_at', $i)->count();
            }

            }


            return view('Estudante.index',compact(['despachos','solicitacoes','encaminhadas','estudantes','solicitacoesPorMes', 'despachosPorMes','solicitacoesRecentes']));
        }
    }
    public function funcionario()
    {
        //
        $solicitacoesPorMes = [];
        $despachosPorMes = [];


                $despachos = Despacho::all();

                $solicitacoes = Solicitacao::all();
               $solicitacoesRecentes = Solicitacao::orderBy('id', 'desc')->paginate(3);
                $encaminhadas = Encaminhamento::all();
                $estudantes = Estudante::all();

        if(!Auth::user()->email_verified_at){
           return redirect()->route('reenviar-email',Auth::user()->id);
        }else{
            if(Auth::user()->tipo=='funcionario'){
                $departamentoId = Auth::user()->funcionario->departamento_id;

                $despachos = Despacho::whereHas('solicitacao', function ($query) use ($departamentoId) {
                    $query->where('departamento_id', $departamentoId);
                })->with('solicitacao')->get();

                $solicitacoes = Solicitacao::where('departamento_id','=',Auth::user()->funcionario->departamento_id)->get();
                $solicitacoesRecentes = Solicitacao::where('departamento_id','=',Auth::user()->funcionario->departamento_id)->orderBy('id', 'desc')->paginate(3);
                $encaminhadas = Encaminhamento::where('departamento_id','=',Auth::user()->funcionario->departamento_id)->get();
                $estudantes = Estudante::where('departamento_id','=',Auth::user()->funcionario->departamento_id)->get();
                for ($i = 1; $i <= 12; $i++) {
                $solicitacoesPorMes[] = Solicitacao::whereMonth('created_at', $i)->count();
                $despachosPorMes[] = Despacho::whereMonth('created_at', $i)->count();
            }
            }


            return view('Funcionario.index',compact(['despachos','solicitacoes','encaminhadas','estudantes','solicitacoesPorMes', 'despachosPorMes','solicitacoesRecentes']));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function listaUsuarios(Request $request)
    {
        //
        $search = session('search')?session('search'):$request->search;

        $query = User::query();
        if($search){
            $query->where('nome','like','%'.$search.'%')->orWhere('email','like','%'.$search.'%');
        }
        $usuarios = $query->paginate(5);
        return view('Admin.Usuarios.index',compact(['usuarios','search']));
    }
    public function create()
    {
        //
    }
    public function RecuperarSenha()
    {
        //
        return view('Auth.recuperarSenha');
    }
    public function RecuperarSenhaVer(Request $request)
    {
        //
        $user = User::where('email',$request->email)->first();
        if($user){
            $senha = Str::random(12);
            $user->update(['password'=>bcrypt($senha)]);
             Mail::to($request->email)->send(new EnviarEmail('','A sua nova senha é '.$senha.' Porfavor troque logo que entrar no sistema','senha'));
            return back()->with(['success'=>'A nova senha foi enviado para o email fornecido!']);
        }else{
            return back()->withErrors(['error'=>'Conta não localizada!']);


        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($dadosValidados)
    {
        //


        DB::beginTransaction();
        try {
            //code...
            $newUser = User::create($dadosValidados);
            DB::commit();
            return $newUser;
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return error($th->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(User $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editEstudante(User $user)
    {
        //
        return view('Estudante.settings',compact(['user']));

    }
    public function editFuncionario(User $user)
    {
        //
        return view('Funcionario.settings',compact(['user']));

    }
    public function edit(User $user)
    {
        //
        return view('Admin.settings',compact(['user']));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        $request->validate([
        'name' => 'required|string|max:255',
        'email' => [
            'required',
            'email',
            Rule::unique('users')->ignore($user->id),
        ],
        'old_password' => ['nullable', 'current_password'],
        'password' => [
            'nullable',
            'confirmed',
            'min:8', // mínimo 8 caracteres
        ],
    ], [
        'name.required' => 'O nome é obrigatório.',
        'email.required' => 'O email é obrigatório.',
        'email.email' => 'O email deve ser válido.',
        'email.unique' => 'Este email já está em uso.',
        'old_password.current_password' => 'A senha atual está incorreta.',
        'password.confirmed' => 'A confirmação da nova senha não corresponde.',
        'password.min' => 'A nova senha deve ter pelo menos 8 caracteres.',
    ]);

    // Atualizar nome e email
    $user->nome = $request->name;
    $user->email = $request->email;

    // Atualizar senha somente se foi fornecida
    if ($request->filled('password')) {
        $user->password = bcrypt($request->password);
    }

    $user->save();

    return redirect()->back()->with('success', 'Perfil atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $id)
    {
        //

    }
}
