<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IdentificacaoEstudante extends Model
{
    //

    protected $table='identificacao_estudantes';
    protected $fillable =[
        'tipo_documento',
        'numero_documento',
        'documento',
        'estudante_id',
        'local_emissao',
        'data_emissao',
    ];


    public function estudante(){
        return $this->belongsTo(Estudante::class);

    }
}
