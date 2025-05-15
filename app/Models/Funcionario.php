<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    //
    protected $fillable=[
        'id',
        'departamento_id',
        'cargo',
        'nome',
        'user_id',
        'acesso'
    ];
    public function departamento(){
        return $this->belongsTo(Departamento::class);
    }
    public function despachos(){
        return $this->hasMany(Despacho::class);
    }
    public function solicitacoes(){
        return $this->hasMany(Solicitacao::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
