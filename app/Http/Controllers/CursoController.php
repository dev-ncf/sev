<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\error;
use function Laravel\Prompts\search;

class CursoController extends Controller
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
        return view('Admin.Cursos.index',compact(['cursos','search']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $faculdades = Departamento::all();
        return view('Admin.Cursos.add',compact(['faculdades']));
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
             return redirect()->route('cursos.index')->with(['success'=>'Curso registado com sucesso!','search'=>$curso->nome]);
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Curso $curso)
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

            $curso = $curso->update($dadosValidados);
             DB::commit();
             return $curso;
        } catch (\Throwable $th) {
            //throw $th;
            return error($th->getMessage());
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

            $curso = $curso->delete();
             DB::commit();
             return $curso;
        } catch (\Throwable $th) {
            //throw $th;
            return error($th->getMessage());
        }
    }
}
