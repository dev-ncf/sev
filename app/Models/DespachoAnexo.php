<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DespachoAnexo extends Model
{
    //

    protected $fillable =['despacho_id','arquivo'];

    public function despacho(){
        return $this->belongsTo(Despacho::class);
    }
}
