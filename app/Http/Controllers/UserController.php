<?php

namespace App\Http\Controllers;

use App\Mail\EnviarEmail;
use App\Models\EmailCode;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use function Laravel\Prompts\error;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if(!Auth::user()->email_verified_at){
           return redirect()->route('reenviar-email',Auth::user()->id);
        }else{

            return view('Admin.index');
        }
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
    public function store($dadosValidados)
    {
        //


        DB::beginTransaction();
        try {
            //code...
            $newUser = User::create($dadosValidados);
            DB::commit();
            return $newUser;
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return error($th->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(User $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $id)
    {
        //

    }
}
