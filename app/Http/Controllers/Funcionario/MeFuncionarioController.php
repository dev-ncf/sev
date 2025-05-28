<?php

namespace App\Http\Controllers\Funcionario;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Models\Departamento;
use App\Models\Funcionario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

class MeFuncionarioController extends Controller
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
        $query->where('departamento_id',Auth::user()->funcionario->departamento_id);
        $funcionarios= $query->paginate(5);
        return view('Funcionario.Funcionarios.index',compact(['funcionarios','search']));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $faculdades = Departamento::where('id',Auth::user()->funcionario->departamento_id)->get();

        return view('Funcionario.Funcionarios.add',compact(['faculdades']));
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
                'cargo' => 'required|string',
                'acesso' => 'required|in:A,B',
            ]);



            DB::beginTransaction();
        try {
            //code...

            $dadosValidados['tipo']='funcionario';
            $user = (new UserController())->store($dadosValidados);
            $dadosValidados['id']=$user->id;
            $dadosValidados['user_id']=$user->id;

            $newFuncionario = Funcionario::create($dadosValidados);

            // dd($user);
             DB::commit();
             return redirect()->route('funcionarios.index')->with(['success'=>'Funcionario cadastrado com sucesso!','search'=>$newFuncionario->nome]);
        } catch (\Throwable $th) {
            //throw $th;

             return back()->withErrors(['error'=>$th->getMessage()]);
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
        $faculdades = Departamento::where('id',Auth::user()->funcionario->departamento_id)->get();
        return view('Funcionario.Funcionarios.edit',compact(['funcionario','faculdades']));
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
                'cargo' => 'required|string',
                'acesso'=>'required|string',

                'email' => 'required|string|email|min:6|max:255|unique:users,email,'.$funcionario->user_id.',id',
                'password' => 'nullable|string|min:8|confirmed',
            ]);


            DB::beginTransaction();
        try {
            //code...


            $funcionario->update($dadosValidados);
            $funcionario->user->update([
                'email'=>$dadosValidados['email'],
            ]);
            if($dadosValidados['password']){
                $funcionario->user->update([
                    'password'=>bcrypt($dadosValidados['password']),
                ]);
            }
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
    public function destroy(Funcionario $funcionario)
    {
        //
        DB::beginTransaction();
        try{
            $user = User::find($funcionario->user_id);
            $funcionario->delete();
            $user->delete();
            DB::commit();
            return back()->with(['success'=>'Exclusao feita com sucesso!']);
        }catch(Throwable $th){
            return back()->withErrors(['error'=>$th->getMessage()]);
        }
    }
}
