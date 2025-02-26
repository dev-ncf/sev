<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anexo extends Model
{
    //
    protected $fillable =[
        'solicitacao_id',
        'arquivo'
    ];
    public function solicitacao(){
        return $this->belongsTo(Solicitacao::class);
    }
}
