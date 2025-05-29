<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    //
    protected $fillable =[
        'nome',
        'descricao',
        'tipo',
    ];

    public function cursos(){
        return $this->hasMany(Curso::class);
    }
    public function encaminhamentos(){
        return $this->hasMany(Encaminhamento::class);
    }


}
