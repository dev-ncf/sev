<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solicitacao extends Model
{
    //
    protected $table='solicitacoes';
    protected $fillable=[
        'user_id',
        'funcionario_id',
        'tipo_id',
        'departamento_id',
        'status',
        'data_criacao',
        'data_conclusao',
        'prioridade',
        'descricao',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function funcionario(){
        return $this->hasOne(Funcionario::class);
    }

    public function tipo(){
        return $this->belongsTo(TipoSolicitacao::class);
    }

    public function departamento(){
        return $this->hasOne(Departamento::class);
    }

    public function despacho(){
        return $this->hasOne(Despacho::class);
    }

    public function anexos(){
        return $this->hasMany(Anexo::class);
    }
}
