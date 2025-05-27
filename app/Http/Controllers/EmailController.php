<?php

namespace App\Http\Controllers;

use App\Mail\EnviarEmail;
use App\Models\EmailCode;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    //

    public function index(User $user){

        return view('Auth.email',compact(['user']));
    }

     public function reenviar(User $user)
    {
        //
                $code = random_int(100000, 999999);

                // Salvar na tabela de verificações


               $newCode= EmailCode::updateOrCreate(
                    ['user_id' => $user->id],
                    [
                        'code' => $code,
                        'expires_at' => Carbon::now()->addMinutes(10),
                    ]
                );
                // dd($newCode);
                // Enviar e-mail com o código
                Mail::to($user->email)->send(new EnviarEmail($code,''));
                 return redirect()->route('email-verify',$user->id)->with(['success'=>"Foi reenviado um email de verificação para o endereço fornecido durante o cadastro!"]);
    }
    public function verifyEmail(User $user,Request $request)
    {
        //
        $request->validate(
            [
                'code'=>'required|numeric|digits:6'
            ],[
                'code.required'=>'O codigo é obrigatorio!',
                'code.numeric'=>'O codigo deve ser numerico!',
                'code.digits'=>'O codigo deve ser de seis(6) digitos!',
            ]
            );
            try {
                $verificarCode = EmailCode::where('user_id','=',$user->id)->latest()->first();
                // dd($verificarCode);
                if($verificarCode->code == $request->code && $verificarCode->expires_at>=now()){
                     $user->update(['email_verified_at' => now()]);

                    $verificarCode->delete();
                    return redirect()->route('estudante.dashboard')->with(['success'=>'Email verificado com sucesso!']);
                }
                return redirect()->back()->withErrors(['error'=>'Código de verificado inválido/expirou!']);

            } catch (\Throwable $th) {
                //throw $th;
                return redirect()->back()->withErrors(['error'=>$th->getMessage()]);
            }

    }
}
