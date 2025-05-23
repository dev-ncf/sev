<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    //
    protected $fillable =[
        'faculdade_id',
        'nome',
        'descricao'
    ];
    public function faculdade(){
        return $this->belongsTo(Faculdade::class);
    }
    public function cursos(){
        return $this->hasMany(Curso::class);
    }
    public function encaminhamentos(){
        return $this->hasMany(Encaminhamento::class);
    }


}
