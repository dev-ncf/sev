<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    //
    protected $fillable =[
        'departamento_id',
        'nome'
    ];
    public function departamento(){
        return $this->belongsTo(Departamento::class);
    }
}
