<?php

namespace App\Http\Controllers\Estudante;

use App\Http\Controllers\Controller;
use App\Models\Despacho;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EstudanteDespachoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if(Auth::user()->tipo=='estudante'){
                $user_id = Auth::id();

                $despachos = Despacho::whereHas('solicitacao', function ($query) use ($user_id) {
                    $query->where('user_id', $user_id);
                })->with('solicitacao')->paginate(7);


            }
        return view('Estudante.Despachos.index',compact(['despachos']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
     public function show(Despacho $despacho)
    {
        //
        // dd($despacho->funcionario_id);
        $despacho->update(['lida'=>'1']);
        return view('Estudante.Despachos.show',compact(['despacho']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
