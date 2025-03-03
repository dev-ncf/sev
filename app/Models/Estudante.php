<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudante extends Model
{
    //
    protected $fillable = [
        'id',
        'curso_id',
        'matricula'
    ];
    public function curso(){
        return $this->belongsTo(Curso::class);
    }
    public function user(){
        return $this->hasMany(User::class,'id');
    }
}
