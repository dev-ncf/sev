<?php

namespace App\Http\Controllers;

use App\Models\Faculdade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\error;

class FaculdadeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $search =$request->search;
        $query = Faculdade::query();

        if($request->has('search')){
            $query->where('nome','like','%'.$request->search.'%')->orWhere('slug','like','%'.$request->search.'%');
        }
        if(session('search')){
            $search = session('search');
             $query->where('nome','like','%'.$search.'%')->orWhere('slug','like','%'.$search.'%');
        }
        $faculdades = $query->get();


        return view('Admin.Faculdades.index',compact(['faculdades','search']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Admin.Faculdades.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

       $filesName = ((new FileUploadController)->store($request));


        $dadosValidados = $request->validate([

                'nome' => 'required|string|min:3|max:255',
                'slug' => 'required|string|min:3|max:255',
            ]);



            DB::beginTransaction();
        try {
            //code...
            $dado = Faculdade::create($dadosValidados);
             DB::commit();
            return redirect()->route('faculdades')->with('search', $dado->nome);
        } catch (\Throwable $th) {
            //throw $th;
            return error($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Faculdade $faculdade)
    {
        //
        return $faculdade;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faculdade $faculdade)
    {
        //
        return view('Admin.Faculdades.edit',compact(['faculdade']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faculdade $faculdade)
    {
        //
         $dadosValidados = $request->validate([

                'nome' => 'required|string|min:3|max:255',
                'slug' => 'required|string|min:3|max:255',
            ]);



            DB::beginTransaction();
        try {
            //code...
            $dado = $faculdade->update($dadosValidados);
             DB::commit();
             return back()->with(['success'=>'Actualização feita com sucesso!']);
        } catch (\Throwable $th) {
            //throw $th;
            return error($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faculdade $faculdade)
    {
        //

            DB::beginTransaction();
        try {
            //code...
            $dado = $faculdade->delete();
             DB::commit();
             return back()->with(['success'=>'Exclusão feita com sucesso!']);
        } catch (\Throwable $th) {
            //throw $th;
            return back()->withErrors(['error'=>$th->getMessage()]);
        }
    }
}
