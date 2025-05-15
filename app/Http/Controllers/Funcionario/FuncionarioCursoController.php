<?php

namespace App\Http\Controllers\Funcionario;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use App\Models\Departamento;
use App\Models\Estudante;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\error;

class FuncionarioCursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
      public function index(Request $request)
    {
        //
        $search = session('search')?session('search'): $request->search;
        $query = Curso::query();
        if($search){
            $query->where('nome','like','%'.$search.'%');
        }

        $cursos = $query->get();
        return view('Funcionario.Cursos.index',compact(['cursos','search']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $faculdades = Departamento::all();
        return view('Funcionario.Cursos.add',compact(['faculdades']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $dadosValidados = $request->validate([

                'departamento_id' => 'required|exists:departamentos,id',
                'nome' => 'required|string|unique:cursos,nome',
                'descricao' => 'nullable|string',
            ]);
           DB::beginTransaction();
        try {
            //code...

            $curso = Curso::create($dadosValidados);
             DB::commit();
             return redirect()->route('funcionario.cursos.index')->with(['success'=>'Curso registado com sucesso!','search'=>$curso->nome]);
        } catch (\Throwable $th) {
            //throw $th;
            return back()->withErrors(['error'=>$th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Curso $curso)
    {
        //
        return $curso;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Curso $curso)
    {
        //
        $faculdades=Departamento::all();
        return view('Funcionario.Cursos.edit',compact(['faculdades','curso']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Curso $curso)
    {
        //
        // dd($curso->id);
         $dadosValidados = $request->validate([

                'departamento_id' => 'required|exists:departamentos,id',
                'nome' => 'required|string|unique:cursos,nome,'.$curso->id.',id',
                'descricao' => 'nullable|string',
            ],
            [
            'departamento_id.required' => 'O campo departamento é obrigatório.',
            'departamento_id.exists' => 'O departamento selecionado não existe.',
            'nome.required' => 'O nome do curso é obrigatório.',
            'nome.string' => 'O nome do curso deve ser um texto.',
            'nome.unique' => 'Já existe um curso com este nome.',
            'descricao.string' => 'A descrição deve ser um texto.',
        ]);
           DB::beginTransaction();
        try {
            //code...

            $curso = $curso->update($dadosValidados);
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
    public function destroy(Curso $curso)
    {
        //
           DB::beginTransaction();
        try {
            //code...

            $estudantes = Estudante::where('curso_id',$curso->id)->get();
            foreach ($estudantes as $estudante) {
                # code...
                $user = User::find($estudante->user_id);
                $user->delete();
            }
            $curso = $curso->delete();
             DB::commit();
             return back()->with(['success'=>'Exclusao feita com sucesso!']);
        } catch (\Throwable $th) {
            //throw $th;
          return back()->withErrors(['success'=>$th->getMessage()]);
        }
    }
}
