<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Departamento;
use App\Models\Estudante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\error;

class EstudanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Estudante::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $faculdades = Departamento::all();
        $cursos = Curso::all();
        return view('Auth.registration',compact(['faculdades','cursos']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

         $dadosValidados = $request->validate([
                    'nome' => 'required|string|min:3|max:255',
                    'apelido' => 'nullable|string|max:255',
                    'matricula' => [
                        'required',
                        'string',
                        'regex:/^\d{2}\.\d{4}\.\d{4}$/',
                        'unique:estudantes,matricula'
                    ],
                    'email' => 'required|string|email|min:6|max:255|unique:users,email',
                    'password' => 'required|string|min:8|confirmed',
                    'curso_id' => 'required|exists:cursos,id',
                ], [
                    'nome.required' => 'O campo nome é obrigatório.',
                    'nome.min' => 'O nome deve ter pelo menos 3 caracteres.',
                    'nome.max' => 'O nome não pode exceder 255 caracteres.',
                    'apelido.max' => 'O apelido não pode exceder 255 caracteres.',
                    'matricula.required' => 'O campo código é obrigatório.',
                    'matricula.unique' => 'O código já existe no nosso banco de dados.',
                    'matricula.regex' => 'A código deve estar no formato 00.0000.0000.',
                    'email.required' => 'Informe o email principal.',
                    'email.email' => 'Informe um email válido.',
                    'email.min' => 'O email deve ter pelo menos 6 caracteres.',
                    'email.max' => 'O email não pode exceder 255 caracteres.',
                    'email.unique' => 'Este email já está em uso.',
                    'password.required' => 'A senha é obrigatória.',
                    'password.min' => 'A senha deve ter no mínimo 8 caracteres.',
                    'password.confirmed' => 'A confirmação da senha não corresponde.',
                    'curso_id.required' => 'Selecione um curso.',
                    'curso_id.exists' => 'O curso selecionado é inválido.',

                ]);


            DB::beginTransaction();
        try {
            //code...
            $dadosValidados['tipo']='estudante';
            $user = (new UserController())->store($dadosValidados);
            // dd($user);
            $dadosValidados['id']=$user->id;
            $dado = Estudante::create($dadosValidados);
             DB::commit();
             return redirect()->route('user.dashboard');
        } catch (\Throwable $th) {
            //throw $th;
            return error($th->getMessage());
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
                    'email' => 'required|string|email|min:6|max:255|unique:users,email',
                    'password' => 'required|string|min:8|confirmed',
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
                    'password.required' => 'A senha é obrigatória.',
                    'password.min' => 'A senha deve ter no mínimo 8 caracteres.',
                    'password.confirmed' => 'A confirmação da senha não corresponde.',
                    'curso_id.required' => 'Selecione um curso.',
                    'curso_id.exists' => 'O curso selecionado é inválido.',
                ]);

            DB::beginTransaction();
        try {
            //code...

            $dado = $estudante->update($dadosValidados);
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
