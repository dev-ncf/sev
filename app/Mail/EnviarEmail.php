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

    public function __construct($code,$mensagem)
    {
        $this->code = $code;
        $this->mensagem = $mensagem;
    }

    public function build()
    {
        if($this->code!=''){

            return $this->subject('Seu código de verificação')
                        ->view('emails.code')
                        ->with(['code' => $this->code]);
        }
        if($this->mensagem !=''){
            return $this->subject('Actualizacao de status da solicitacao')
                        ->view('emails.status')
                        ->with(['mensagem' => $this->mensagem]);
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
