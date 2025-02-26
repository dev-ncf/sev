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
        'status',

    ];
    public function solicitacao(){
        return $this->belongsTo(Solicitacao::class);
    }
    public function departamento(){
        return $this->hasOne(Departamento::class);
    }
    public function funcionario(){
        return $this->hasOne(Funcionario::class);
    }
}
