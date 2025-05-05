<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Despacho extends Model
{
    //

    protected $fillable =[
        'solicitacao_id',
        'funcionario_id',
        'status',
        'anexo_id',
        'lida',
    ];

    public function anexos(){
        return $this->hasMany(DespachoAnexo::class);
    }
    public function solicitacao(){
        return $this->belongsTo(Solicitacao::class);
    }
    public function funcionario(){
        return $this->hasOne(Funcionario::class);
    }
}
