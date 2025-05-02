<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Funcionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

use function Laravel\Prompts\error;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $search = session('search')?session('search'):$request->search;
        // return Funcionario::all();
        $query = Funcionario::query();
        if($search){
            $query->where('nome','like','%'.$search.'%');
        }
        $funcionarios= $query->get();
        return view('Admin.Funcionarios.index',compact(['funcionarios','search']));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // dd('pp');
        $faculdades = Departamento::all();
        return view('Admin.Funcionarios.add',compact(['faculdades']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $dadosValidados = $request->validate([
                'nome' => 'required|string|min:3|max:255',
                'email' => 'required|string|email|min:6|max:255|unique:users,email',
                'password' => 'required|string|min:8|confirmed',
                'departamento_id' => 'required|exists:departamentos,id',
                'cargo' => 'required|string'
            ]);



            DB::beginTransaction();
        try {
            //code...

            $user = (new UserController())->store($dadosValidados);
            $dadosValidados['id']=$user->id;
            $dadosValidados['user_id']=$user->id;

            $newFuncionario = Funcionario::create($dadosValidados);

            // dd($user);
             DB::commit();
             return redirect()->route('funcionarios.index')->with(['success'=>'Funcionario cadastrado com sucesso!','search'=>$newFuncionario->nome]);
        } catch (\Throwable $th) {
            //throw $th;
            return error($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Funcionario $funcionario)
    {
        //
        return 'funcionario';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Funcionario $funcionario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Funcionario $funcionario)
    {
        //

         $dadosValidados = $request->validate([
                'nome' => 'required|string|min:3|max:255',
                'departamento_id' => 'required|exists:departamentos,id',
                'cargo' => 'required|string'
            ]);


            DB::beginTransaction();
        try {
            //code...


            $func = $funcionario->update($dadosValidados);
             DB::commit();
             return $func;
        } catch (\Throwable $th) {
            //throw $th;
            return error($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Funcionario $funcionario)
    {
        //
        DB::beginTransaction();
        try{
            $funcionario->delete();
            DB::commit();
            return true;
        }catch(Throwable $th){
            return false;
        }
    }
}
