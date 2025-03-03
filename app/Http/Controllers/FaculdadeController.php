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
    public function index()
    {
        //
        return Faculdade::all();
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

        $dadosValidados = $request->validate([

                'nome' => 'required|string|min:3|max:255',
            ]);



            DB::beginTransaction();
        try {
            //code...
            $dado = Faculdade::create($dadosValidados);
             DB::commit();
             return $dado;
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faculdade $faculdade)
    {
        //
         $dadosValidados = $request->validate([

                'nome' => 'required|string|min:3|max:255',
            ]);



            DB::beginTransaction();
        try {
            //code...
            $dado = $faculdade->update($dadosValidados);
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
    public function destroy(Faculdade $faculdade)
    {
        //

            DB::beginTransaction();
        try {
            //code...
            $dado = $faculdade->delete();
             DB::commit();
             return $dado;
        } catch (\Throwable $th) {
            //throw $th;
            return error($th->getMessage());
        }
    }
}
