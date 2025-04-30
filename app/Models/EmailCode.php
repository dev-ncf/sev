<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailCode extends Model
{
    //

    protected $fillable = [
    'user_id',
    'code',
    'expires_at',
];

public function user()
{
    return $this->belongsTo(User::class);
}
}
