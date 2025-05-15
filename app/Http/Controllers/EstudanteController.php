<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Departamento;
use App\Models\Estudante;
use App\Models\IdentificacaoEstudante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\error;

class EstudanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //

        $search = session('search')?session('search'):$request->search;
        $query = Estudante::query();
        if($search){
            $query->where('nome','like','%'.$search.'%')->orWhere('apelido','like','%'.$search.'%');
        }

        $estudantes = $query->paginate(5);

        return view('Admin.Estudantes.index',compact(['search','estudantes']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $estudante  = null;
        $faculdades = Departamento::all();
        $cursos = Curso::all();
        return view('Auth.registration',compact(['faculdades','cursos','estudante']));
    }
    public function add()
    {
        //
        $faculdades = Departamento::all();
        $cursos = Curso::all();
        $estudante=null;
        return view('Admin.Estudantes.add',compact(['faculdades','cursos','estudante']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

         $dadosValidados = $request->validate(
            [
        'curso_id' => 'required|exists:cursos,id',
        'departamento_id' => 'required|exists:departamentos,id',
        'matricula' => 'required|string|max:20|unique:estudantes,matricula',
        'nome' => 'required|string|max:60',
        'apelido' => 'required|string|max:60',
        'genero' => 'required|in:M,F',
        'data_nascimento' => 'required|date|before:today',
        'nivel' => 'required|integer|min:1|max:5',
        'email' => 'required|string|email|max:255|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
        'tipo_documento' => 'required|string|min:2|max:20',
        'numero_documento' => 'required|string|min:9|max:30|unique:identificacao_estudantes,numero_documento',
        'documento' => 'required|file|mimes:pdf,png,jpg|max:2048',
    ], [
        'curso_id.required' => 'O curso é obrigatório.',
        'curso_id.exists' => 'O curso selecionado não existe.',

        'departamento_id.required' => 'O departamento é obrigatório.',
        'departamento_id.exists' => 'O departamento selecionado não existe.',

        'matricula.required' => 'A matrícula é obrigatória.',
        'matricula.unique' => 'Esta matrícula já foi cadastrada.',
        'matricula.max' => 'A matrícula não pode ter mais de 20 caracteres.',

        'nome.required' => 'O nome é obrigatório.',
        'nome.max' => 'O nome não pode ter mais de 60 caracteres.',

        'apelido.required' => 'O apelido é obrigatório.',
        'apelido.max' => 'O apelido não pode ter mais de 60 caracteres.',

        'genero.required' => 'O gênero é obrigatório.',
        'genero.in' => 'O gênero deve ser M ou F.',

        'data_nascimento.required' => 'A data de nascimento é obrigatória.',
        'data_nascimento.date' => 'A data de nascimento deve ser uma data válida.',
        'data_nascimento.before' => 'A data de nascimento deve ser anterior a hoje.',

        'nivel.required' => 'O nível é obrigatório.',
        'nivel.integer' => 'O nível deve ser um número inteiro.',
        'nivel.min' => 'O nível mínimo é 1.',
        'nivel.max' => 'O nível máximo é 5.',

         'email.required' => 'O email é obrigatório.',
        'email.email' => 'O email deve ser um endereço válido.',
        'email.max' => 'O email não pode ter mais de 255 caracteres.',
        'email.unique' => 'Este email já está cadastrado.',

        'password.required' => 'A senha é obrigatória.',
        'password.min' => 'A senha deve ter no mínimo 8 caracteres.',
        'password.confirmed' => 'A confirmação da senha não coincide.',
    ]);


            DB::beginTransaction();
        try {
            //code...
            $dadosValidados['tipo']='estudante';
            $user = (new UserController())->store($dadosValidados);
            $dadosValidados['id']=$user->id;
            $dadosValidados['user_id']=$user->id;
            $dado = Estudante::create($dadosValidados);
            // DB::commit();
            if($dadosValidados['documento']){
                $file = $dadosValidados['documento'];
                $filename = $file->getClientOriginalName();
                $caminho = $dadosValidados['documento']->storeAs('documentos', $filename);
                $dadosValidados['documento']=$caminho;
                $dadosValidados['estudante_id']=$user->id;

                // dd($user->id);
                IdentificacaoEstudante::create([
                    'tipo_documento'=>$dadosValidados['tipo_documento'],
                    'numero_documento'=>$dadosValidados['numero_documento'],
                    'documento'=>$dadosValidados['documento'],
                    'estudante_id'=>$dadosValidados['estudante_id'],
                ]);
            }

             DB::commit();
             if(Auth::user()){
                return redirect()->route('estudantes.index')->with(['success'=>'Estudante cadastrado com sucesso!','search'=>$dado->nome]);

             }
            //  dd('Ola');
              return redirect()->route('reenviar-email',$user->id);
        } catch (\Throwable $th) {
            //throw $th;
            return back()->withErrors(['error'=>$th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Estudante $estudante)
    {
        //
        return $estudante;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estudante $estudante)
    {
        //
        $faculdades = Departamento::all();
        $cursos = Curso::all();
        return view('Admin.Estudantes.edit',compact(['estudante','faculdades','cursos']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Estudante $estudante)
    {
        //
        $dadosValidados = $request->validate([
                    'nome' => 'required|string|min:3|max:255',
                    'apelido' => 'nullable|string|max:255',
                    'matricula' => [
                        'required',
                        'string',
                        'regex:/^\d{2}\.\d{4}\.\d{4}$/'
                    ],
                    'email' => 'required|string|email|min:6|max:255|unique:users,email,'.$estudante->user_id,
                    'password' => 'nullable|string|min:8|confirmed',
                    'curso_id' => 'required|exists:cursos,id',
                ], [
                    'nome.required' => 'O campo nome é obrigatório.',
                    'nome.min' => 'O nome deve ter pelo menos 3 caracteres.',
                    'nome.max' => 'O nome não pode exceder 255 caracteres.',
                    'apelido.max' => 'O apelido não pode exceder 255 caracteres.',
                    'matricula.required' => 'O campo matrícula é obrigatório.',
                    'matricula.regex' => 'A matrícula deve estar no formato 06.0416.2025.',
                    'email.required' => 'Informe o email principal.',
                    'email.email' => 'Informe um email válido.',
                    'email.min' => 'O email deve ter pelo menos 6 caracteres.',
                    'email.max' => 'O email não pode exceder 255 caracteres.',
                    'email.unique' => 'Este email já está em uso.',
                    'password.min' => 'A senha deve ter no mínimo 8 caracteres.',
                    'password.confirmed' => 'A confirmação da senha não corresponde.',
                    'curso_id.required' => 'Selecione um curso.',
                    'curso_id.exists' => 'O curso selecionado é inválido.',
                ]);

            DB::beginTransaction();
        try {
            //code...

            $estudante->update($dadosValidados);

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
    public function destroy(Estudante $estudante)
    {
        //



            DB::beginTransaction();
        try {
            //code...
           $dado = $estudante->delete();
             DB::commit();
             return $dado;
        } catch (\Throwable $th) {
            //throw $th;
            return error($th->getMessage());
        }
    }
}
