<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{
    //
    protected $table = 'recursos';

    protected $fillable = [
        'recurso_nombre',
        'recurso_descripcion',
        'id_tematica',
        'privacidad',
        'user_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tematica()
    {
        return $this->belongsTo(Tematica::class, 'id_tematica');
    }

}
