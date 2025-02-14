<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tematica extends Model
{
    protected $table = 'tematica';

    public function recursos()
    {
        return $this->hasMany(Recurso::class, 'id_tematica'); 
        // 'id_tematica' es la clave foránea en la tabla recursos
    }
}
