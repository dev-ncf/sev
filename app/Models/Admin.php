<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    protected $fillable =[
        'nome',
        'permissoes'
    ];
    public function user(){
        return $this->belongsTo(User::class,'id');
    }
}
