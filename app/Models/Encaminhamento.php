<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Encaminhamento extends Model
{
    //
    protected $fillable =[
        'solicitacao_id',
        'departamento_id',
        'funcionario_id',
        'responsavel_id',
        'status',
        'lida',

    ];
    public function solicitacao(){
        return $this->belongsTo(Solicitacao::class);
    }
    public function departamento()
        {
            return $this->belongsTo(Departamento::class, 'departamento_id');
        }
    public function funcionario(){
        return $this->belongsTo(Funcionario::class);
    }
}
