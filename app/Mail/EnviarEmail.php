<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EnviarEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
     use Queueable, SerializesModels;

     use Queueable, SerializesModels;

    public $code;
    public $mensagem;
    public $senha;

    public function __construct($code,$mensagem,$senha=null)
    {
        $this->code = $code;
        $this->mensagem = $mensagem;
        $this->senha = $senha;
    }

    public function build()
    {
        if($this->code!=''){

            return $this->subject('Seu código de verificação')
                        ->view('emails.code')
                        ->with(['code' => $this->code]);
        }
        if($this->mensagem !=''){
            $this->senha?$sub='Recuperação de senha':$sub='Actualização de status da solicitação';
            if($this->senha){

                return $this->subject($sub)
                            ->view('emails.senha')
                            ->with(['mensagem' => $this->mensagem]);
            }else{

                return $this->subject($sub)
                            ->view('emails.status')
                            ->with(['mensagem' => $this->mensagem]);
            }
        }
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
