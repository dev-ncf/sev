<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Faculdade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\error;
use function Ramsey\Uuid\v1;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $search = $request->search;
        $query = Departamento::query();
        if($request->has('search')){
            $query->where('nome','like','%'.$request->search.'%');
        }
        if(session('search')){
            $search = session('search');
            $query->where('nome','=',$search);
        }
        $departamentos = $query->get();
        return view('Admin.Departamentos.index',compact(['departamentos','search']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $faculdades = Faculdade::all();
        return view('Admin.Departamentos.add',compact(['faculdades']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $dadosValidados = $request->validate([

                'faculdade_id' => 'required|exists:faculdades,id',
                'nome' => 'required|string',
                'descricao'=>'nullable|string'
            ]);



            DB::beginTransaction();
        try {
            //code...
            $dado = Departamento::create($dadosValidados);
             DB::commit();
             return redirect()->route('departamentos')->with(['search'=>$dado->nome]);
        } catch (\Throwable $th) {
            //throw $th;
            return back()->withErrors(['errors'=>$th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Departamento $departamento)
    {
        //
        return $departamento;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Departamento $departamento)
    {
        //
        $faculdades = Faculdade::all();
        return view('Admin.Departamentos.edit',compact(['departamento','faculdades']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Departamento $departamento)
    {
        //
         $dadosValidados = $request->validate([

                'faculdade_id' => 'required|exists:faculdades,id',
                'nome' => 'required|string',
                'descricao'=>'nullable|string'
            ]);



            DB::beginTransaction();
        try {
            //code...
            $dado = $departamento->update($dadosValidados);
             DB::commit();
             return back()->with(['success'=>'Actualização feita com sucesso!']);
        } catch (\Throwable $th) {
            //throw $th;
            return back()->withErrors(['error'=>$th->getMessage()]);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Departamento $departamento)
    {
        //


            DB::beginTransaction();
        try {
            //code...
            $dado = $departamento->delete();
             DB::commit();
             return $dado;
        } catch (\Throwable $th) {
            //throw $th;
            return error($th->getMessage());
        }
    }
}
