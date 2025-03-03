<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\error;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Admin::all();
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
                'email' => 'required|string|email|min:6|max:255|unique:users,email',
                'password' => 'required|string|min:8|confirmed',
                'permisoes' => 'required|string'
            ]);

            // return 'OOla';

            DB::beginTransaction();
        try {
            //code...

            $user = (new UserController())->store($dadosValidados);
            $dadosValidados['id']=$user->id;

            $newFuncionario = Admin::create($dadosValidados);
             DB::commit();
             return $newFuncionario;
        } catch (\Throwable $th) {
            //throw $th;
            return error($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
        return $admin;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
         $dadosValidados = $request->validate([
                'nome' => 'required|string|min:3|max:255',
                'permisoes' => 'required|string'
            ]);

            // return 'OOla';

            DB::beginTransaction();
        try {
            //code...


            $admin = $admin->update($dadosValidados);
             DB::commit();
             return $admin;
        } catch (\Throwable $th) {
            //throw $th;
            return error($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
          DB::beginTransaction();
        try {
            //code...


            $admin->delete();
             DB::commit();
             return true;
        } catch (\Throwable $th) {
            //throw $th;
            return error($th->getMessage());
        }
    }
}
