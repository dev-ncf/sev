<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Despacho extends Model
{
    //

    protected $fillable =[
        'solicitacao_id',
        'funcionario_id',
        'anexo_id'
    ];

    public function anexos(){
        return $this->hasMany(Anexo::class);
    }
    public function solicitacao(){
        return $this->belongsTo(Solicitacao::class);
    }
    public function funcionario(){
        return $this->hasOne(Funcionario::class);
    }
}
