<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    //
    protected $fillable=[
        'departamento_id',
        'cargo',
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
        return $this->hasMany(User::class,'id');
    }
}
