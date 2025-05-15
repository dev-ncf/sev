<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoSolicitacao extends Model
{
    //
    protected $table = 'tipos_solicitacao';
    protected $fillable = [
        'nome',
        'descricao',
        'arquivo'
    ];

}
