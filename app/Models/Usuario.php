<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'users';

    public function recursos()
    {
        return $this->hasMany(Recurso::class, 'user_id'); 
    }
}
