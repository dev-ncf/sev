<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faculdade extends Model
{
    //
    protected $fillable =[
        'nome',
    ];
    public function departamentos(){
        return $this->hasMany(Departamento::class);
    }
}
