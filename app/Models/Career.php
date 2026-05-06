<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//aqui se define el tipo de relacion que hay entre las tablas
class Career extends Model
{
    protected $fillable =['name'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
