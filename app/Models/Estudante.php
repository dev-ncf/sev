<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudante extends Model
{
    //
    protected $fillable = [
        'id',
        'curso_id',
        'matricula',
        'user_id',
        'nome', 'apelido', 'genero', 'data_nascimento', 'departamento_id', 'nivel'

    ];
    public function curso(){
        return $this->belongsTo(Curso::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function departamento(){
        return $this->belongsTo(Departamento::class);
    }
}
